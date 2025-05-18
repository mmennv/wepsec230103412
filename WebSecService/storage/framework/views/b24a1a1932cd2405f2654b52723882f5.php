<nav class="navbar navbar-expand-sm bg-light">
    <div class="container-fluid">
        <!-- Left-aligned nav links -->
        <ul class="navbar-nav me-auto">
            <li class="nav-item"><a class="nav-link" href="./">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="./even">Even Numbers</a></li>
            <li class="nav-item"><a class="nav-link" href="./prime">Prime Numbers</a></li>
            <li class="nav-item"><a class="nav-link" href="./multable">Multiplication Table</a></li>
            <li class="nav-item"><a class="nav-link" href="./text">text</a></li>
            <li class="nav-item"><a class="nav-link" href="./bill">bill</a></li>
            <li class="nav-item"><a class="nav-link" href="./transcript">transcript</a></li>
            <li class="nav-item"><a class="nav-link" href="./grades">grades</a></li>
            <li class="nav-item"><a class="nav-link" href="./exam">exam</a></li>
            <li class="nav-item"><a class="nav-link" href="<?php echo e(route('tasks.index')); ?>">To-Do List</a></li>
            <li class="nav-item"><a class="nav-link" href="./books">Books</a></li>
            <li class="nav-item"><a class="nav-link" href="<?php echo e(route('products_list')); ?>">Products</a></li>
            <li class="nav-item"><a class="nav-link" href="<?php echo e(route('cryptography')); ?>">Cryptography</a></li>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('show_users')): ?>
            <li class="nav-item"><a class="nav-link" href="<?php echo e(route('users')); ?>">Users</a></li>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('track_delivery')): ?>
            <li class="nav-item"><a class="nav-link" href="<?php echo e(route('track_delivery')); ?>">Track Delivery</a></li>
            <?php endif; ?>
        </ul>

        <!-- Right-aligned user auth dropdown -->
        <ul class="navbar-nav ms-auto">
            <?php if(auth()->guard()->check()): ?>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown">
                    <?php echo e(Auth::user()->name); ?>

                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="<?php echo e(route('profile')); ?>">Profile</a></li>
                    <li>
                        <form action="<?php echo e(route('do_logout')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <button type="submit" class="dropdown-item">Logout</button>
                        </form>
                    </li>
                </ul>
            </li>
            <?php else: ?>
            <li class="nav-item"><a class="nav-link" href="<?php echo e(route('login')); ?>">Login</a></li>
            <li class="nav-item"><a class="nav-link" href="<?php echo e(route('register')); ?>">Register</a></li>
            <?php endif; ?>
        </ul>
    </div>
</nav>
<?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/wepsec230103412/WebSecService/resources/views/layouts/menu.blade.php ENDPATH**/ ?>