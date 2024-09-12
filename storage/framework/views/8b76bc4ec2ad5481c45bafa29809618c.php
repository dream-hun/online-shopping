<footer aria-labelledby="footer-heading" class="bg-gray-900">
    <h2 id="footer-heading" class="sr-only">Footer</h2>
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="py-20 xl:grid xl:grid-cols-3 xl:gap-8">
            <div class="grid grid-cols-2 gap-8 xl:col-span-2">
                <div class="space-y-12 md:grid md:grid-cols-2 md:gap-8 md:space-y-0">
                    <div>
                        <h3 class="text-sm font-medium text-white">Shop</h3>
                        <ul role="list" class="mt-6 space-y-6">
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="text-sm">
                                    <a href="/shop?selected_categories[0]=<?php echo e($category->id); ?>" wire:navigate
                                       class="text-gray-300 hover:text-white"><?php echo e($category->name); ?></a>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                    <div>
                        <h3 class="text-sm font-medium text-white">Company</h3>
                        <ul role="list" class="mt-6 space-y-6">
                            <li class="text-sm">
                                <a href="#" class="text-gray-300 hover:text-white">Who we are</a>
                            </li>
                            <li class="text-sm">
                                <a href="#" class="text-gray-300 hover:text-white">Sustainability</a>
                            </li>
                            <li class="text-sm">
                                <a href="#" class="text-gray-300 hover:text-white">Press</a>
                            </li>
                            <li class="text-sm">
                                <a href="#" class="text-gray-300 hover:text-white">Careers</a>
                            </li>
                            <li class="text-sm">
                                <a href="#" class="text-gray-300 hover:text-white">Terms &amp; Conditions</a>
                            </li>
                            <li class="text-sm">
                                <a href="#" class="text-gray-300 hover:text-white">Privacy</a>
                            </li>

                        </ul>
                    </div>
                </div>
                <div class="space-y-12 md:grid md:grid-cols-2 md:gap-8 md:space-y-0">
                    <div>
                        <h3 class="text-sm font-medium text-white">Account</h3>
                        <ul role="list" class="mt-6 space-y-6">
                            <li class="text-sm">
                                <a href="#" class="text-gray-300 hover:text-white">Manage Account</a>
                            </li>
                            <li class="text-sm">
                                <a href="#" class="text-gray-300 hover:text-white">Returns &amp; Exchanges</a>
                            </li>
                            <li class="text-sm">
                                <a href="#" class="text-gray-300 hover:text-white">Redeem a Gift Card</a>
                            </li>

                        </ul>
                    </div>
                    <div>
                        <h3 class="text-sm font-medium text-white">Connect</h3>
                        <ul role="list" class="mt-6 space-y-6">
                            <li class="text-sm">
                                <a href="#" class="text-gray-300 hover:text-white">Contact Us</a>
                            </li>
                            <li class="text-sm">
                                <a href="#" class="text-gray-300 hover:text-white">Facebook</a>
                            </li>
                            <li class="text-sm">
                                <a href="#" class="text-gray-300 hover:text-white">Instagram</a>
                            </li>
                            <li class="text-sm">
                                <a href="#" class="text-gray-300 hover:text-white">Pinterest</a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
            <div class="mt-12 md:mt-16 xl:mt-0">
                <h3 class="text-sm font-medium text-white">Sign up for our newsletter</h3>
                <p class="mt-6 text-sm text-gray-300">The latest deals and savings, sent to your inbox weekly.</p>
                <form class="mt-2 flex sm:max-w-md" action="<?php echo e(route('subscribe')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <label for="email-address" class="sr-only">Email address</label>
                    <input id="email-address" type="text" autocomplete="email" required=""
                           class="w-full min-w-0 appearance-none rounded-md border border-white bg-white px-4 py-2 text-base text-gray-900 placeholder-gray-500 shadow-sm focus:border-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-900">
                    <div class="ml-4 flex-shrink-0">
                        <button type="submit"
                                class="flex w-full items-center justify-center rounded-md border border-transparent bg-green-600 px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 focus:ring-offset-gray-900">
                            Sign up
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div class="border-t border-gray-800 py-10">
            <p class="text-sm text-gray-400">Copyright © <?php echo e(date('Y')); ?> <?php echo e(config('app.name')); ?>.</p>
        </div>
    </div>
</footer>
<?php /**PATH /home/hunter/Codes/online-shopping/resources/views/components/footer-component.blade.php ENDPATH**/ ?>