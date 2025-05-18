<?php $__env->startSection('title', 'User Profile'); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="m-4 col-sm-6">
        <table class="table table-striped">
            <tr>
                <th>Name</th><td><?php echo e($user->name); ?></td>
            </tr>
            <tr>
                <th>Email</th><td><?php echo e($user->email); ?></td>
                <tr>
                    <th>Phone</th><td><?php echo e($user->phone); ?></td>
                </tr>
                </tr>
                    <?php if(auth()->guard()->check()): ?>
                        <?php if(auth()->user()->hasRole(['Customer', 'Super_user'])): ?>
                            <tr>
                                <th>credit</th><td><?php echo e($user->credit); ?></td>
                            </tr>
                        <?php endif; ?>
                    <?php endif; ?>
                <tr>

                <th>Roles</th>
                <td>
                    <?php $__currentLoopData = $user->roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <span class="badge bg-primary"><?php echo e($role->name); ?></span>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </td>
            </tr>
            <tr>
            <?php if(auth()->guard()->check()): ?>
            <?php if(!auth()->user()->hasRole(['Customer', 'Super_user'])): ?>
                <th>Permissions</th>
                <td>
                    <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <span class="badge bg-success"><?php echo e($permission->display_name); ?></span>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </td>
            <?php endif; ?>
            <?php endif; ?>
            </tr>
        </table>

        <div class="row">
            <div class="col col-6">
            </div>
            <?php if(auth()->user()->hasPermissionTo('admin_users')||auth()->id()==$user->id): ?>
            <div class="col col-4">
                <a class="btn btn-primary" href='<?php echo e(route('edit_password', $user->id)); ?>'>Change Password</a>
            </div>
            <?php else: ?>
            <div class="col col-4">
            </div>
            <?php endif; ?>
            <?php if(auth()->user()->hasPermissionTo('edit_users')||auth()->id()==$user->id): ?>
            <div class="col col-2">
                <a href="<?php echo e(route('users_edit', $user->id)); ?>" class="btn btn-success form-control">Edit</a>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php if(auth()->guard()->check()): ?>
<?php if(auth()->user()->hasRole(['Customer', 'Super_user'])): ?>
    <h2 class="mt-4 mb-3">Bought Products</h2>

    <?php if($user->boughtProducts && $user->boughtProducts->count() > 0): ?>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Total Price</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $user->boughtProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($product->name); ?></td>
                            <td><?php echo e($product->pivot->quantity ?? 1); ?></td>
                            <td>$<?php echo e(number_format($product->pivot->total_price ?? ($product->price), 2)); ?></td>
                            <td><?php echo e($product->pivot->status_message ?? 'No status message'); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    <?php else: ?>
        <div class="alert alert-info">
            You have not bought any products yet.
        </div>
    <?php endif; ?>
<?php endif; ?>
<?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/wepsec230103412/WebSecService/resources/views/users/profile.blade.php ENDPATH**/ ?>