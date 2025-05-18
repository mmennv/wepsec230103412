
<?php $__env->startSection('title', 'Insufficient Credit'); ?>
<?php $__env->startSection('content'); ?>

<div class="container mt-4">
    <div class="alert alert-warning">
        <h4>Insufficient Credit</h4>
        <p>Hello <strong><?php echo e($user->name); ?></strong>,</p>
        <p>You tried to purchase <strong><?php echo e($product->name); ?></strong> which costs <strong>$<?php echo e($product->price); ?></strong>.</p>
        <p>Your current credit is <strong>$<?php echo e($user->credit); ?></strong>, which is not enough to complete this purchase.</p>
        <a href="<?php echo e(route('products_list')); ?>" class="btn btn-primary mt-3">Back to Products</a>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/wepsec230103412/WebSecService/resources/views/products/insufficient_credit.blade.php ENDPATH**/ ?>