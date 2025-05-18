<?php $__env->startSection('title', 'Student Transcript'); ?>

<?php $__env->startSection('content'); ?>
<div class="container mt-5">
    <div class="card">
        <div class="card-header text-center">
            <h2>Student Transcript</h2>
        </div>
        <div class="card-body">
            <p><strong>Student Name:</strong> <?php echo e($student_name); ?></p>
            <p><strong>Student ID:</strong> <?php echo e($student_id); ?></p>
            <p><strong>Semester:</strong> <?php echo e($semester); ?></p>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Course Name</th>
                        <th>Course Code</th>
                        <th>Credits</th>
                        <th>Grade</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($index + 1); ?></td>
                            <td><?php echo e($course['course']); ?></td>
                            <td><?php echo e($course['code']); ?></td>
                            <td><?php echo e($course['credits']); ?></td>
                            <td><?php echo e($course['grade']); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/wepsec230103412/WebSecService/resources/views/transcript.blade.php ENDPATH**/ ?>