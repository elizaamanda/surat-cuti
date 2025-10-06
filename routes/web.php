<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\CutiController;
use App\Http\Controllers\RekapCutiController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Halaman awal → redirect ke dashboard
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

// =========================
// LOGIN & DASHBOARD
// =========================

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');

Route::get('/dashboard', [LoginController::class, 'dashboard'])->name('dashboard')->middleware('auth');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
// =========================
// PEGAWAI
// =========================
Route::resource('pegawai', PegawaiController::class)->except(['show']);

// =========================
// CUTI
// =========================
Route::resource('cuti', CutiController::class);

// Aksi tambahan cuti
Route::patch('/cuti/{id}/setujui', [CutiController::class, 'setujui'])->name('cuti.setujui');
Route::patch('/cuti/{id}/tolak', [CutiController::class, 'tolak'])->name('cuti.tolak');
Route::get('/cuti/kalender', [CutiController::class, 'kalender'])->name('cuti.kalender');

// =========================
// REKAP CUTI
// =========================
Route::get('/rekap-cuti', [CutiController::class, 'rekap'])->name('rekap.cuti');

