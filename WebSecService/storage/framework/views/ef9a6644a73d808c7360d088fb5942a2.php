<?php $__env->startSection('title', 'Users'); ?>
<?php $__env->startSection('content'); ?>
<div class="row mt-2">
    <div class="col col-10">
        <h1>Users</h1>
    </div>
</div>
<form>
    <div class="row">
        <div class="col col-sm-2">
            <input name="keywords" type="text"  class="form-control" placeholder="Search Keywords" value="<?php echo e(request()->keywords); ?>" />
        </div>
        <div class="col col-sm-1">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        <div class="col col-sm-5">
            <button type="reset" class="btn btn-danger">Reset</button>
        </div>
        <div class="col col-3">
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('add_users')): ?>
        <a href="<?php echo e(route('do_register')); ?>" class="btn btn-success form-control">Add User</a>
        <?php endif; ?>
      </div>
    </div>
</form>

<div class="card mt-2">
  <div class="card-body">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Name</th>
          <th scope="col">Email</th>
          <th scope="col">Roles</th>
          <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('users_credit')): ?>
          <th scope="col">credit</th>
          <?php endif; ?>
          <th scope="col"></th>
        </tr>
      </thead>
      <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <tr>
        <td scope="col"><?php echo e($user->id); ?></td>
        <td scope="col"><?php echo e($user->name); ?></td>
        <td scope="col"><?php echo e($user->email); ?></td>
        <td scope="col">
          <?php $__currentLoopData = $user->roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <span class="badge bg-primary"><?php echo e($role->name); ?></span>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </td>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('users_credit')): ?>
        <th scope="col"><?php echo e($user->credit); ?></td>
        <?php endif; ?>
        <td scope="col">
          <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit_users')): ?>
          <a class="btn btn-primary" href='<?php echo e(route('users_edit', [$user->id])); ?>'>Edit</a>
          <?php endif; ?>
          <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_users')): ?>
          <a class="btn btn-primary" href='<?php echo e(route('edit_password', [$user->id])); ?>'>Change Password</a>
          <?php endif; ?>
          <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete_users')): ?>
          <a class="btn btn-danger" href='<?php echo e(route('users_delete', [$user->id])); ?>'>Delete</a>
          <?php endif; ?>
          <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('charge_credit')): ?>
              <?php if(auth()->user()->hasRole('Employee') && $user->hasRole('Customer')): ?>
                  <a href="<?php echo e(route('charge_credit_form', $user->id)); ?>" class="btn btn-info btn-sm">Charge Credit</a>
              <?php endif; ?>
          <?php endif; ?>


        </td>
      </tr>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>
  </div>
</div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/wepsec230103412/WebSecService/resources/views/users/list.blade.php ENDPATH**/ ?>