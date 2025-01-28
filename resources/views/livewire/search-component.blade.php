{{-- resources/views/livewire/search-component.blade.php --}}
<div
    x-data="{ isOpen: false }"
    class="relative w-full md:w-64"
>
    <div class="relative">
        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
            <svg class="w-4 h-4 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
        </div>
        <input
            type="text"
            placeholder="Search..."
            wire:model.live="search"
            @input="isOpen = $event.target.value.length > 0"
            @keydown.escape.window="isOpen = false"
            class="border-2 border-b-amber-300 text-gray-800 pl-10 pr-4 py-2 rounded-lg w-full focus:outline-none focus:ring-1 focus:ring-green-300"
        />
    </div>

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
