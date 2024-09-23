<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }} - Order Confirmation</title>
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <style>
        body {
            font-family: 'Inter var' !important;
            font-size: 18px !important;
        }
    </style>
</head>

<body class="bg-gray-100 font-sans">
    <div class="max-w-3xl mx-auto my-8 bg-white rounded-lg shadow-md overflow-hidden">
        <div class="bg-green-600 px-6 py-4">
            <h1 class="text-white text-2xl font-semibold">{{ config('app.name') }}</h1>
        </div>
        <div class="p-6">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">Your order is placed</h2>

            <table class="w-full mb-8">
                <tbody>
                    <tr>
                        <td class="py-2 font-semibold">Order date</td>
                        <td class="py-2">: {{ date('j M Y h:i a', strtotime($order->created_at)) }}</td>
                    </tr>
                    <tr>
                        <td class="py-2 font-semibold">Order No</td>
                        <td class="py-2">: {{ $order->order_no }}</td>
                    </tr>
                    <tr>
                        <td class="py-2 font-semibold">Client</td>
                        <td class="py-2">: {{ $order->client_name }}</td>
                    </tr>
                    <tr>
                        <td class="py-2 font-semibold">Client phone</td>
                        <td class="py-2">: {{ \App\Helpers\Garden::formatPhoneUs($order->client_phone) }}</td>
                    </tr>
                    <tr>
                        <td class="py-2 font-semibold">Email address</td>
                        <td class="py-2">: {{ $order->email }}</td>
                    </tr>
                    <tr>
                        <td class="py-2 font-semibold">Shipping address</td>
                        <td class="py-2">: {{ $order->shipping_address }}</td>
                    </tr>
                </tbody>
            </table>

            <h2 class="text-2xl font-bold text-gray-800 mb-4">Products ordered</h2>

            <table class="w-full mb-8">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="py-2 px-4 text-left">Product</th>
                        <th class="py-2 px-4 text-right">Price</th>
                        <th class="py-2 px-4 text-right">Qty</th>
                        <th class="py-2 px-4 text-right">Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order->orderItems as $orderItem)
                        <tr class="border-b">
                            <td class="py-2 px-4">{{ $orderItem->product->name }}</td>
                            <td class="py-2 px-4 text-right">{{ $orderItem->formattedPrice() }}</td>
                            <td class="py-2 px-4 text-right">{{ $orderItem->quantity }}</td>
                            <td class="py-2 px-4 text-right">{{ $orderItem->subtotal }}</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr class="border-t">
                        <th colspan="3" class="py-2 px-4 text-right font-semibold">Sub Total</th>
                        <th class="py-2 px-4 text-right">:
                            {{ Cknow\Money\Money::RWF($order->orderItems()->sum('subtotal')) }}
                            Rwf</th>
                    </tr>
                    <tr>
                        <th colspan="3" class="py-2 px-4 text-right font-semibold">Shipping</th>
                        <th class="py-2 px-4 text-right">: {{ $setting->formattedShippingFee() }}</th>
                    </tr>
                    <tr class="bg-gray-200">
                        <th colspan="3" class="py-2 px-4 text-right font-semibold">Total</th>
                        <th class="py-2 px-4 text-right">:
                            {{ Cknow\Money\Money::RWF($order->orderItems()->sum('subtotal') + $setting->shipping_fee) }}
                        </th>
                    </tr>
                </tfoot>
            </table>

            <h2 class="text-xl font-bold text-gray-800 mb-2">Note:</h2>
            <p class="text-gray-700 mb-8">{{ $order->notes }}</p>

            <a href="{{ url('/') }}"
                class="inline-block px-6 py-3 bg-green-600 text-white font-semibold rounded-md hover:bg-green-700 transition duration-300">
                Shop Again
            </a>

            <p class="text-gray-600 mt-8">
                Thanks,<br>
                {{ config('app.name') }}
            </p>
        </div>
    </div>
</body>

</html>
