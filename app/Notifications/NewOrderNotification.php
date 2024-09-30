<?php

namespace App\Notifications;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewOrderNotification extends Notification
{
    use Queueable;

    public $order;

    /**
     * Create a new notification instance.
     */
    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('New order Notification - Order'.$this->order->order_no)
            ->greeting('Hello '.$notifiable->name.' ,')
            ->line('A new order has been placed with the folloeing details.')
            ->line('Order ID: '.$this->order->order_no)
            ->line('Client: '.$this->order->client_name)
            ->action('View order', url('/admin/orders/'.$this->order->id))
            ->line('Thank you for using our application!')
            ->salutation('Best Regards')
            ->salutation('The '.config('app.name').' Team');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [];
    }
}
