<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BerandaController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\EkskulController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\AutentikasiController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AdminBeritaController;
use App\Http\Controllers\Admin\AdminEkskulController;
use App\Http\Controllers\Admin\AdminGaleriController;
use App\Http\Controllers\Admin\AdminProfilController;

// Rute Halaman Publik
Route::get('/', [BerandaController::class, 'index'])->name('beranda');
Route::get('/profil', [ProfilController::class, 'index'])->name('profil');
Route::get('/ekstrakurikuler', [EkskulController::class, 'index'])->name('ekskul');
Route::get('/galeri', [GaleriController::class, 'index'])->name('galeri');
Route::get('/berita', [BeritaController::class, 'index'])->name('berita.index');
Route::get('/berita/{slug}', [BeritaController::class, 'show'])->name('berita.detail');

// Rute Autentikasi Pengelola
Route::get('/masuk', [AutentikasiController::class, 'tampilkanFormLogin'])->name('masuk');
Route::post('/masuk', [AutentikasiController::class, 'prosesLogin'])->name('masuk.proses');
Route::post('/keluar', [AutentikasiController::class, 'keluar'])->name('keluar');

// Rute Admin Panel CRUD (Wajib Login)
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('berita', AdminBeritaController::class)->parameters(['berita' => 'id'])->except(['show']);
    Route::resource('ekskul', AdminEkskulController::class)->parameters(['ekskul' => 'id'])->except(['show']);
    Route::resource('galeri', AdminGaleriController::class)->parameters(['galeri' => 'id'])->except(['show']);
    Route::get('/profil', [AdminProfilController::class, 'index'])->name('profil.index');
    Route::put('/profil', [AdminProfilController::class, 'update'])->name('profil.update');
});
