<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

// ADMIN Controllers
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\PetugasController;
use App\Http\Controllers\Admin\TpsController as AdminTpsController;
use App\Http\Controllers\Admin\JadwalPengangkutanController as AdminJadwalController;
use App\Http\Controllers\Admin\KendalaController as AdminKendalaController;
use App\Http\Controllers\Admin\AbsensiController as AdminAbsensiController;

// PETUGAS Controllers
use App\Http\Controllers\Petugas\DashboardController as PetugasDashboardController;
use App\Http\Controllers\Petugas\ProfilController;
use App\Http\Controllers\Petugas\TpsController as PetugasTpsController;
use App\Http\Controllers\Petugas\JadwalController as PetugasJadwalController;
use App\Http\Controllers\Petugas\LaporanController as PetugasLaporanController;
use App\Http\Controllers\Petugas\KendalaController as PetugasKendalaController;
use App\Http\Controllers\Petugas\AbsensiController as PetugasAbsensiController;

Route::get('/', function () {
    return view('welcome');
});

// =====================
// ADMIN Routes
// =====================
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::get('/data-petugas', [PetugasController::class, 'index'])->name('data-petugas');
    Route::get('/lokasi-tps', [AdminTpsController::class, 'index'])->name('lokasi-tps');
    Route::get('/jadwal-pengangkutan', [AdminJadwalController::class, 'index'])->name('jadwal-pengangkutan');
    Route::get('/laporan-kendala', [AdminKendalaController::class, 'index'])->name('laporan-kendala');
    Route::get('/absensi', [AdminAbsensiController::class, 'index'])->name('absensi');
});

// =====================
// PETUGAS Routes
// =====================
Route::prefix('petugas')->name('petugas.')->group(function () {
    Route::get('/dashboard', [PetugasDashboardController::class, 'index'])->name('dashboard');
    Route::get('/profil', [ProfilController::class, 'index'])->name('profil-petugas');
    Route::get('/lokasi-tps', [PetugasTpsController::class, 'index'])->name('lokasi-tps');
    Route::get('/jadwal-pengangkutan', [PetugasJadwalController::class, 'index'])->name('jadwal-pengangkutan');
    Route::get('/laporan-pengangkutan', [PetugasLaporanController::class, 'index'])->name('jadwal-pengangkutan');
    Route::get('/laporan-kendala', [PetugasKendalaController::class, 'index'])->name('laporan-kendala');
    Route::get('/absensi', [PetugasAbsensiController::class, 'index'])->name('absensi');
});

// =====================
// AUTH Routes
// =====================
Route::get('login/petugas', [AuthenticatedSessionController::class, 'petugasCreate'])->name('login.petugas');
Route::post('login/petugas', [AuthenticatedSessionController::class, 'petugasStore']);

Route::get('login/admin', [AuthenticatedSessionController::class, 'adminCreate'])->name('login.admin');
