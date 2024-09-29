<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((array_merge([
    'enabled' => false,
    'site' => '',
    'card' => 'summary_large_image',
    'creator' => '',
    'creatorId' => '',
    'title' => '',
    'description' => '',
    'image' => '',
    'imageAlt' => '',
], $config)));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter((array_merge([
    'enabled' => false,
    'site' => '',
    'card' => 'summary_large_image',
    'creator' => '',
    'creatorId' => '',
    'title' => '',
    'description' => '',
    'image' => '',
    'imageAlt' => '',
], $config)), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<?php if($enabled): ?>
    <!-- Twitter Cards -->
    <?php echo $__env->make('honeystone-seo::twitter.card', compact('card'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php if($site): ?>
    <meta name="twitter:site" content="<?php echo e($site); ?>">
<?php endif; ?>
<?php if($creator): ?>
    <meta name="twitter:creator" content="<?php echo e($creator); ?>">
<?php endif; ?>
<?php if($creatorId): ?>
    <meta name="twitter:creator:id" content="<?php echo e($creatorId); ?>">
<?php endif; ?>
<?php if($title): ?>
    <meta name="twitter:title" content="<?php echo e($title); ?>">
<?php endif; ?>
<?php if($description): ?>
    <meta name="twitter:description" content="<?php echo e($description); ?>">
<?php endif; ?>
<?php if($image): ?>
    <meta name="twitter:image" content="<?php echo e($image); ?>">
<?php if($imageAlt): ?>
    <meta name="twitter:image:alt" content="<?php echo e($imageAlt); ?>">
<?php endif; ?>
<?php endif; ?>
<?php endif; ?>
<?php /**PATH /home/hunter/Codes/online-shopping/vendor/honeystone/laravel-seo/src/../resources/views/twitter.blade.php ENDPATH**/ ?>