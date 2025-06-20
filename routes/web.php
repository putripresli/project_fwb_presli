<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\AdminController;


Route::get('/', function () {
    return view('welcome');
});
Route::get('/beranda', [Dashboard::class, 'Beranda'])->name('beranda');
// Registrasi
Route::get('registrasi-user', [AuthController::class, 'tampilRegistrasiUser'])->name('register.user');
Route::post('/simpan/user', [AuthController::class, 'submitRegistrasiUser'])->name('save.user');

Route::get('registrasi-driver', [AuthController::class, 'tampilRegistrasDriver'])->name('register.driver');
Route::post('/registrasi/driver', [AuthController::class, 'submitRegistrasiDriver'])->name('registrasi.driver');

// Login & Logout
Route::get('/login', [AuthController::class, 'tampilLogin'])->name('login');
Route::post('/login1', [AuthController::class, 'submitLogin'])->name('login.submit');

Route::get('/login', [LoginController::class, 'tampil_login'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('kirimdata');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


Route::prefix('driver')->middleware('auth')->group(function () {
    Route::get('/notifikasi', [DriverController::class, 'notifikasi'])->name('driver.notifikasi');
    Route::get('/konfirmasi', [DriverController::class, 'konfirmasiView'])->name('driver.konfirmasi.view');
    Route::post('/konfirmasi/{id}', [DriverController::class, 'konfirmasi'])->name('driver.konfirmasi');
    Route::get('/pembayaran', [DriverController::class, 'pembayaran'])->name('driver.pembayaran');

Route::get('/admin/dashboard', [AdminController::class, 'adminDashboard'])->name('admin.dashboard');
});
