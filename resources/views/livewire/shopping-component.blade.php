<div class="w-full max-w-[95rem] py-10 px-4 sm:px-6 lg:px-8 mx-auto">
    <section class="py-10 bg-white rounded-lg">
        <div class="px-4 py-4 mx-auto max-w-8xl lg:py-6 md:px-6">
            <div class="flex flex-wrap mb-24 -mx-3">
                <div class="w-full pr-2 lg:w-1/4 lg:block">
                    <div class="p-4 mb-5">
                        <h2 class="text-2xl text-gray-900">Categories</h2>
                        <div class="w-16 pb-2 mb-6 border-b border-green-800"></div>
                        <ul>
                            @forelse($categories as $category)
                                <li class="mb-4" wire:key="{{ $category->id }}">
                                    <label for="{{ $category->slug }}" class="flex items-center dark:text-gray-900">
                                        <input type="checkbox" wire:model.live="selected_categories"
                                            id="{{ $category->slug }}" value="{{ $category->id }}" class="w-4 h-4 mr-2">
                                        <span class="text-lg">{{ $category->name }}</span>
                                    </label>
                                </li>
                            @empty
                                <p class="text-lg">No category found</p>
                            @endforelse
                        </ul>
                    </div>
                </div>
                <div class="w-full px-3 lg:w-3/4">
                    <div class="px-3 mb-4">
                        <div class="items-center justify-between hidden px-3 py-2 md:flex">
                            <div class="flex items-center justify-between">
                                <label for="sort" class="text-sm text-gray-700 dark:text-gray-400 mr-6">Sort</label>
                                <select wire:model.live="sort" id="sort"
                                    class="block w-40 text-base cursor-pointer">
                                    <option value="latest">Latest Products</option>
                                    <option value="high_price">High Price to Low Price</option>
                                    <option value="low_price">Low Price to High Price</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="mb-4 grid gap-4 sm:grid-cols-2 md:mb-8 lg:grid-cols-3 xl:grid-cols-3">
                        @forelse($products as $product)
                            <div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow">
                                <a href="/shop/products/{{ $product->slug }}" wire:navigate>
                                    @if ($product->getFirstMediaUrl('image'))
                                        <img class="p-8 rounded-t-lg rounded-md"
                                            src="{{ $product->getFirstMediaUrl('image') }}"
                                            alt="{{ $product->name }}" />
                                    @else
                                        <img class="p-8 rounded-t-lg" src="{{ asset('images/No-image.png') }}"
                                            alt="{{ $product->name }}" />
                                    @endif
                                </a>
                                <div class="px-5 pb-5">
                                    <a href="/shop/products/{{ $product->slug }}" wire:navigate>
                                        <h5 class="text-xl font-semibold tracking-tight text-gray-900">
                                            {{ $product->name }}</h5>
                                    </a>

                                    <div class="flex items-center justify-between mt-4">
                                        <span class="text-md font-bold text-gray-900">
                                            <small>{{ $product->price }}</small>
                                            / <small>{{ $product->measurement }}</small>
                                        </span>
                                        @if ($product->inCart)
                                            <button wire:click="removeFromCart({{ $product->id }})"
                                                class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                                                Remove from basket
                                            </button>
                                        @else
                                            <button wire:click="addToCart({{ $product->id }})"
                                                class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                                                Add to Cart
                                            </button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="flex w-full items-center p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                                role="alert">
                                <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                                </svg>
                                <span class="sr-only">Info</span>
                                <div>
                                    <span class="font-medium">Ooops!</span>No products available here
                                </div>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
            <!-- pagination start -->
            <div class="flex justify-end mt-6">
                {{ $products->links() }}
            </div>
            <!-- pagination end -->
        </div>
    </section>
</div>
