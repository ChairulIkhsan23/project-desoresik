@extends('layouts.app-admin')

@section('title', 'Data TPS')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-3"><strong>Data</strong> TPS</h1>

    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div>
                <i class="fas fa-table me-1"></i>
                Daftar TPS
            </div>
            <a href="{{ route('admin.tps.create') }}" class="btn btn-primary btn-sm">
                <i data-feather="plus"></i> Tambah TPS
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead class="table-success">
                        <tr>
                            <th width="50px">No</th>
                            <th>Nama TPS</th>
                            <th>Alamat</th>
                            <th>Koordinat</th>
                            <th width="150px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tpsList as $index => $tps)
                            <tr>
                                <td>{{ $index + 1 + (($tpsList->currentPage() - 1) * $tpsList->perPage()) }}</td>
                                <td>{{ $tps->nama_tps }}</td>
                                <td>{{ $tps->alamat }}</td>
                                <td>
                                    @if($tps->latitude && $tps->longitude)
                                        {{ number_format($tps->latitude, 6) }}, {{ number_format($tps->longitude, 6) }}
                                    @else
                                        <span class="text-muted">Tidak ada koordinat</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <a href="{{ route('admin.tps.edit', $tps->id) }}" class="btn btn-sm btn-warning" title="Edit">
                                            <i data-feather="edit-2"></i>
                                        </a>
                                        <form action="{{ route('admin.tps.destroy', $tps->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Hapus data ini?')" title="Hapus">
                                                <i data-feather="trash-2"></i>
                                            </button>
                                        </form>
                                        @if($tps->latitude && $tps->longitude)
                                            <button class="btn btn-sm btn-info text-white" disabled title="Koordinat tersedia">
                                                <i data-feather="map-pin"></i>
                                            </button>
                                        @else
                                            <button class="btn btn-sm btn-secondary" disabled title="Koordinat tidak tersedia">
                                                <i data-feather="map-pin"></i>
                                            </button>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-3">
                {{ $tpsList->links() }}
            </div>
        </div>
    </div>

    <!-- Peta Mapbox -->
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div>
                <i class="fas fa-map me-1"></i>
                Peta Sebaran TPS
            </div>
        </div>
        <div class="card-body p-0">
            <div id="map" style="height: 500px; width: 100%;"></div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<!-- Mapbox GL JS -->
<script src='https://api.mapbox.com/mapbox-gl-js/v3.11.1/mapbox-gl.js'></script>
<link href='https://api.mapbox.com/mapbox-gl-js/v3.11.1/mapbox-gl.css' rel='stylesheet' />

<script>
    // Token Mapbox
    mapboxgl.accessToken = '{{ env("MAPBOX_ACCESS_TOKEN") }}';

    // Data TPS dari Controller

    // Membuat peta dengan Mapbox
    const map = new mapboxgl.Map({
        container: 'map', // ID kontainer untuk peta
        style: 'mapbox://styles/mapbox/streets-v11',
        center: [107.6191, -6.9175], // Sesuaikan pusat peta dengan koordinat yang diinginkan
        zoom: 12
    });

    // Menambahkan marker untuk setiap TPS yang ada
    tpsData.forEach(tps => {
        if (tps.latitude && tps.longitude) {
            new mapboxgl.Marker()
                .setLngLat([tps.longitude, tps.latitude]) // Koordinat TPS
                .setPopup(new mapboxgl.Popup().setHTML(`<strong>${tps.nama_tps}</strong><br>${tps.alamat}`)) // Info popup
                .addTo(map); // Menambahkan marker ke peta
        }
    });

    // Menambahkan marker TPS baru saat peta diklik
    map.on('click', function (e) {
        const nama = prompt("Masukkan nama TPS:");
        const alamat = prompt("Masukkan alamat:");
        if (!nama || !alamat) return;

        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        // Mengirimkan data TPS baru ke server
        fetch('/admin/tps', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken
            },
            body: JSON.stringify({
                nama_tps: nama,
                alamat: alamat,
                latitude: e.lngLat.lat,
                longitude: e.lngLat.lng
            })
        })
        .then(res => res.json())
        .then(data => {
            alert(data.message); // Tampilkan pesan sukses

            // Menambahkan marker baru ke peta setelah data berhasil disimpan
            const newMarker = new mapboxgl.Marker()
                .setLngLat([e.lngLat.lng, e.lngLat.lat]) // Koordinat baru
                .setPopup(new mapboxgl.Popup().setHTML(`<strong>${nama}</strong><br>${alamat}`)) // Info popup
                .addTo(map);

            // Menambahkan TPS baru ke dalam data window.tpsData
            tpsData.push({
                nama_tps: nama,
                alamat: alamat,
                latitude: e.lngLat.lat,
                longitude: e.lngLat.lng
            });
        });
    });
</script>
@endsection
