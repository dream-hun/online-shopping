<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

final class SuccessfulOrderController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(string $uuid)
    {
        $order = Order::where('uuid', $uuid)->first();
        if (! $order) {
            abort(404);
        }

        return view('orders.index', ['order' => $order]);
    }
}
