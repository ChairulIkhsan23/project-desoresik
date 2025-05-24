<?php $__env->startSection('title', 'Laporan Kendala'); ?>

<?php $__env->startSection('content'); ?>
    <h1 class="h3 mb-3"><strong>Laporan</strong> Kendala</h1>

    <div class="container-fluid mt-3">

        
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
                    <?php for($i = 1; $i <= 12; $i++): ?>
                        <option><?php echo e(DateTime::createFromFormat('!m', $i)->format('F')); ?></option>
                    <?php endfor; ?>
                </select>
            </li>
            <li>
                <label class="form-label mb-1">Tahun</label>
                <select class="form-select form-select-sm">
                    <option selected>Pilih Tahun</option>
                    <?php for($year = 2023; $year <= now()->year + 1; $year++): ?>
                        <option><?php echo e($year); ?></option>
                    <?php endfor; ?>
                </select>
            </li>
            <li class="mt-3 d-grid">
                <button class="btn btn-primary btn-sm">Terapkan</button>
            </li>
        </ul>
        </div>

        
        <div class="card mb-4">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped align-middle mb-0">
                        <thead class="table-success">
                            <tr>
                                <th style="width: 50px">No</th>
                                <th>Petugas</th>
                                <th>Jadwal</th>
                                <th>Deskripsi</th>
                                <th>Foto</th>
                                <th>Waktu Lapor</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Rina Kusuma</td>
                                <td>2025-04-15 08:00</td>
                                <td>Kendala pada pengangkutan di TPS Pasar Baru, truk rusak.</td>
                                <td class="text-center">
                                    <img src="<?php echo e(asset('assets/img/photos/truk-rusak.jpg')); ?>" width="60" height="60" style="object-fit: cover;" class="rounded">
                                </td>
                                <td>2025-04-15 09:20</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Andi Prasetya</td>
                                <td>2025-04-16 07:30</td>
                                <td>Terjadi macet parah di jalan menuju TPS Jatinegara.</td>
                                <td class="text-center">
                                    <img src="<?php echo e(asset('assets/img/photos/jalan-macet.jpg')); ?>" width="60" height="60" style="object-fit: cover;" class="rounded">
                                </td>
                                <td>2025-04-16 08:15</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        
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

    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script>
        feather.replace();
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app-admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\project-desoresik\resources\views/admin/kendala/index.blade.php ENDPATH**/ ?>