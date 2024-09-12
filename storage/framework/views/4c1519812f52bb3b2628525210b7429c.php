<div class="w-full max-w-[85rem] py-20 px-4 sm:px-6 lg:px-8 mx-auto rounded-md">
    <section class="overflow-hidden bg-white py-11">
        <div class="max-w-6xl px-4 py-4 mx-auto lg:py-8 md:px-6">
            <div class="flex flex-wrap -mx-4">
                <div class="w-full mb-8 md:w-1/2 md:mb-0">
                    <div class="sticky top-0 z-40 overflow-hidden ">
                        <div class="relative mb-6 lg:mb-10 lg:h-2/4 ">
                            <!--[if BLOCK]><![endif]--><?php if($product->image): ?>
                                <img src="<?php echo e($product->getFirstMediaUrl('image')); ?>" alt="<?php echo e($product->name); ?>"
                                    class="object-cover w-full lg:h-full ">
                            <?php else: ?>
                                <img src="<?php echo e(asset('images/No-image.png')); ?>" alt="<?php echo e($product->name); ?>"
                                    class="object-cover w-full lg:h-full ">
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                        </div>
                    </div>
                </div>
                <div class="w-full px-4 md:w-1/2 ">
                    <div class="lg:pl-20">
                        <div class="mb-8 [&>ul]:list-disc [&>:ul]:ml-4">
                            <h2 class="max-w-xl mb-6 text-md font-bold md:text-4xl">
                                <?php echo e($product->name); ?></h2>
                            <p class="inline-block mb-6 text-4xl font-bold text-gray-900 ">
                                <span
                                    class="text-md"><?php echo e($product->formattedPrice()); ?>/<?php echo e($product->measurement); ?></span>
                            </p>
                            <p class="max-w-md text-gray-700 dark:text-gray-400">
                                <?php echo Str::markdown($product->description); ?>

                            </p>
                        </div>
                        <div class="w-32 mb-8 ">
                            <div class="relative flex flex-row w-full h-10 mt-6 bg-gray-200 rounded-lg">
                                <button wire:click='decreaseQuantity'
                                    class="w-20 h-full text-black rounded-l outline-none cursor-pointer">
                                    <span class="m-auto text-2xl font-semibold">-</span>
                                </button>
                                <input type="number" wire:model='quantity' min="0.5"
                                    class="flex items-center w-full font-semibold placeholder-bg-gray-200 text-center text-gray-900 outline-none focus:outline-none text-md hover:text-black"
                                    placeholder="1">
                                <button wire:click='increaseQuantity'
                                    class="w-20 h-full text-black rounded-l outline-none cursor-pointer">
                                    <span class="m-auto text-2xl font-semibold">+</span>
                                </button>
                            </div>
                        </div>
                        <div class="flex flex-wrap items-center gap-4">
                            <!--[if BLOCK]><![endif]--><?php if($inCart): ?>
                                <button wire:click='removeFromCart'
                                    class="w-full p-4 bg-red-600 rounded-md lg:w-2/5 dark:text-white text-white hover:bg-red-700">
                                    <span wire:loading.remove wire:target='removeFromCart'>Remove from cart</span>
                                    <span wire:loading wire:target='removeFromCart'>Removing ...</span>
                                </button>
                            <?php else: ?>
                                <button wire:click='addToCart'
                                    class="w-full p-4 bg-green-800 rounded-md lg:w-2/5 dark:text-white text-white hover:bg-green-700">
                                    <span wire:loading.remove wire:target='addToCart'>Add to cart</span>
                                    <span wire:loading wire:target='addToCart'>Adding ...</span>
                                </button>
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php /**PATH /home/hunter/Codes/online-shopping/resources/views/livewire/product-component.blade.php ENDPATH**/ ?>