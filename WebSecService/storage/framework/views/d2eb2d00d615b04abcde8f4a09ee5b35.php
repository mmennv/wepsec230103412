 
<?php $__env->startSection('title', 'Prime Numbers'); ?> 
<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <?php $__currentLoopData = range(1, 100); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $j): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="card m-2 col-sm-2">
            <div class="card-header"><?php echo e($j); ?> Multiplication Table</div>
            <div class="card-body">
                <table class="table table-bordered">
                    <?php $__currentLoopData = range(1, 10); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr><td><?php echo e($j); ?> * <?php echo e($i); ?></td><td>= <?php echo e($i * $j); ?></td></tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </table>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/wepsec230103412/WebSecService/resources/views/multable.blade.php ENDPATH**/ ?>