<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Mail\Mailables\Attachment;

class RefundApprovedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $refund;

    /**
     * Create a new message instance.
     */
    public function __construct($refund)
    {
      $this->refund = $refund;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Refund Approved Mail',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.refund-approved',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        $pdf = Pdf::loadView('pdf.refund_invoice', [
            'refund' => $this->refund,
        ]);

        return [
            Attachment::fromData(fn () => $pdf->output(), 'refund_invoice.pdf')
                ->withMime('application/pdf'),
        ];
    }
}
