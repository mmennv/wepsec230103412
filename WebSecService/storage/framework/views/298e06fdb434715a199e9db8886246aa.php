<?php $__env->startSection('title', 'Add/Edit Question'); ?>
<?php $__env->startSection('content'); ?>

<div class="container mt-5">
    <form action="<?php echo e(route('exam_save_question', $question->id ?? null)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <div class="mb-3">
            <label class="form-label">Question:</label>
            <input type="text" class="form-control" name="question_text" required value="<?php echo e(old('question_text', $question->question_text ?? '')); ?>">
        </div>
        <?php $__currentLoopData = ['A', 'B', 'C', 'D']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="mb-3">
            <label class="form-label">Option <?php echo e($option); ?>:</label>
            <input type="text" class="form-control" name="option_<?php echo e(strtolower($option)); ?>" required value="<?php echo e(old('option_'.strtolower($option), $question->{'option_'.strtolower($option)} ?? '')); ?>">
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <div class="mb-3">
            <label class="form-label">Correct Answer:</label>
            <select class="form-select" name="correct_answer">
                <?php $__currentLoopData = ['A', 'B', 'C', 'D']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($option); ?>" <?php echo e(old('correct_answer', $question->correct_answer ?? '') == $option ? 'selected' : ''); ?>>Option <?php echo e($option); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/wepsec230103412/WebSecService/resources/views/exam/question_form.blade.php ENDPATH**/ ?>