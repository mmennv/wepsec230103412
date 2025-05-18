<?php $__env->startSection('title', 'Start Exam'); ?>
<?php $__env->startSection('content'); ?>

<form action="<?php echo e(route('exam_submit')); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <?php $__currentLoopData = $questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="mb-3">
            <p><strong><?php echo e($question->question_text); ?></strong></p>
            <?php $__currentLoopData = ['A', 'B', 'C', 'D']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="answers[<?php echo e($question->id); ?>]" value="<?php echo e($option); ?>" required>
                    <label class="form-check-label"><?php echo e($question->{'option_'.strtolower($option)}); ?></label>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <button type="submit" class="btn btn-primary">Submit Exam</button>
</form>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/wepsec230103412/WebSecService/resources/views/exam/start_exam.blade.php ENDPATH**/ ?>