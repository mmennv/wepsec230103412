<?php $__env->startSection('title', 'Exam Results'); ?>
<?php $__env->startSection('content'); ?>

<div class="container text-center mt-5">
    <h1>Exam Results</h1>
    <p><strong>Score:</strong> <?php echo e($score); ?> / <?php echo e($totalQuestions); ?></p>
    <p><strong>Percentage:</strong> <?php echo e($percentage); ?>%</p>

    <div class="mt-4">
        <a href="<?php echo e(route('exam_start')); ?>" class="btn btn-success">Retake Exam</a>
        <a href="<?php echo e(route('exam_main')); ?>" class="btn btn-primary">Back to Home</a>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/wepsec230103412/WebSecService/resources/views/exam/exam_result.blade.php ENDPATH**/ ?>