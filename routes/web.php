<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BmiController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\AkunController;
use App\Http\Controllers\JadwalPraktikController;
use App\Http\Controllers\JanjiTemuController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\GajiController;
use App\Http\Controllers\PasienController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->name('home');
Route::get('about-us', function () {
    return view('about');
})->name('about');
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

    Route::prefix('pasien')->name('pasien.')->group(function () {
        Route::get('/', [PasienController::class, 'dashboard'])->name('index');
        Route::prefix('janji')->name('janji.')->group(function () {
            Route::get('/', [PasienController::class, 'janji_temu'])->name('index');
            Route::get('/tambah', [PasienController::class, 'create_janji'])->name('create');
            Route::post('/tambah', [PasienController::class, 'store_janji'])->name('store');
        });
    });

    Route::middleware('role:admin,apoteker,dokter')->prefix('dashboard')->name('dashboard.')->group(function () {
        Route::get('/', function () {
            $title = 'Dashboard';
            return view('admin.dashboard', compact('title'));
        })->name('index');
        Route::prefix('akun')->name('akun.')->group(function () {
            Route::get('/', [AkunController::class, 'index'])->name('index');
            Route::get('/tambah', [AkunController::class, 'create'])->name('tambah');
            Route::post('/tambah', [AkunController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [AkunController::class, 'edit'])->name('edit');
            Route::put('/edit/{id}', [AkunController::class, 'update'])->name('update');
            Route::delete('/delete/{id}', [AkunController::class, 'destroy'])->name('destroy');
        });
        Route::prefix('obat')->name('obat.')->group(function () {
            Route::get('/', [ObatController::class, 'index'])->name('index');
            Route::get('/tambah', [ObatController::class, 'create'])->name('tambah');
            Route::post('/tambah', [ObatController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [ObatController::class, 'edit'])->name('edit');
            Route::put('/edit/{id}', [ObatController::class, 'update'])->name('update');
            Route::delete('/delete/{id}', [ObatController::class, 'destroy'])->name('destroy');
        });
        Route::prefix('jadwal')->name('jadwal.')->group(function () {
            Route::get('/', [JadwalPraktikController::class, 'index'])->name('index');
            Route::get('/tambah', [JadwalPraktikController::class, 'create'])->name('tambah');
            Route::post('/tambah', [JadwalPraktikController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [JadwalPraktikController::class, 'edit'])->name('edit');
            Route::put('/edit/{id}', [JadwalPraktikController::class, 'update'])->name('update');
            Route::delete('/delete/{id}', [JadwalPraktikController::class, 'destroy'])->name('destroy');
        });
        Route::prefix('gaji')->name('gaji.')->group(function () {
            Route::get('/', [GajiController::class, 'index'])->name('index');
            Route::get('/tambah', [GajiController::class, 'create'])->name('tambah');
            Route::post('/tambah', [GajiController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [GajiController::class, 'edit'])->name('edit');
            Route::put('/edit/{id}', [GajiController::class, 'update'])->name('update');
            Route::delete('/delete/{id}', [GajiController::class, 'destroy'])->name('destroy');
        });
        Route::prefix('janji')->name('janji.')->group(function () {
            Route::get('/', [JanjiTemuController::class, 'index'])->name('index');
            Route::get('/tambah', [JanjiTemuController::class, 'create'])->name('tambah');
            Route::post('/tambah', [JanjiTemuController::class, 'store'])->name('store');
            Route::get('/approve/{id}', [JanjiTemuController::class, 'approval'])->name('approval');
            Route::put('/approve/{id}', [JanjiTemuController::class, 'approve'])->name('approve');
            Route::put('/completed/{id}', [JanjiTemuController::class, 'completed'])->name('completed');
            Route::get('/edit/{id}', [JanjiTemuController::class, 'edit'])->name('edit');
            Route::put('/edit/{id}', [JanjiTemuController::class, 'update'])->name('update');
            Route::delete('/delete/{id}', [JanjiTemuController::class, 'destroy'])->name('destroy');
            Route::get('/detail/{id}', [JanjiTemuController::class, 'show'])->name('detail');
        });
        Route::prefix('blog')->name('blog.')->group(function () {
            Route::get('/', [BlogController::class, 'admin_index'])->name('index');
            Route::get('/tambah', [BlogController::class, 'admin_create'])->name('tambah');
            Route::post('/tambah', [BlogController::class, 'admin_store'])->name('store');
            Route::get('/edit/{id}', [BlogController::class, 'admin_edit'])->name('edit');
            Route::put('/edit/{id}', [BlogController::class, 'admin_update'])->name('update');
            Route::delete('/delete/{id}', [BlogController::class, 'admin_destroy'])->name('destroy');
            // Route::get('/detail/{id}', [BlogController::class, 'show'])->name('detail');
        });
    });
});

require __DIR__ . '/auth.php';
