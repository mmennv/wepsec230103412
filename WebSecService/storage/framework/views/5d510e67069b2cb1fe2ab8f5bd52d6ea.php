<?php $__env->startSection('title', 'Forgot Password'); ?>
<?php $__env->startSection('content'); ?>

<div class="container mt-4">
    <h4>Forgot Your Password?</h4>
    <form method="POST" action="<?php echo e(route('send_temp_password')); ?>">
        <?php echo csrf_field(); ?>
        <div class="form-group mt-2">
            <label>Email address:</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Send Temporary Password</button>
    </form>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/wepsec230103412/WebSecService/resources/views/users/forgot_password.blade.php ENDPATH**/ ?>