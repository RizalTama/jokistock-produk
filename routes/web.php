<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginKaryawan;



Route::get('/', [LoginController::class, 'index'])->name('login.form'); // untuk tampilkan form
Route::post('/login', [LoginController::class, 'login'])->name('login'); // login

Route::get('/dashboard', function () {          
    return view('dashboard');
})->name('dashboard');
Route::get('/stock', function () {
    return view('stock');
})->name('stock');
Route::get('/profile', function () {
    return view('profile');
})->name('profile');
Route::get('/admin/login', function () {
    return view('admin.login');
})->name('admin.login');
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard.dashboard');
})->name('admin.dashboard');
Route::get('/admin/kelola-stock', function () {
    return view('admin.kelola-stock.kelolaStock');
})->name('admin.kelola-stock');

Route::get('/admin/kelola-karyawan', function () {
    return view('admin.kelola-karyawan.karyawan');
})->name('admin.karyawan');

Route::get('/admin/profile', function () {
    return view('admin.profile.profilAdmin');
})->name('admin.profile');


