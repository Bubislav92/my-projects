<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;


class ContactFormMail extends Mailable
{
    use Queueable, SerializesModels;

     /**
     * Јавно својство које ће држати валидиране податке са форме.
     */
    public $validatedData;

    /**
     * Create a new message instance.
     */
    public function __construct(array $validatedData)
    {
        // Додељујемо валидиране податке јавном својству
        $this->validatedData = $validatedData;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Contact Form Mail',
            from: new \Illuminate\Mail\Mailables\Address($this->validatedData['email'], $this->validatedData['full_name']),
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            // Definišemo koji Blade šablon se koristi
            view: 'emails.contact-form',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
