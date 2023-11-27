<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactNotification extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct($contactData)
    {
        $this->contactData = $contactData;
    }

  /**
   * Get the message envelope.
   * @return Envelope
   */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Contact Notification',
        );
    }

  /**
   * Get the message content definition.
   * @return Content
   */
    public function content(): Content
    {
        return new Content(
            view: 'emails.contact_notification',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, Attachment>
     */
    public function attachments(): array
    {
        return [];
    }

  /**
   * @return ContactNotification
   */
  public function build(): ContactNotification
    {
        return $this->from('noreply@mailsender.ca')
            ->subject('New Contact Form Submission')
                    ->with('contactData', $this->contactData);
    }
}
