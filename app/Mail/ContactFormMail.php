<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Queue\SerializesModels;

class ContactFormMail extends Mailable
{
    use Queueable, SerializesModels;

    public $formData;

    /**
     * Buat instance pesan baru.
     */
    public function __construct(array $formData) // Tambahkan type-hinting array
    {
        $this->formData = $formData;
    }

    /**
     * Dapatkan amplop pesan.
     */
    public function envelope(): Envelope
    {
        $inquiryType = $this->formData['inquiry_type_label'] ?? 'Pertanyaan Umum'; // Fallback yang lebih baik
        $senderName = trim(($this->formData['first_name'] ?? '') . ' ' . ($this->formData['last_name'] ?? ''));

        // Pastikan nama pengirim tidak kosong
        if (empty($senderName)) {
            $senderName = $this->formData['email_address'] ?? 'Pengirim Tidak Dikenal';
        }

        return new Envelope(
            from: new Address(
                config('mail.from.address'),
                config('mail.from.name')
            ),
            replyTo: [
                new Address(
                    $this->formData['email_address'],
                    $senderName
                )
            ],
            // Subjek yang lebih deskriptif
            subject: '[FBE Website] ' . $inquiryType . ' dari ' . $senderName,
        );
    }

    /**
     * Dapatkan definisi konten pesan.
     */
    public function content(): Content
    {
        return new Content(
            html: 'emails.contact-form',
            text: 'emails.contact-form-text', // Pastikan file ini ada
        );
    }

    /**
     * Dapatkan lampiran untuk pesan.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
