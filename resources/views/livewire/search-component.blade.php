{{-- resources/views/livewire/search-component.blade.php --}}
<div
    x-data="{ isOpen: false }"
    class="relative w-full md:w-64"
>
    <input
        type="text"
        placeholder="Search..."
        wire:model.live="search"
        @input="isOpen = $event.target.value.length > 0"
        @keydown.escape.window="isOpen = false"
        class="border-2 border-b-amber-300 text-gray-800 px-4 py-2 rounded-lg w-full focus:outline-none focus:ring-1 focus:ring-green-300"
    />

    <!-- Dropdown Menu -->
    <div
        x-show="isOpen"
        @click.away="isOpen = false"
        class="absolute text-left mt-2 w-full bg-white rounded-lg shadow-lg z-10"
        x-cloak
    >
        @if($products->count() > 0)
            <div class="py-1 px-1" role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                @foreach($products as $product)
                    <a
                        href="{{ route('product', $product->slug) }}"
                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-gray-900"
                        role="menuitem"
                        tabindex="-1"
                    >
                        <div class="flex items-center">
                            @if($product->hasMedia())
                                <img src="{{ $product->getFirstMediaUrl('thumbnail') }}" alt="{{ $product->name }}" class="w-8 h-8 object-cover rounded-sm mr-2">
                            @endif
                            <div>
                                <div class="font-medium">{{ $product->name }}</div>
                                <div class="text-xs text-gray-500">{{ $product->category->name }}</div>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        @else
            <div class="py-1" role="none">
                <div class="block px-4 py-2 text-sm text-gray-700">
                    No products found...
                </div>
            </div>
        @endif
    </div>
</div>
