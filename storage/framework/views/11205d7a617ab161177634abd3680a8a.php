<div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow" wire:key="<?php echo e($product->id); ?>">
    <a href="/shop/products/<?php echo e($product->slug); ?>" wire:navigate>
        <!--[if BLOCK]><![endif]--><?php if($product->image): ?>
            <img class="p-8 rounded-t-lg rounded-md" src="<?php echo e($product->getFirstMediaUrl('image')); ?>"
                alt="<?php echo e($product->name); ?>" />
        <?php else: ?>
            <img class="p-8 rounded-t-lg" src="<?php echo e(asset('images/No-image.png')); ?>" alt="<?php echo e($product->name); ?>" />
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
    </a>
    <div class="px-5 pb-5 ">
        <a href="/shop/products/<?php echo e($product->slug); ?>" wire:navigate>
            <h5 class="text-xl font-semibold tracking-tight text-gray-900"><?php echo e($product->name); ?></h5>
        </a>

        <div class="flex items-center justify-between mt-4">
            <span class="text-md font-bold text-gray-900 "><small><?php echo e($product->price); ?></small> /<small>
                    <?php echo e($product->measurement); ?></small></span>
            <!--[if BLOCK]><![endif]--><?php if($added): ?>
                <a wire:click.prevent="remove" href="#"
                    class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">

                    Remove from basket

                </a>
            <?php else: ?>
                <a wire:click.prevent="addToCart" href="#"
                    class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">

                    Add to Cart

                </a>
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

        </div>
    </div>
</div>
<?php /**PATH /home/hunter/Codes/online-shopping/resources/views/livewire/front-product-component.blade.php ENDPATH**/ ?>