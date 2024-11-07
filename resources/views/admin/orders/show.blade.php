@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            <h1 style="text-transform: uppercase" class="mb-2 mt-2">{{ $order->client_name }} order</h1>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-8">
                    <p><strong>Order No</strong> {{ $order->order_no }}</p>
                    <p><strong>Client Name</strong> {{ $order->client_name }}</p>
                    <p><strong>Client Phone</strong> {{ $order->client_phone }}</p>
                    <p><strong>Client Address</strong> {{ $order->shipping_address }}</p>
                    <p><strong>Client Email</strong> {{ $order->email }}</p>

                </div>
                <div class="col-md-4 text-left">
                    <img src="{{ asset('images/logo.webp') }}" alt="Logo" class="img-fluid" style="max-width: 100px;">
                    <p class="mt-4"><strong>Tel:</strong> {{ $setting->mobile_one }}</p>
                    <p><strong>Address:</strong> {{ $setting->email_one }}</p>
                    <p><strong>Address:</strong> {{ $setting->address }}</p>
                </div>
            </div>

            <table class="table table-bordered mt-4">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order->orderItems as $item)
                        <tr>
                            <td>{{ $item->product->name ?? '' }}</td>
                            <td>{{ $item->quantity ?? '' }}</td>
                            <td>{{ $item->formattedPrice() ?? '' }}</td>
                            <td>{{ $item->formattedSubtotal() }}</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3" class="text-left"><strong>Subtotal Total</strong></td>
                        <td style="font-weight: bold;" class="text-dark">
                            {{ Cknow\Money\Money::RWF($order->orderItems()->sum('subtotal')) }}
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3" class="text-left"><strong>Delivery Fee</strong></td>
                        <td style="font-weight: bold;" class="text-dark">{{ $setting->formattedShippingFee() }}
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3" class="text-left"><strong>Grand Total</strong></td>
                        <td style="font-weight: bold;" class="text-dark">
                            {{ Cknow\Money\Money::RWF($order->orderItems()->sum('subtotal') + $setting->shipping_fee) }}
                        </td>
                    </tr>
                </tfoot>
            </table>

            <div class="mt-4">
                <p><strong>Notes:</strong>{{ $order->notes }}</p>
            </div>
        </div>
    </div>
@endsection
