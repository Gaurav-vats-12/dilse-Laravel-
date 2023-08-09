<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class BookingNotificationToAdmin extends Notification
{
    use Queueable;
    private $BookingNotificationToAdmin;

    /**
     * Create a new notification instance.
     */
    public function __construct($BookingNotificationToAdmin)
    {
     $this->BookingNotificationToAdmin = $BookingNotificationToAdmin;

    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'type' => $this->BookingNotificationToAdmin['type'],
            'notification_uuid' => $this->BookingNotificationToAdmin['notification_uuid'],
            'data' => $this->BookingNotificationToAdmin['body'],
             'notification_date' => $this->BookingNotificationToAdmin['notification_date'],

        ];
    }
}
