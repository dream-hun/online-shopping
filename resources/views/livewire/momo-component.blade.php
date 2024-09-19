<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order placed</title>
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <!-- Styles -->
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <style>
        @media print {
            .no-print {
                display: none;
            }
        }
    </style>
</head>

<body class="bg-gray-100 font-sans">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            <div class="my-8">
                <a href="{{ route('landing') }}" class="no-print inline-block mb-4">
                    <div class="text-blue-600 hover:text-blue-800 mb-2">
                        Back to Home
                    </div>
                    <img src="{{ asset('img/GARDEN_LOGO.png') }}" alt="" class="max-h-24">
                </a>

                <button
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded float-right no-print text-sm"
                    onclick="window.print();">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block mr-1" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M5 4v3H4a2 2 0 00-2 2v3a2 2 0 002 2h1v2a2 2 0 002 2h6a2 2 0 002-2v-2h1a2 2 0 002-2V9a2 2 0 00-2-2h-1V4a2 2 0 00-2-2H7a2 2 0 00-2 2zm8 0H7v3h6V4zm0 8H7v4h6v-4z"
                            clip-rule="evenodd" />
                    </svg>
                    Print order
                </button>
                <div class="clear-both"></div>

                <h4 class="text-2xl font-bold my-4">Order placed</h4>
                <div id="printOrder">
                    <table class="w-full mb-8">
                        <tbody>
                            <tr>
                                <td class="font-bold py-2">Order No</td>
                                <td class="py-2">: {{ $order->order_no }}</td>
                            </tr>
                            <tr>
                                <td class="font-bold py-2">Order date</td>
                                <td class="py-2">: {{ date('j M Y h:i a', strtotime($order->created_at)) }}</td>
                            </tr>
                            <tr>
                                <td class="font-bold py-2">Client</td>
                                <td class="py-2">:
                                    {{ $order->user === null ? $order->client_name : $order->user->name }}
                                </td>
                            </tr>
                            <tr>
                                <td class="font-bold py-2">Client phone</td>
                                <td class="py-2">: {{ \App\Garden::formatPhoneUs($order->client_phone) }}</td>
                            </tr>
                            <tr>
                                <td class="font-bold py-2">Email address</td>
                                <td class="py-2">: {{ $order->email }}</td>
                            </tr>
                            <tr>
                                <td class="font-bold py-2">Delivery address</td>
                                <td class="py-2">: {{ $order->shipping_address }}</td>
                            </tr>
                        </tbody>
                    </table>

                    <h4 class="text-xl font-bold mb-4">Products ordered</h4>
                    <table class="w-full border-collapse border border-gray-300 mb-8">
                        <thead>
                            <tr class="bg-gray-200">
                                <th class="border border-gray-300 p-2 text-left">Product</th>
                                <th class="border border-gray-300 p-2 text-left">Price</th>
                                <th class="border border-gray-300 p-2 text-left">Qty</th>
                                <th class="border border-gray-300 p-2 text-left">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order->orderItems as $orderItem)
                                <tr>
                                    <td class="border border-gray-300 p-2">{{ $orderItem->product->name }}</td>
                                    <td class="border border-gray-300 p-2">{{ number_format($orderItem->price) }}</td>
                                    <td class="border border-gray-300 p-2">{{ $orderItem->qty }}</td>
                                    <td class="border border-gray-300 p-2">{{ number_format($orderItem->sub_total) }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="3" class="border border-gray-300 p-2 text-right">Sub Total:</th>
                                <th class="border border-gray-300 p-2 text-left">
                                    {{ $order->orderItems()->sum('sub_total') }} Rwf
                                </th>
                            </tr>
                            <tr>
                                <th colspan="3" class="border border-gray-300 p-2 text-right">Shipping:</th>
                                <th class="border border-gray-300 p-2 text-left">
                                    {{ $setting->formattedShippingFee() }}
                                </th>
                            </tr>
                            <tr>
                                <th colspan="3" class="border border-gray-300 p-2 text-right">Total:</th>
                                <th class="border border-gray-300 p-2 text-left">
                                    Rwf
                                </th>
                            </tr>
                            <tr>
                                <th colspan="3" class="border border-gray-300 p-2 text-right">
                                    <strong class="text-green-600">Total amount to Pay:</strong>
                                </th>
                                <th class="border border-gray-300 p-2 text-left">
                                    <strong class="text-green-600">
                                        Rwf
                                    </strong>
                                </th>
                            </tr>
                        </tfoot>
                    </table>
                    <div>
                        <p>
                            <strong class="font-bold">Note:</strong>
                            <span> {{ $order->notes }}</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
