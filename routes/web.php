<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\GeraiController;
use App\Http\Controllers\DistribusiController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| WEB ROUTES
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});


// 🔐 SEMUA HARUS LOGIN
Route::middleware(['auth'])->group(function () {

    // 👑 ADMIN
    Route::middleware(['role:admin'])->group(function () {
        Route::get('/admin', function () {
            return view('admin.dashboard');
        });

        Route::resource('/supplier', SupplierController::class);
        Route::resource('/gerai', GeraiController::class);
        Route::resource('/distribusis', DistribusiController::class);
        
        Route::get('/benda', [BarangController::class, 'index']);
    });


    // 📦 GUDANG
    Route::middleware(['role:gudang'])->group(function () {
        Route::get('/gudang', function () {
            return view('gudang.dashboard');
        });

        Route::resource('/barang', BarangController::class);
        Route::get('/barang/edit/{id}', [BarangController::class, 'edit']); 
        Route::resource('/geray', GeraiController::class);
        Route::resource('/suppliers', SupplierController::class);
        Route::resource('/distribusi', DistribusiController::class);
    });


    // 🛒 GERAI
    Route::middleware(['role:gerai'])->group(function () {
        Route::get('/geraii', function () {
            return view('gerai.dashboard');
        });

        Route::resource('transaksi', TransaksiController::class);

        // lihat barang saja
        Route::get('/barangs', [BarangController::class, 'index']);
    });

});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
