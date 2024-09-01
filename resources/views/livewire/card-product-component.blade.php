<div class="rounded-lg border border-green-200 bg-gray-50 p-6 shadow-sm">
    <div class="h-56 w-full">
        <a href="{{ route('product.show', $product->slug) }}">
            <img class="mx-auto h-full rounded-md"
                src="https://www.jesmondfruitbarn.com.au/wp-content/uploads/2016/10/Jesmond-Fruit-Barn-White-Radish.jpg"
                alt="{{ $product->name }}" />

        </a>
    </div>
    <div class="pt-6">
        <div class="mb-4 flex items-center justify-between gap-4">
            <span class="me-2 rounded bg-blue-300 px-2.5 py-0.5 text-xs font-medium text-gray-800">
                <a href="{{ route('category.show', $product->category->slug) }}">
                    {{ $product->category->name }}
                </a>
            </span>
        </div>

        <a href="{{ route('product.show', $product->slug) }}"
            class="text-lg font-semibold leading-tight text-gray-900 ">{{ $product->name }}</a>
        <ul class="mt-3 flex items-center gap-4">
            <li class="flex items-center gap-2">
                <svg class="h-4 w-4 text-gray-900 dark:text-gray-700" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 7h6l2 4m-8-4v8m0-8V6a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v9h2m8 0H9m4 0h2m4 0h2v-4m0 0h-5m3.5 5.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0Zm-10 0a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0Z" />
                </svg>
                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Fast Delivery</p>
            </li>

            <li class="flex items-center gap-2">
                <svg class="h-4 w-4 text-gray-900 dark:text-gray-700" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                        d="M8 7V6c0-.6.4-1 1-1h11c.6 0 1 .4 1 1v7c0 .6-.4 1-1 1h-1M3 18v-7c0-.6.4-1 1-1h11c.6 0 1 .4 1 1v7c0 .6-.4 1-1 1H4a1 1 0 0 1-1-1Zm8-3.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z" />
                </svg>
                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Best Price</p>
            </li>
        </ul>

        <div class="mt-4 flex items-center justify-between gap-4">
            <span class="text-sm/3 font-semibold leading-tight text-gray-900">{{ $product->formattedPrice() }} /
                <small>{{ $product->measurement }}</small>
            </span>
            @if ($product->status === 'Available')
                @if ($added)
                    <button type="button" wire:loading.attr="disabled" wire:click="remove"
                        class="inline-flex items-center rounded-lg bg-red-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-red-800 focus:outline-none focus:ring-4  focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                        Remove to cart
                    </button>
                @else
                    <button type="button" wire:loading.attr="disabled" wire:click="add"
                        class="inline-flex items-center rounded-lg bg-green-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-green-800 focus:outline-none focus:ring-4  focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                        <svg class="-ms-2 me-2 h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 4h1.5L8 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm.75-3H7.5M11 7H6.312M17 4v6m-3-3h6" />
                        </svg>
                        Add to cart
                    </button>
                @endif
            @else
                <button type="button" wire:loading.attr="disabled" wire:click="remove"
                    class="inline-flex items-center rounded-lg bg-yellow-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-yellow-800 focus:outline-none focus:ring-4  focus:ring-yellow-300 dark:bg-yellow-600 dark:hover:bg-yellow-700 dark:focus:ring-yellow-800">
                    Not Available
                </button>
            @endif

        </div>
    </div>
</div>
