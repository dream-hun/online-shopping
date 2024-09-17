<div class="py-10">
    <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
        <div class="md:flex md:items-center md:justify-between">
            <h2 class="text-2xl font-bold tracking-tight text-gray-900">Browse our Categories</h2>
        </div>
        <div class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-3 sm:gap-6 mt-8">
            @forelse ($categories as $category)
                <a href="/shop?selected_categories[0]={{ $category->id }}"
                    class="group flex flex-col bg-white shadow-sm rounded-xl hover:shadow-md transition"
                    wire:key="{{ $category->id }}">
                    <!-- component -->
                    @if ($category->image)
                        <img class="h-48 w-full object-cover object-center py-3 px-3"
                            src="{{ $category->getFirstMediaUrl('image') }}" alt="{{ $category->name }}" />
                    @else
                        <img class="h-48 w-full object-cover object-center py-3 px-3"
                            src="{{ asset('/images/No-image.png') }}" alt="{{ $category->name }}" />
                    @endif
                    <div class="p-4">
                        <h2 class="mb-2 text-lg font-medium text-gray-900">{{ $category->name }}</h2>
                    </div>

                </a>
            @empty
                <div class="text-center">
                    <p>No categories found</p>
                </div>
            @endforelse
        </div>
    </div>
</div>
