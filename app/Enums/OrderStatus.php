<?php

namespace App\Enums;

enum OrderStatus: string
{
    case PENDING = 'Pending';
    case COMPLETED = 'Completed';
    case DELIVERED = 'Delivered';
    case CANCELLED = 'Cancelled';
    case PROCESSING = 'Processing';
    case SHIPPED = 'Shipped';
    case PAID = 'Paid';

    public function getLabel(): string
    {
        return match ($this) {
            self::PENDING => 'Pending',
            self::COMPLETED => 'Completed',
            self::CANCELLED => 'Cancelled',
            self::DELIVERED => 'Delivered',
            self::PROCESSING => 'Processing',
            self::SHIPPED => 'Shipped',
            self::PAID => 'Paid',
        };
    }
}
