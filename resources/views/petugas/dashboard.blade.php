@extends('layouts.app-petugas')

@section('title', 'Dashboard Petugas Pengangkut Sampah')

@section('content')
<div class="container-fluid px-4 py-4">
    <div class="row">
        <!-- Header Welcome -->
        <div class="col-12 mb-4">
            <div class="card shadow-sm border-0 overflow-hidden" style="background: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url('https://images.unsplash.com/photo-1500382017468-9049fed747ef?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80') center/cover no-repeat;">
                <div class="card-body text-white">
                    <h2 class="card-title text-white">Selamat Datang, Petugas</h2>
                    <p class="card-text">"Bersama jadikan Indramayu lebih bersih!"</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="badge bg-light text-dark">Jumat {{ \Carbon\Carbon::now()->format('d M Y') }}</span>
                        <div class="text-end">
                            <span class="fw-bold fs-4">31°</span>
                            <span class="text-white-50">Indramayu, Indonesia</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-6 mb-4">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body">
                            <h6 class="text-uppercase text-muted mb-2">Pengangkutan Hari Ini</h6>
                            <div class="d-flex justify-content-between align-items-center">
                                <h2 class="mb-0">2</h2>
                                <span class="badge bg-success bg-opacity-10 text-success">10.00% (30 hari)</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body">
                            <h6 class="text-uppercase text-muted mb-2">Total Pengangkutan Bulan Ini</h6>
                            <div class="d-flex justify-content-between align-items-center">
                                <h2 class="mb-0">50</h2>
                                <span class="badge bg-success bg-opacity-10 text-success">22.00% (30 hari)</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body">
                            <h6 class="text-uppercase text-muted mb-2">Volume Sampah (kg)</h6>
                            <div class="d-flex justify-content-between align-items-center">
                                <h2 class="mb-0">3,250</h2>
                                <span class="badge bg-success bg-opacity-10 text-success">2.00% (30 hari)</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Jadwal Pengangkutan Hari Ini -->
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-white border-0 py-3">
                    <strong><h5 class="mb-0"><i class="fas fa-calendar-day text-primary me-2"></i> Jadwal Pengangkutan Hari Ini</h5></strong>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Lokasi TPS</th>
                                    <th>Waktu</th>
                                    <th>Status</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>
                                        <div class="fw-semibold">TPS Pasar Baru</div>
                                        <small class="text-muted">Jl. Merdeka No.12</small>
                                    </td>
                                    <td>08:00 - 10:00</td>
                                    <td><span class="badge bg-warning">Dalam Proses</span></td>
                                    <td class="text-center">
                                        <button class="btn btn-sm btn-success" onclick="markComplete(this)">
                                            <i class="fas fa-check"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>
                                        <div class="fw-semibold">TPS Sudirman</div>
                                        <small class="text-muted">Jl. Sudirman No.45</small>
                                    </td>
                                    <td>13:00 - 15:00</td>
                                    <td><span class="badge bg-secondary">Belum Dimulai</span></td>
                                    <td class="text-center">
                                        <button class="btn btn-sm btn-outline-secondary" disabled>
                                            <i class="fas fa-clock"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Menu Layanan -->
        <div class="col-md-4">
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-white border-0 py-3">
                    <h5 class="mb-0">Menu Layanan</h5>
                </div>
                <div class="card-body p-0">
                    <div class="list-group list-group-flush">
                        <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center py-3">
                            <div>
                                <i class="fas fa-truck me-2 text-primary"></i>
                                <span>Jadwal Pengangkutan</span>
                            </div>
                            <i class="fas fa-chevron-right text-muted"></i>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center py-3">
                            <div>
                                <i class="fas fa-fingerprint me-2 text-success"></i>
                                <span>Presensi Harian</span>
                            </div>
                            <i class="fas fa-chevron-right text-muted"></i>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center py-3">
                            <div>
                                <i class="fas fa-trash-alt me-2 text-danger"></i>
                                <span>Peta Lokasi TPS</span>
                            </div>
                            <i class="fas fa-chevron-right text-muted"></i>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center py-3">
                            <div>
                                <i class="fas fa-exclamation-circle me-2 text-warning"></i>
                                <span>Laporan Operasional</span>
                            </div>
                            <i class="fas fa-chevron-right text-muted"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript untuk perubahan status -->
<script>
    function markComplete(button) {
        const row = button.closest('tr');
        const statusBadge = row.querySelector('.badge');
        
        // Ubah status menjadi selesai
        statusBadge.classList.remove('bg-warning');
        statusBadge.classList.add('bg-success');
        statusBadge.textContent = 'Selesai';
        
        // Nonaktifkan tombol
        button.disabled = true;
        button.classList.remove('btn-success');
        button.classList.add('btn-outline-success');
        
        // Tampilkan konfirmasi
        alert('Pengangkutan sampah telah berhasil dilaporkan!');
    }
</script>
@endsection