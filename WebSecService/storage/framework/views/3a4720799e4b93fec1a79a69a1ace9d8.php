 
<?php $__env->startSection('title', 'Prime Numbers'); ?> 
<?php $__env->startSection('content'); ?>

    <div class="card m-4">
    <div class="card-header">Even Numbers</div>
    <div class="card-body">
    <?php $__currentLoopData = range(1, 100); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php if($i%2==0): ?>
    <span class="badge bg-primary"><?php echo e($i); ?></span> <?php else: ?>
    <span class="badge bg-secondary"><?php echo e($i); ?></span> <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/wepsec230103412/WebSecService/resources/views/even.blade.php ENDPATH**/ ?>