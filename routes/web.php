<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\PusatDataController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController; // Sesuaikan dengan Controller Auth Anda jika ada

/*
|--------------------------------------------------------------------------
| 1. RUTE PUBLIK (Untuk Pengunjung Biasa / Tampilan Luar)
|--------------------------------------------------------------------------
*/
Route::view('/', 'home');
Route::view('/profile', 'profile');
Route::view('/structure', 'structure');
Route::view('/login', 'login')->name('login');

// PERBAIKAN: Mengembalikan rute publik agar pengunjung luar bisa melihat daftar file & kegiatan
Route::get('/pusat-data', [PusatDataController::class, 'index'])->name('publik.pusat-data');
Route::get('/activity', [ActivityController::class, 'index'])->name('publik.activity');


/*
|--------------------------------------------------------------------------
| 2. RUTE ADMIN (Dashboard & Manajemen CRUD)
|--------------------------------------------------------------------------
*/
// Rute Utama Dashboard Admin
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Rute Autentikasi (Logout POST)
Route::post('/logout', function () {
    auth()->logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/login');
})->name('logout');


/*
|--------------------------------------------------------------------------
| 3. RUTE ACTION CRUD (Untuk Tombol Simpan, Edit, & Hapus di Dashboard)
|--------------------------------------------------------------------------
*/
// Rute Aksi Kelola Pusat Data (Hanya untuk form POST, PUT, dan DELETE di Dashboard)
Route::prefix('admin/pusat-data')->name('pusat-data.')->group(function () {
    Route::post('/', [PusatDataController::class, 'store'])->name('store');
    Route::put('/{id}', [PusatDataController::class, 'update'])->name('update');
    Route::delete('/{id}', [PusatDataController::class, 'destroy'])->name('destroy');
});

// Rute Aksi Kelola Activity (Hanya untuk form POST, PUT, dan DELETE di Dashboard)
Route::prefix('admin/activity')->name('activity.')->group(function () {
    Route::post('/', [ActivityController::class, 'store'])->name('store');
    Route::put('/{id}', [ActivityController::class, 'update'])->name('update');
    Route::delete('/{id}', [ActivityController::class, 'destroy'])->name('destroy');
});