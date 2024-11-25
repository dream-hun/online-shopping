<div class="w-full max-w-[85rem] py-10 px-4 sm:px-6 lg:px-8 mx-auto">
    <h1 class="text-2xl font-bold text-gray-800 mb-4">
        Checkout
    </h1>
    <form wire:submit.prevent='placeOrder'>
        <div class="grid grid-cols-12 gap-4">
            <div class="md:col-span-12 lg:col-span-8 col-span-12">
                <!-- Card -->
                <div class="bg-white rounded-xl shadow p-4 sm:p-7">
                    <!-- Shipping Address -->
                    <div class="mb-6">
                        <h2 class="text-xl font-bold text-gray-900 py-8">
                            Shipping Address
                        </h2>
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-gray-900 mb-1" for="client_name">
                                    Names
                                </label>
                                <input wire:model.blur="form.client_name" class="w-full rounded-lg border py-2 px-3"
                                       placeholder="Ex: John Doe" id="client_name" type="text">
                                @error('form.client_name')
                                <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label class="block text-gray-900 mb-1" for="email">
                                    Email
                                </label>
                                <input wire:model.blur="form.email" class="w-full rounded-lg border py-2 px-3"
                                       id="email" type="email" placeholder="Ex: mail@yahoo.com">
                                @error('form.email')
                                <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-gray-900 mb-1" for="client_phone">
                                    Phone
                                </label>
                                <input wire:model.blur="form.client_phone" class="w-full rounded-lg border py-2 px-3"
                                       placeholder="Ex: +250 780 000 000" id="client_phone" type="text">
                                @error('form.client_phone')
                                <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label class="block text-gray-900 mb-1" for="shipping_address">
                                    Address
                                </label>
                                <input wire:model.blur="form.shipping_address"
                                       class="w-full rounded-lg border py-2 px-3" id="shipping_address" type="text"
                                       placeholder="Ex: KG 213 ST, REMERA">
                                @error('form.shipping_address')
                                <span class="text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="mt-2">
                        <label for="notes" class="block mb-2 font-medium text-gray-900 dark:text-white">Add some
                            notes
                            on the order</label>
                        <textarea wire:model.blur="form.notes" id="notes" rows="4"
                                  class="block p-2.5 w-full text-sm text-gray-900 bg-white rounded-lg border border-gray-200 focus:ring-green-500 focus:border-green-500"
                                  placeholder="Write your thoughts here..."></textarea>
                        @error('form.notes')
                        <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="text-lg font-semibold mb-4 mt-4">
                        Select Payment Method
                    </div>
                    <ul class="grid w-full gap-6 md:grid-cols-2">
                        <li>
                            <input wire:model.blur="form.payment_type" class="hidden peer" id="payment_cash"
                                   type="radio" value="Cash on Delivery" name="payment_type"/>
                            <label
                                class="inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer  peer-checked:border-green-600 peer-checked:text-green-600 hover:text-gray-600 hover:bg-gray-100"
                                for="payment_cash">
                                <div class="block">
                                    <div class="w-full text-lg font-semibold">
                                        Cash on Delivery
                                    </div>
                                </div>
                                <svg aria-hidden="true" class="w-5 h-5 ms-3 rtl:rotate-180" fill="none"
                                     viewBox="0 0 14 10" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1 5h12m0 0L9 1m4 4L9 9" stroke="currentColor" stroke-linecap="round"
                                          stroke-linejoin="round" stroke-width="2">
                                    </path>
                                </svg>
                            </label>
                        </li>
                        <li>
                            <input wire:model.blur="form.payment_type" class="hidden peer" id="payment_momo"
                                   type="radio" value="Mobile Money" name="payment_type"/>
                            <label
                                class="inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer   peer-checked:border-green-600 peer-checked:text-green-600 hover:text-gray-600 hover:bg-gray-100"
                                for="payment_momo">
                                <div class="block">
                                    <div class="w-full text-lg font-semibold">
                                        Momo Pay
                                    </div>
                                </div>
                                <svg aria-hidden="true" class="w-5 h-5 ms-3 rtl:rotate-180" fill="none"
                                     viewBox="0 0 14 10" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1 5h12m0 0L9 1m4 4L9 9" stroke="currentColor" stroke-linecap="round"
                                          stroke-linejoin="round" stroke-width="2">
                                    </path>
                                </svg>
                            </label>
                        </li>
                    </ul>
                    @error('form.payment_type')
                    <span class="text-red-500">{{ $message }}</span>
                    @enderror

                    <div class="text-lg font-semibold mb-4 mt-4">
                        Choose Delivery Method
                    </div>
                    <ul class="grid w-full gap-6 md:grid-cols-2 mt-4">
                        @foreach ($deliveryMethods as $shipping_method)
                            <li>
                                <input wire:model.blur="form.delivery_method" class="hidden peer"
                                       id="delivery_{{ $shipping_method->value }}" type="radio"
                                       value="{{ $shipping_method->value }}" name="delivery_method"/>
                                <label
                                    class="inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer peer-checked:border-green-600 peer-checked:text-green-600 hover:text-gray-600 hover:bg-gray-100"
                                    for="delivery_{{ $shipping_method->value }}">
                                    <div class="block">
                                        <div class="w-full text-lg font-semibold">
                                            {{ $shipping_method->getLabel() }}
                                        </div>
                                    </div>
                                    <svg aria-hidden="true" class="w-5 h-5 ms-3 rtl:rotate-180" fill="none"
                                         viewBox="0 0 14 10" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1 5h12m0 0L9 1m4 4L9 9" stroke="currentColor" stroke-linecap="round"
                                              stroke-linejoin="round" stroke-width="2">
                                        </path>
                                    </svg>
                                </label>
                            </li>
                        @endforeach
                    </ul>
                    @error('form.delivery_method')
                    <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <!-- End Card -->
            </div>
            <div class="md:col-span-12 lg:col-span-4 col-span-12">
                <div class="bg-white rounded-xl shadow p-4 sm:p-7">
                    <div class="text-xl font-bold text-gray-700 mb-2">
                        ORDER SUMMARY
                    </div>
                    <div class="flex justify-between mb-2 font-bold">
                        <span>
                            Subtotal
                        </span>
                        <span>
                            {{ Cknow\Money\Money::RWF(Cart::getSubTotal()) }}
                        </span>
                    </div>
                    <div class="flex justify-between mb-2 font-bold">
                        <span>
                            Delivery Fee
                        </span>
                        <span>
                            {{ $setting->formattedShippingFee() }}
                        </span>
                    </div>
                    <hr class="bg-slate-400 my-4 h-1 rounded">
                    <div class="flex justify-between mb-2 font-bold">
                        <span>
                            Grand Total
                        </span>
                        <span>
                            {{ Cknow\Money\Money::RWF(Cart::getSubTotal() + $setting->shipping_fee) }}
                        </span>
                    </div>
                </div>
                <button type="submit"
                        class="bg-green-500 mt-4 w-full p-3 rounded-lg text-lg text-white hover:bg-green-600 flex items-center justify-center"
                        wire:loading.attr="disabled" wire:target="placeOrder">
                    <span wire:loading.remove wire:target="placeOrder">Place Order</span>
                    <span wire:loading wire:target="placeOrder" class="flex items-center space-x-2">
        <svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
            <path class="opacity-75" fill="currentColor"
                  d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
            </path>
        </svg>
        <span>Processing your order...</span>
    </span>
                </button>

                <div class="bg-white mt-4 rounded-xl shadow p-4 sm:p-7">
                    <div class="text-xl font-bold text-gray-700 mb-2">
                        BASKET SUMMARY
                    </div>
                    <ul class="divide-y divide-gray-200" role="list">
                        @foreach ($cartItems as $item)
                            <li class="py-3 sm:py-4" wire:key='{{ $item['id'] }}'>
                                <div class="flex items-center">
                                    <div class="flex-shrink-0">
                                        <img alt="{{ $item['name'] }}" class="w-12 h-12 rounded-full"
                                             src="{{ $item['image_url'] ?? asset('/images/No-image.png') }}">
                                    </div>
                                    <div class="flex-1 min-w-0 ms-4">
                                        <p class="text-sm font-medium text-gray-900 truncate">
                                            {{ $item['name'] }}
                                        </p>
                                        <p class="text-sm text-gray-500 truncate">
                                            Quantity: {{ $item['quantity'] }} / {{ $item['measurement'] }}
                                        </p>
                                    </div>
                                    <div
                                        class="inline-flex items-center text-base font-semibold text-gray-900">
                                        {{ Cknow\Money\Money::RWF($item['price']) }}
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </form>
</div>
