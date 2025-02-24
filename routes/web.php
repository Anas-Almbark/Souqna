<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::get('/dashboard', function () {
    return view('dashboardComponents.homeDashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

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


Route::get("/homeDashboard", function () {
    return view('dashboardComponents.homeDashboard');
})->name("homeDashboard.index");

require __DIR__ . '/auth.php';
