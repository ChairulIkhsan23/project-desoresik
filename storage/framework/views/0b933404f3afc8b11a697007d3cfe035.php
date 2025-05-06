<?php $__env->startSection('title', 'Data Armada'); ?>

<?php $__env->startSection('content'); ?>
    <h1 class="h3 mb-3"><strong>Data</strong> Armada</h1>

    <?php if(session('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i data-feather="check-circle" class="me-1"></i>
            <?php echo e(session('success')); ?>

            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <?php if(session('error')): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i data-feather="x-circle" class="me-1"></i>
            <?php echo e(session('error')); ?>

            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <div class="container-fluid mt-3">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <a href="<?php echo e(route('admin.armada.create')); ?>" class="btn btn-primary btn-sm">
                <i data-feather="plus"></i> Tambah Armada
            </a>
        </div>

        <div class="card">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped align-middle mb-0">
                        <thead class="table-success">
                            <tr>
                                <th style="width: 50px">No</th>
                                <th>Nama</th>
                                <th>No Polisi</th>
                                <th>Tahun</th>
                                <th>Jenis</th>
                                <th style="width: 70px">Foto</th>
                                <th style="width: 120px">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $armada; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td><?php echo e($index + 1); ?></td>
                                    <td><?php echo e($item->nama); ?></td>
                                    <td><?php echo e($item->nomor_polisi); ?></td>
                                    <td><?php echo e($item->tahun_kendaraan); ?></td>
                                    <td><?php echo e($item->jenis); ?></td>
                                    <td class="text-center">
                                        <img src="<?php echo e($item->foto ? asset('storage/' . $item->foto) : asset('assets/img/photos/truk.jpg')); ?>" 
                                             width="40" height="40" 
                                             style="object-fit: cover;" 
                                             class="rounded-circle">
                                    </td>
                                    <td>
                                        <div class="d-flex gap-1">
                                            <a href="<?php echo e(route('admin.armada.edit', $item->id)); ?>" class="btn btn-sm btn-warning px-2">
                                                <i data-feather="edit"></i>
                                            </a>
                                            <form action="<?php echo e(route('admin.armada.destroy', $item->id)); ?>" method="POST" style="display: inline;">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <button type="submit" class="btn btn-sm btn-danger px-2">
                                                    <i data-feather="trash-2"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="7" class="text-center">Belum ada data.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Pagination -->
        <div class="mt-3">
            <nav aria-label="Page navigation">
                <ul class="pagination justify-content-end">
                    <?php if(method_exists($armada, 'links')): ?>
                        <?php echo e($armada->links()); ?>

                    <?php endif; ?>
                </ul>
            </nav>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script>
        feather.replace();

        // Auto-hide alerts after 4 seconds
        document.addEventListener('DOMContentLoaded', function() {
            const alerts = document.querySelectorAll('.alert');
            
            alerts.forEach(alert => {
                setTimeout(() => {
                    alert.classList.remove('show');
                    alert.classList.add('fade');
                    setTimeout(() => alert.remove(), 150); // Remove after fade animation
                }, 500); 
            });
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app-admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\project-desoresik\resources\views/admin/armada/index.blade.php ENDPATH**/ ?>