<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\ProductController;
use App\Http\Controllers\Web\UsersController;

// Root Route (Home Page)
Route::get('/', function () {
    return redirect()->route('products.index');
});

// Authentication Routes
Route::get('register', [UsersController::class, 'register'])->name('register');
Route::post('register', [UsersController::class, 'doRegister'])->name('do_register');
Route::get('login', [UsersController::class, 'login'])->name('login');
Route::post('login', [UsersController::class, 'doLogin'])->name('do_login');
Route::get('logout', [UsersController::class, 'doLogout'])->name('do_logout');

// User Management Routes
Route::get('users', [UsersController::class, 'list'])->name('users');
Route::get('profile/{user?}', [UsersController::class, 'profile'])->name('profile');
Route::get('users/edit/{user?}', [UsersController::class, 'edit'])->name('users_edit');
Route::post('users/save/{user}', [UsersController::class, 'save'])->name('users_save');
Route::get('users/delete/{user}', [UsersController::class, 'delete'])->name('users_delete');
Route::get('users/edit_password/{user?}', [UsersController::class, 'editPassword'])->name('edit_password');
Route::post('users/save_password/{user}', [UsersController::class, 'savePassword'])->name('save_password');

// Employee Registration Routes
Route::middleware(['auth', 'permission:admin_users'])->group(function () {
    Route::get('/users/register-employee', [UsersController::class, 'registerEmployee'])->name('users.register-employee');
    Route::post('/users/register-employee', [UsersController::class, 'doRegisterEmployee'])->name('users.do-register-employee');
});

// Product Routes
Route::get('/products/list', [ProductController::class, 'index'])->name('products_list');
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::post('/products/{product}/purchase', [ProductController::class, 'purchase'])->name('products.purchase')->middleware('auth');
Route::get('/products/purchase-history', [ProductController::class, 'purchaseHistory'])->name('products.purchase-history')->middleware('auth');

// Product Management Routes (Employee Only)
Route::middleware(['auth', 'permission:manage_products'])->group(function () {
    Route::get('/products/manage', [ProductController::class, 'manage'])->name('products.manage');
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');
    Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
});

// Customer Management Routes (Employee Only)
Route::middleware(['auth', 'permission:view_customers'])->group(function () {
    Route::get('/customers', [UsersController::class, 'listCustomers'])->name('customers.list');
});

// Credit Management Routes (Employee Only)
Route::middleware(['auth', 'permission:manage_credit', 'throttle:10,1'])->group(function () {
    Route::get('/users/{customer}/add-credit', [UsersController::class, 'addCreditForm'])->name('users.add-credit-form');
    Route::put('/users/{customer}/add-credit', [UsersController::class, 'addCredit'])->name('users.add-credit');
    Route::get('/users/{customer}/credit-transactions', [UsersController::class, 'creditTransactions'])->name('users.credit-transactions');
});

// Test Routes
Route::get('/multable', function (Request $request) {
    $j = $request->number??5;
    $msg = $request->msg;
    return view('multable', compact("j", "msg"));
});

Route::get('/even', function () {
    return view('even');
});

Route::get('/prime', function () {
    return view('prime');
});

Route::get('/test', function () {
    return view('test');
});
