<?php $__env->startSection('title', 'Add Book'); ?>

<?php $__env->startSection('content'); ?>
<div class="container mt-5">
    <h2>Add Book</h2>

    <?php if($errors->any()): ?>
        <div class="alert alert-danger">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="<?php echo e(route('books.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <div class="form-group mb-2">
            <label class="form-label">Title:</label>
            <input type="text" class="form-control" name="title" required>
        </div>

        <div class="form-group mb-2">
            <label class="form-label">Author:</label>
            <input type="text" class="form-control" name="author" required>
        </div>

        <div class="form-group mb-2">
            <label class="form-label">Published Year:</label>
            <input type="number" class="form-control" name="published_year" required min="1000" max="9999">
        </div>

        <button type="submit" class="btn btn-primary">Add Book</button>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/wepsec230103412/WebSecService/resources/views/books/create.blade.php ENDPATH**/ ?>