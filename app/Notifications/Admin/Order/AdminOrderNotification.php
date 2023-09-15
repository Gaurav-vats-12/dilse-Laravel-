<?php

namespace App\Notifications\Admin\Order;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AdminOrderNotification extends Notification
{
    use Queueable;
    public $adminOrderNotification;

    /**
     * Create a new notification instance.
     */

    public function __construct($adminOrderNotification)
    {
        $this->adminOrderNotification = $adminOrderNotification;
    }
    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database','mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
              ->greeting('Hello Admin')
              ->subject('Custom Notification Subject')
             ->line('New Order Notification Request')
            ->line('The introduction to the notification.')
                ->line($this->adminOrderNotification['body'])
                    ->action('Notification Action', $this->adminOrderNotification['notification_url'])
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
            'type' => $this->adminOrderNotification['type'],
            'notification_uuid' => $this->adminOrderNotification['notification_uuid'],
            'data' => $this->adminOrderNotification['body'],
            'notification_date' => $this->adminOrderNotification['notification_date'],
        ];
    }
}
