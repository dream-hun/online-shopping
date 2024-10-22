<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php echo e(seo()->generate()); ?>


    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <!-- Styles -->
    <?php echo app('Illuminate\Foundation\Vite')('resources/css/app.css'); ?>
    <?php echo app('Illuminate\Foundation\Vite')('resources/js/app.js'); ?>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-TPQ6QBVD');
    </script>
    <!-- End Google Tag Manager -->


</head>

<body class="font-sans antialiased bg-gray-100">
    <!-- Google Tag Manager (noscript) -->
    <noscript>
        <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TPQ6QBVD" height="0" width="0"
            style="display:none;visibility:hidden"></iframe>
    </noscript>
    <!-- End Google Tag Manager (noscript) -->
    <?php if (isset($component)) { $__componentOriginal33bf5fa796fc9141895f0911416078da = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal33bf5fa796fc9141895f0911416078da = $attributes; } ?>
<?php $component = App\View\Components\HeaderComponent::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('header-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\HeaderComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal33bf5fa796fc9141895f0911416078da)): ?>
<?php $attributes = $__attributesOriginal33bf5fa796fc9141895f0911416078da; ?>
<?php unset($__attributesOriginal33bf5fa796fc9141895f0911416078da); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal33bf5fa796fc9141895f0911416078da)): ?>
<?php $component = $__componentOriginal33bf5fa796fc9141895f0911416078da; ?>
<?php unset($__componentOriginal33bf5fa796fc9141895f0911416078da); ?>
<?php endif; ?>
    <?php echo e($slot); ?>

    <?php if (isset($component)) { $__componentOriginal6883818de5ea8f0ba3c0e77f2947f6c3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6883818de5ea8f0ba3c0e77f2947f6c3 = $attributes; } ?>
<?php $component = App\View\Components\FooterComponent::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('footer-component'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\FooterComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal6883818de5ea8f0ba3c0e77f2947f6c3)): ?>
<?php $attributes = $__attributesOriginal6883818de5ea8f0ba3c0e77f2947f6c3; ?>
<?php unset($__attributesOriginal6883818de5ea8f0ba3c0e77f2947f6c3); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6883818de5ea8f0ba3c0e77f2947f6c3)): ?>
<?php $component = $__componentOriginal6883818de5ea8f0ba3c0e77f2947f6c3; ?>
<?php unset($__componentOriginal6883818de5ea8f0ba3c0e77f2947f6c3); ?>
<?php endif; ?>
    <?php if (isset($component)) { $__componentOriginal8344cca362e924d63cb0780eb5ae3ae6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8344cca362e924d63cb0780eb5ae3ae6 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'livewire-alert::components.scripts','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('livewire-alert::scripts'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8344cca362e924d63cb0780eb5ae3ae6)): ?>
<?php $attributes = $__attributesOriginal8344cca362e924d63cb0780eb5ae3ae6; ?>
<?php unset($__attributesOriginal8344cca362e924d63cb0780eb5ae3ae6); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8344cca362e924d63cb0780eb5ae3ae6)): ?>
<?php $component = $__componentOriginal8344cca362e924d63cb0780eb5ae3ae6; ?>
<?php unset($__componentOriginal8344cca362e924d63cb0780eb5ae3ae6); ?>
<?php endif; ?>
</body>

</html>
<?php /**PATH C:\Users\minis\Herd\online-shopping\resources\views/components/layouts/app.blade.php ENDPATH**/ ?>