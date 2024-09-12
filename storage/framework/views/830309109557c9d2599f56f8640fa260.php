<div class="w-full max-w-[85rem] py-10 px-4 sm:px-6 lg:px-8 mx-auto">
    <h1 class="text-2xl font-bold text-gray-800 mb-4">
        Checkout
    </h1>
    <form wire:submit.prevent='placeOrder'>
        <div class="grid grid-cols-12 gap-4">
            <div class="md:col-span-12 lg:col-span-8 col-span-12">

                <!-- Card -->
                <div class="bg-white rounded-xl shadow p-4 sm:p-7">
                    <!-- Shipping Address -->
                    <div class="mb-6">
                        <h2 class="text-xl font-bold text-gray-900 py-8">
                            Shipping Address
                        </h2>
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-gray-900 mb-1" for="name">
                                    Names
                                </label>
                                <input wire:model='form.client_name' wire:model.blur="form.client_name"
                                    class="w-full rounded-lg border  py-2 px-3" placeholder="Ex: John Doe"
                                    id="names" type="text">
                                </input>
                                <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['form.client_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="text-red-500"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                            </div>
                            <div>
                                <label class="block text-gray-900 mb-1" for="email">
                                    Email
                                </label>
                                <input wire:model='form.email' wire:model.blur="form.email"
                                    class="w-full rounded-lg border py-2 px-3" id="phone" type="email"
                                    placeholder="Ex: mail@yahoo.com">
                                </input>
                                <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['form.email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="text-red-500"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-gray-900 mb-1" for="phone">
                                    Phone
                                </label>
                                <input wire:model='form.client_phone' wire:model.blur="form.client_phone"
                                    class="w-full rounded-lg border py-2 px-3" placeholder="Ex: +250 780 000 000"
                                    id="phone" type="text">
                                </input>
                                <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['form.client_phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="text-red-500"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                            </div>
                            <div>
                                <label class="block text-gray-900 mb-1" for="address">
                                    Address
                                </label>
                                <input wire:model='form.shipping_address' wire:model.blur="form.shipping_address"
                                    class="w-full rounded-lg border py-2 px-3" id="phone" type="text"
                                    placeholder="Ex: KG 213 ST, REMERA">
                                </input>
                                <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['form.shipping_address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="text-red-500"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                            </div>
                        </div>
                    </div>
                    <div class="mt-2">

                        <label for="message" class="block mb-2 font-medium text-gray-900 dark:text-white">Add some
                            notes
                            on the order</label>
                        <textarea id="message" rows="4"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-green-500 focus:border-green-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500"
                            placeholder="Write your thoughts here..."></textarea>

                    </div>

                    <div class="text-lg font-semibold mb-4">
                        Select Payment Method
                    </div>
                    <ul class="grid w-full gap-6 md:grid-cols-2">
                        <li>
                            <input wire:model='form.payment_type' wire:model.blur="form.payment_type"
                                class="hidden peer" id="hosting-small" required="" type="radio"
                                value=" Cash on Delivery" />
                            <label
                                class="inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-green-500 peer-checked:border-green-600 peer-checked:text-green-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700"
                                for="hosting-small">
                                <div class="block">
                                    <div class="w-full text-lg font-semibold">
                                        Cash on Delivery
                                    </div>
                                </div>
                                <svg aria-hidden="true" class="w-5 h-5 ms-3 rtl:rotate-180" fill="none"
                                    viewbox="0 0 14 10" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1 5h12m0 0L9 1m4 4L9 9" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="2">
                                    </path>
                                </svg>
                            </label>

                        </li>
                        <li>
                            <input wire:model='form.payment_type' wire:model.blur="form.payment_type"
                                class="hidden peer" id="hosting-small" required="" type="radio" value="Momo Pay" />
                            <label
                                class="inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-green-500 peer-checked:border-green-600 peer-checked:text-green-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700"
                                for="hosting-small">
                                <div class="block">
                                    <div class="w-full text-lg font-semibold">
                                        Momo Pay
                                    </div>
                                </div>
                                <svg aria-hidden="true" class="w-5 h-5 ms-3 rtl:rotate-180" fill="none"
                                    viewbox="0 0 14 10" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1 5h12m0 0L9 1m4 4L9 9" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="2">
                                    </path>
                                </svg>
                            </label>

                        </li>

                    </ul>
                    <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['form.payment_type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="text-red-500"><?php echo e($message); ?></span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                </div>
                <!-- End Card -->

            </div>
            <div class="md:col-span-12 lg:col-span-4 col-span-12">
                <div class="bg-white rounded-xl shadow p-4 sm:p-7 dark:bg-slate-900">
                    <div class="text-xl font-bold text-gray-700 dark:text-white mb-2">
                        ORDER SUMMARY
                    </div>
                    <div class="flex justify-between mb-2 font-bold">
                        <span>
                            Subtotal
                        </span>
                        <span>
                            <?php echo e(Cknow\Money\Money::RWF(Cart::getSubTotal())); ?>

                        </span>
                    </div>

                    <div class="flex justify-between mb-2 font-bold">
                        <span>
                            Delivery Fee
                        </span>
                        <span>
                            <?php echo e($setting->formattedShippingFee()); ?>

                        </span>
                    </div>
                    <hr class="bg-slate-400 my-4 h-1 rounded">
                    <div class="flex justify-between mb-2 font-bold">
                        <span>
                            Grand Total
                        </span>
                        <span>
                            <?php echo e(Cknow\Money\Money::RWF(Cart::getSubTotal() + $setting->shipping_fee)); ?>

                        </span>
                    </div>
                    </hr>
                </div>
                <button type="submit"
                    class="bg-green-500 mt-4 w-full p-3 rounded-lg text-lg text-white hover:bg-green-600">
                    Place Order
                </button>
                <div class="bg-white mt-4 rounded-xl shadow p-4 sm:p-7 dark:bg-slate-900">
                    <div class="text-xl font-bold text-gray-700 dark:text-white mb-2">
                        BASKET SUMMARY
                    </div>
                    <ul class="divide-y divide-gray-200 dark:divide-gray-700" role="list">

                        <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $cartItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="py-3 sm:py-4" wire:key='<?php echo e($item['name']); ?>'>
                                <div class="flex items-center">
                                    <div class="flex-shrink-0">
                                        <img alt="<?php echo e($item['name']); ?>" class="w-12 h-12 rounded-full"
                                            src="<?php echo e($item['image_url'] ?? asset('/images/No-image.png')); ?>">
                                        </img>
                                    </div>
                                    <div class="flex-1 min-w-0 ms-4">
                                        <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                            <?php echo e($item['name']); ?>

                                        </p>
                                        <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                            Quantity: <?php echo e($item['quantity']); ?> / <?php echo e($item['measurement']); ?>

                                        </p>
                                    </div>
                                    <div
                                        class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                        <?php echo e(Cknow\Money\Money::RWF($item['price'])); ?>

                                    </div>
                                </div>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                    </ul>
                </div>
            </div>
        </div>
    </form>
</div>
<?php /**PATH /home/hunter/Codes/online-shopping/resources/views/livewire/checkout-component.blade.php ENDPATH**/ ?>