<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\layananController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
// Web Routes


// Rute untuk halaman-halaman utama (Publik)
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/layanan', [HomeController::class, 'layanan'])->name('layanan');
Route::get('/tentang-kami', [HomeController::class, 'tentangKami'])->name('tentang.kami');
Route::get('/kontak', [HomeController::class, 'kontak'])->name('kontak');


// Rute Dashboard bawaan Breeze
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


// Rute Profil bawaan Breeze
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rute Dashboard
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'admin'])
        ->middleware('role:admin')
        ->name('admin.dashboard');

    Route::get('/admin/transaksi', [TransactionController::class, 'index'])
        ->middleware('role:admin')
        ->name('admin.transaksi');

    Route::get('/admin/laporan', [ReportController::class, 'index'])
        ->middleware('role:admin')
        ->name('admin.laporan');

    Route::get('/admin/users',[UserController::class, 'index'])
        ->middleware('role:admin')
        ->name('admin.users.index');

    Route::get('admin/layanan',[layananController::class,'index'])
        ->middleware('role:admin')
        ->name('admin.layanan.index');

    Route::get('/kasir/dashboard', [DashboardController::class, 'kasir'])
        ->middleware('role:kasir')
        ->name('kasir.dashboard');

    Route::get('/kasir/transaksi',[TransactionController::class,'kasirIndex'])
        ->middleware('role:kasir')
        ->name('kasir.transaksi');
});

// Route Pantau Antrian
Route::get('/pantau-antrian', function () {
    return view('pantau-antrian');
})->name('pantau.antrian');

// Memuat semua rute autentikasi (login, register, logout, dll.) dari Breeze
require __DIR__.'/auth.php';
