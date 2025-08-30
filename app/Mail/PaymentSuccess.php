<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PaymentSuccess extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(
        protected $orderId,
        protected $username,
        protected $email,
        protected $password = null,
    ) {

    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Payment Success',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        if ($this->password != null) {
            return new Content(
                view: 'pages.mail01',
                with: [
                    'order_id' => $this->orderId,
                    'email' => $this->email,
                    'password' => $this->password,
                    'username' => $this->username,
                    'password_course' => "MbCk3l4S001",
                ]
            );
        } else {
            return new Content(
                view: 'pages.mail01',
                with: [
                    'order_id' => $this->orderId,
                    'email' => $this->email,
                    'username' => $this->username,
                    'password_course' => "MbCk3l4S001",
                ]
            );
        }
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

    public function viewMail()
    {
        return view('pages/mail01');
    }
}
