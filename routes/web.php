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
use App\Http\Controllers\Admin\ArmadaController as AdminArmadaController;

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
    // Dashboard
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    // CRUD Petugas
    Route::get('/petugas', [PetugasController::class, 'index'])->name('petugas.index');
    Route::get('/petugas/create', [PetugasController::class, 'create'])->name('petugas.create');
    Route::post('/petugas', [PetugasController::class, 'store'])->name('petugas.store');
    Route::get('/petugas/{petugas}/edit', [PetugasController::class, 'edit'])->name('petugas.edit');
    Route::put('/petugas/{petugas}', [PetugasController::class, 'update'])->name('petugas.update');
    Route::delete('/petugas/{petugas}', [PetugasController::class, 'destroy'])->name('petugas.destroy');


    // Halaman Data TPS
    Route::get('/tps', [AdminTpsController::class, 'index'])->name('tps.index');
    Route::get('/tps/create', [AdminTpsController::class, 'create'])->name('tps.create');
    Route::post('/tps', [AdminTpsController::class, 'store'])->name('tps.store');
    Route::get('/tps/{tp}/edit', [AdminTpsController::class, 'edit'])->name('tps.edit');
    Route::put('/tps/{tp}', [AdminTpsController::class, 'update'])->name('tps.update');
    Route::delete('/tps/{tp}', [AdminTpsController::class, 'destroy'])->name('tps.destroy');
    Route::get('/tps/data', [AdminTpsController::class, 'getTpsData'])->name('tps.data');


    // Halaman Jadwal Pengangkutan
    Route::get('/jadwal-pengangkutan', [AdminJadwalController::class, 'index'])->name('jadwal-pengangkutan');

    // Halaman Laporan Kendala
    Route::get('/laporan-kendala', [AdminKendalaController::class, 'index'])->name('laporan-kendala');

    // Halaman Absensi
    Route::get('/absensi', [AdminAbsensiController::class, 'index'])->name('absensi.index');

    // Halaman Data Armada
    Route::get('/armada', [AdminArmadaController::class, 'index'])->name('armada.index');
    Route::get('/armada/create', [AdminArmadaController::class, 'create'])->name('armada.create');
    Route::post('/armada', [AdminArmadaController::class, 'store'])->name('armada.store');
    Route::get('/armada/{armada}/edit', [AdminArmadaController::class, 'edit'])->name('armada.edit');
    Route::put('/armada/{armada}', [AdminArmadaController::class, 'update'])->name('armada.update');
    Route::delete('/armada/{armada}', [AdminArmadaController::class, 'destroy'])->name('armada.destroy');
});

// =====================
// PETUGAS Routes
// =====================
Route::prefix('petugas')->name('petugas.')->group(function () {
    Route::get('/dashboard', [PetugasDashboardController::class, 'index'])->name('dashboard');
    Route::get('/profil', [ProfilController::class, 'index'])->name('profil-petugas');
    Route::get('/lokasi-tps', [PetugasTpsController::class, 'index'])->name('lokasi-tps');
    Route::get('/jadwal-pengangkutan', [PetugasJadwalController::class, 'index'])->name('jadwal-pengangkutan');
    Route::get('/laporan-pengangkutan', [PetugasLaporanController::class, 'index'])->name('laporan-pengangkutan');
    Route::get('/laporan-kendala', [PetugasKendalaController::class, 'index'])->name('laporan-kendala');
    Route::get('/absensi', [PetugasAbsensiController::class, 'index'])->name('absensi');
});

// =====================
// AUTH Routes
// =====================
Route::get('login/petugas', [AuthenticatedSessionController::class, 'petugasCreate'])->name('login.petugas');
Route::post('login/petugas', [AuthenticatedSessionController::class, 'petugasStore']);

Route::get('login/admin', [AuthenticatedSessionController::class, 'adminCreate'])->name('login.admin');
