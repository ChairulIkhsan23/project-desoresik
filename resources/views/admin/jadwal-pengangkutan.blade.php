@extends('layouts.app-admin')

@section('title', 'Jadwal Pengangkutan')

@section('content')
    <h1 class="h3 mb-3"><strong>Jadwal</strong> Pengangkutan</h1>

    <div class="container-fluid mt-3">

        {{-- Tombol + Filter --}}
        <div class="btn-group h3 mb-3"">
            <a href="#" class="btn btn-primary btn-sm">
                <i data-feather="plus"></i> Tambah Jadwal
            </a>
        </div>

        {{-- Tabel Jadwal Pengangkutan --}}
        <div class="card mb-4">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped align-middle mb-0">
                        <thead class="table-success">
                            <tr>
                                <th style="width: 50px">No</th>
                                <th>Nama TPS</th>
                                <th>Petugas</th>
                                <th>Tanggal</th>
                                <th>Waktu</th>
                                <th>Status</th>
                                <th style="width: 120px">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>TPS Pasar Baru</td>
                                <td>Rina Kusuma</td>
                                <td>2025-04-15</td>
                                <td>08:00</td>
                                <td><span class="badge bg-warning text-dark">Diproses</span></td>
                                <td>
                                    <div class="d-flex gap-1">
                                        <a href="#" class="btn btn-sm btn-warning px-2"><i data-feather="edit"></i></a>
                                        <a href="#" class="btn btn-sm btn-danger px-2"><i data-feather="trash-2"></i></a>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        {{-- Pagination --}}
        <div class="mt-3 mb-4">
            <nav aria-label="Page navigation">
                <ul class="pagination justify-content-end">
                    <li class="page-item">
                        <a class="page-link btn btn-primary btn-sm me-1" href="#">Previous</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link btn btn-outline-primary btn-sm me-1" href="#">1</a>
                    </li>
                    <li class="page-item active">
                        <a class="page-link btn btn-primary btn-sm me-1" href="#">2</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link btn btn-outline-primary btn-sm me-1" href="#">3</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link btn btn-primary btn-sm" href="#">Next</a>
                    </li>
                </ul>
            </nav>
        </div>

        {{-- Tabel Laporan Pengangkutan --}}
        <h2 class="h5 mb-3"><strong>Laporan Pengangkutan</strong></h2>
        
        {{-- Tombol + Filter --}}
        <div class="btn-group h3 mb-3">
            <button type="button" class="btn btn-outline-primary btn-sm dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                Filter
            </button>
        <ul class="dropdown-menu dropdown-menu-end p-3" style="min-width: 300px;">
            <li class="mb-2">
                <label class="form-label mb-1">Hari</label>
                <select class="form-select form-select-sm">
                    <option selected>Pilih Hari</option>
                    <option>Minggu</option>
                    <option>Senin</option>
                    <option>Selasa</option>
                    <option>Rabu</option>
                    <option>Kamis</option>
                    <option>Jumat</option>
                    <option>Sabtu</option>
                </select>
            </li>
            <li class="mb-2">
                <label class="form-label mb-1">Bulan</label>
                <select class="form-select form-select-sm">
                    <option selected>Pilih Bulan</option>
                    @for($i = 1; $i <= 12; $i++)
                        <option>{{ DateTime::createFromFormat('!m', $i)->format('F') }}</option>
                    @endfor
                </select>
            </li>
            <li>
                <label class="form-label mb-1">Tahun</label>
                <select class="form-select form-select-sm">
                    <option selected>Pilih Tahun</option>
                    @for($year = 2023; $year <= now()->year + 1; $year++)
                        <option>{{ $year }}</option>
                    @endfor
                </select>
            </li>
            <li class="mt-3 d-grid">
                <button class="btn btn-primary btn-sm">Terapkan</button>
            </li>
        </ul>
        </div>
        
        <div class="card">
    <div class="card-body">
        <!-- Chart Section -->
        <div class="row mb-4">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <span>Grafik Timbulan Sampah (Ton)</span>
                        <select class="form-select form-select-sm" style="width: 150px;" id="chartFilter">
                            <option value="day">Harian</option>
                            <option value="week">Mingguan</option>
                            <option value="month">Bulanan</option>
                        </select>
                    </div>
                    <div class="card-body">
                        <canvas id="wasteChart" height="250"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100">
                    <div class="card-header">
                        Ringkasan Sampah
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3">
                            <div>
                                <h6 class="text-muted">Total Bulan Ini</h6>
                                <h3 class="mb-0">1,240.5 <small class="text-muted">Ton</small></h3>
                            </div>
                            <div class="avatar">
                                <span class="avatar-initial rounded bg-label-primary">
                                    <i class="bi bi-trash"></i>
                                </span>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between mb-3">
                            <div>
                                <h6 class="text-muted">Rata-rata Harian</h6>
                                <h3 class="mb-0">41.35 <small class="text-muted">Ton</small></h3>
                            </div>
                            <div class="avatar">
                                <span class="avatar-initial rounded bg-label-warning">
                                    <i class="bi bi-calendar"></i>
                                </span>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div>
                                <h6 class="text-muted">Tertinggi</h6>
                                <h3 class="mb-0">120.9 <small class="text-muted">Ton</small></h3>
                                <small class="text-muted">15 Apr 2025</small>
                            </div>
                            <div class="avatar">
                                <span class="avatar-initial rounded bg-label-danger">
                                    <i class="bi bi-graph-up-arrow"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Table Section -->
        <div class="card">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped align-middle mb-0">
                        <thead class="table-success">
                            <tr>
                                <th style="width: 50px">No</th>
                                <th>Status Laporan</th>
                                <th>Foto</th>
                                <th>Catatan</th>
                                <th>Timbulan Sampah/Ton</th>
                                <th>Waktu Lapor</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td><span class="badge bg-success">Selesai</span></td>
                                <td class="text-center">
                                    <img src="{{ asset('assets/img/photos/container-kosong.jpg') }}" width="60" height="60" style="object-fit: cover;" class="rounded">
                                </td>
                                <td>Tugas selesai dengan aman, tidak ada kendala.</td>
                                <td>100.900</td>
                                <td>2025-04-15 09:20</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Sample data for the chart
        const wasteData = {
            day: {
                labels: ['1 Apr', '2 Apr', '3 Apr', '4 Apr', '5 Apr', '6 Apr', '7 Apr', '8 Apr', '9 Apr', '10 Apr', '11 Apr', '12 Apr', '13 Apr', '14 Apr', '15 Apr'],
                data: [45.2, 38.7, 42.1, 50.3, 55.6, 48.9, 52.4, 60.1, 58.3, 62.7, 70.2, 75.5, 120.9, 75.5, 100.9]
            },
            week: {
                labels: ['Minggu 1', 'Minggu 2', 'Minggu 3', 'Minggu 4'],
                data: [180.4, 210.7, 245.3, 320.1]
            },
            month: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
                data: [980.5, 1020.3, 1105.7, 1240.5, 0, 0, 0, 0, 0, 0, 0, 0]
            }
        };

        // Initialize chart
        const ctx = document.getElementById('wasteChart').getContext('2d');
        const wasteChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: wasteData.day.labels,
                datasets: [{
                    label: 'Timbulan Sampah (Ton)',
                    data: wasteData.day.data,
                    backgroundColor: '#00a854',
                    borderColor: '#008a46',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                return context.parsed.y.toFixed(1) + ' Ton';
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Ton'
                        }
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Tanggal'
                        }
                    }
                }
            }
        });

        // Filter chart data
        document.getElementById('chartFilter').addEventListener('change', function() {
            const period = this.value;
            wasteChart.data.labels = wasteData[period].labels;
            wasteChart.data.datasets[0].data = wasteData[period].data;
            wasteChart.update();
        });

        // Highlight row on hover
        const tableRows = document.querySelectorAll('tbody tr');
        tableRows.forEach(row => {
            row.addEventListener('mouseenter', function() {
                const wasteAmount = parseFloat(this.cells[4].textContent);
                highlightChart(wasteAmount);
            });
            row.addEventListener('mouseleave', function() {
                resetChartHighlight();
            });
        });

        function highlightChart(value) {
            wasteChart.data.datasets[0].backgroundColor = wasteChart.data.datasets[0].data.map(d => 
                d === value ? '#ff5722' : '#00a854'
            );
            wasteChart.update();
        }

        function resetChartHighlight() {
            wasteChart.data.datasets[0].backgroundColor = '#00a854';
            wasteChart.update();
        }
    });
</script>
    <script>
        feather.replace();
    </script>
@endsection
