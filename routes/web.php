<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LeaveController;
use App\Http\Controllers\SalaryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DevisiController;
use App\Http\Controllers\GajiController;
use App\Http\Controllers\PerusahaanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TabelGajiController;
use App\Http\Controllers\CutiKaryawanController;
use App\Http\Controllers\AdminCutiController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Routes autentikasi (login, register, logout) tanpa middleware auth
Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/', [AuthController::class, 'login']);

Route::get('register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('register', [AuthController::class, 'register']);

Route::post('logout', [AuthController::class, 'logout'])->name('logout');

// Group route dengan middleware 'auth' (harus login)
Route::middleware(['auth'])->group(function () {

    // Dashboard untuk semua role (akses dikustom di controller)
    Route::get('/home', [DashboardController::class, 'index'])->name('home');



    // // Routes untuk Superadmin
    Route::prefix('superadmin')->middleware(['role:superadmin'])->name('superadmin.')->group(function () {
        Route::resource('perusahaan', PerusahaanController::class);
        Route::resource('devisi', DevisiController::class);
        Route::resource('users', UserController::class);
    });

    // Routes untuk Admin Perusahaan
    Route::prefix('admin')->middleware(['role:admin'])->name('admin.')->group(function () {
        Route::resource('users', UserController::class)->names('users');
        Route::resource('gaji', GajiController::class)->names('gaji');
        Route::resource('tabelgaji', TabelGajiController::class)->names('tabelgaji');
        Route::get('cuti', [AdminCutiController::class, 'index'])->name('cuti.index');
        Route::post('cuti/{id}/confirm', [AdminCutiController::class, 'confirm'])->name('cuti.confirm');
    });

    Route::patch('gaji/{gaji}/toggle-status', [GajiController::class, 'toggleStatus'])->name('gaji.toggleStatus');


    // Routes untuk Karyawan Perusahaan
    Route::prefix('karyawan')->middleware(['role:karyawan'])->name('karyawan.')->group(function () {
        Route::resource('cuti', CutiKaryawanController::class)->names('cuti');
        Route::get('/cetak/gaji', [App\Http\Controllers\CetakGajiController::class, 'hasil'])->name('cetak.gaji');
        Route::view('/cetak', 'cetak.index')->name('cetak.index');
    });



    // Akses detail user dengan middleware pembatas perusahaan untuk admin, manager, employee
    Route::middleware(['role:admin,karyawan', 'perusahaan.match'])->group(function () {
        Route::get('users/{user}', [UserController::class, 'show'])->name('users.show');
    });
});
