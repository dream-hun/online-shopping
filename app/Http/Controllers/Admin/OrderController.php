<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Order;
use App\Models\User;
use App\Notifications\OrderUpdateNotification;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class OrderController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('order_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $orders = Order::select(['id', 'order_no', 'client_name', 'client_phone', 'status', 'delivery_method', 'payment_type'])
            ->with(['updated_by', 'orderItems'])
            ->orderBy('id', 'desc')
            ->paginate(10);

        return view('admin.orders.index', compact('orders'));
    }

    public function edit(Order $order)
    {
        abort_if(Gate::denies('order_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');



        return view('admin.orders.edit', compact('order' ));
    }

    public function update(UpdateOrderRequest $request, Order $order)
    {
        $order->update(['status' => $request->status,'updated_by_id' => auth()->id()]);
        User::all()->except($order->updated_by->id)->each(function (User $user) use($order) {
            $user->notify(new OrderUpdateNotification($order));
        });

        return redirect()->route('admin.orders.index');
    }

    public function show(Order $order)
    {
        abort_if(Gate::denies('order_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $order->load('updated_by');

        return view('admin.orders.show', compact('order'));
    }
}
