<div class="py-10">
    <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
        <div class="md:flex md:items-center md:justify-between">
            <h2 class="text-2xl font-bold tracking-tight text-gray-900">Browse our Categories</h2>
        </div>
        <div class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-3 sm:gap-6 mt-8">
            <!--[if BLOCK]><![endif]--><?php $__empty_1 = true; $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <a href="/shop?selected_categories[0]=<?php echo e($category->id); ?>"
                    class="group flex flex-col bg-white shadow-sm rounded-xl hover:shadow-md transition"
                    wire:key="<?php echo e($category->id); ?>">
                    <!-- component -->
                    <!--[if BLOCK]><![endif]--><?php if($category->image): ?>
                        <img class="h-48 w-full object-cover object-center py-3 px-3"
                            src="<?php echo e($category->getFirstMediaUrl('image')); ?>" alt="<?php echo e($category->name); ?>" />
                    <?php else: ?>
                        <img class="h-48 w-full object-cover object-center py-3 px-3"
                            src="<?php echo e(asset('/images/No-image.png')); ?>" alt="<?php echo e($category->name); ?>" />
                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                    <div class="p-4">
                        <h2 class="mb-2 text-lg font-medium text-gray-900"><?php echo e($category->name); ?></h2>
                    </div>

                </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="text-center">
                    <p>No categories found</p>
                </div>
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
        </div>
    </div>
</div>
<?php /**PATH C:\Users\minis\Herd\online-shopping\resources\views/components/category-component.blade.php ENDPATH**/ ?>