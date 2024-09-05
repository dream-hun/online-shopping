<div class="w-full max-w-[85rem] py-20 px-4 sm:px-6 lg:px-8 mx-auto rounded-md">
  <section class="overflow-hidden bg-white py-11">
    <div class="max-w-6xl px-4 py-4 mx-auto lg:py-8 md:px-6">
      <div class="flex flex-wrap -mx-4">
        <div class="w-full mb-8 md:w-1/2 md:mb-0">
          <div class="sticky top-0 z-40 overflow-hidden ">
            <div class="relative mb-6 lg:mb-10 lg:h-2/4 ">
              @if($product->image)
              <img src="{{ $product->getFirstMediaUrl('image') }}" alt="{{ $product->name }}" class="object-cover w-full lg:h-full ">
              @else
              <img src="{{ asset('images/No-image.png') }}" alt="{{ $product->name }}" class="object-cover w-full lg:h-full ">
              @endif
            </div>
          </div>
        </div>
        <div class="w-full px-4 md:w-1/2 ">
          <div class="lg:pl-20">
            <div class="mb-8 [&>ul]:list-disc [&>:ul]:ml-4">
              <h2 class="max-w-xl mb-6 text-md font-bold md:text-4xl">
                {{ $product->name }}</h2>
              <p class="inline-block mb-6 text-4xl font-bold text-gray-900 ">
                <span class="text-md">{{ $product->formattedPrice() }}/{{ $product->measurement }}</span>
                
              </p>
              <p class="max-w-md text-gray-700 dark:text-gray-400">
               {!! Str::markdown($product->description) !!}
              </p>
            </div>
            <div class="w-32 mb-8 ">
            
              <div class="relative flex flex-row w-full h-10 mt-6 bg-gray-200 rounded-lg">
                <button wire:click='decreaseQuantity' class="w-20 h-full text-black rounded-l outline-none cursor-pointer">
                  <span class="m-auto text-2xl font-semibold">-</span>
                </button>
                <input type="number" wire:model='quantity' min="0.5" class="flex items-center w-full font-semibold placeholder-bg-gray-200 text-center text-gray-900 outline-none  focus:outline-none text-md hover:text-black" placeholder="1">
                <button wire:click='increaseQuantity' class="w-20 h-full text-black rounded-l outline-none cursor-pointer">
                  <span class="m-auto text-2xl font-semibold">+</span>
                </button>
              </div>
            </div>
            <div class="flex flex-wrap items-center gap-4">
              <button wire:click='addToCart({{ $product->id }})' class="w-full p-4 bg-green-800 rounded-md lg:w-2/5 dark:text-white text-gwhite hover:bg-green-700">
                <span wire:loading.remove wire:target='addToCart({{ $product->id }})'>Add to cart</span><span wire:loading wire:target='addToCart({{ $product->id }})'>Adding ...</span></button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>