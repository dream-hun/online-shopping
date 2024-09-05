<div class="w-full max-w-[95rem] py-10 px-4 sm:px-6 lg:px-8 mx-auto">
    <section class="py-10 bg-white rounded-lg">
        <div class="px-4 py-4 mx-auto max-w-8xl lg:py-6 md:px-6">
            <div class="flex flex-wrap mb-24 -mx-3">
                <div class="w-full pr-2 lg:w-1/4 lg:block">
                    <div class="p-4 mb-5">
                        <h2 class="text-2xl text-gray-900"> Categories</h2>
                        <div class="w-16 pb-2 mb-6 border-b border-green-800"></div>
                        <ul>
                            @forelse($categories as $category)
                                <li class="mb-4" wire:key="{{ $category->id }}">
                                    <label for="{{ $category->slug }}" class="flex items-center dark:text-gray-900 ">
                                        <input type="checkbox" wire:model.live="selected_categories" id="{{ $category->slug }}" value="{{ $category->id }}" class="w-4 h-4 mr-2">
                                        <span class="text-lg">{{ $category->name }}</span>
                                    </label>
                                </li>
                            @empty
                                <p class="text-lg"> No category found</p>
                            @endforelse
                        </ul>
                    </div>
                </div>
                <div class="w-full px-3 lg:w-3/4">
                    <div class="px-3 mb-4">
                        <div class="items-center justify-between hidden px-3 py-2 md:flex">
                            <div class="flex items-center justify-between">
                                <label for="search" class="text-sm text-gray-700 dark:text-gray-400 mr-6">Sort</label>
                                <select wire:model.live="sort" class="block w-40 text-base cursor-pointer">
                                    <option value="latest">Latest Products</option>
                                    <option value="high_price">High Price to Low Price</option>
                                    <option value="low_price">Low Price to High Price</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="mb-4 grid gap-4 sm:grid-cols-2 md:mb-8 lg:grid-cols-3 xl:grid-cols-3">
                        @forelse($products as $product)
                            <div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow" wire:key="{{ $product->id }}">
                                <a href="/shop/products/{{ $product->slug }}">
                                    @if($product->image)
                                        <img class="p-8 rounded-t-lg rounded-md" src="{{ $product->getFirstMediaUrl('image') }}" alt="{{ $product->name }}" />
                                    @else
                                        <img class="p-8 rounded-t-lg" src="{{ asset('images/No-image.png') }}" alt="{{ $product->name }}" />
                                    @endif
                                </a>
                                <div class="px-5 pb-5 ">
                                    <a href="/shop/products/{{ $product->slug }}">
                                        <h5 class="text-xl font-semibold tracking-tight text-gray-900">{{ $product->name }}</h5>
                                    </a>
                                    
                                    <div class="flex items-center justify-between mt-4">
                                        <span class="text-md font-bold text-gray-900 "><small>{{ $product->formattedPrice() }}</small> /<small> {{ $product->measurement }}</small></span>
                                        <a wire:click.prevent='addToCart({{ $product->id }})' href="#" class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                                            
                                            <span wire:loading.remove wire:target='addToCart({{ $product->id }})'>Add to Cart</span>
                                            <span wire:loading wire:target='addToCart({{ $product->id }})'>Adding ....</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <p class="text-lg"> No product found</p>
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