<?php $__env->startSection('title', 'MCQ Exam System'); ?>
<?php $__env->startSection('content'); ?>

<div class="container text-center mt-5">
    <h1>Welcome to the MCQ Exam System</h1>
    <p>Select an option below:</p>
    
    <div class="row mt-4">
        <div class="col-md-5">
            <a href="<?php echo e(route('exam_manage_questions')); ?>" class="btn btn-primary btn-lg w-100">Questions Management</a>
        </div>
        <div class="col-md-5">
            <a href="<?php echo e(route('exam_start')); ?>" class="btn btn-success btn-lg w-100">Start Exam</a>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/wepsec230103412/WebSecService/resources/views/exam/main.blade.php ENDPATH**/ ?>