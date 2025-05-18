<?php $__env->startSection('title', 'Grades Management'); ?>
<?php $__env->startSection('content'); ?>

<div class="row mb-3">
    <div class="col col-10">
        <h1>Grades</h1>
    </div>
    <div class="col col-2">
        <a href="<?php echo e(route('grades_add')); ?>" class="btn btn-success form-control">Add Grade</a>
    </div>
</div>

<?php $__currentLoopData = $grades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $term => $term_grades): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="card mt-4">
        <div class="card-header">
            <h3>Term: <?php echo e($term); ?></h3>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <tr><th>Course</th><th>CH</th><th>Grade</th><th>Actions</th></tr>
                <?php $__currentLoopData = $term_grades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $grade): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($grade->course_name); ?></td>
                        <td><?php echo e($grade->credit_hours); ?></td>
                        <td><?php echo e($grade->grade); ?></td>
                        <td>
                            <a href="<?php echo e(route('grades_edit', $grade->id)); ?>" class="btn btn-success">Edit</a>
                            <a href="<?php echo e(route('grades_delete', $grade->id)); ?>" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </table>
            <h5>Total CH: <?php echo e($total_ch_per_term[$term]); ?> | GPA: <?php echo e($gpa_per_term[$term]); ?></h5>
        </div>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<div class="card mt-4">
    <div class="card-header">
        <h3>Cumulative Summary</h3>
    </div>
    <div class="card-body">
        <h5>Total CCH: <?php echo e($cumulative_ch); ?> | CGPA: <?php echo e($cumulative_gpa); ?></h5>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/wepsec230103412/WebSecService/resources/views/grades/list.blade.php ENDPATH**/ ?>