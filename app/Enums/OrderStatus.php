<?php

namespace App\Enums;

enum OrderStatus: string
{
    case Pending = 'Pending';
    case Processing = 'Processing';
    case Shipped = 'Shipped';
    case Delivered = 'Delivered';
    case Cancelled = 'Cancelled';
    case Completed = 'Completed';
    case Paid = 'Paid';

    public function getLabel(): string
    {
        return match ($this) {
            self::Pending => 'Pending',
            self::Processing => 'Processing',
            self::Shipped => 'Shipped',
            self::Delivered => 'Delivered',
            self::Cancelled => 'Cancelled',
            self::Completed => 'Completed',
            self::Paid => 'Paid',
        };
    }
}
