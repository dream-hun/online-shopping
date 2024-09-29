<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-header">
            <?php echo e(trans('cruds.order.title_singular')); ?> <?php echo e(trans('global.list')); ?>

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
                                <?php echo e(trans('cruds.order.fields.payment_type')); ?>

                            </th>
                            <th>
                                Deliverly Method
                            </th>
                            <th>
                                <?php echo e(trans('cruds.order.fields.status')); ?>

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
                                    <span class="badge bg-info">
                                        <?php echo e($order->payment_type); ?></span>
                                </td>
                                <td>
                                    <?php echo e($order->delivery_method ?? ''); ?>

                                </td>

                                <td>
                                    <?php echo e($order->status ?? ''); ?>

                                </td>

                                <td>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('order_show')): ?>
                                        <a class="btn btn-xs btn-primary" href="<?php echo e(route('admin.orders.show', $order->id)); ?>">
                                            <?php echo e(trans('global.view')); ?>

                                        </a>
                                    <?php endif; ?>

                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('order_edit')): ?>
                                        <a class="btn btn-xs btn-info" href="<?php echo e(route('admin.orders.edit', $order->id)); ?>">
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hunter/Codes/online-shopping/resources/views/admin/orders/index.blade.php ENDPATH**/ ?>