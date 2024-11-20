<?php

namespace App\Notifications;

use App\Models\Order;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class OrderCreatedNotification extends Notification
{
    public Order $order;

    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    public function via($notifiable): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('New order')
            ->greeting('Hello there is a new order need a review')
            ->line('New order by '.$this->order->client_name.' which has order number '.$this->order->order_no)
            ->action('Review the order here', url('/admin/orders/'.$this->order->id.'/edit'));
    }

    public function toArray($notifiable): array
    {
        return [];
    }
}
