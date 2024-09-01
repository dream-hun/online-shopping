<div class="max-w-xs mx-auto grid gap-6 lg:grid-cols-3 items-start lg:max-w-none mt-6">

    @foreach ($products as $product)
        <livewire:card-product-component :product="$product" :label="$product->category->name" />
    @endforeach
</div>
