<?php $__env->startSection('title', 'Absensi Petugas'); ?>

<?php $__env->startSection('content'); ?>
    <h1 class="h3 mb-3"><strong>Absensi</strong> Petugas</h1>

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
                                <th>Tanggal</th>
                                <th>Jam Masuk</th>
                                <th>Jam Keluar</th>
                                <th>Status</th>
                                <th>Catatan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Rina Kusuma</td>
                                <td>2025-04-15</td>
                                <td>08:00</td>
                                <td>16:00</td>
                                <td><span class="badge bg-success">Hadir</span></td>
                                <td>Tugas selesai dengan baik, tidak ada masalah.</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Andi Prasetya</td>
                                <td>2025-04-15</td>
                                <td>09:00</td>
                                <td>15:00</td>
                                <td><span class="badge bg-warning">Izin</span></td>
                                <td>Meminta izin karena sakit, sudah diberi pengganti tugas.</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Bagus Setiawan</td>
                                <td>2025-04-15</td>
                                <td>08:30</td>
                                <td>14:30</td>
                                <td><span class="badge bg-danger">Sakit</span></td>
                                <td>Tidak bisa hadir karena sakit, dirujuk ke dokter.</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        
        <div class="mt-3 mb-4">
            <nav aria-label="Page navigation">
                <ul class="pagination justify-content-end">
                    <!-- Previous Page Link -->
                    <?php if($petugas->onFirstPage()): ?>
                        <li class="page-item disabled">
                            <a class="page-link btn btn-primary btn-sm me-1" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                        </li>
                    <?php else: ?>
                        <li class="page-item">
                            <a class="page-link btn btn-primary btn-sm me-1" href="<?php echo e($petugas->previousPageUrl()); ?>">Previous</a>
                        </li>
                    <?php endif; ?>

                    <!-- Pagination Links -->
                    <?php $__currentLoopData = $petugas->getUrlRange(1, $petugas->lastPage()); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="page-item <?php echo e($petugas->currentPage() == $page ? 'active' : ''); ?>">
                            <a class="page-link btn <?php echo e($petugas->currentPage() == $page ? 'btn-primary' : 'btn-outline-primary'); ?> btn-sm me-1" href="<?php echo e($url); ?>"><?php echo e($page); ?></a>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <!-- Next Page Link -->
                    <?php if($petugas->hasMorePages()): ?>
                        <li class="page-item">
                            <a class="page-link btn btn-primary btn-sm" href="<?php echo e($petugas->nextPageUrl()); ?>">Next</a>
                        </li>
                    <?php else: ?>
                        <li class="page-item disabled">
                            <a class="page-link btn btn-primary btn-sm" href="#" tabindex="-1" aria-disabled="true">Next</a>
                        </li>
                    <?php endif; ?>
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

<?php echo $__env->make('layouts.app-admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\project-desoresik\resources\views/admin/absensi/index.blade.php ENDPATH**/ ?>