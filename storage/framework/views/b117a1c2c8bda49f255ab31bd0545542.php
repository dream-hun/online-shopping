<?php $__env->startSection('content'); ?>

<div class="card">
    <div class="card-header">
        <?php echo e(trans('global.edit')); ?> <?php echo e(trans('cruds.order.title_singular')); ?>

    </div>

    <div class="card-body">
        <form method="POST" action="<?php echo e(route("admin.orders.update", [$order->id])); ?>" enctype="multipart/form-data">
            <?php echo method_field('PUT'); ?>
            <?php echo csrf_field(); ?>
            <div class="form-group">
                <label for="order_no"><?php echo e(trans('cruds.order.fields.order_no')); ?></label>
                <input class="form-control <?php echo e($errors->has('order_no') ? 'is-invalid' : ''); ?>" type="text" name="order_no" id="order_no" value="<?php echo e(old('order_no', $order->order_no)); ?>">
                <?php if($errors->has('order_no')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('order_no')); ?>

                    </div>
                <?php endif; ?>
                <span class="help-block"><?php echo e(trans('cruds.order.fields.order_no_helper')); ?></span>
            </div>
            <div class="form-group">
                <label class="required" for="client_name"><?php echo e(trans('cruds.order.fields.client_name')); ?></label>
                <input class="form-control <?php echo e($errors->has('client_name') ? 'is-invalid' : ''); ?>" type="text" name="client_name" id="client_name" value="<?php echo e(old('client_name', $order->client_name)); ?>" required>
                <?php if($errors->has('client_name')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('client_name')); ?>

                    </div>
                <?php endif; ?>
                <span class="help-block"><?php echo e(trans('cruds.order.fields.client_name_helper')); ?></span>
            </div>
            <div class="form-group">
                <label class="required" for="client_phone"><?php echo e(trans('cruds.order.fields.client_phone')); ?></label>
                <input class="form-control <?php echo e($errors->has('client_phone') ? 'is-invalid' : ''); ?>" type="text" name="client_phone" id="client_phone" value="<?php echo e(old('client_phone', $order->client_phone)); ?>" required>
                <?php if($errors->has('client_phone')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('client_phone')); ?>

                    </div>
                <?php endif; ?>
                <span class="help-block"><?php echo e(trans('cruds.order.fields.client_phone_helper')); ?></span>
            </div>
            <div class="form-group">
                <label for="email"><?php echo e(trans('cruds.order.fields.email')); ?></label>
                <input class="form-control <?php echo e($errors->has('email') ? 'is-invalid' : ''); ?>" type="email" name="email" id="email" value="<?php echo e(old('email', $order->email)); ?>">
                <?php if($errors->has('email')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('email')); ?>

                    </div>
                <?php endif; ?>
                <span class="help-block"><?php echo e(trans('cruds.order.fields.email_helper')); ?></span>
            </div>
            <div class="form-group">
                <label><?php echo e(trans('cruds.order.fields.status')); ?></label>
                <select class="form-control <?php echo e($errors->has('status') ? 'is-invalid' : ''); ?>" name="status" id="status">
                    <option value disabled <?php echo e(old('status', null) === null ? 'selected' : ''); ?>><?php echo e(trans('global.pleaseSelect')); ?></option>
                    <?php $__currentLoopData = App\Enums\OrderStatus::cases(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($label); ?>" <?php echo e(old('status', $order->status) === (string) $key ? 'selected' : ''); ?>><?php echo e($label); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <?php if($errors->has('status')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('status')); ?>

                    </div>
                <?php endif; ?>
                <span class="help-block"><?php echo e(trans('cruds.order.fields.status_helper')); ?></span>
            </div>
            <div class="form-group">
                <label class="required" for="shipping_address"><?php echo e(trans('cruds.order.fields.shipping_address')); ?></label>
                <input class="form-control <?php echo e($errors->has('shipping_address') ? 'is-invalid' : ''); ?>" type="text" name="shipping_address" id="shipping_address" value="<?php echo e(old('shipping_address', $order->shipping_address)); ?>" required>
                <?php if($errors->has('shipping_address')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('shipping_address')); ?>

                    </div>
                <?php endif; ?>
                <span class="help-block"><?php echo e(trans('cruds.order.fields.shipping_address_helper')); ?></span>
            </div>
            <div class="form-group">
                <label for="notes"><?php echo e(trans('cruds.order.fields.notes')); ?></label>
                <textarea class="form-control <?php echo e($errors->has('notes') ? 'is-invalid' : ''); ?>" name="notes" id="notes"><?php echo e(old('notes', $order->notes)); ?></textarea>
                <?php if($errors->has('notes')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('notes')); ?>

                    </div>
                <?php endif; ?>
                <span class="help-block"><?php echo e(trans('cruds.order.fields.notes_helper')); ?></span>
            </div>
            <div class="form-group">
                <label><?php echo e(trans('cruds.order.fields.payment_type')); ?></label>
                <select class="form-control <?php echo e($errors->has('payment_type') ? 'is-invalid' : ''); ?>" name="payment_type" id="payment_type">
                    <option value disabled <?php echo e(old('payment_type', null) === null ? 'selected' : ''); ?>><?php echo e(trans('global.pleaseSelect')); ?></option>
                    <?php $__currentLoopData = App\Models\Order::PAYMENT_TYPE_SELECT; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($key); ?>" <?php echo e(old('payment_type', $order->payment_type) === (string) $key ? 'selected' : ''); ?>><?php echo e($label); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <?php if($errors->has('payment_type')): ?>
                    <div class="invalid-feedback">
                        <?php echo e($errors->first('payment_type')); ?>

                    </div>
                <?php endif; ?>
                <span class="help-block"><?php echo e(trans('cruds.order.fields.payment_type_helper')); ?></span>
            </div>

            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    <?php echo e(trans('global.save')); ?>

                </button>
            </div>
        </form>
    </div>
</div>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\minis\Herd\online-shopping\resources\views/admin/orders/edit.blade.php ENDPATH**/ ?>