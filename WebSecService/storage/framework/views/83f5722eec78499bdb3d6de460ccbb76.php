<?php $__env->startSection('title', 'Add/Edit Grade'); ?>
<?php $__env->startSection('content'); ?>

<div class="container mt-5">
    <form action="<?php echo e(route('grades_save', $grade->id ?? null)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <div class="mb-3">
            <label class="form-label">Course Name:</label>
            <input type="text" class="form-control" name="course_name" required value="<?php echo e(old('course_name', $grade->course_name ?? '')); ?>">
        </div>
        <div class="mb-3">
            <label class="form-label">Term:</label>
            <input type="text" class="form-control" name="term" required value="<?php echo e(old('term', $grade->term ?? '')); ?>">
        </div>
        <div class="mb-3">
            <label class="form-label">Credit Hours:</label>
            <input type="number" class="form-control" name="credit_hours" required value="<?php echo e(old('credit_hours', $grade->credit_hours ?? '')); ?>">
        </div>
        <div class="mb-3">
            <label class="form-label">Grade:</label>
            <input type="text" class="form-control" name="grade" required value="<?php echo e(old('grade', $grade->grade ?? '')); ?>">
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/wepsec230103412/WebSecService/resources/views/grades/form.blade.php ENDPATH**/ ?>