<?php $__env->startSection('title', 'User Profile'); ?>
<?php $__env->startSection('content'); ?>
 <div class="row">
 <div class="m-4 col-sm-6">
    <div class="alert alert-success">
        <strong>Congratulation!</strong> Dear <?php echo e($user->name); ?>, your email
 <?php echo e($user->email); ?> is verified.
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/wepsec230103412/WebSecService/resources/views/users/verified.blade.php ENDPATH**/ ?>