<?php $__env->startSection('title', 'Add/Edit Product'); ?>
<?php $__env->startSection('content'); ?>

<form action="<?php echo e(route('products_save', $product->id)); ?>" method="post">
    <?php echo e(csrf_field()); ?>


    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="alert alert-danger">
            <strong>Error!</strong> <?php echo e($error); ?>

        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <div class="row mb-2">
        <div class="col-6">
            <label for="code" class="form-label">Code:</label>
            <input type="text" class="form-control" placeholder="Code" name="code" required value="<?php echo e($product->code); ?>">
        </div>
        <div class="col-6">
            <label for="model" class="form-label">Model:</label>
            <input type="text" class="form-control" placeholder="Model" name="model" required value="<?php echo e($product->model); ?>">
        </div>
    </div>

    <div class="row mb-2">
        <div class="col">
            <label for="name" class="form-label">Name:</label>
            <input type="text" class="form-control" placeholder="Name" name="name" required value="<?php echo e($product->name); ?>">
        </div>
    </div>

    <div class="row mb-2">
        <div class="col-6">
            <label for="price" class="form-label">Price:</label>
            <input type="number" step="0.01" class="form-control" placeholder="Price" name="price" required value="<?php echo e($product->price); ?>">
        </div>
        <div class="col-6">
            <label for="photo" class="form-label">Photo:</label>
            <input type="text" class="form-control" placeholder="Photo URL" name="photo" required value="<?php echo e($product->photo); ?>">
        </div>
    </div>

    <!-- ✅ NEW: Quantity Field -->
    <div class="row mb-2">
        <div class="col-6">
            <label for="quantity" class="form-label">Quantity:</label>
            <input type="number" class="form-control" placeholder="Quantity" name="quantity" required min="1" value="<?php echo e($product->quantity ?? 1); ?>">
        </div>
    </div>

    <div class="row mb-2">
        <div class="col">
            <label for="description" class="form-label">Description:</label>
            <textarea type="text" class="form-control" placeholder="Description" name="description" required><?php echo e($product->description); ?></textarea>
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/wepsec230103412/WebSecService/resources/views/products/add.blade.php ENDPATH**/ ?>