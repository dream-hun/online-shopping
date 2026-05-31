<?php

declare(strict_types=1);

namespace App\Helpers;

use App\Models\Order;
use App\Models\OrderItem;

final class Dashboard
{
    public static function toMoneyIncome()
    {
        return OrderItem::whereHas('order', function ($query) {
            $query->where('status', 'Paid');
        })->sum('sub_total');
    }

    public static function totalClients()
    {
        return Order::distinct('clientName')->count('clientName');
    }
}
