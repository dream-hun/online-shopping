<div class="mx-auto max-w-7xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
    <div class="md:flex md:items-center md:justify-between py-5">
        <h2 class="text-2xl font-bold tracking-tight text-gray-900">Related Products</h2>

    </div>
    <div class="mb-4 grid gap-4 sm:grid-cols-2 md:mb-8 lg:grid-cols-3 xl:grid-cols-3 mt-5">
        @forelse($relatedProducts as $item)
            <livewire:front-product-component :product="$item"/>
        @empty
            <p class="text-lg"> No product found</p>
        @endforelse
    </div>
</div>
