<div class="rounded-lg border border-gray-200 bg-white p-4 shadow-sm md:p-6">
    <div class="space-y-4 md:flex md:items-center md:justify-between md:gap-6 md:space-y-0">
        <a href="#" class="shrink-0 md:order-1">
            <img class="h-20 w-20" src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/imac-front.svg"
                alt="{{ $product->name }}" />

        </a>

        <label for="counter-input" class="sr-only">Choose quantity:</label>
        <div class="flex items-center justify-between md:order-3 md:justify-end">
            <div class="flex items-center">
                <div>
                    <label for="hs-trailing-button-add-on" class="sr-only">Label</label>
                    <div class="flex rounded-lg shadow-none">

                        <input type="number" id="hs-trailing-button-add-on" name="hs-trailing-button-add-on"
                            class="py-3 px-4 block border-gray-200 shadow-none rounded-s-lg text-sm focus:z-10 disabled:opacity-50 disabled:pointer-events-none w-1/4"
                            wire:change="update('{{ $cartItem['id'] }}', $event.target.value)"
                            value="{{ $cartItem['quantity'] }}" min="0.5">
                        <button type="button" wire:loading.attr="disabled" wire:click="update"
                            class="py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-e-md border border-transparent bg-green-600 text-white hover:bg-green-700 focus:outline-none focus:bg-green-700 disabled:opacity-50 disabled:pointer-events-none">
                            Update
                        </button>

                    </div>
                </div>
            </div>
            <div class="text-start md:order-4 md:w-32">
                <p class="text-base font-bold text-gray-900">{{ Cknow\Money\Money::RWF($cartItem->price) }}
                    / <small>{{ $product->measurement }}</small>
                </p>
            </div>
        </div>

        <div class="w-full min-w-0 flex-1 space-y-4 md:order-2 md:max-w-md">
            <a href="#" class="text-base font-medium text-gray-900">{{ $cartItem->name }}</a>

            <div class="flex items-center gap-4">
                <button type="button" wire:click="removeFromCart('{{ $cartItem['id'] }}')"
                    class="inline-flex items-center text-sm font-medium text-red-600 hover:text-green-700">
                    <svg class="me-1.5 h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                        height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18 17.94 6M18 18 6.06 6" />
                    </svg>
                    Remove
                </button>
            </div>
        </div>
    </div>
</div>
