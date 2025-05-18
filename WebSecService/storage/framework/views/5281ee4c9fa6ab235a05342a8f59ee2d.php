<?php $__env->startSection('title', 'Add/Edit User'); ?>
<?php $__env->startSection('content'); ?>

<div class="container mt-5">
<form action="<?php echo e(route('users_save')); ?>" method="POST">
    <?php echo csrf_field(); ?>

    <div class="form-group mb-2">
        <label class="form-label">Name:</label>
        <input type="text" class="form-control" name="name" required>
    </div>

    <div class="form-group mb-2">
        <label class="form-label">Email:</label>
        <input type="email" class="form-control" name="email" required>
    </div>

    <div class="form-group mb-2">
        <label class="form-label">Role:</label>
        <select name="role" class="form-control" required>
    <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <option value="<?php echo e($role); ?>" <?php echo e(old('role') == $role ? 'selected' : ''); ?>>
            <?php echo e(ucfirst($role)); ?>

        </option>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</select>

    </div>

    <!-- Security Question Dropdown -->
    <div class="form-group mb-2">
        <label class="form-label">Security Question:</label>
        <select name="security_question" class="form-control">
            <option value="">-- Select a Security Question --</option>
            <option value="What is your pet's name?">What is your pet's name?</option>
            <option value="What is your mother's maiden name?">What is your mother's maiden name?</option>
            <option value="What city were you born in?">What city were you born in?</option>
        </select>
        
    </div>

    <!-- Security Answer Input -->
    <div class="form-group mb-2">
        <label class="form-label">Security Answer:</label>
        <input type="text" class="form-control" name="security_answer">
    </div>

    <div class="form-group mb-2">
        <label class="form-label">Password:</label>
        <input type="password" class="form-control" name="password" required>
    </div>

    <div class="form-group mb-2">
        <label class="form-label">Confirm Password:</label>
        <input type="password" class="form-control" name="password_confirmation" required>
    </div>

    <button type="submit" class="btn btn-primary">Add User</button>
</form>

</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/wepsec230103412/WebSecService/resources/views/users/form.blade.php ENDPATH**/ ?>