<div class="bg-green-100 py-10">
        <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
            <div class="md:flex md:items-center md:justify-between">
                <h2 class="text-2xl font-bold tracking-tight text-gray-900">Browse our Categories</h2>
            </div>
            <div class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3 sm:gap-6 mt-8">
                @forelse ($categories as $category)
                    <a href="/shop?selected_categories[0]={{ $category->id }}" class="group flex flex-col bg-white border border-green-700 shadow-sm rounded-xl hover:shadow-md transition" href="{{ route('category.show',$category->slug) }}" wire:key="{{ $category->id }}">
                        <div class="p-4 md:p-5">
                            <div class="flex justify-between items-center">
                                <div class="flex items-center">
                                    <img class="h-[2.375rem] w-[2.375rem] rounded-full" src="https://cdn.bajajelectronics.com/product/b002c02c-c379-49f8-b2a6-bd2e56d0e23a" alt="Image Description">
                                    <div class="ms-3">
                                        <h3 class="group-hover:text-green-600 font-semibold text-gray-800">
                                          {{ $category->name }}
                                        </h3>
                                    </div>
                                </div>
                                <div class="ps-3">
                                    <svg class="flex-shrink-0 w-5 h-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="m9 18 6-6-6-6" />
                                    </svg>
                                </div>
                            </div>
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