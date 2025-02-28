<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SupportController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;


Route::get('/dashboard', function () {
    return view('dashboardComponents.homeDashboard');
})->middleware(['auth:admin', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile/view', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/{user}', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::view("/", "shared.home")->name("home.index");
Route::view("/home", "shared.home")->name("home.index");

Route::view("/products/shopcategory", "shared.shopCategory")->name("products.index");
Route::view("/product/shopsingle", "shared.shopSingle")->name("product.index");

Route::view("/connect", "shared.connect")->name("connect.index");
Route::view("/tracking", "shared.tracking")->name("tracking.index");


//? Group for admin actions
Route::middleware(['auth:admin'])->group(function () {
    Route::get('admins', [AdminController::class, 'index'])->name('admin.index');
    Route::get('new-admin', [AdminController::class, 'create'])->name('admin.create');
    Route::post('add-admin', [AdminController::class, 'store'])->name('admin.store');
    Route::delete('delete-admin/{id}', [AdminController::class, 'destroy'])->name('admin.destroy');
    Route::get('edit-admin/{admin}', [AdminController::class, 'edit'])->name('admin.edit');
    Route::put('update-admin/{admin}', [AdminController::class, 'update'])->name('admin.update');
    Route::put('update-password/{admin}', [AdminController::class, 'updatePassword'])->name('admin.updatePass');
});

Route::resource('products', ProductController::class);

Route::middleware(['auth:admin'])->prefix('adminproducts')->group(function () {
    Route::get('/products', [ProductController::class, 'index'])->name('admin.products.index');
    Route::post('/products/approve/{id}', [ProductController::class, 'approve'])->name('admin.products.approve');
    Route::post('/products/reject/{id}', [ProductController::class, 'reject'])->name('admin.products.reject');
});

Route::get('/', action: [HomeController::class, 'index'])->name('home.index');
Route::get('/home', action: [HomeController::class, 'index'])->name('home.index');
Route::resource('categories', CategoryController::class)->middleware('auth:admin');

Route::resource('supports', SupportController::class)->middleware(['auth:admin', 'auth'])->except('create');
Route::get('/supports/create', [SupportController::class, 'create'])->name('supports.create');
Route::get('/user/messages', [SupportController::class, 'usermessages'])->name('supports.usermessages');


require __DIR__ . '/auth.php';
