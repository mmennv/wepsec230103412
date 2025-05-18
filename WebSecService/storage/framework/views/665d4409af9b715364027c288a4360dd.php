<?php $__env->startSection('title', 'Login'); ?>

<?php $__env->startSection('content'); ?>
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card shadow-lg rounded-4">
                <div class="card-header bg-primary text-white text-center fs-4">
                    Login
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

                    
                    <form action="<?php echo e(route('do_login')); ?>" method="POST">
                        <?php echo csrf_field(); ?>

                        <div class="mb-3">
                            <label class="form-label">Email:</label>
                            <input type="email" class="form-control" name="email" placeholder="Enter your email" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Password:</label>
                            <input type="password" class="form-control" name="password" placeholder="Enter your password" required>
                        </div>

                        <div class="d-flex justify-content-between mb-3">
                            <a href="<?php echo e(route('forgot_password')); ?>" class="text-decoration-none">Forgot Password?</a>
                        </div>

                        <div class="d-grid mb-3">
                            <button type="submit" class="btn btn-primary">Login</button>
                        </div>
                    </form>

                    <hr>

                    <div class="text-center mb-3">Or login with:</div>

                    
                    <div class="d-grid gap-2 mb-3">
                        <a href="<?php echo e(route('login_with_google')); ?>" class="btn btn-outline-danger d-flex align-items-center justify-content-center gap-2">
                            <img src="https://img.icons8.com/color/20/google-logo.png" alt="Google Logo">
                            <span>Login with Google</span>
                        </a>
                        <a href="<?php echo e(route('login_with_facebook')); ?>" class="btn btn-outline-primary d-flex align-items-center justify-content-center gap-2">
                            <img src="https://img.icons8.com/fluency/20/facebook-new.png" alt="Facebook Logo">
                            <span>Login with Facebook</span>
                        </a>
                        <a href="<?php echo e(route('login_with_github')); ?>" class="btn btn-outline-dark d-flex align-items-center justify-content-center gap-2">
                            <img src="https://img.icons8.com/ios-glyphs/20/000000/github.png" alt="GitHub Logo">
                            <span>Login with GitHub</span>
                        </a>
                        <a href="<?php echo e(route('login_with_linkedin')); ?>" class="btn btn-outline-info d-flex align-items-center justify-content-center gap-2">
                            <img src="https://img.icons8.com/color/20/linkedin.png" alt="LinkedIn Logo">
                            <span>Login with LinkedIn</span>
                        </a>
                    </div>
                    <div class="text-center mb-3">Certificate Login:</div>
                    
                    <form action="<?php echo e(route('login.certificate')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="d-grid mb-3">
                            <button type="submit" class="btn btn-outline-success d-flex align-items-center justify-content-center gap-2">
                                <img src="https://img.icons8.com/ios-filled/20/000000/certificate.png" alt="Certificate Icon">
                                <span>Certificate</span>
                            </button>
                        </div>
                    </form>

                    <div class="text-center">
                        Create Account: <a href="<?php echo e(route('register')); ?>" class="text-decoration-none">register here</a>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/wepsec230103412/WebSecService/resources/views/users/login.blade.php ENDPATH**/ ?>