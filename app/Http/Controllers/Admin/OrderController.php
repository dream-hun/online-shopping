<?php

namespace App\Http\Controllers\Admin;

use App\Enums\DeliveryMethod;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Order;
use App\Models\User;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class OrderController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('order_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $orders = Order::select(['id', 'order_no', 'client_name', 'client_phone', 'status', 'delivery_method', 'payment_type'])->with(['updated_by', 'orderItems'])->paginate(10);
        return view('admin.orders.index', compact('orders'));
    }

    public function edit(Order $order)
    {
        abort_if(Gate::denies('order_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $updated_bies = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $order->load('updated_by');

        return view('admin.orders.edit', compact('order', 'updated_bies'));
    }

    public function update(UpdateOrderRequest $request, Order $order)
    {
        $order->update($request->all());

        return redirect()->route('admin.orders.index');
    }

    public function show(Order $order)
    {
        abort_if(Gate::denies('order_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $order->load('updated_by');

        return view('admin.orders.show', compact('order'));
    }
}
