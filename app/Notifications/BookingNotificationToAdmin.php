<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class BookingNotificationToAdmin extends Notification
{
    use Queueable;

  public $BookingNotificationToAdmin;


  /**
   * Create a new notification instance.
   * @param $BookingNotificationToAdmin
   */
    public function __construct($BookingNotificationToAdmin)
    {
         $this->BookingNotificationToAdmin = $BookingNotificationToAdmin;

    }

  /**
   * Get the notification's delivery channels.
   *
   * @param object $notifiable
   * @return array<int, string>
   */
    public function via(object $notifiable): array
    {
        return ['database' ,'mail'];
    }

  /**
   * Get the mail representation of the notification.
   * @param object $notifiable
   * @return MailMessage
   */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->greeting('Hello Admin')
                    ->line('New Booking Request')
                    ->line($this->BookingNotificationToAdmin['body'])
                    ->line($this->BookingNotificationToAdmin['thanks']);
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
