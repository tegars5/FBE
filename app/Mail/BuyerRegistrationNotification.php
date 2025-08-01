<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class BuyerRegistrationNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Pendaftaran Buyer Baru Menunggu Verifikasi',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.buyer-registration-notification',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
