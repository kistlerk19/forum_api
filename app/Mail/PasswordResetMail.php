<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PasswordResetMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $passwordResetData;

    /**
     * Create a new message instance.
     */
    public function __construct($passwordResetData)
    {
        $this->passwordResetData = $passwordResetData;
    }

    public function build()
    {
        $url = url('api/v1/users/forgot_password/'.$this->passwordResetData->token);
        return $this->from('ikistler19@gmail.com')->markdown('mail.password', [
            'email' => $this->passwordResetData->email,
            'url' => $url,
            // 'username' => $this->user->username,
        ]);
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Password Reset Mail',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'view.name',
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
