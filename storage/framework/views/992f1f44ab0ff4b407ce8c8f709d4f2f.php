<?php $__env->startSection('title', 'Data TPS'); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <h1 class="h3 mb-3"><strong>Data</strong> TPS</h1>

    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div>
                <i class="fas fa-table me-1"></i>
                Daftar TPS
            </div>
            <a href="<?php echo e(route('admin.tps.create')); ?>" class="btn btn-primary btn-sm">
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
                        <?php $__currentLoopData = $tpsList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $tps): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($index + 1 + (($tpsList->currentPage() - 1) * $tpsList->perPage())); ?></td>
                                <td><?php echo e($tps->nama_tps); ?></td>
                                <td><?php echo e($tps->alamat); ?></td>
                                <td>
                                    <?php if($tps->latitude && $tps->longitude): ?>
                                        <?php echo e(number_format($tps->latitude, 6)); ?>, <?php echo e(number_format($tps->longitude, 6)); ?>

                                    <?php else: ?>
                                        <span class="text-muted">Tidak ada koordinat</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <a href="<?php echo e(route('admin.tps.edit', $tps->id)); ?>" class="btn btn-sm btn-warning" title="Edit">
                                            <i data-feather="edit-2"></i>
                                        </a>
                                        <form action="<?php echo e(route('admin.tps.destroy', $tps->id)); ?>" method="POST" class="d-inline">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Hapus data ini?')" title="Hapus">
                                                <i data-feather="trash-2"></i>
                                            </button>
                                        </form>
                                        <?php if($tps->latitude && $tps->longitude): ?>
                                            <button class="btn btn-sm btn-info text-white" disabled title="Koordinat tersedia">
                                                <i data-feather="map-pin"></i>
                                            </button>
                                        <?php else: ?>
                                            <button class="btn btn-sm btn-secondary" disabled title="Koordinat tidak tersedia">
                                                <i data-feather="map-pin"></i>
                                            </button>
                                        <?php endif; ?>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
            <div class="mt-3">
                <?php echo e($tpsList->links()); ?>

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
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<!-- Mapbox GL JS -->
<script src='https://api.mapbox.com/mapbox-gl-js/v3.11.1/mapbox-gl.js'></script>
<link href='https://api.mapbox.com/mapbox-gl-js/v3.11.1/mapbox-gl.css' rel='stylesheet' />

<script>
    // Token Mapbox
    mapboxgl.accessToken = '<?php echo e(env("MAPBOX_ACCESS_TOKEN")); ?>';

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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app-admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\project-desoresik\resources\views/admin/tps/index.blade.php ENDPATH**/ ?>