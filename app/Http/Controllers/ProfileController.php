<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Supplier; // Pastikan model ini diimport
use App\Models\Buyer;    // Pastikan model ini diimport (jika digunakan)
use Illuminate\Support\Facades\Storage; // Import Storage facade untuk operasi file

class ProfileController extends Controller
{
    /**
     * Menampilkan halaman profil pengguna dan data spesifik peran.
     *
     * @return \Illuminate\View\View
     */
    public function show()
    {
        $user = Auth::user();
        $profileData = null;

        // Mendapatkan data profil spesifik berdasarkan peran pengguna
        if ($user->role === 'supplier') {
            // Ambil data supplier. Jika belum ada, buat instance baru agar view tidak error.
            $profileData = Supplier::firstOrNew(['user_id' => $user->id]);
            // Jika Anda ingin mengarahkan pengguna untuk mengisi profil awal secara paksa,
            // Anda bisa mengaktifkan kembali logika redirect di sini:
            // if (!$profileData->exists) {
            //     return redirect()->route('supplier.formFactory')->with('message', 'Harap lengkapi detail pabrik Anda terlebih dahulu.');
            // }
        } elseif ($user->role === 'buyer') {
            // Ambil data buyer. Jika belum ada, buat instance baru agar view tidak error.
            $profileData = Supplier::firstOrNew(['user_id' => $user->id]);
            // Anda bisa menambahkan logika redirect serupa untuk buyer jika diperlukan
        }

        return view('profile.show', compact('user', 'profileData'));
    }

    /**
     * Memperbarui data profil pengguna dan data spesifik peran.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        $user = Auth::user();

        // 1. Validasi Data User Dasar (Nama, Email, Password jika diisi)
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $user->id],
            // Validasi password diaktifkan kembali
            'current_password' => ['nullable', 'required_with:password', 'current_password'],
            'password' => ['nullable', 'confirmed', 'min:8'],
        ]);

        // 2. Perbarui Data User Dasar
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        if ($request->filled('password')) {
            $user->password = bcrypt($request->input('password'));
        }
        $user->save(); // Simpan perubahan pada model User

        // 3. Perbarui Data Spesifik Peran (Supplier atau Buyer)
        if ($user->role === 'supplier') {
            // Validasi data spesifik supplier
            $validatedSupplierData = $request->validate([
                'region' => 'nullable|string|max:255',
                'annual_production_volume' => 'nullable|numeric',
                'monthly_available_volume' => 'nullable|numeric',
                'dura_composition' => 'nullable|numeric|min:0|max:100',
                'tenera_composition' => 'nullable|numeric|min:0|max:100',
                'pisifera_composition' => 'nullable|numeric|min:0|max:100',
                'sales_record' => 'nullable|numeric',
                'desired_selling_price' => 'nullable|string|max:255',
                'minimum_order_quantity' => 'nullable|integer',
                'years_in_operation' => 'nullable|integer', // Pastikan ini divalidasi
                'contact_person' => 'nullable|string|max:255', // Pastikan ini divalidasi
                'phone' => 'nullable|string|max:255', // Pastikan ini divalidasi
                'notes' => 'nullable|string|max:1000',
                'factory_photos.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Untuk multiple files
                'sample_pks_photos.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Untuk multiple files
                'lab_test_report' => 'nullable|mimes:pdf|max:2048', // Untuk single file PDF
            ]);

            // Tangani checkbox 'urgent_sale_available' secara terpisah
            // Karena jika tidak dicentang, nilainya tidak ada di $request->all()
            $validatedSupplierData['urgent_sale_available'] = $request->has('urgent_sale_available');

            // Gunakan updateOrCreate untuk mencari atau membuat record Supplier
            // Ini akan mempermudah logika: jika ada, update; jika tidak ada, buat baru.
            $supplier = Supplier::updateOrCreate(
                ['user_id' => $user->id], // Kriteria pencarian
                $validatedSupplierData     // Data yang akan diisi/diupdate
            );

            // Proses Upload File
            // Untuk foto, kita akan menggabungkan dengan foto yang sudah ada (bukan menimpa seluruhnya)
            if ($request->hasFile('factory_photos')) {
                // Ambil foto yang sudah ada, default ke array kosong jika null
                $currentFactoryPhotos = $supplier->factory_photos ?: [];
                foreach ($request->file('factory_photos') as $photo) {
                    $path = $photo->store('supplier_photos/factory', 's3');
                    $currentFactoryPhotos[] = $path; // Tambahkan path foto baru
                }
                $supplier->factory_photos = $currentFactoryPhotos;
            }

            if ($request->hasFile('sample_pks_photos')) {
                $currentSamplePksPhotos = $supplier->sample_pks_photos ?: [];
                foreach ($request->file('sample_pks_photos') as $photo) {
                    $path = $photo->store('supplier_photos/sample_pks', 's3');
                    $currentSamplePksPhotos[] = $path;
                }
                $supplier->sample_pks_photos = $currentSamplePksPhotos;
            }

            if ($request->hasFile('lab_test_report')) {
                // Hapus laporan lama dari S3 jika ada dan ada laporan baru yang diupload
                if ($supplier->lab_test_report && Storage::disk('s3')->exists($supplier->lab_test_report)) {
                    Storage::disk('s3')->delete($supplier->lab_test_report);
                }
                $supplier->lab_test_report = $request->file('lab_test_report')->store('supplier_docs/lab_reports', 's3');
            }

            // Simpan perubahan pada model Supplier setelah memproses file-file
            $supplier->save();
        } elseif ($user->role === 'buyer') {
            // Logika untuk menyimpan profil buyer
            // Anda perlu menambahkan validasi dan logika penyimpanan di sini sesuai field Buyer Anda.
            // Contoh:
            // $validatedBuyerData = $request->validate([
            //     'company_name' => 'required|string|max:255',
            //     'address' => 'nullable|string|max:255',
            //     // ... field buyer lainnya
            // ]);
            // $buyer = Buyer::updateOrCreate(
            //     ['user_id' => $user->id],
            //     $validatedBuyerData
            // );
            // $buyer->save();
        }

        return back()->with('success', 'Profil berhasil diperbarui!');
    }
}
