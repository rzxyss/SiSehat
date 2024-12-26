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
    return view('welcome');
})->name('home');
Route::prefix('bmi')->name('bmi.')->group(function () {
    Route::get('/', [BmiController::class, 'index'])->name('index');
    Route::post('/hitung', [BmiController::class, 'hitung'])->name('hitung');
});
Route::prefix('blog')->name('blog.')->group(function () {
    Route::get('/', [BlogController::class, 'index'])->name('index');
});
Route::prefix('obat')->name('obat.')->group(function () {
    Route::get('/', [ObatController::class, 'index'])->name('index');
    Route::get('/tambah', [ObatController::class, 'create'])->name('tambah');
});

Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
