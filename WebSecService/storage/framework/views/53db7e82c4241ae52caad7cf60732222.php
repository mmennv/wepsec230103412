 
<?php $__env->startSection('title', 'Prime Numbers'); ?> 
<?php $__env->startSection('content'); ?>
<div class="container">
    <h2>To-Do List</h2>
    <form action="<?php echo e(route('tasks.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <input type="text" name="name" placeholder="Task Name" required>
        <button type="submit">Add Task</button>
    </form>

    <ul>
        <?php $__currentLoopData = $tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li>
                <?php echo e($task->name); ?> - <?php echo e($task->status ? 'Completed' : 'Pending'); ?>

                <?php if(!$task->status): ?>
                    <form action="<?php echo e(route('tasks.update', $task->id)); ?>" method="POST" style="display:inline;">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PATCH'); ?>
                        <button type="submit">Complete</button>
                    </form>
                <?php endif; ?>
                <form action="<?php echo e(route('tasks.destroy', $task->id)); ?>" method="POST" style="display:inline;">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button type="submit">Delete</button>
                </form>
            </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/wepsec230103412/WebSecService/resources/views/tasks/index.blade.php ENDPATH**/ ?>