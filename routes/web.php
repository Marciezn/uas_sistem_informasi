<?php

use Illuminate\Support\Facades\Route;

// CONTROLLERS
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DataPenggunaController;
use App\Http\Controllers\SuratMasukController;
use App\Http\Controllers\SuratKeluarController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\RiwayatUserController;
use App\Http\Controllers\Admin\DashboardController;

// USER CONTROLLERS (frontend user)
use App\Http\Controllers\SuratMasukUserController;
use App\Http\Controllers\SuratKeluarUserController;



// =======================
// LANDING PAGE (HALAMAN UTAMA)
// =======================
Route::get('/', function () {
    return view('landingpage');   // resources/views/landingpage.blade.php
})->name('landingpage');



// =======================
// AUTH
// =======================
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'loginProcess'])->name('login.process');

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'registerProcess'])->name('register.process');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');



// =======================
// DASHBOARD ADMIN + CRUD ADMIN
// =======================
Route::middleware(['auth', 'role:admin'])->group(function () {

    // Dashboard
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    // Data Pengguna
    Route::prefix('admin/datapengguna')->name('admin.datapengguna.')->group(function () {
        Route::get('/', [DataPenggunaController::class, 'index'])->name('index');
        Route::get('/create', [DataPenggunaController::class, 'create'])->name('create');
        Route::post('/', [DataPenggunaController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [DataPenggunaController::class, 'edit'])->name('edit');
        Route::put('/{id}', [DataPenggunaController::class, 'update'])->name('update');
        Route::delete('/{id}', [DataPenggunaController::class, 'destroy'])->name('destroy');
    });

    // Surat Masuk Admin
    Route::prefix('admin/suratmasuk')->name('admin.suratmasuk.')->group(function () {
        Route::get('/', [SuratMasukController::class, 'index'])->name('index');
        Route::get('/create', [SuratMasukController::class, 'create'])->name('create');
        Route::post('/', [SuratMasukController::class, 'store'])->name('store');
        Route::get('/{id}/show', [SuratMasukController::class, 'show'])->name('show');
        Route::get('/{id}/edit', [SuratMasukController::class, 'edit'])->name('edit');
        Route::put('/{id}', [SuratMasukController::class, 'update'])->name('update');
        Route::delete('/{id}', [SuratMasukController::class, 'destroy'])->name('destroy');
    });

    // Surat Keluar Admin
    Route::prefix('admin/suratkeluar')->name('admin.suratkeluar.')->group(function () {
        Route::get('/', [SuratKeluarController::class, 'index'])->name('index');
        Route::get('/create', [SuratKeluarController::class, 'create'])->name('create');
        Route::post('/', [SuratKeluarController::class, 'store'])->name('store');
        Route::get('/{id}/show', [SuratKeluarController::class, 'show'])->name('show');
        Route::get('/{id}/edit', [SuratKeluarController::class, 'edit'])->name('edit');
        Route::put('/{id}', [SuratKeluarController::class, 'update'])->name('update');
        Route::delete('/{id}', [SuratKeluarController::class, 'destroy'])->name('destroy');
    });

    // Laporan
    Route::get('/admin/laporan', [LaporanController::class, 'index'])->name('admin.laporan');

});



// =======================
// DASHBOARD USER + CRUD USER
// =======================
Route::middleware(['auth', 'role:user'])
    ->prefix('user')
    ->name('user.')
    ->group(function () {

        // Dashboard
        Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');

        // Surat Masuk User
        Route::resource('suratmasuk', SuratMasukUserController::class);

        // Surat Keluar User
        Route::resource('suratkeluar', SuratKeluarUserController::class);

        // Riwayat
        Route::get('/riwayat', [RiwayatUserController::class, 'index'])->name('riwayat');
    });

