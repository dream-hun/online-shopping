<x-mail::message>
# Hello {{ $name }},

Your order is well received. Rest assured that our team is working on your order.

<x-mail::button :url="$url" color="success">
View Order Items
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
