<?php

namespace App\Mail\Order;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class EmailOrderCencelledConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct($order)
    {
        $this->order = $order;
    }

  /**
   * Get the message envelope.
   * @return Envelope
   */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Email Order Cancelled Confirmation',
        );
    }

  /**
   * Get the message content definition.
   * @return Content
   */
    public function content(): Content
    {
        return new Content(
            view: 'emails.Order.OrderCancelMailConformation',
        );
    }

    /**
     * @return EmailOrderCencelledConfirmation
     */
    public function build(): EmailOrderCencelledConfirmation
    {
        return $this->from('noreply@mailsender.ca')
            ->subject('Order Cancelled Confirmation')
            ->with('orderMail', $this->order);
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


}
