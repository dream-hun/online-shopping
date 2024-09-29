@component('mail::message')
    # Order placed

    @component('mail::table')
        <table class="w-full text-left">
            <thead class="sr-only">
                <tr>
                    <!-- Empty row for accessibility purposes -->
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                <tr>
                    <td class="py-2">
                        <span class="font-bold">Order date</span>
                    </td>
                    <td class="py-2"> {{ date('j M Y h:i a', strtotime($order->created_at)) }}</td>
                </tr>
                <tr>
                    <td class="py-2">
                        <span class="font-bold">Order No</span>
                    </td>
                    <td class="py-2"> {{ $order->order_no }}</td>
                </tr>
                <tr>
                    <td class="py-2">
                        <span class="font-bold">Client</span>
                    </td>
                    <td class="py-2"> {{ $order->user === null ? $order->client_name : $order->user->name }}</td>
                </tr>
                <tr>
                    <td class="py-2">
                        <span class="font-bold">Client phone</span>
                    </td>
                    <td class="py-2"> {{ \App\Helpers\Garden::formatPhoneUs($order->client_phone) }}</td>
                </tr>
                <tr>
                    <td class="py-2">
                        <span class="font-bold">Email address</span>
                    </td>
                    <td class="py-2"> {{ $order->email }}</td>
                </tr>
                <tr>
                    <td class="py-2">
                        <span class="font-bold">Shipping address</span>
                    </td>
                    <td class="py-2"> {{ $order->shipping_address }}</td>
                </tr>
            </tbody>
        </table>
    @endcomponent

    # Products ordered

    @component('mail::table')
        <table class="w-full border-collapse">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border px-3 py-2 text-left">Product</th>
                    <th class="border px-3 py-2 text-left">Price</th>
                    <th class="border px-3 py-2 text-left">Qty</th>
                    <th class="border px-3 py-2 text-left">Total</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach ($order->orderItems as $orderItem)
                    <tr>
                        <td class="border px-3 py-2">{{ $orderItem->product->name }}</td>
                        <td class="border px-3 py-2">{{ $orderItem->formattedPrice() }}</td>
                        <td class="border px-3 py-2">{{ $orderItem->qty }}</td>
                        <td class="border px-3 py-2">{{ Cknow\Money\Money::RWF($orderItem->subtotal) }}</td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot class="bg-gray-50">
                <tr>
                    <th colspan="3" class="border px-3 py-2 text-left">Sub Total</th>
                    <th class="border px-3 py-2">{{ Cknow\Money\Money::RWF($order->orderItems()->sum('subtotal')) }}</th>
                </tr>
                <tr>
                    <th colspan="3" class="border px-3 py-2 text-left">Shipping</th>
                    <th class="border px-3 py-2">{{ $setting->formattedShippingFee() }}</th>
                </tr>
                <tr>
                    <th colspan="3" class="border px-3 py-2 text-left">Total</th>
                    <th class="border px-3 py-2">
                        {{ Cknow\Money\Money::RWF($order->orderItems()->sum('subtotal') + $order->shipping_amount) }}</th>
                </tr>
            </tfoot>
        </table>
    @endcomponent

    # Note

    <p>{{ $order->notes }}</p>

    @component('mail::button', ['url' => url('/'), 'color' => 'success'])
        Shop Again
    @endcomponent

    Thanks,<br>
    {{ config('app.name') }}
@endcomponent
