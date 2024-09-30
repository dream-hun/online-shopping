<x-mail::message>
    # Garden of Eden Produce Ltd

    ## Your Order is placed

    Dear {{ $order->client_name }},

    Your order has been placed!

    <x-mail::button :url="$url">
        View Order
    </x-mail::button>

    Thanks,<br>
    Garden of Eden Produce Ltd
</x-mail::message>
