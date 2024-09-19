<?php if($type instanceof \Honeystone\Seo\OpenGraph\Contracts\Type): ?>
    <meta property="og:type" content="<?php echo e($type->getType()); ?>">
<?php switch($type::class):
case (\Honeystone\Seo\OpenGraph\ArticleProperties::class): ?>
    <?php echo $__env->make('honeystone-seo::open-graph.types.article', compact('type'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php break; ?>
<?php case (\Honeystone\Seo\OpenGraph\ProfileProperties::class): ?>
    <?php echo $__env->make('honeystone-seo::open-graph.types.profile', compact('type'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php break; ?>
<?php case (\Honeystone\Seo\OpenGraph\BookProperties::class): ?>
    <?php echo $__env->make('honeystone-seo::open-graph.types.book', compact('type'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php break; ?>
<?php endswitch; ?>
<?php else: ?>
    <meta property="og:type" content="<?php echo e($type); ?>">
<?php endif; ?>
<?php /**PATH /home/hunter/Codes/online-shopping/vendor/honeystone/laravel-seo/src/../resources/views/open-graph/type.blade.php ENDPATH**/ ?>