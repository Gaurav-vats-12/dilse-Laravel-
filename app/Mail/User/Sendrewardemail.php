<?php

namespace App\Mail\User;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class Sendrewardemail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct($user_data)
    {
        $this->user_data = $user_data;
    }

  /**
   * Get the message envelope.
   * @return Envelope
   */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Referral Reward: Your Special Coupon',
        );
    }

  /**
   * Get the message content definition.
   * @return Content
   */
    public function content(): Content
    {
        return new Content(
            view: 'emails.User.contactrewards',
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
   * @return Sendrewardemail
   */
  public function build(): Sendrewardemail
    {
        return $this->from('noreply@mailsender.ca')
            ->subject('Referral Reward: Your Special Coupon')
            ->with('user_data', $this->user_data);
    }
}
