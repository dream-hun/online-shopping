<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-12">
            <?php if (isset($component)) { $__componentOriginal0f671a99c9e4dcd8ab71fafb3ef48bf8 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal0f671a99c9e4dcd8ab71fafb3ef48bf8 = $attributes; } ?>
<?php $component = App\View\Components\RecentOrdersComponent::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('recent-orders-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\RecentOrdersComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal0f671a99c9e4dcd8ab71fafb3ef48bf8)): ?>
<?php $attributes = $__attributesOriginal0f671a99c9e4dcd8ab71fafb3ef48bf8; ?>
<?php unset($__attributesOriginal0f671a99c9e4dcd8ab71fafb3ef48bf8); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0f671a99c9e4dcd8ab71fafb3ef48bf8)): ?>
<?php $component = $__componentOriginal0f671a99c9e4dcd8ab71fafb3ef48bf8; ?>
<?php unset($__componentOriginal0f671a99c9e4dcd8ab71fafb3ef48bf8); ?>
<?php endif; ?>
            <?php if (isset($component)) { $__componentOriginalcf02f6145ba37ab0d6a43ee7f0047a5d = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalcf02f6145ba37ab0d6a43ee7f0047a5d = $attributes; } ?>
<?php $component = App\View\Components\TopSellingProducts::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('top-selling-products'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\TopSellingProducts::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalcf02f6145ba37ab0d6a43ee7f0047a5d)): ?>
<?php $attributes = $__attributesOriginalcf02f6145ba37ab0d6a43ee7f0047a5d; ?>
<?php unset($__attributesOriginalcf02f6145ba37ab0d6a43ee7f0047a5d); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalcf02f6145ba37ab0d6a43ee7f0047a5d)): ?>
<?php $component = $__componentOriginalcf02f6145ba37ab0d6a43ee7f0047a5d; ?>
<?php unset($__componentOriginalcf02f6145ba37ab0d6a43ee7f0047a5d); ?>
<?php endif; ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\minis\Herd\online-shopping\resources\views/admin/home.blade.php ENDPATH**/ ?>