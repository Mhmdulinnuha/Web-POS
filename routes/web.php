<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminIndexController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\AdminCashierController;
use App\Http\Controllers\Admin\AdminPaymentController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    // Halaman Utama Admin
    Route::get('/dashboard', [AdminIndexController::class, 'dashboard'])->name('dashboard');
    Route::get('/produk', [AdminIndexController::class, 'produk'])->name('produk');
    Route::get('/laporan', [AdminIndexController::class, 'laporan'])->name('laporan');
    Route::get('/kasir', [AdminIndexController::class, 'kasir'])->name('kasir'); // Ini GET
    Route::get('/setting', [AdminIndexController::class, 'setting'])->name('setting');

    // Fungsionalitas Produk
    Route::post('/produk/store', [ProductController::class, 'store'])->name('produk.store');
    Route::put('/produk/update/{id}', [ProductController::class, 'update'])->name('produk.update');
    Route::delete('/produk/destroy/{id}', [ProductController::class, 'destroy'])->name('produk.destroy');

    // Fungsionalitas Kasir (Pastikan URL berbeda dengan GET /kasir)
    Route::post('/kasir/store', [AdminCashierController::class, 'store'])->name('kasir.store'); // Ini POST
    Route::put('/kasir/update/{id}', [AdminCashierController::class, 'update'])->name('kasir.update');
    Route::delete('/kasir/destroy/{id}', [AdminCashierController::class, 'destroy'])->name('kasir.destroy');

    // Update Setting Toko
    Route::patch('/setting/update-store', [AdminIndexController::class, 'updateStore'])->name('setting.updateStore');
    Route::post('/payment/store', [AdminPaymentController::class, 'store'])->name('payment.store');
    Route::delete('/payment/destroy/{id}', [AdminPaymentController::class, 'destroy'])->name('payment.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
