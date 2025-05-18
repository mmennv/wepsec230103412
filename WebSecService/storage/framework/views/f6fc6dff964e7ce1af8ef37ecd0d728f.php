
<?php $__env->startSection('title', 'Charge Credit'); ?>
<?php $__env->startSection('content'); ?>

<h2>Charge Credit for <?php echo e($user->name); ?></h2>

<!-- Display current credit -->
<p><strong>Current Credit: </strong><?php echo e($user->credit); ?></p>

<?php if(session('success')): ?>
    <div class="alert alert-success"><?php echo e(session('success')); ?></div>
<?php endif; ?>

<?php if($errors->any()): ?>
    <div class="alert alert-danger">
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $err): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div><?php echo e($err); ?></div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
<?php endif; ?>

<form action="<?php echo e(route('charge_credit', $user->id)); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <div class="mb-3">
        <label for="amount" class="form-label">Credit Amount</label>
        <input type="number" name="amount" id="amount" min="0.01" step="0.01" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Charge</button>
</form>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/wepsec230103412/WebSecService/resources/views/users/charge_credit.blade.php ENDPATH**/ ?>