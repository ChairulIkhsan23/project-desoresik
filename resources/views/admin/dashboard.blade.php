@extends('layouts.app')

@section('title', 'Dashboard Umum')

@section('content')
    <h1 class="h3 mb-3"><strong>Dashboard</strong> Umum</h1>

    <div class="row">
        <!-- Card Statistik -->
        <div class="col-12 col-lg-3">
            <div class="card">
                <div class="card-body d-flex align-items-center">
                    <div class="me-3">
                        <i class="align-middle text-primary" data-feather="users"></i>
                    </div>
                    <div>
                        <h5 class="card-title mb-0">Total Petugas</h5>
                        <h2 class="mb-0">12</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-3">
            <div class="card">
                <div class="card-body d-flex align-items-center">
                    <div class="me-3">
                        <i class="align-middle text-success" data-feather="map"></i>
                    </div>
                    <div>
                        <h5 class="card-title mb-0">Total TPS</h5>
                        <h2 class="mb-0">8</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-3">
            <div class="card">
                <div class="card-body d-flex align-items-center">
                    <div class="me-3">
                        <i class="align-middle text-warning" data-feather="truck"></i>
                    </div>
                    <div>
                        <h5 class="card-title mb-0">Total Pengangkutan</h5>
                        <h2 class="mb-0">35</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-3">
            <div class="card">
                <div class="card-body d-flex align-items-center">
                    <div class="me-3">
                        <i class="align-middle text-danger" data-feather="alert-triangle"></i>
                    </div>
                    <div>
                        <h5 class="card-title mb-0">Total Laporan Kendala</h5>
                        <h2 class="mb-0">5</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <!-- Tabel Laporan Pengangkutan Terbaru -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Laporan Pengangkutan Terbaru</h5>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tanggal</th>
                                    <th>Petugas</th>
                                    <th>TPS</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>2025-04-10</td>
                                    <td>Budi</td>
                                    <td>TPS A</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>2025-04-09</td>
                                    <td>Ani</td>
                                    <td>TPS B</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>2025-04-08</td>
                                    <td>Joko</td>
                                    <td>TPS C</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tabel Jadwal Terbaru -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Jadwal Terbaru</h5>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tanggal</th>
                                    <th>Petugas</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>2025-04-11</td>
                                    <td>Rina</td>
                                    <td><span class="badge bg-success">Selesai</span></td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>2025-04-12</td>
                                    <td>Andi</td>
                                    <td><span class="badge bg-warning">Diproses</span></td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>2025-04-13</td>
                                    <td>Dewi</td>
                                    <td><span class="badge bg-warning">Diproses</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        feather.replace();
    </script>
@endsection