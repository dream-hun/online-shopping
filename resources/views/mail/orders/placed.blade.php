<x-mail::message>
    # Order Placed

    Hello {{ $order->client_name }} your order has been placed!

    <x-mail::table>
    </x-mail::table>

    Thanks,<br>
    {{ config('app.name') }}
</x-mail::message>
