<?php $__env->startSection('title', 'Track Delivery'); ?>

<?php $__env->startSection('content'); ?>
    <h1>Track Delivery</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Product</th>
                <th>User</th>
                <th>Status Message</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $purchases; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $purchase): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($purchase->product->name); ?></td>
                    <td><?php echo e($purchase->user->name); ?></td>
                    <td>
                        <?php if($purchase->status_message): ?>
                            <?php echo e($purchase->status_message); ?>

                        <?php else: ?>
                            No status message
                        <?php endif; ?>
                    </td>
                    <td>
                        <form action="<?php echo e(route('update_status_message', $purchase->id)); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <input type="text" name="status_message" class="form-control mb-2" value="<?php echo e($purchase->status_message); ?>">
                            <button type="submit" class="btn btn-primary">Update Status</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/wepsec230103412/WebSecService/resources/views/products/track_delivery.blade.php ENDPATH**/ ?>