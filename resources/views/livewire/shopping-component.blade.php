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
                                <li class="mb-4"
                                    wire:key="{{ $category->id }}"
                                    x-data="{ checked: false,count: {{ $category->products->count() }}, // Replace with actual count hover: false,animate: false}"
                                    x-init="checked = $wire.selected_categories.includes('{{ $category->id }}')">

                                    <label for="{{ $category->slug }}" @mouseenter="hover = true" @mouseleave="hover = false" :class="{ 'bg-gray-50': hover }" class="group relative flex items-center p-2 cursor-pointer rounded-lg transition-all duration-200">

                                        <div class="relative"
                                             @click="animate = true; setTimeout(() => animate = false, 500)">
                                            <input type="checkbox"
                                                   wire:model.live="selected_categories"
                                                   id="{{ $category->slug }}"
                                                   value="{{ $category->id }}"
                                                   x-model="checked"
                                                   class="peer appearance-none w-5 h-5 border-2 border-gray-300 rounded-md cursor-pointer  checked:border-blue-500 checked:bg-blue-500
                                                      transition-all duration-200
                                                      focus:ring-2 focus:ring-blue-500 focus:ring-offset-2
                                                      dark:border-gray-600 dark:checked:border-blue-400 dark:checked:bg-blue-400">
                                                    <!-- Checkmark Icon with Animation -->
                                            <svg class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-3 h-3 pointer-events-none text-white transition-all duration-200"
                                                 :class="{
                     'opacity-0 scale-50': !checked,
                     'opacity-100 scale-100': checked,
                     'animate-bounce': animate
                 }"
                                                 fill="none"
                                                 stroke="currentColor"
                                                 stroke="currentColor"
                                                 viewBox="0 0 24 24">
                                                <path stroke-linecap="round"
                                                      stroke-linejoin="round"
                                                      stroke-width="3"
                                                      d="M5 13l4 4L19 7">
                                                </path>
                                            </svg>
                                        </div>

                                        <!-- Category Name with Hover Effect -->
                                        <span class="ml-3 text-base font-medium transition-all duration-200"
                                              :class="{
                  'text-gray-700': !hover,
                  'text-gray-900 translate-x-1': hover
              }">
            {{ $category->name }}
        </span>

                                        <!-- Count Badge with Animation -->
                                        <span class="ml-auto px-2 py-1 text-sm rounded-full transition-all duration-200"
                                              :class="{
                  'bg-gray-100 text-gray-600': !hover,
                  'bg-blue-100 text-blue-600': hover
              }">
            <span x-text="count"></span>
        </span>

                                        <!-- Optional: Ripple Effect -->
                                        <div x-show="animate"
                                             x-transition:enter="transition ease-out duration-300"
                                             x-transition:enter-start="opacity-0 scale-0"
                                             x-transition:enter-end="opacity-100 scale-100"
                                             x-transition:leave="transition ease-in duration-300"
                                             x-transition:leave-start="opacity-100 scale-100"
                                             x-transition:leave-end="opacity-0 scale-0"
                                             class="absolute inset-0 bg-blue-50 rounded-lg"
                                             style="z-index: -1">
                                        </div>
                                    </label>
                                </li>

                                <style>
                                    @keyframes checkmark {
                                        0% {
                                            transform: scale(0.8) translate(-50%, -50%);
                                        }
                                        50% {
                                            transform: scale(1.2) translate(-50%, -50%);
                                        }
                                        100% {
                                            transform: scale(1) translate(-50%, -50%);
                                        }
                                    }

                                    .animate-checkmark {
                                        animation: checkmark 0.3s ease-out forwards;
                                    }

                                    /* Optional: Custom checkbox focus style */
                                    input[type="checkbox"]:focus {
                                        outline: none;
                                    }

                                    /* Optional: Disable default checkbox styles in some browsers */
                                    input[type="checkbox"]::-ms-check {
                                        display: none;
                                    }
                                </style>


                            @empty
                                <p class="text-lg">No category found</p>
                            @endforelse
                        </ul>
                    </div>
                </div>
                <div class="w-full px-3 lg:w-3/4">
                    <div class="px-3 mb-4">
                        <div class="items-center justify-between hidden px-3 py-2 md:flex">
                            <div x-data="{ open: false, selected: 'Latest Products' }" class="relative">
                                <label class="text-sm text-gray-700 dark:text-gray-400 mr-6">Sort</label>

                                <!-- Custom Dropdown Button -->
                                <button @click="open = !open"
                                        @click.away="open = false"
                                        class="flex items-center justify-between w-64 px-4 py-2 bg-white border border-gray-300 rounded-lg shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                    <span x-text="selected" class="text-gray-700"></span>
                                    <svg :class="{'transform rotate-180': open}"
                                         class="w-5 h-5 text-gray-500 transition-transform duration-200"
                                         fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M19 9l-7 7-7-7"/>
                                    </svg>
                                </button>

                                <!-- Dropdown Menu -->
                                <div x-show="open"
                                     x-transition:enter="transition ease-out duration-100"
                                     x-transition:enter-start="transform opacity-0 scale-95"
                                     x-transition:enter-end="transform opacity-100 scale-100"
                                     x-transition:leave="transition ease-in duration-75"
                                     x-transition:leave-start="transform opacity-100 scale-100"
                                     x-transition:leave-end="transform opacity-0 scale-95"
                                     class="absolute right-0 w-64 mt-2 origin-top-right bg-white border border-gray-200 divide-y divide-gray-100 rounded-lg shadow-lg outline-none z-50">
                                    <div class="py-1">
                                        <a href="#" @click.prevent="selected = 'Latest Products'; open = false"
                                           wire:click="$set('sort', 'latest')"
                                           class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900">
                                            Latest Products
                                        </a>
                                        <a href="#" @click.prevent="selected = 'High Price to Low Price'; open = false"
                                           wire:click="$set('sort', 'high_price')"
                                           class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900">
                                            High Price to Low Price
                                        </a>
                                        <a href="#" @click.prevent="selected = 'Low Price to High Price'; open = false"
                                           wire:click="$set('sort', 'low_price')"
                                           class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900">
                                            Low Price to High Price
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-4 grid gap-4 sm:grid-cols-2 md:mb-8 lg:grid-cols-3 xl:grid-cols-3">
                        @forelse($products as $product)
                            <div class="max-w-sm rounded-lg overflow-hidden shadow-lg bg-white"
                                 wire:key="{{ $product->id }}">
                                <!-- Image section -->
                                <div class="h-56 overflow-hidden relative">
                                    <a href="/shop/products/{{ $product->slug }}" wire:navigate>
                                        @if ($product->image)
                                            <img
                                                class="w-full h-full object-cover px-3"
                                                src="{{ $product->getFirstMediaUrl('image') }}"
                                                alt="{{ $product->name }}"
                                                loading="lazy"
                                            />
                                        @else
                                            <img
                                                class="w-full h-full object-contain p-8"
                                                src="{{ asset('images/No-image.png') }}"
                                                alt="{{ $product->name }}"
                                                loading="lazy"
                                            />
                                        @endif
                                    </a>
                                    @if($product->status)
                                        <span
                                            class="absolute top-4 right-4 bg-red-700 text-white px-2 py-1 rounded-md text-sm capitalize">
                {{ $product->status }}
            </span>
                                    @endif
                                </div>

                                <!-- Content section -->
                                <div class="p-6">
                                    <h2 class="text-xl font-bold mb-2 text-gray-800 capitalize line-clamp-1">
                                        {{ $product->name }}
                                    </h2>


                                    <!-- Price and rating row -->
                                    <div class="flex justify-between items-center mb-4">
                                        <div class="flex flex-col">
                <span class="text-md font-semibold text-gray-900">
                    {{ $product->formattedPrice() }} / {{ $product->measurement ?? '' }}
                </span>
                                        </div>
                                    </div>

                                    <!-- Action button -->
                                    <button
                                        wire:click="{{ $product->inCart ? 'removeFromCart('.$product->id.')' : 'addToCart('.$product->id.')' }}"
                                        class="w-full py-2.5 px-4 rounded-lg transition-all duration-200 font-medium text-sm text-white focus:outline-none focus:ring-4 {{
        $product->inCart
            ? 'bg-red-600 hover:bg-red-700 focus:ring-red-300 dark:bg-red-700 dark:hover:bg-red-800 dark:focus:ring-red-800'
            : 'bg-green-600 hover:bg-green-700 focus:ring-green-300 dark:bg-green-700 dark:hover:bg-green-800 dark:focus:ring-green-800'
    }}"
                                    >
                                        {{ $product->inCart ? 'Remove from Basket' : 'Add to Cart' }}
                                    </button>
                                </div>
                            </div>
                        @empty
                            <div class="flex w-full items-center p-4 mb-4 text-sm text-red-800 rounded-lg You have no products in the shopping
                                    cart. bg-red-50 dark:bg-gray-800 dark:text-red-400"
                                 role="alert">
                                <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true"
                                     xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                                </svg>
                                <span class="sr-only">Info</span>
                                <div>
                                    <span class="font-medium">Oops!</span>No products available here
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
