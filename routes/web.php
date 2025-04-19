<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StockController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileAdminController;
use App\Http\Controllers\KelolakaryawanController;
use App\Http\Controllers\ProfileKaryawanController;


Route::get('/', [AuthController::class, 'index'])->name('login.form'); 
Route::get('/stock', [StockController::class, 'index'])->name('stock'); 
Route::get('/profile', [ProfileKaryawanController::class, 'index'])->name('profileKaryawan'); 
Route::delete('/produk/{produk_id}', [StockController::class, 'destroy'])->name('produk.destroy');
Route::get('/logout', [AuthController::class, 'logoutKaryawan'])->name('logout');
Route::post('/login', [AuthController::class, 'loginkaryawan'])->name('login');
Route::post('/produk/store', [StockController::class, 'store'])->name('produk.store');
Route::put('/produk/{produk_id}', [StockController::class, 'update'])->name('produk.update');
Route::get('/dashboard', [DashboardController::class, 'indexKaryawan'])->name('dashboard'); 



// ======================================   ADMIN   ========================================
Route::post('/admin/login', [AuthController::class, 'loginAdmin'])->name('login.admin');
Route::get('/admin/stock', [StockController::class, 'indexAdmin'])->name('stock.admin'); 
Route::get('/admin/dashboard', [DashboardController::class, 'indexAdmin'])->name('admin.dashboard'); 
Route::post('/admin/produk/store', [StockController::class, 'storeProdukAdmin'])->name('produk.storeAdmin');
Route::get('/admin/logout', [AuthController::class, 'logoutAdmin'])->name('logout.admin');
Route::get('/admin/profile', [ProfileAdminController::class, 'index'])->name('profileAdmin'); 
Route::get('/admin/kelola-karyawan', [KelolakaryawanController::class, 'index'])->name('kelolaKaryawan');
Route::post('/admin/karyawan/store', [KelolakaryawanController::class, 'storeKaryawan'])->name('karyawan.store');
Route::delete('/admin/karyawan/{karyawan_id}', [KelolakaryawanController::class, 'destroy'])->name('karyawan.destroy'); 
Route::put('/admin/karyawan/{karyawan_id}', [KelolakaryawanController::class, 'updateKaryawan'])->name('karyawan.update');
Route::get('/admin/logout', [AuthController::class, 'logoutAdmin'])->name('logout.admin');



Route::get('/admin/login', function () {
    return view('admin.login');
})->name('admin.login');








