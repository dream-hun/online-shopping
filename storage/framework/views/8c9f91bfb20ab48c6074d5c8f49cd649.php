<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((array_merge([
    'title' => '',
    'titleTemplate' => '',
    'description' => '',
    'keywords' => [],
    'canonicalEnabled' => false,
    'canonical' => url()->current(),
    'robots' => [],
    'custom' => [],
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
    'title' => '',
    'titleTemplate' => '',
    'description' => '',
    'keywords' => [],
    'canonicalEnabled' => false,
    'canonical' => url()->current(),
    'robots' => [],
    'custom' => [],
], $config)), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<?php if($title): ?>
    <title><?php echo e(str_replace('{title}', $title, $titleTemplate)); ?></title>
<?php endif; ?>
<?php if($description): ?>
    <meta name="description" content="<?php echo e($description); ?>">
<?php endif; ?>
<?php if(count($keywords)): ?>
    <meta name="keywords" content="<?php echo e(implode(',', $keywords)); ?>">
<?php endif; ?>
<?php if($canonicalEnabled && $canonical): ?>
    <link rel="canonical" href="<?php echo e($canonical); ?>">
<?php endif; ?>
<?php if(count($robots)): ?>
    <meta name="robots" content="<?php echo e(implode(',', $robots)); ?>">
<?php endif; ?>
<?php if(count($custom)): ?>
<?php $__currentLoopData = $custom; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php $__currentLoopData = $tag; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $name => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php echo $__env->make('honeystone-seo::meta.custom', compact('name', 'value'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
<?php /**PATH /home/hunter/Codes/online-shopping/vendor/honeystone/laravel-seo/src/../resources/views/meta.blade.php ENDPATH**/ ?>