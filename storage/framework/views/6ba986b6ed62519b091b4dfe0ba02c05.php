<?php $__env->startComponent('mail::message'); ?>
    # Order placed

    <?php $__env->startComponent('mail::table'); ?>
        <table class="w-full text-left">
            <thead class="sr-only">
                <tr>
                    <!-- Empty row for accessibility purposes -->
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                <tr>
                    <td class="py-2">
                        <span class="font-bold">Order date</span>
                    </td>
                    <td class="py-2"> <?php echo e(date('j M Y h:i a', strtotime($order->created_at))); ?></td>
                </tr>
                <tr>
                    <td class="py-2">
                        <span class="font-bold">Order No</span>
                    </td>
                    <td class="py-2"> <?php echo e($order->order_no); ?></td>
                </tr>
                <tr>
                    <td class="py-2">
                        <span class="font-bold">Client</span>
                    </td>
                    <td class="py-2"> <?php echo e($order->user === null ? $order->client_name : $order->user->name); ?></td>
                </tr>
                <tr>
                    <td class="py-2">
                        <span class="font-bold">Client phone</span>
                    </td>
                    <td class="py-2"> <?php echo e(\App\Helpers\Garden::formatPhoneUs($order->client_phone)); ?></td>
                </tr>
                <tr>
                    <td class="py-2">
                        <span class="font-bold">Email address</span>
                    </td>
                    <td class="py-2"> <?php echo e($order->email); ?></td>
                </tr>
                <tr>
                    <td class="py-2">
                        <span class="font-bold">Shipping address</span>
                    </td>
                    <td class="py-2"> <?php echo e($order->shipping_address); ?></td>
                </tr>
            </tbody>
        </table>
    <?php echo $__env->renderComponent(); ?>

    # Products ordered

    <?php $__env->startComponent('mail::table'); ?>
        <table class="w-full border-collapse">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border px-3 py-2 text-left">Product</th>
                    <th class="border px-3 py-2 text-left">Price</th>
                    <th class="border px-3 py-2 text-left">Qty</th>
                    <th class="border px-3 py-2 text-left">Total</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                <?php $__currentLoopData = $order->orderItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $orderItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td class="border px-3 py-2"><?php echo e($orderItem->product->name); ?></td>
                        <td class="border px-3 py-2"><?php echo e($orderItem->formattedPrice()); ?></td>
                        <td class="border px-3 py-2"><?php echo e($orderItem->qty); ?></td>
                        <td class="border px-3 py-2"><?php echo e(Cknow\Money\Money::RWF($orderItem->subtotal)); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
            <tfoot class="bg-gray-50">
                <tr>
                    <th colspan="3" class="border px-3 py-2 text-left">Sub Total</th>
                    <th class="border px-3 py-2"><?php echo e(Cknow\Money\Money::RWF($order->orderItems()->sum('subtotal'))); ?></th>
                </tr>
                <tr>
                    <th colspan="3" class="border px-3 py-2 text-left">Shipping</th>
                    <th class="border px-3 py-2"><?php echo e($setting->formattedShippingFee()); ?></th>
                </tr>
                <tr>
                    <th colspan="3" class="border px-3 py-2 text-left">Total</th>
                    <th class="border px-3 py-2">
                        <?php echo e(Cknow\Money\Money::RWF($order->orderItems()->sum('subtotal') + $order->shipping_amount)); ?></th>
                </tr>
            </tfoot>
        </table>
    <?php echo $__env->renderComponent(); ?>

    # Note

    <p><?php echo e($order->notes); ?></p>

    <?php $__env->startComponent('mail::button', ['url' => url('/'), 'color' => 'success']); ?>
        Shop Again
    <?php echo $__env->renderComponent(); ?>

    Thanks,<br>
    <?php echo e(config('app.name')); ?>

<?php echo $__env->renderComponent(); ?>
<?php /**PATH /home/hunter/Codes/online-shopping/resources/views/emails/order-placed.blade.php ENDPATH**/ ?>