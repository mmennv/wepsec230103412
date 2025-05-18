<?php $__env->startSection('title', 'Reset Password'); ?>
<?php $__env->startSection('content'); ?>

<form action="<?php echo e(route('reset_password')); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <input type="hidden" name="user_id" value="<?php echo e($user->id); ?>">

    <div class="form-group mb-2">
        <label class="form-label">New Password:</label>
        <input type="password" class="form-control" name="password" required>
    </div>

    <div class="form-group mb-2">
        <label class="form-label">Confirm Password:</label>
        <input type="password" class="form-control" name="password_confirmation" required>
    </div>

    <button type="submit" class="btn btn-primary">Reset Password</button>
</form>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/wepsec230103412/WebSecService/resources/views/users/reset_password.blade.php ENDPATH**/ ?>