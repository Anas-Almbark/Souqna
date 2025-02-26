<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;


Route::get('/dashboard', function () {
    return view('dashboardComponents.homeDashboard');
})->middleware(['auth:admin', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::view("/", "shared.home")->name("home.index");
Route::view("/home", "shared.home")->name("home.index");

Route::view("/products", "shared.shopCategory")->name("products.index");
Route::view("/product", "shared.shopSingle")->name("product.index");

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

Route::resource('categories', CategoryController::class)->middleware('auth:admin');



require __DIR__ . '/auth.php';
