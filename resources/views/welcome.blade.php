<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="Garden of Eden Produce" name="author">
    <title>Home- Garden of Eden Produce </title>
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <!-- Styles -->
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>

<body class="font-sans antialiased bg-gray-100">
    <x-header-component />
    <div class="bg-white">
        <div class="relative bg-gray-900">
            <!-- Decorative image and overlay -->
            <div aria-hidden="true" class="absolute inset-0 overflow-hidden">
                <img src="{{ asset('images/garden of eden produce.jpg') }}" alt="{{ config('app.name') }}"
                    class="h-full w-full object-cover object-center">
            </div>
            <div aria-hidden="true" class="absolute inset-0 bg-gray-900 opacity-60"></div>

            <div class="relative mx-auto flex max-w-3xl flex-col items-center px-6 py-32 text-center sm:py-64 lg:px-0">
                <h1 class="text-4xl font-bold tracking-tight text-white lg:text-6xl">Garden of Eden Produce</h1>
                <p class="mt-4 text-xl text-white">Garden of Eden Produce provides Organic Rwandan fruit and vegetables
                    at
                    affordable prices. With more than 40 years of organic farming experience,we specialize in
                    high
                    quality,great tasting produce.</p>
                <a href="{{ route('shop')}}"
                    class="mt-8 inline-block rounded-md border border-transparent bg-green-700 px-8 py-3 text-base font-medium text-gray-900 hover:bg-gray-100">Shop Now</a>
            </div>
        </div>
    </div>
    <div class="bg-white">
        <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
            <div class="md:flex md:items-center md:justify-between">
                <h2 class="text-2xl font-bold tracking-tight text-gray-900">Latest products</h2>
                <a href="{{ route('shop') }}"
                    class="hidden text-sm font-medium text-green-600 hover:text-green-500 md:block">
                    Shop the collection
                    <span aria-hidden="true"> →</span>
                </a>
            </div>
            <x-home-product-component />
        </div>
    </div>
    <x-footer-component />


</body>

</html>
