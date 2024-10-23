<div class="top-1">
    <div class="bg-white">
        <div class="relative bg-gray-900">
            <!-- Decorative image and overlay -->
            <div aria-hidden="true" class="absolute inset-0 overflow-hidden">
                <img src="<?php echo e(asset('images/garden-of-eden-produce.webp')); ?>" alt="<?php echo e(config('app.name')); ?>"
                    class="h-full w-full object-cover object-center">
            </div>
            <div aria-hidden="true" class="absolute inset-0 bg-gray-900 opacity-60"></div>

            <div class="relative mx-auto flex max-w-3xl flex-col items-center px-6 py-32 text-center sm:py-64 lg:px-0">
                <h1 class="text-4xl font-bold tracking-tight text-white lg:text-6xl">Garden of Eden Produce</h1>
                <p class="mt-4 text-xl text-white">Garden of Eden Produce provides Organic Rwandan fruit and vegetables
                    at
                    affordable prices. With more than 40 years of organic farming experience,we specialize in
                    high
                    quality,great tasting produce.</p>
                <a href="<?php echo e(route('shop')); ?>" wire:navigate
                    class="mt-8 inline-block rounded-md border border-transparent bg-white px-8 py-3 text-base font-medium text-gray-900">Shop
                    Now</a>
            </div>
        </div>
    </div>
    <?php if (isset($component)) { $__componentOriginal2414956cc086bbb60fea3090840cf254 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal2414956cc086bbb60fea3090840cf254 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.category-component','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('category-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal2414956cc086bbb60fea3090840cf254)): ?>
<?php $attributes = $__attributesOriginal2414956cc086bbb60fea3090840cf254; ?>
<?php unset($__attributesOriginal2414956cc086bbb60fea3090840cf254); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2414956cc086bbb60fea3090840cf254)): ?>
<?php $component = $__componentOriginal2414956cc086bbb60fea3090840cf254; ?>
<?php unset($__componentOriginal2414956cc086bbb60fea3090840cf254); ?>
<?php endif; ?>
    <div class="bg-white">
        <div class="mx-auto max-w-[1200px] px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
            <div class="md:flex md:items-center md:justify-between">
                <h2 class="text-2xl font-bold tracking-tight text-gray-900">Latest products</h2>
                <a href="<?php echo e(route('shop')); ?>" wire:navigate
                    class="hidden text-sm font-medium text-green-600 hover:text-green-500 md:block">
                    Shop all products
                    <span aria-hidden="true"> →</span>
                </a>
            </div>
            <div class="mb-4 grid gap-4 sm:grid-cols-2 md:mb-8 lg:grid-cols-3 xl:grid-cols-3 mt-5">
                <!--[if BLOCK]><![endif]--><?php $__empty_1 = true; $__currentLoopData = \App\Models\Product::with('category')->limit(6)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('front-product-component', ['product' => $item]);

$__html = app('livewire')->mount($__name, $__params, 'lw-1094428134-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <p class="text-lg"> No product found</p>
                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\Users\minis\Herd\online-shopping\resources\views/livewire/welcome-component.blade.php ENDPATH**/ ?>