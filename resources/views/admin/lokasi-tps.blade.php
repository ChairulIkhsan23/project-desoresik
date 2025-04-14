@extends('layouts.app-admin')

@section('title', 'Data TPS')

@section('content')
    <h1 class="h3 mb-3"><strong>Data</strong> TPS</h1>

    <div class="container-fluid mt-3">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <a href="#" class="btn btn-primary btn-sm">
                <i data-feather="plus"></i> Tambah TPS
            </a>
        </div>

        <div class="card">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped align-middle mb-0">
                        <thead class="table-success">
                            <tr>
                                <th style="width: 50px">No</th>
                                <th>Nama TPS</th>
                                <th>Alamat</th>
                                <th>Koordinat</th>
                                <th style="width: 180px">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Data Dummy -->
                            <tr>
                                <td>1</td>
                                <td>TPS Blok A</td>
                                <td>Jalan Melati No. 12, Indramayu</td>
                                <td>-6.3375, 108.3257</td>
                                <td>
                                    <div class="d-flex gap-1">
                                        <a href="#" class="btn btn-sm btn-warning px-2"><i data-feather="edit"></i></a>
                                        <a href="#" class="btn btn-sm btn-danger px-2"><i data-feather="trash-2"></i></a>
                                        <a href="#" class="btn btn-sm btn-info px-2 text-white" title="Tampilkan di Peta"><i data-feather="map-pin"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>TPS Pasar Baru</td>
                                <td>Jl. Raya Barat No. 5, Indramayu</td>
                                <td>-6.3412, 108.3311</td>
                                <td>
                                    <div class="d-flex gap-1">
                                        <a href="#" class="btn btn-sm btn-warning px-2"><i data-feather="edit"></i></a>
                                        <a href="#" class="btn btn-sm btn-danger px-2"><i data-feather="trash-2"></i></a>
                                        <a href="#" class="btn btn-sm btn-info px-2 text-white" title="Tampilkan di Peta"><i data-feather="map-pin"></i></a>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Pagination -->
        <div class="mt-3">
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

        <!-- Peta Sebaran -->
        <div class="card mt-4">
            <div class="card-header table-success d-flex flex-wrap justify-content-between align-items-center">
                <strong class="mb-2 mb-md-0">Peta Sebaran TPS</strong>
                
                <!-- Kolom Pencarian -->
                <div class="input-group input-group-sm w-100 w-md-50" style="max-width: 350px;">
                    <input type="text" id="searchTPS" class="form-control border-success" placeholder="Cari nama TPS atau lokasi...">
                    <button class="btn btn-success" onclick="searchLocation()">
                        <i data-feather="search"></i>
                    </button>
                </div>
            </div>
            <div class="card-body p-0">
                <div id="map" style="height: 400px; width: 100%;"></div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        feather.replace();

        // Dummy map init pakai Leaflet JS
        var map = L.map('map').setView([-6.3375, 108.3257], 13);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; OpenStreetMap contributors'
        }).addTo(map);

        // Dummy markers
        L.marker([-6.3375, 108.3257]).addTo(map).bindPopup('TPS Blok A');
        L.marker([-6.3412, 108.3311]).addTo(map).bindPopup('TPS Pasar Baru');
    </script>
@endsection
@section('scripts')
    <script>
        feather.replace();
    </script>
    
    <!-- Tambahkan sebelum penutup </body> -->
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
@endsection