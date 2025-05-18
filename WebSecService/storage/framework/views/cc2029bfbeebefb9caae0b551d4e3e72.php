<?php $__env->startSection('title', 'Supermarket Bill'); ?>
<?php $__env->startSection('content'); ?>
<div class="container mt-5">
    <div class="card">
        <div class="card-header text-center">
            <h2>Supermarket Bill</h2>
        </div>
        <div class="card-body">
            <p><strong>Customer Name:</strong> <?php echo e($customer_name); ?></p>
            <p><strong>Order Date:</strong> <?php echo e($order_date); ?></p>
            
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Item Name</th>
                        
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($index + 1); ?></td>
                            <td><?php echo e($item['name']); ?></td>
                        
                            <td><?php echo e($item['quantity']); ?></td>
                            <td>$<?php echo e(number_format($item['price'], 2)); ?></td>
                            <td>$<?php echo e(number_format($item['quantity'] * $item['price'], 2)); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
            
            <h4 class="text-right"> Total: $<?php echo e(number_format($total_amount, 2)); ?></h4>
        </div>
        
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/wepsec230103412/WebSecService/resources/views/bill.blade.php ENDPATH**/ ?>