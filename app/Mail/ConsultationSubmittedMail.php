<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ConsultationSubmittedMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $consultation;

    public function __construct($consultation)
    {
        $this->consultation = $consultation;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Consultation Request Received',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.consultation-submitted',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}