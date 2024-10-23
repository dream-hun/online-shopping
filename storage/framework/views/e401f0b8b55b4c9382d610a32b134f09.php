<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-header">
            <h1 style="text-transform: uppercase" class="mb-2 mt-2"><?php echo e($order->client_name); ?> order</h1>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-8">
                    <p><strong>Order No</strong> <?php echo e($order->order_no); ?></p>
                    <p><strong>Client Name</strong> <?php echo e($order->client_name); ?></p>
                    <p><strong>Client Phone</strong> <?php echo e($order->client_phone); ?></p>
                    <p><strong>Client Address</strong> <?php echo e($order->shipping_address); ?></p>
                    <p><strong>Client Email</strong> <?php echo e($order->email); ?></p>

                </div>
                <div class="col-md-4 text-left">
                    <img src="<?php echo e(asset('images/logo.webp')); ?>" alt="Logo" class="img-fluid" style="max-width: 100px;">
                    <p class="mt-4"><strong>Tel:</strong> <?php echo e($setting->mobile_one); ?></p>
                    <p><strong>Address:</strong> <?php echo e($setting->email_one); ?></p>
                    <p><strong>Address:</strong> <?php echo e($setting->address); ?></p>
                </div>
            </div>

            <table class="table table-bordered mt-4">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $order->orderItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($product->product->name); ?></td>
                            <td><?php echo e($product->quantity); ?></td>
                            <td><?php echo e($product->formattedPrice()); ?></td>
                            <td><?php echo e($product->formattedSubtotal()); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3" class="text-left"><strong>Subtotal Total</strong></td>
                        <td style="font-weight: bold;" class="text-dark">
                            <?php echo e(Cknow\Money\Money::RWF($order->orderItems()->sum('subtotal'))); ?>

                        </td>
                    </tr>
                    <tr>
                        <td colspan="3" class="text-left"><strong>Deliverly Fee</strong></td>
                        <td style="font-weight: bold;" class="text-dark"><?php echo e($setting->formattedShippingFee()); ?>

                        </td>
                    </tr>
                    <tr>
                        <td colspan="3" class="text-left"><strong>Grand Total</strong></td>
                        <td style="font-weight: bold;" class="text-dark">
                            <?php echo e(Cknow\Money\Money::RWF($order->orderItems()->sum('subtotal') + $setting->shipping_fee)); ?>

                        </td>
                    </tr>
                </tfoot>
            </table>

            <div class="mt-4">
                <p><strong>Notes:</strong><?php echo e($order->notes); ?></p>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\minis\Herd\online-shopping\resources\views/admin/orders/show.blade.php ENDPATH**/ ?>