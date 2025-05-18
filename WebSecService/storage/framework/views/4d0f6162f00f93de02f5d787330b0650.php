 
<?php $__env->startSection('title', 'welcome'); ?> 
<?php $__env->startSection('content'); ?>
    <script>
    function doSomething() {
        alert("welcome to our website");
    }
    </script>
    <div class="card m-4">
    <div class="card-body">
        welcome to home page
        <button type="button" class="btn btn-success" onclick="doSomething()">Press here</button>
    </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/wepsec230103412/WebSecService/resources/views/welcome.blade.php ENDPATH**/ ?>