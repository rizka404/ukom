<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminPengaduanController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


// TAMPILKAN HALAMAN LOGIN
Route::get('/login', [AuthController::class, 'index'])->name('login');
// PROSES LOGIN
Route::post('/login', [AuthController::class, 'login'])->name('login.process');
// LOGOUT
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
// FORM REGISTER (GET)
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
// PROSES REGISTER (POST)
Route::post('/register', [AuthController::class, 'register']);

Route::get('/dashboard', function () {
    return view ('dashboard');
})->name('dashboard');

Route::get('/riwayat', [PengaduanController::class, 'index'] ) ->name ('riwayat');
Route::get('/show/{id}', [PengaduanController::class, 'show'])
    ->name('pengaduan.show');
Route::post('/pengaduan', [PengaduanController::class, 'store'])
    ->name('pengaduan.store');
Route::get('/info', [InfoController::class, 'index'])
    ->name('info');

Route::get('/profil', [ProfilController::class, 'index'])
    ->middleware('auth')
    ->name('profil');
Route::post('/profil/update', [ProfilController::class, 'update'])
    ->name('profil.update');

Route::get('/form', function () {
    return view('form');
})->name('form');

Route::post('/pengaduan/{id}/selesai', [AdminController::class, 'updateStatus']);

Route::prefix('admin')->group(function () {

 Route::get('/dashboard', [AdminController::class, 'dashboard'])
        ->name('admin.dashboard');

     Route::get('/pengaduan', [AdminPengaduanController::class, 'index'])
    ->name('admin.pengaduan');
    Route::post('/pengaduan/{id}/status', [AdminPengaduanController::class, 'updateStatus'])
        ->name('admin.pengaduan.updateStatus');

    Route::get('/manajemen', [AdminController::class, 'manajemen'])
    ->name('admin.manajemen');
    Route::get('/notifikasi', [AdminController::class, 'notifikasi'])
    ->name('admin.notifikasi');

});


