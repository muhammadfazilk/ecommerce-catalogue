<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\OrderAdminController;
use App\Http\Controllers\Auth\CustomAuthenticatedSessionController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StorefrontController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

Route::middleware('auth')->group(function () {
    Route::prefix('admin')->middleware('role:admin')->group(function () {
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    });
    Route::prefix('admin')->middleware('role:admin|product_manager')->group(function () {
        Route::resource('categories', CategoryController::class);
        Route::resource('products', ProductController::class);
        Route::resource('documents', DocumentController::class);
        Route::get('/documents/{document}/download', [DocumentController::class, 'download'])->name('documents.download');
        Route::get('/orders', [OrderAdminController::class, 'index'])->name('admin.orders.index');
    });

    Route::middleware('role:customer')->group(function () {
        Route::get('/store', [StorefrontController::class, 'index'])->name('store.index');
        Route::get('/store/product/{product}', [StorefrontController::class, 'show'])->name('store.show');

        Route::post('/cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
        Route::get('/cart', [CartController::class, 'view'])->name('cart.view');
        Route::delete('/cart/remove/{product}', [CartController::class, 'remove'])->name('cart.remove');

        Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
        Route::post('/checkout', [OrderController::class, 'place'])->name('checkout');
    });
});


require __DIR__ . '/auth.php';
