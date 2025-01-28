<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{ seo()->generate() }}

    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <!-- Styles -->
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Google Tag Manager -->
    <script>
        (function (w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l !== 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-TPQ6QBVD');
    </script>
    <!-- End Google Tag Manager -->

    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
    <title>{{ config('app.name') }} - {{ $product->name }}</title>
</head>

<body class="font-sans antialiased bg-gray-100">
<!-- Google Tag Manager (noscript) -->
<noscript>
    <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TPQ6QBVD" height="0" width="0"
            style="display:none;visibility:hidden"></iframe>
</noscript>
<!-- End Google Tag Manager (noscript) -->
<x-header-component/>
<div class="container mx-auto px-4 py-8">
    <!-- Main Product Section -->
    <div class="bg-white rounded-lg shadow-lg p-6 md:p-8 mb-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Product Image -->
            <div class="relative">
                @if($product->image)
                    <img src="{{ $product->getFirstMediaUrl('image') }}" alt="{{$product->name}}"
                         class="w-full h-auto rounded-lg">
                @else
                    <img src="{{ asset('images/No-image.png') }}" alt="{{$product->name}}"
                         class="w-full h-auto rounded-lg">

                @endif
            </div>

            <!-- Product Details -->
            <div class="flex flex-col">
                <h1 class="text-3xl font-bold text-gray-900 mb-4">{{$product->name}}</h1>
                <div class="text-2xl font-semibold text-gray-900 mb-4">{{$product->formattedPrice()}}
                    / {{ $product->measurement }}</div>


                <!-- Description -->
                <div class="mb-6">
                    <h2 class="text-lg font-semibold text-gray-900 mb-2">Description</h2>
                    <p class="text-gray-600">
                        {!! Str::markdown($product->description)!!}
                    </p>
                </div>

                <!-- Add to Cart Section -->
                <div class="mt-auto">
                    <div class="flex items-center space-x-4 mb-4">
                        <label for="quantity" class="text-gray-700">Quantity:</label>
                        <input type="number" id="quantity" min="1" value="1"
                               class="w-20 px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500">
                    </div>
                    <button class="w-full bg-green-600 text-white py-3 px-6 rounded-lg hover:bg-green-700
                            transition duration-300 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20"
                             fill="currentColor">
                            <path
                                d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"/>
                        </svg>
                        Add to Cart
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Related Products -->
    <h2 class="text-2xl font-bold text-gray-900 mb-6">Related Products</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @foreach($relatedProducts as $relatedProduct)
            <div class="bg-white rounded-lg shadow-lg p-4">
                <a href="{{route('product',$relatedProduct->slug)}}">

                    @if($product->image)

                        <img src="{{$relatedProduct->getFirstMediaUrl('image')}}" alt="{{$relatedProduct->name}}"
                             class="w-full h-48 object-cover rounded-lg mb-4">
                    @else
                        <img src="{{ asset('images/No-image.png') }}" alt="{{$product->name}}"
                             class="w-full h-48 object-cover rounded-lg mb-4">

                    @endif

                    <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ $relatedProduct->name }}</h3>
                    <p class="text-gray-600 mb-4"> {{ Str::limit($product->description, 100) }}</p>
                    <p class="text-lg font-bold text-gray-900">{{ $relatedProduct->formattedPrice() }}
                        / {{ $relatedProduct->measurement }}</p>

                </a>
                <!-- Action button -->
                <button
                    wire:click="{{ $added ? 'remove' : 'addToCart' }}"
                    class="w-full py-2 px-4 rounded-lg transition-colors duration-200 {{ $added
                ? 'bg-red-700 hover:bg-red-800'
                : 'bg-green-700 hover:bg-green-800'
            }} text-white"
                >
                    {{ $added ? 'Remove from Basket' : 'Add to Cart' }}
                </button>
            </div>

        @endforeach
    </div>
</div>
<x-footer-component/>
<x-livewire-alert::scripts/>
</body>

</html>
