<?php

use App\Http\Controllers\Admin\AbsensiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\JadwalPengangkutanController;
use App\Http\Controllers\Admin\KendalaController;
use App\Http\Controllers\Admin\PetugasController;
use App\Http\Controllers\Admin\TpsController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
Route::get('/admin/data-petugas', [PetugasController::class, 'index'])->name('admin.data-petugas');
Route::get('/admin/lokasi-tps', [TpsController::class, 'index'])->name('admin.lokasi-tps');
Route::get('/admin/jadwal-pengangkutan', [JadwalPengangkutanController::class, 'index'])->name('admin.jadwal-pengangkutan');
Route::get('/admin/laporan-kendala', [KendalaController::class, 'index'])->name('admin.laporan-kendala');
Route::get('/admin/absensi', [AbsensiController::class, 'index'])->name('admin.absensi');

Route::get('login/petugas', [AuthenticatedSessionController::class, 'petugasCreate'])->name('login.petugas');
Route::post('login/petugas', [AuthenticatedSessionController::class, 'petugasStore']);

Route::get('login/admin', [AuthenticatedSessionController::class, 'adminCreate'])->name('login.admin');
Route::post('login/admin', [AuthenticatedSessionController::class, 'adminStore']);

