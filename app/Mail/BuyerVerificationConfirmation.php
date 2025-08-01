<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class BuyerVerificationConfirmation extends Mailable
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
            subject: 'Akun Buyer Anda Telah Diverifikasi!',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.buyer_verification_confirmation',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
