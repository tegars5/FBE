<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log; // Pastikan ini ada

class ContactController extends Controller
{
    public function send(Request $request)
    {
        // 1. Logging awal untuk melacak setiap percobaan pengiriman formulir
        Log::info('Percobaan pengiriman formulir kontak diterima.', [
            'ip' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'data_awal' => $request->except(['_token', 'password']) // Jangan log password jika ada
        ]);

        // 2. Validasi Data yang Diterima
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'email_address' => 'required|email:rfc,dns|max:255', // Validasi email yang lebih ketat
            'phone_number' => 'required|string|min:9|max:20', // Min length for phone number
            'company_name' => 'nullable|string|max:255',
            'inquiry_type' => 'required|string|in:product,quote,partnership,other',
            'message' => 'required|string|min:10|max:2000',
        ]);

        if ($validator->fails()) {
            // Log warning jika validasi gagal
            Log::warning('Validasi formulir kontak gagal.', [
                'errors' => $validator->errors()->toArray(),
                'input_email' => $request->email_address ?? 'N/A'
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Data yang Anda masukkan tidak valid. Silakan periksa kembali semua kolom.',
                'errors' => $validator->errors()
            ], 422); // Kode status HTTP 422 untuk Unprocessable Entity
        }

        // 3. Persiapkan Data untuk Email
        $formData = $request->only([
            'first_name',
            'last_name',
            'email_address',
            'phone_number',
            'company_name',
            'inquiry_type',
            'message'
        ]);

        // Tambahkan timestamp dan label jenis pertanyaan untuk email
        $formData['submitted_at'] = now()->format('d/m/Y H:i:s') . ' WIB'; // Tambahkan WIB
        $formData['inquiry_type_label'] = $this->getInquiryTypeLabel($formData['inquiry_type']);

        // 4. Periksa Konfigurasi Email Penerima
        $recipientEmail = config('mail.from.address'); // Menggunakan MAIL_FROM_ADDRESS sebagai default penerima
        if (empty($recipientEmail)) {
            Log::error('Kesalahan Konfigurasi Email: MAIL_FROM_ADDRESS tidak diatur di .env');
            return response()->json([
                'success' => false,
                'message' => 'Sistem email belum dikonfigurasi dengan benar. Mohon maaf atas ketidaknyamanannya. Silakan hubungi kami melalui WhatsApp.'
            ], 500);
        }

        try {
            // 5. Kirim Email Menggunakan Mailable Class
            Log::info('Mencoba mengirim email formulir kontak.', [
                'penerima' => $recipientEmail,
                'pengirim' => $formData['email_address'],
                'jenis_pertanyaan' => $formData['inquiry_type_label']
            ]);

            Mail::to($recipientEmail)->send(new ContactFormMail($formData));

            // Cek jika ada kegagalan pengiriman (misalnya antrean email gagal diproses)
            // Meskipun Mail::failures() lebih relevan untuk Mail::queue(), tidak ada salahnya mengecek
            if (count(Mail::failures()) > 0) {
                Log::error('Pengiriman email gagal (kemungkinan masalah antrean/transportasi asynchronous).', [
                    'kegagalan' => Mail::failures(),
                    'data_formulir' => $formData
                ]);
                return response()->json([
                    'success' => false,
                    'message' => 'Email gagal dikirim. Silakan coba lagi atau hubungi kami langsung via WhatsApp.'
                ], 500);
            }

            Log::info('Email formulir kontak berhasil dikirim.', [
                'penerima' => $recipientEmail,
                'pengirim' => $formData['email_address'],
                'jenis_pertanyaan' => $formData['inquiry_type_label']
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Terima kasih! Pesan Anda telah berhasil dikirim. Kami akan segera menghubungi Anda.'
            ], 200);
        } catch (\Symfony\Component\Mailer\Exception\TransportExceptionInterface $e) {
            // Tangani error terkait koneksi SMTP atau kredensial yang salah
            Log::error('SMTP Transport Exception (Mail Gagal Dikirim):', [
                'error_message' => $e->getMessage(),
                'error_code' => $e->getCode(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'pengirim_email' => $formData['email_address']
            ]);

            // Pesan yang lebih informatif untuk pengguna
            $userMessage = 'Terjadi masalah saat mencoba terhubung ke server email kami. Mohon maaf. Silakan coba lagi nanti, atau Anda bisa menghubungi kami langsung melalui WhatsApp.';

            // Tambahkan detail error jika di lingkungan lokal untuk debugging
            if (app()->environment('local')) {
                $userMessage .= ' Detail: ' . $e->getMessage();
            }

            return response()->json([
                'success' => false,
                'message' => $userMessage,
                'error_details' => app()->environment('local') ? $e->getMessage() : null
            ], 500);
        } catch (\Exception $e) {
            // Tangani semua jenis exception lainnya
            Log::error('Kesalahan Umum Saat Mengirim Email Formulir Kontak:', [
                'error_message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'trace' => $e->getTraceAsString(), // Full stack trace
                'pengirim_email' => $formData['email_address']
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Maaf, terjadi kesalahan tak terduga saat mengirim pesan Anda. Silakan coba lagi nanti atau hubungi kami langsung via WhatsApp.',
                'error_details' => app()->environment('local') ? $e->getMessage() : null
            ], 500);
        }
    }

    /**
     * Mengubah jenis pertanyaan menjadi label yang lebih mudah dibaca.
     */
    private function getInquiryTypeLabel($type)
    {
        $labels = [
            'product' => 'Informasi Produk',
            'quote' => 'Permintaan Penawaran',
            'partnership' => 'Kesempatan Kemitraan',
            'other' => 'Lainnya'
        ];

        return $labels[$type] ?? $type;
    }
}
