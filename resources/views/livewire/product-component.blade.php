<div class="w-full max-w-7xl py-20 px-4 sm:px-6 lg:px-8 mx-auto">
    <section class="overflow-hidden bg-white py-11 rounded-md">
        <div class="max-w-6xl px-4 py-4 mx-auto lg:py-8 md:px-6">
            <div class="flex flex-wrap -mx-4">
                <div class="w-full mb-8 md:w-1/2 md:mb-0">
                    <div class="sticky top-0 z-40 overflow-hidden">
                        <div class="relative mb-6 lg:mb-10 lg:h-2/4">
                            @if ($product->image)
                                <img src="{{ $product->getFirstMediaUrl('image') }}" alt="{{ $product->name }} image"
                                     class="object-cover w-full lg:h-full">
                            @else
                                <img src="{{ asset('images/No-image.png') }}" alt="No image available"
                                     class="object-cover w-full lg:h-full">
                            @endif
                        </div>
                    </div>
                </div>
                <div class="w-full px-4 md:w-1/2">
                    <div class="lg:pl-20">
                        <div class="mb-8 [&>ul]:list-disc [&>:ul]:ml-4">
                            <h2 class="max-w-xl mb-6 text-md font-bold md:text-4xl">
                                {{ $product->name }}
                            </h2>
                            <p class="inline-block mb-6 text-md font-bold text-gray-900">
                                <span
                                    class="text-md">{{ $product->formattedPrice() }}/{{ $product->measurement }}</span>
                            </p>
                            <p class="max-w-md text-gray-700 dark:text-gray-400">
                                {!! Str::markdown($product->description) !!}
                            </p>
                        </div>
                        <div class="w-32 mb-8">
                            <div class="relative flex flex-row w-full h-10 mt-6 bg-gray-200 rounded-lg">
                                <button wire:click="decreaseQuantity"
                                        class="w-20 h-full text-black rounded-l outline-none cursor-pointer">
                                    <span class="m-auto text-2xl font-semibold">-</span>
                                </button>
                                <input type="number" wire:model.live="quantity" min="1"
                                       class="flex items-center w-full font-semibold placeholder:bg-gray-200 text-center text-gray-900 outline-none focus:outline-none text-md hover:text-black"
                                       placeholder="1">
                                <button wire:click="increaseQuantity"
                                        class="w-20 h-full text-black rounded-r outline-none cursor-pointer">
                                    <span class="m-auto text-2xl font-semibold">+</span>
                                </button>
                            </div>
                        </div>
                        <div class="flex flex-wrap items-center gap-4">
                            @if ($inCart)
                                <button wire:click="removeFromCart"
                                        class="w-full p-4 bg-red-600 rounded-md lg:w-2/5 dark:text-white text-white hover:bg-red-700">
                                    <span wire:loading.remove wire:target="removeFromCart">Remove from cart</span>
                                    <span wire:loading wire:target="removeFromCart"
                                          aria-live="polite">Removing ...</span>
                                </button>
                            @else
                                <button wire:click="addToCart"
                                        class="w-full p-4 bg-green-800 rounded-md lg:w-2/5 dark:text-white text-white hover:bg-green-700">
                                    <span wire:loading.remove wire:target="addToCart">Add to cart</span>
                                    <span wire:loading wire:target="addToCart" aria-live="polite">Adding ...</span>
                                </button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="md:flex md:items-center md:justify-between py-5">
        <h2 class="text-2xl font-bold tracking-tight text-gray-900">Related Products</h2>
    </div>
    <div class="mb-4 grid gap-4 sm:grid-cols-2 md:mb-8 lg:grid-cols-3 xl:grid-cols-3 mt-5">
        @forelse($relatedProducts as $relatedProduct)
            <div class="bg-white rounded-lg shadow-lg p-4">
                <a href="{{ route('product', $relatedProduct->slug) }}">
                    @if($relatedProduct->image)
                        <img src="{{ $relatedProduct->getFirstMediaUrl('image') }}" alt="{{ $relatedProduct->name }}"
                             class="w-full h-48 object-cover rounded-lg mb-4">
                    @else
                        <img src="{{ asset('images/No-image.png') }}" alt="{{ $relatedProduct->name }}"
                             class="w-full h-48 object-cover rounded-lg mb-4">
                    @endif

                    <h3 class="text-lg py-4 font-semibold text-gray-900 mb-2 capitalize">{{ $relatedProduct->name }}</h3>

                    <p class="text-md py-2 font-bold text-gray-900">{{ $relatedProduct->formattedPrice() }}
                        / {{ $relatedProduct->measurement }}</p>
                </a>
                <button
                    wire:click="{{ $this->isInCart($relatedProduct->id) ? 'removeFromCart('.$relatedProduct->id.')' : 'addToCart('.$relatedProduct->id.')' }}"
                    class="w-full py-2 px-4 rounded-lg transition-colors duration-200 {{ $this->isInCart($relatedProduct->id)
                        ? 'bg-red-700 hover:bg-red-800'
                        : 'bg-green-700 hover:bg-green-800'
                    }} text-white"
                >
                    {{ $this->isInCart($relatedProduct->id) ? 'Remove from Cart' : 'Add to Cart' }}
                </button>
            </div>
        @empty
            <p class="text-lg">No products found</p>
        @endforelse
    </div>
</div>
