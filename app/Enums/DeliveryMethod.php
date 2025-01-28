<?php

namespace App\Enums;

enum DeliveryMethod: string
{
    case DELIVERY = 'Delivery';
    case PICKUP = 'Pickup';

    public function getLabel(): string
    {
        return match ($this) {
            self::DELIVERY => 'Home Delivery',
            self::PICKUP => 'In-Store Pickup',
        };
    }

    public function color(): string
    {
        return match ($this) {
            self::DELIVERY => 'primary',
            self::PICKUP => 'success',
        };
    }
}
