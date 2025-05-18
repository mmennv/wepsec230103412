<?php $__env->startSection('title', 'Register'); ?>

<?php $__env->startSection('content'); ?>
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card shadow-lg rounded-4">
                <div class="card-header bg-primary text-white text-center fs-4">
                    Register
                </div>

                <div class="card-body">

                    
                    <?php if($errors->any()): ?>
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    <?php endif; ?>

                    
                    <form action="<?php echo e(route('do_register')); ?>" method="POST">
                        <?php echo csrf_field(); ?>

                        <div class="mb-3">
                            <label class="form-label">Name:</label>
                            <input type="text" class="form-control" name="name" placeholder="Enter your full name" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email:</label>
                            <input type="email" class="form-control" name="email" placeholder="Enter your email" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Phone Number:</label>
                            <input type="text" class="form-control" name="phone" placeholder="01XXXXXXXXX" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Password:</label>
                            <input type="password" class="form-control" name="password" placeholder="Create a password" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Confirm Password:</label>
                            <input type="password" class="form-control" name="password_confirmation" placeholder="Re-enter password" required>
                        </div>

                        <div class="d-grid mb-3">
                            <button type="submit" class="btn btn-primary">Register</button>
                        </div>

                        <div class="text-center">
                            Already have an account? <a href="<?php echo e(route('login')); ?>" class="text-decoration-none">Login here</a>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/wepsec230103412/WebSecService/resources/views/users/register.blade.php ENDPATH**/ ?>