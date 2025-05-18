<?php $__env->startSection('title', 'Manage Questions'); ?>
<?php $__env->startSection('content'); ?>

<div class="row mb-3">
    <div class="col col-10">
        <h1>Questions</h1>
    </div>
    <div class="col col-2">
        <a href="<?php echo e(route('exam_add_question')); ?>" class="btn btn-success form-control">Add Question</a>
    </div>
</div>

<table class="table table-striped">
    <tr><th>Question</th><th>Actions</th></tr>
    <?php $__currentLoopData = $questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($question->question_text); ?></td>
            <td>
                <a href="<?php echo e(route('exam_edit_question', $question->id)); ?>" class="btn btn-warning">Edit</a>
                <a href="<?php echo e(route('exam_delete_question', $question->id)); ?>" class="btn btn-danger">Delete</a>
            </td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</table>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/wepsec230103412/WebSecService/resources/views/exam/questions_list.blade.php ENDPATH**/ ?>