<div class="w-full max-w-[95rem] py-10 px-4 sm:px-6 lg:px-8 mx-auto">
    <section class="py-10 bg-white rounded-lg">
        <div class="px-4 py-4 mx-auto max-w-8xl lg:py-6 md:px-6">
            <div class="flex flex-wrap mb-24 -mx-3">
                <div class="w-full pr-2 lg:w-1/4 lg:block">
                    <div class="p-4 mb-5">
                        <h2 class="text-2xl text-gray-900">Categories</h2>
                        <div class="w-16 pb-2 mb-6 border-b border-green-800"></div>
                        <ul>
                            <!--[if BLOCK]><![endif]--><?php $__empty_1 = true; $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <li class="mb-4" wire:key="<?php echo e($category->id); ?>">
                                    <label for="<?php echo e($category->slug); ?>" class="flex items-center dark:text-gray-900">
                                        <input type="checkbox" wire:model.live="selected_categories"
                                            id="<?php echo e($category->slug); ?>" value="<?php echo e($category->id); ?>" class="w-4 h-4 mr-2">
                                        <span class="text-lg"><?php echo e($category->name); ?></span>
                                    </label>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <p class="text-lg">No category found</p>
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                        </ul>
                    </div>
                </div>
                <div class="w-full px-3 lg:w-3/4">
                    <div class="px-3 mb-4">
                        <div class="items-center justify-between hidden px-3 py-2 md:flex">
                            <div class="flex items-center justify-between">
                                <label for="sort" class="text-sm text-gray-700 dark:text-gray-400 mr-6">Sort</label>
                                <select wire:model.live="sort" id="sort"
                                    class="block w-40 text-base cursor-pointer">
                                    <option value="latest">Latest Products</option>
                                    <option value="high_price">High Price to Low Price</option>
                                    <option value="low_price">Low Price to High Price</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="mb-4 grid gap-4 sm:grid-cols-2 md:mb-8 lg:grid-cols-3 xl:grid-cols-3">
                        <!--[if BLOCK]><![endif]--><?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow">
                                <a href="/shop/products/<?php echo e($product->slug); ?>" wire:navigate>
                                    <!--[if BLOCK]><![endif]--><?php if($product->getFirstMediaUrl('image')): ?>
                                        <img class="p-8 rounded-t-lg rounded-md"
                                            src="<?php echo e($product->getFirstMediaUrl('image')); ?>"
                                            alt="<?php echo e($product->name); ?>" />
                                    <?php else: ?>
                                        <img class="p-8 rounded-t-lg" src="<?php echo e(asset('images/No-image.png')); ?>"
                                            alt="<?php echo e($product->name); ?>" />
                                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                </a>
                                <div class="px-5 pb-5">
                                    <a href="/shop/products/<?php echo e($product->slug); ?>" wire:navigate>
                                        <h5 class="text-xl font-semibold tracking-tight text-gray-900">
                                            <?php echo e($product->name); ?></h5>
                                    </a>

                                    <div class="flex items-center justify-between mt-4">
                                        <span class="text-md font-bold text-gray-900">
                                            <small><?php echo e($product->price); ?></small>
                                            / <small><?php echo e($product->measurement); ?></small>
                                        </span>
                                        <!--[if BLOCK]><![endif]--><?php if($product->inCart): ?>
                                            <button wire:click="removeFromCart(<?php echo e($product->id); ?>)"
                                                class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                                                Remove from basket
                                            </button>
                                        <?php else: ?>
                                            <button wire:click="addToCart(<?php echo e($product->id); ?>)"
                                                class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                                                Add to Cart
                                            </button>
                                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <p class="text-lg">No product found</p>
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                    </div>
                </div>
            </div>
            <!-- pagination start -->
            <div class="flex justify-end mt-6">
                <?php echo e($products->links()); ?>

            </div>
            <!-- pagination end -->
        </div>
    </section>
</div>
<?php /**PATH /home/hunter/Codes/online-shopping/resources/views/livewire/shopping-component.blade.php ENDPATH**/ ?>