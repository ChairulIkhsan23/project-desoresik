<?php $__env->startSection('title', 'Data Petugas'); ?>

<?php $__env->startSection('content'); ?>
    <h1 class="h3 mb-3"><strong>Data</strong> Petugas</h1>

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
            <!-- Correct route for creating petugas -->
            <a href="<?php echo e(route('admin.petugas.create')); ?>" class="btn btn-primary btn-sm">
                <i data-feather="plus"></i> Tambah Petugas
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
                                <th>Email</th>
                                <th>No HP</th>
                                <th>Role</th>
                                <th style="width: 70px">Foto</th>
                                <th style="width: 100px">Status</th>
                                <th style="width: 120px">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Loop through petugas data dynamically -->
                            <?php $__empty_1 = true; $__currentLoopData = $petugas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $petugas): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td><?php echo e($index + 1); ?></td>
                                    <td><?php echo e($petugas->name); ?></td>
                                    <td><?php echo e($petugas->email); ?></td>
                                    <td><?php echo e($petugas->no_hp); ?></td>
                                    <td><?php echo e($petugas->role); ?></td>
                                    <td class="text-center">
                                        <img src="<?php echo e($petugas->foto ? asset('storage/' . $petugas->foto) : asset('assets/img/icons/profil-petugas.png')); ?>" width="40" height="40" style="object-fit: cover;" class="rounded-circle">
                                    </td>
                                    <td>
                                        <span class="badge <?php echo e($petugas->status == 'Aktif' ? 'bg-success' : 'bg-danger'); ?>">
                                            <?php echo e($petugas->status); ?>

                                        </span>
                                    </td>
                                    <td>
                                        <div class="d-flex gap-1">
                                            <!-- Edit button -->
                                            <a href="<?php echo e(route('admin.petugas.edit', $petugas->id)); ?>" class="btn btn-sm btn-warning px-2">
                                                <i data-feather="edit"></i>
                                            </a>
                                            <!-- Delete button -->
                                            <form action="<?php echo e(route('admin.petugas.destroy', $petugas->id)); ?>" method="POST" style="display: inline;">
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
                                    <td colspan="8" class="text-center">Belum ada data.</td>
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
                    <!-- Use Laravel's pagination link rendering -->
                    <?php if(method_exists($petugas, 'links')): ?>
                    <?php echo e($petugas->links()); ?>

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

<?php echo $__env->make('layouts.app-admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\project-desoresik\resources\views/admin/petugas/index.blade.php ENDPATH**/ ?>