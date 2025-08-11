<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Address;

class ContactForm extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    /**
     * Create a new message instance.
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address($this->data['email'], $this->data['name'] . ' ' . $this->data['surname']), // Email pošiljaoca iz forme
            replyTo: [ // Dodajemo Reply-To da možete direktno odgovoriti korisniku
                new Address($this->data['email'], $this->data['name'] . ' ' . $this->data['surname'])
            ],
            subject: 'Nova kontakt poruka: ' . ($this->data['subject'] ?? 'Bez naslova'), // Naslov emaila
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'emails.contact.form', // Putanja do našeg Markdown templejta
            with: [ // Podaci koji se prosleđuju templejtu
              'formData' => $this->data,
            ],
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
