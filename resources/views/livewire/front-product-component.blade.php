<div class="max-w-sm rounded-lg overflow-hidden shadow-lg bg-white" wire:key="{{ $product->id }}">
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
            <span class="absolute top-4 right-4 bg-green-500 text-white px-2 py-1 rounded-full text-sm">
                {{ $product->status }}
            </span>
        @endif
    </div>

    <!-- Content section -->
    <div class="p-6">
        <h2 class="text-xl font-bold mb-2 text-gray-800 capitalize line-clamp-1">
            {{ $product->name }}
        </h2>
        <p class="text-gray-600 text-sm mb-4 line-clamp-2">
            {{ Str::limit($product->description, 100) }}
        </p>

        <!-- Price and rating row -->
        <div class="flex justify-between items-center mb-4">
            <div class="flex flex-col">
                <span class="text-xl font-bold text-gray-900">
                    {{ $product->formattedPrice() }} / {{ $product->measurement ?? '' }}
                </span>
            </div>
        </div>

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
</div>
