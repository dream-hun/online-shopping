<?php
    $map = [
        'og:image' => 'url',
        'og:image:alt' => 'alt',
        'og:image:width' => 'width',
        'og:image:height' => 'height',
        'og:image:secure_url' => 'secureUrl',
        'og:image:type' => 'type',
    ];
?>

<?php if($image instanceof \Honeystone\Seo\OpenGraph\ImageProperties): ?>
<?php $__currentLoopData = $map; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $name => $property): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php if($image->$property): ?>
    <meta property="<?php echo e($name); ?>" content="<?php echo e($image->$property); ?>">
<?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php else: ?>
    <meta property="og:image" content="<?php echo e($image); ?>">
<?php endif; ?>
<?php /**PATH /home/hunter/Codes/online-shopping/vendor/honeystone/laravel-seo/src/../resources/views/open-graph/image.blade.php ENDPATH**/ ?>