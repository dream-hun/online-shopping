<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((array_merge([
    'enabled' => false,
    'generated' => '',
    'nonce' => '',
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
    'generated' => '',
    'nonce' => '',
], $config)), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars); ?>

<?php if($enabled): ?>
    <!-- JSON-LD -->
    <script type="application/ld+json"<?php if($nonce): ?> nonce="<?php echo e($nonce); ?>"<?php endif; ?>>
        <?php echo $generated; ?>

    </script>
<?php endif; ?>

<?php /**PATH /home/hunter/Codes/online-shopping/vendor/honeystone/laravel-seo/src/../resources/views/json-ld.blade.php ENDPATH**/ ?>