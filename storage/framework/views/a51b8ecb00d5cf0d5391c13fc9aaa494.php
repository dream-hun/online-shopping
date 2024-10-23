<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((array_merge([
    'enabled' => false,
    'site' => '',
    'type' => '',
    'title' => '',
    'description' => '',
    'images' => [],
    'audio' => [],
    'videos' => [],
    'determiner' => '',
    'url' => url()->current(),
    'locale' => '',
    'alternateLocales' => [],
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
    'enabled' => false,
    'site' => '',
    'type' => '',
    'title' => '',
    'description' => '',
    'images' => [],
    'audio' => [],
    'videos' => [],
    'determiner' => '',
    'url' => url()->current(),
    'locale' => '',
    'alternateLocales' => [],
    'custom' => [],
], $config)), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<?php if($enabled): ?>
    <!-- Open Graph -->
<?php if($site): ?>
    <meta property="og:site_name" content="<?php echo e($site); ?>">
<?php endif; ?>
<?php if($type): ?>
    <?php echo $__env->make('honeystone-seo::open-graph.type', compact('type'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>
<?php if($title): ?>
    <meta property="og:title" content="<?php echo e($title); ?>">
<?php endif; ?>
<?php if($description): ?>
    <meta property="og:description" content="<?php echo e($description); ?>">
<?php endif; ?>
<?php if(count($images)): ?>
<?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php echo $__env->make('honeystone-seo::open-graph.image', compact('image'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
<?php if($url): ?>
    <meta property="og:url" content="<?php echo e($url); ?>">
<?php endif; ?>
<?php if(count($audio)): ?>
<?php $__currentLoopData = $audio; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $each): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php echo $__env->make('honeystone-seo::open-graph.audio', ['audio' => $each], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
<?php if(count($videos)): ?>
<?php $__currentLoopData = $videos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $video): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php echo $__env->make('honeystone-seo::open-graph.video', compact('video'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
<?php if($determiner): ?>
    <meta property="og:determiner" content="<?php echo e($determiner); ?>">
<?php endif; ?>
<?php if($locale): ?>
    <meta property="og:locale" content="<?php echo e($locale); ?>">
<?php endif; ?>
<?php if(count($alternateLocales)): ?>
<?php $__currentLoopData = $alternateLocales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $locale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <meta property="og:locale:alternate" content="<?php echo e($locale); ?>">
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
<?php endif; ?>
<?php if(count($custom)): ?>
<?php $__currentLoopData = $custom; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php $__currentLoopData = $tag; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $name => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php echo $__env->make('honeystone-seo::open-graph.custom', compact('name', 'value'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
<?php /**PATH C:\Users\minis\Herd\online-shopping\vendor\honeystone\laravel-seo\src\/../resources/views/open-graph.blade.php ENDPATH**/ ?>