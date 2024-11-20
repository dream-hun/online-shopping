<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class OrderStatusNotification extends Notification
{
    use Queueable;

    private string $status;

    public function __construct(\App\Enums\OrderStatus $status)
    {
        // Access the value of the enum
        $this->status = $status->value;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->line('Your order status has been updated to: '.$this->status)
            ->line('Thank you for shopping with us!');
    }
}
