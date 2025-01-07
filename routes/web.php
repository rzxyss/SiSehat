<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ApotekerController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BmiController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ObatController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->name('home');
Route::prefix('bmi')->name('bmi.')->group(function () {
    Route::get('/', [BmiController::class, 'index'])->name('index');
    Route::post('/hitung', [BmiController::class, 'hitung'])->name('hitung');
});
Route::prefix('blog')->name('blog.')->group(function () {
    Route::get('/', [BlogController::class, 'index'])->name('index');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('dashboard')->name('dashboard.')->group(function () {
        Route::get('/', function () {
            return view('admin.dashboard');
        })->name('index');
        Route::prefix('obat')->name('obat.')->group(function () {
            Route::get('/', [ObatController::class, 'index'])->name('index');
            Route::get('/tambah', [ObatController::class, 'create'])->name('tambah');
            Route::post('/tambah', [ObatController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [ObatController::class, 'edit'])->name('edit');
            Route::put('/edit/{id}', [ObatController::class, 'update'])->name('update');
            Route::delete('/delete/{id}', [ObatController::class, 'destroy'])->name('destroy');
        });
        Route::prefix('dokter')->name('dokter.')->group(function () {
            Route::get('/', [DokterController::class, 'index'])->name('index');
            Route::get('/tambah', [DokterController::class, 'create'])->name('tambah');
            Route::post('/tambah', [DokterController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [DokterController::class, 'edit'])->name('edit');
            Route::put('/edit/{id}', [DokterController::class, 'update'])->name('update');
            Route::delete('/delete/{id}', [DokterController::class, 'destroy'])->name('destroy');
        });
        Route::prefix('pasien')->name('pasien.')->group(function () {
            Route::get('/', [PasienController::class, 'index'])->name('index');
            Route::get('/tambah', [PasienController::class, 'create'])->name('tambah');
            Route::post('/tambah', [PasienController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [PasienController::class, 'edit'])->name('edit');
            Route::put('/edit/{id}', [PasienController::class, 'update'])->name('update');
            Route::delete('/delete/{id}', [PasienController::class, 'destroy'])->name('destroy');
        });
        Route::prefix('apoteker')->name('apoteker.')->group(function () {
            Route::get('/', [ApotekerController::class, 'index'])->name('index');
            Route::get('/tambah', [ApotekerController::class, 'create'])->name('tambah');
            Route::post('/tambah', [ApotekerController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [ApotekerController::class, 'edit'])->name('edit');
            Route::put('/edit/{id}', [ApotekerController::class, 'update'])->name('update');
            Route::delete('/delete/{id}', [ApotekerController::class, 'destroy'])->name('destroy');
        });
    });
});

require __DIR__ . '/auth.php';
