<?php

namespace App\Mail;

use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ReceiptMail extends Mailable
{
    use Queueable, SerializesModels;

    public array $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'وصل الدفع ONDEFOC',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.receipt',
            with: [
                'data' => $this->data,
            ],
        );
    }

    public function attachments(): array
    {

        return [];
    }
}
