<nav x-data="{ mobileMenuOpen: false, currencyDropdownOpen: false }" class="sticky top-0 z-50">
    <div class="hidden sm:block bg-green-800 text-white">
        <div class="container mx-auto px-4">
            <div class="flex flex-col sm:flex-row justify-between items-center py-2">
                <div class="flex flex-wrap justify-center sm:justify-start">
                    <a href="tel:<?php echo e($setting->mobile_one); ?>"
                        class="font-semibold px-2 py-1 text-md"><?php echo e(App\Helpers\Garden::formatPhoneUs($setting->mobile_one)); ?></a>
                    <a href="tel:<?php echo e($setting->mobile_two); ?>"
                        class="font-semibold px-2 py-1 text-md"><?php echo e(App\Helpers\Garden::formatPhoneUs($setting->mobile_two)); ?></a>
                    <a href="tel:<?php echo e($setting->whatsapp); ?>"
                        class="font-semibold px-2 py-1 text-md"><?php echo e(App\Helpers\Garden::formatPhoneUs($setting->whatsapp)); ?></a>
                    <a href="mailto:<?php echo e($setting->email_one); ?>"
                        class="font-semibold px-2 py-1 text-md"><?php echo e($setting->email_one); ?></a>
                    <a href="mailto:<?php echo e($setting->email_two); ?>"
                        class="font-semibold px-2 py-1 text-md"><?php echo e($setting->email_two); ?></a>
                    <a href="#" class="font-semibold px-2 py-1 text-md"><?php echo e($setting->address); ?></a>
                </div>
                <div class="mt-2 sm:mt-0 flex space-x-4">
                    <a href="<?php echo e(route('login')); ?>" class="text-md font-semibold">Sign in</a>
                    <a href="#" class="text-md font-semibold">Create an account</a>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-white text-black py-4">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center">
                <div class="shrink-0 flex items-center">
                    <a href="<?php echo e(route('landing')); ?>">
                        <img src="<?php echo e(asset('images/logo.webp')); ?>" alt="<?php echo e(config('app.name')); ?>"
                            class="block h-14 w-auto">
                    </a>
                </div>
                <div class="hidden md:flex space-x-6">
                    <a href="<?php echo e(route('landing')); ?>" wire:navigate
                        class="hover:text-green-700 hover:font-semibold">Home</a>
                    <a href="<?php echo e(route('shop')); ?>" wire:navigate
                        class="hover:text-green-700 hover:font-semibold">Shop</a>
                    <a href="<?php echo e(route('about-us')); ?>" wire:navigate
                        class="hover:text-green-700 hover:font-semibold">About us</a>
                    <a href="<?php echo e(route('notices')); ?>" wire:navigate
                        class="hover:text-green-700 hover:font-semibold">Notices</a>
                    <a href="<?php echo e(route('contact')); ?>" wire:navigate
                        class="hover:text-green-700 hover:font-semibold">Contact us</a>
                </div>
                <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('cart-counter-component', []);

$__html = app('livewire')->mount($__name, $__params, 'lw-2954781516-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
            </div>
        </div>
    </div>
    <div x-show="mobileMenuOpen" class="md:hidden bg-white border-t">
        <div class="container mx-auto px-4 py-2">
            <a href="<?php echo e(route('landing')); ?>" wire:navigate class="block py-2">Home</a>
            <a href="<?php echo e(route('shop')); ?>" wire:navigate class="block py-2">Shop</a>
            <a href="<?php echo e(route('about-us')); ?>" wire:navigate class="block py-2">About us</a>
            <a href="<?php echo e(route('contact')); ?>" wire:navigate class="block py-2">Contact us</a>

            <a href="<?php echo e(route('notices')); ?>" wire:navigate class="block py-2">Notices</a>
            <a href="/admin" class="block py-2">Sign in</a>
            <a href="#" class="block py-2">Create an account</a>
        </div>
    </div>
</nav>
<?php /**PATH /home/hunter/Codes/online-shopping/resources/views/components/header-component.blade.php ENDPATH**/ ?>