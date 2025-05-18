<?php $__env->startSection('title', 'Test Page'); ?>
<?php $__env->startSection('content'); ?>

<?php if(session('success')): ?>
    <div class="alert alert-success">
        <?php echo e(session('success')); ?>

    </div>
<?php endif; ?>
<?php if(session('error')): ?>
    <div class="alert alert-danger">
        <?php echo e(session('error')); ?>

    </div>
<?php endif; ?>

<div class="row mt-2">
    <div class="col col-10">
        <h1>Products</h1>
    </div>
    <div class="col col-2">
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('add_products')): ?>
        <a href="<?php echo e(route('products_edit')); ?>" class="btn btn-success form-control">Add Product</a>
        <?php endif; ?>
    </div>
</div>
<form>
    <div class="row">
        <div class="col col-sm-2">
            <input name="keywords" type="text"  class="form-control" placeholder="Search Keywords" value="<?php echo e(request()->keywords); ?>" />
        </div>
        <div class="col col-sm-2">
            <input name="min_price" type="numeric"  class="form-control" placeholder="Min Price" value="<?php echo e(request()->min_price); ?>"/>
        </div>
        <div class="col col-sm-2">
            <input name="max_price" type="numeric"  class="form-control" placeholder="Max Price" value="<?php echo e(request()->max_price); ?>"/>
        </div>
        <div class="col col-sm-2">
            <select name="order_by" class="form-select">
                <option value="" <?php echo e(request()->order_by==""?"selected":""); ?> disabled>Order By</option>
                <option value="name" <?php echo e(request()->order_by=="name"?"selected":""); ?>>Name</option>
                <option value="price" <?php echo e(request()->order_by=="price"?"selected":""); ?>>Price</option>
            </select>
        </div>
        <div class="col col-sm-2">
            <select name="order_direction" class="form-select">
                <option value="" <?php echo e(request()->order_direction==""?"selected":""); ?> disabled>Order Direction</option>
                <option value="ASC" <?php echo e(request()->order_direction=="ASC"?"selected":""); ?>>ASC</option>
                <option value="DESC" <?php echo e(request()->order_direction=="DESC"?"selected":""); ?>>DESC</option>
            </select>
        </div>
        <div class="col col-sm-1">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        <div class="col col-sm-1">
            <button type="reset" class="btn btn-danger">Reset</button>
        </div>
    </div>
</form>




// £££££
<?php if(!empty(request()->keywords)): ?>

    <div class='card mt-2'>

        <div class='card-body'>

            view search results: <span>{<?php echo request()->keywords; ?>}</span>

        </div>

    </div>

<?php endif; ?>
        



<?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="card mt-2">
        <div class="card-body">
            <div class="row">
                <div class="col col-sm-12 col-lg-4">
                    <img src="<?php echo e(asset("images/$product->photo")); ?>" class="img-thumbnail" alt="<?php echo e($product->name); ?>" width="100%">
                </div>
                <div class="col col-sm-12 col-lg-8 mt-3">
                    <div class="row mb-2">
					    <div class="col-8">
					        <h3><?php echo e($product->name); ?></h3>
					    </div>
					    <div class="col col-2">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit_products')): ?>
					        <a href="<?php echo e(route('products_edit', $product->id)); ?>" class="btn btn-success form-control">Edit</a>
                            <?php endif; ?>
					    </div>
					    <div class="col col-2">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete_products')): ?>
					        <a href="<?php echo e(route('products_delete', $product->id)); ?>" class="btn btn-danger form-control">Delete</a>
                            <?php endif; ?>
					    </div>
                        <div class="col col-2">
                            <?php if(auth()->guard()->check()): ?>
                                <?php if(auth()->user()->hasRole(['Customer', 'Super_user'])): ?>
                                    <form action="<?php echo e(route('buy_product', $product->id)); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <button type="submit" class="btn btn-primary">Buy</button>
                                    </form>
                                <?php endif; ?>
                            <?php endif; ?>
                        </div>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('select_favourite')): ?>
                            <form action="<?php echo e(route('products.toggle_favourite', $product->id)); ?>" method="POST" class="d-inline">
                                <?php echo csrf_field(); ?>
                                <button type="submit" class="btn btn-warning">
                                    <?php echo e($product->favourite ? 'Unfavourite' : 'Favourite'); ?>

                                </button>
                            </form>
                        <?php endif; ?>


					</div>

                    <table class="table table-striped">
                        <tr><th width="20%">Name</th><td><?php echo e($product->name); ?></td></tr>
                        <tr><th>Model</th><td><?php echo e($product->model); ?></td></tr>
                        <tr><th>Code</th><td><?php echo e($product->code); ?></td></tr>
                        <tr><th>Price</th><td><?php echo e($product->price); ?></td>
                        <tr><th>Available Stock</th><td><?php echo e($product->stock); ?></td></tr>
                        <tr><th>Description</th><td><?php echo e($product->description); ?></td></tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/wepsec230103412/WebSecService/resources/views/products/list.blade.php ENDPATH**/ ?>