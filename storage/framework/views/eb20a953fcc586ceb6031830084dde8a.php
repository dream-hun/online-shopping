<?php if($card instanceof \Honeystone\Seo\Twitter\Contracts\Card): ?>
    <meta name="twitter:card" content="<?php echo e($card->getName()); ?>">
<?php switch($card::class):
case (\Honeystone\Seo\Twitter\AppProperties::class): ?>
    <?php echo $__env->make('honeystone-seo::twitter.cards.app', compact('card'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php break; ?>
<?php case (\Honeystone\Seo\Twitter\PlayerProperties::class): ?>
    <?php echo $__env->make('honeystone-seo::twitter.cards.player', compact('card'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endswitch; ?>
<?php else: ?>
    <meta name="twitter:card" content="<?php echo e($card); ?>">
<?php endif; ?>
<?php /**PATH C:\Users\minis\Herd\online-shopping\vendor\honeystone\laravel-seo\src\/../resources/views/twitter/card.blade.php ENDPATH**/ ?>