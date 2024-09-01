<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="Garden of Eden Produce" name="author">
    <title>Shop - Garden of Eden Produce </title>
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <!-- Styles -->
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>

<body class="font-sans antialiased bg-gray-100">
    <x-header-component />
    <section class="py-8 antialiasedmd:py-16">
        <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
            <h2 class="text-xl font-semibold text-gray-900 sm:text-2xl">Shop</h2>

            <div class="container mx-auto px-4">
                <nav class="flex items-center py-4 text-sm">
                    <a href="{{ route('home')}}" class="text-gray-500 hover:text-gray-700">Home</a>
                    <span class="mx-2 text-gray-500">&gt;</span>
                    <a href="{{'shop'}}" class="text-gray-500 hover:text-gray-700">Shop</a>
                </nav>

                <div class="flex">
                    <!-- Left sidebar -->
                    <div class="w-1/4 pr-8">
                        <div class="mb-6">
                            <h2 class="text-lg font-semibold mb-2">Categories</h2>
                           
                            <div class="mt-2 space-y-2">
                                @foreach($categories as $category)
                                
                                <label class="flex items-center">
                                    
                                    <a href="{{ route('category.show',$category->slug)}}" class="ml-2 text-sm">{{ $category->name}}</a>
                                </label>
                                @endforeach

                                <!-- Add more categories here -->
                            </div>
                           
                        </div>
                        <!-- Add Rating and Price sections here -->
                    </div>

                    <!-- Main content -->
                    <div class="w-3/4 grid grid-cols-3 gap-4">
                        <!-- Product card 1 -->
                        <div class="border rounded-lg p-4">
                            <div class="mb-4 h-48 bg-gray-200 rounded-lg flex items-center justify-center">
                                <!-- Placeholder for product image -->
                            </div>
                            <h3 class="text-lg font-semibold">Apple Watch SE - Gen 3</h3>
                            <p class="text-xl font-bold mb-2">$299</p>
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700 mb-1">Display size</label>
                                <select class="w-full border border-gray-300 rounded-md py-2 px-3 text-sm leading-5 focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500">
                                    <option>Choose a size</option>
                                </select>
                            </div>
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700 mb-1">Color</label>
                                <select class="w-full border border-gray-300 rounded-md py-2 px-3 text-sm leading-5 focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500">
                                    <option>Choose a color</option>
                                </select>
                            </div>
                            <button class="w-full bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 transition duration-300">Add to cart</button>
                            <p class="text-sm text-gray-500 mt-2">Estimated Delivery: Jun 23 - Jun 24</p>
                        </div>

                        <!-- Product card 2 -->
                        <div class="border rounded-lg p-4">
                            <div class="mb-4 h-48 bg-gray-200 rounded-lg flex items-center justify-center">
                                <!-- Placeholder for product image -->
                            </div>
                            <h3 class="text-lg font-semibold">PlayStation®5 Console - 1TB</h3>
                            <p class="text-xl font-bold mb-2">$599</p>
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700 mb-1">Storage</label>
                                <select class="w-full border border-gray-300 rounded-md py-2 px-3 text-sm leading-5 focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500">
                                    <option>512GB</option>
                                </select>
                            </div>
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700 mb-1">Color</label>
                                <select class="w-full border border-gray-300 rounded-md py-2 px-3 text-sm leading-5 focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500">
                                    <option>Gray</option>
                                </select>
                            </div>
                            <button class="w-full bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 transition duration-300">Add to cart</button>
                            <p class="text-sm text-gray-500 mt-2">Estimated Delivery: Tomorrow</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <x-footer-component />
</body>

</html>
