<div class="card">
    <div class="card-header">
        <strong> Recent orders</strong>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Order">
                <thead>
                    <tr>
                        <th>
                            <?php echo e(trans('cruds.order.fields.order_no')); ?>

                        </th>
                        <th>
                            <?php echo e(trans('cruds.order.fields.client_name')); ?>

                        </th>
                        <th>
                            <?php echo e(trans('cruds.order.fields.client_phone')); ?>

                        </th>

                        <th>
                            <?php echo e(trans('cruds.order.fields.status')); ?>

                        </th>
                        <th>
                            <?php echo e(trans('cruds.order.fields.shipping_address')); ?>

                        </th>



                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>

                            <td>
                                <?php echo e($order->order_no ?? ''); ?>

                            </td>
                            <td>
                                <?php echo e($order->client_name ?? ''); ?>

                            </td>
                            <td>
                                <?php echo e($order->client_phone ?? ''); ?>

                            </td>
                            <td>
                                <?php echo e(App\Models\Order::STATUS_SELECT[$order->status] ?? ''); ?>

                            </td>
                            <td>
                                <?php echo e($order->shipping_address ?? ''); ?>

                            </td>

                            <td>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('order_show')): ?>
                                    <a class="btn btn-md btn-primary" href="<?php echo e(route('admin.orders.show', $order->id)); ?>">
                                        <?php echo e(trans('global.view')); ?>

                                    </a>
                                <?php endif; ?>

                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('order_edit')): ?>
                                    <a class="btn btn-md btn-info" href="<?php echo e(route('admin.orders.edit', $order->id)); ?>">
                                        <?php echo e(trans('global.edit')); ?>

                                    </a>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php /**PATH C:\Users\minis\Herd\online-shopping\resources\views/components/recent-orders-component.blade.php ENDPATH**/ ?>