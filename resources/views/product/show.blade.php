<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="Garden of Eden Produce" name="author">
    <title>{{ $product->name }}- Garden of Eden Produce </title>
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <!-- Styles -->
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>

<body class="font-sans antialiased bg-gray-100">
    <x-header-component />
    <div class="w-full max-w-[85rem] py-10 px-4 sm:px-6 lg:px-8 mx-auto">
        <section class="overflow-hidden bg-white py-11 rounded-md">
            <div class="max-w-6xl px-4 py-4 mx-auto lg:py-8 md:px-6">
                <div class="flex flex-wrap -mx-4">
                    <img class="w-full mb-8 md:w-1/2 md:mb-0 rounded-md"
                        src="{{ $product->getFirstMediaUrl('image') }}">
                    <div class="w-full px-4 md:w-1/2 ">
                        <div class="lg:pl-20">
                            <div class="mb-8 ">
                                <h2 class="max-w-xl mb-6 text-2xl font-bold md:text-4xl">
                                    {{ $product->name }}</h2>
                                <p class="inline-block mb-6 text-4xl font-normal text-gray-900">
                                    <span>{{ $product->formattedPrice() }}/ {{ $product->measurement }}</span>

                                </p>
                                <p class="max-w-md text-gray-900">
                                    {{ $product->description }}
                                </p>
                            </div>
                            <div>
                                @if ($product->status === 'Available')
                                    <form action="{{ route('addToCart', ['id' => $product->id]) }}" class="inline-block"
                                        method="POST">
                                        @csrf
                                        <div class="flex">
                                            <label for="qty{{ $product->id }}"></label>
                                            <input min="0.5" size="10" value="1" type="text"
                                                max="{{ $product->qty }}" name="qty"
                                                class="py-3 px-4 block w-1/4 border-green-600 shadow-sm rounded-s-lg text-sm focus:z-10 focus:border-green-500 focus:ring-green-500 disabled:opacity-50 disabled:pointer-events-none "
                                                placeholder="Quantity" id="qty{{ $product->id }}">

                                            <button type="submit"
                                                class="py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-e-md border border-transparent bg-green-600 text-white hover:bg-green-700 focus:outline-none focus:bg-green-700 disabled:opacity-50 disabled:pointer-events-none">
                                                Add to Cart
                                            </button>
                                        </div>

                                    </form>
                                @else
                                    <button type="button"
                                        class="inline-flex items-center rounded-lg bg-yellow-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-yellow-800 focus:outline-none focus:ring-4  focus:ring-yellow-300 dark:bg-yellow-600 dark:hover:bg-yellow-700 dark:focus:ring-yellow-800">
                                        Not Available
                                    </button>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <x-footer-component />
</body>

</html>
