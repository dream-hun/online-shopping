<div class="card">
    <div class="card-header">
        <strong>Top Selling Products</strong>
    </div>
    <div class="card-body">
        <table class="table table-responsive-sm table-hover table-outline mb-0">
            <thead class="thead-light">
                <tr>
                    <th>Product Name</th>
                    <th class="text-center">Total Sales</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td>
                            <div><?php echo e($product->name); ?></div>
                        </td>
                        <td class="text-center">
                            <strong><?php echo e($product->total); ?></strong>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="2" class="text-center">No top selling products found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<?php /**PATH C:\Users\minis\Herd\online-shopping\resources\views/components/top-selling-products.blade.php ENDPATH**/ ?>