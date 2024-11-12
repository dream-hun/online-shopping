<?php

namespace App\Notifications;

use App\Helpers\Garden;
use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Log;

class OrderPlacedNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(public Order $order) {}

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(): MailMessage
    {
        if (! $this->order->client_name || ! $this->order->id) {
            Log::error('Order properties are missing.', [
                'client_name' => $this->order->client_name,
                'id' => $this->order->id,
            ]);
        }

        return (new MailMessage)
            ->subject('Order Placed')
            ->greeting('Dear '.$this->order->client_name)
            ->line('Your order has been placed.')
            ->line('Our team is working on it you will get email notification when it is ready.')
            ->action('View your order', url('/order-confirmation/'.Garden::encryptId($this->order->id)))
            ->line('Thank you for shopping with us!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        return [
            //
        ];
    }
}
