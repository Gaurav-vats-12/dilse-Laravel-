<?php

namespace App\Notifications\Admin\Order;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class OrderPermissionNotificationToAdmin extends Notification
{
    use Queueable;
    public $OrderPermissionNotificationToAdmin;


    /**
     * Create a new notification instance.
     */
    public function __construct($OrderPermissionNotificationToAdmin)
    {
        dd($this->OrderPermissionNotificationToAdmin);

         $this->OrderPermissionNotificationToAdmin = $OrderPermissionNotificationToAdmin;

    }


    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database' ,'mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        dd($this->OrderPermissionNotificationToAdmin);
        return (new MailMessage)
        ->greeting('Hello Admin')
        ->line('New Booking Request')
        ->line($this->OrderPermissionNotificationToAdmin['body'])
        ->line($this->OrderPermissionNotificationToAdmin['thanks']);
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'type' => $this->OrderPermissionNotificationToAdmin['type'],
            'notification_uuid' => $this->OrderPermissionNotificationToAdmin['notification_uuid'],
            'data' => $this->OrderPermissionNotificationToAdmin['body'],
             'notification_date' => $this->OrderPermissionNotificationToAdmin['notification_date'],

        ];
    }
}
