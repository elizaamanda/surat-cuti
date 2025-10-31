<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\CutiController;

// =========================
// LOGIN
// =========================
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// =========================
// ADMIN
// =========================
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// =========================
// PEGAWAI
// =========================
Route::get('/pegawai-dashboard', [DashboardController::class, 'pegawai'])->name('pegawai.dashboard');
Route::get('/pegawai/profile', [DashboardController::class, 'profile'])->name('pegawai.profile');
Route::get('/pegawai/profile/edit', [DashboardController::class, 'editProfile'])->name('pegawai.profile.edit');
Route::post('/pegawai/profile/update', [DashboardController::class, 'updateProfile'])->name('pegawai.profile.update');

// =========================
// DATA PEGAWAI
// =========================
Route::resource('pegawai', PegawaiController::class)->except(['show']);
Route::get('/pegawai/profile', [PegawaiController::class, 'profile'])->name('pegawai.profile');



// =========================
// CUTI - ADMIN
// =========================
Route::resource('cuti', CutiController::class);
Route::get('/cuti/admin', [CutiController::class, 'adminIndex'])->name('cuti.admin');
Route::put('/cuti/{id}/setuju', [CutiController::class, 'setuju'])->name('cuti.setuju');
Route::put('/cuti/{id}/tolak', [CutiController::class, 'tolak'])->name('cuti.tolak');

// =========================
// CUTI - PEGAWAI
// =========================
Route::get('/cuti/pegawai', [CutiController::class, 'pegawaiIndex'])->name('cuti.pegawai');
Route::get('/cuti/create', [CutiController::class, 'create'])->name('cuti.create');
Route::post('/cuti/store', [CutiController::class, 'store'])->name('cuti.store');
Route::get('/cuti/{id}/print', [CutiController::class, 'print'])->name('cuti.print');


// =========================
// REKAP CUTI
// =========================
Route::get('/rekap-cuti', [CutiController::class, 'rekap'])->name('rekap.cuti');
