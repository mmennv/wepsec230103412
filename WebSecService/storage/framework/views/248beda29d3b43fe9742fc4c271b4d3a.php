
<?php $__env->startSection('title', 'Cryptography'); ?>
<?php $__env->startSection('content'); ?>
  <div class="card m-4">
    <div class="card-body">
      <form action="<?php echo e(route('cryptography')); ?>" method="get">
        <?php echo e(csrf_field()); ?>

        <div class="row mb-2">
          <div class="col">
              <label for="name" class="form-label">Data:</label>
              <textarea type="text" class="form-control" placeholder="Data" name="data" required><?php echo e($data); ?></textarea>
          </div>
        </div>
        <div class="row mb-2">
          <div class="col">
              <label for="name" class="form-label">Operation:</label>
              <select class="form-control" name="action" required>
                <option <?php echo e(($action=="Encrypt")?"selected":""); ?>>Encrypt</option>
                <option <?php echo e(($action=="Decrypt")?"selected":""); ?>>Decrypt</option>
                <option <?php echo e(($action=="Hash")?"selected":""); ?>>Hash</option>
                <option <?php echo e(($action=="Sign")?"selected":""); ?>>Sign</option>
                <option <?php echo e(($action=="Verify")?"selected":""); ?>>Verify</option>
                <option <?php echo e(($action=="KeySend")?"selected":""); ?>>KeySend</option>
                <option <?php echo e(($action=="KeyRecive")?"selected":""); ?>>KeyRecive</option>
              </select>
          </div>
        </div>
        <div class="row mb-2">
          <div class="col">
              <label for="name" class="form-label">Result:</label>
              <textarea type="text" class="form-control" placeholder="Data" name="result"><?php echo e($result); ?></textarea>
          </div>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button> 
      </form>
    </div>
  </div>
  <div class="card m-4"><div class="card-body"><strong>Result Status:</strong> <?php echo e($status); ?></div></div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/wepsec230103412/WebSecService/resources/views/cryptography.blade.php ENDPATH**/ ?>