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
                        <th width="10">

                        </th>
                        <th>
                            <?php echo e(trans('cruds.order.fields.id')); ?>

                        </th>
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
                            <?php echo e(trans('cruds.order.fields.email')); ?>

                        </th>
                        <th>
                            <?php echo e(trans('cruds.order.fields.status')); ?>

                        </th>
                        <th>
                            <?php echo e(trans('cruds.order.fields.shipping_address')); ?>

                        </th>
                        <th>
                            <?php echo e(trans('cruds.order.fields.notes')); ?>

                        </th>
                        <th>
                            <?php echo e(trans('cruds.order.fields.payment_type')); ?>

                        </th>
                        <th>
                            <?php echo e(trans('cruds.order.fields.updated_by')); ?>

                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr data-entry-id="<?php echo e($order->id); ?>">
                            <td>

                            </td>
                            <td>
                                <?php echo e($order->id ?? ''); ?>

                            </td>
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
                                <?php echo e($order->email ?? ''); ?>

                            </td>
                            <td>
                                <?php echo e(App\Models\Order::STATUS_SELECT[$order->status] ?? ''); ?>

                            </td>
                            <td>
                                <?php echo e($order->shipping_address ?? ''); ?>

                            </td>
                            <td>
                                <?php echo e($order->notes ?? ''); ?>

                            </td>
                            <td>
                                <?php echo e(App\Models\Order::PAYMENT_TYPE_SELECT[$order->payment_type] ?? ''); ?>

                            </td>
                            <td>
                                <?php echo e($order->updated_by->name ?? ''); ?>

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
<?php $__env->startSection('scripts'); ?>
<?php echo \Illuminate\View\Factory::parentPlaceholder('scripts'); ?>
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
  
  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-Order:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hunter/Codes/online-shopping/resources/views/admin/orders/index.blade.php ENDPATH**/ ?>