<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Supplier; // Import Supplier model
use App\Models\User;     // Import User model

class SupplierSubmissionMail extends Mailable
{
    use Queueable, SerializesModels;

    public $emailData;

    /**
     * Create a new message instance.
     *
     * @param array $emailData An array containing 'supplier', 'user', 'submission_ip', 'user_agent', 'submission_time'
     * @return void
     */
    public function __construct(array $emailData)
    {
        $this->emailData = $emailData;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        /** @var \App\Models\Supplier $supplier */
        $supplier = $this->emailData['supplier'];
        /** @var \App\Models\User $user */
        $user = $this->emailData['user'];

        $supplierTypeText = $supplier->supplier_type == 'mill_factory' ? 'Mill Factory' : 'Collector';
        $subject = 'New Supplier Submission: ' . $user->name . ' (' . $supplierTypeText . ')';

        return $this->subject($subject)
            ->view('emails.supplier-submission') // We will create this Blade view
            ->with([
                'supplier' => $supplier,
                'user' => $user,
                'submissionIp' => $this->emailData['submission_ip'],
                'userAgent' => $this->emailData['user_agent'],
                'submissionTime' => $this->emailData['submission_time'],
                'supplierTypeText' => $supplierTypeText,
            ]);
    }
}
