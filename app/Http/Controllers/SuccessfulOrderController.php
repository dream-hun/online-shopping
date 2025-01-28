<?php

namespace App\Http\Controllers;

use App\Helpers\Garden;
use App\Models\Order;
use Illuminate\Http\Request;

class SuccessfulOrderController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke($id)
    {
        $order = Order::find(Garden::decryptId($id));
        if (! $order) {
            abort(404);
        } else {
            return view('orders.index', ['order' => $order]);
        }

    }
}
