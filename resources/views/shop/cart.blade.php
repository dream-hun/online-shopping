<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="Garden of Eden Produce" name="author">
    <title>Cart - Garden of Eden Produce </title>
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <!-- Styles -->
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>

<body class="font-sans antialiased bg-gray-100">
    <x-header-component />
    <section class="py-8 antialiasedmd:py-16">
        <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
            <h2 class="text-xl font-semibold text-gray-900 sm:text-2xl">Shopping Cart</h2>
            <livewire:shopping-cart-component />
        </div>
    </section>
    <x-footer-component />

</body>

</html>
