

<?php $__env->startSection('title', 'Edit Armada'); ?>

<?php $__env->startSection('content'); ?>
    <h1 class="h3 mb-3"><strong>Edit</strong> Armada</h1>

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

    <div class="card">
        <div class="card-body">
            <form action="<?php echo e(route('admin.armada.update', $armada->id)); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Nama Armada</label>
                            <input type="text" name="nama" class="form-control" 
                                   value="<?php echo e(old('nama', $armada->nama)); ?>" required>
                            <?php $__errorArgs = ['nama'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback d-block"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Nomor Polisi</label>
                            <input type="text" name="nomor_polisi" class="form-control" 
                                   value="<?php echo e(old('nomor_polisi', $armada->nomor_polisi)); ?>" required>
                            <?php $__errorArgs = ['nomor_polisi'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback d-block"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Tahun Kendaraan</label>
                            <input type="number" name="tahun_kendaraan" class="form-control" 
                                   value="<?php echo e(old('tahun_kendaraan', $armada->tahun_kendaraan)); ?>" 
                                   min="2000" max="<?php echo e(date('Y') + 1); ?>" required>
                            <?php $__errorArgs = ['tahun_kendaraan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback d-block"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Jenis</label>
                            <select name="jenis" class="form-control" required>
                                <option value="Truk" <?php echo e(old('jenis', $armada->jenis) == 'Truk' ? 'selected' : ''); ?>>Truk</option>
                            </select>
                            <?php $__errorArgs = ['jenis'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback d-block"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Foto Armada</label>
                            <input type="file" name="foto" class="form-control" 
                                   accept="image/jpeg,image/png,image/jpg">
                            <div class="form-text">Format: JPG, PNG, JPEG. Maksimal 2MB</div>
                            <?php if($armada->foto): ?>
                                <div class="mt-2">
                                    <img src="<?php echo e(asset('storage/' . $armada->foto)); ?>" 
                                         width="100" class="img-thumbnail">
                                </div>
                            <?php endif; ?>
                            <?php $__errorArgs = ['foto'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback d-block"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-between mt-4">
                <a href="<?php echo e(route('admin.armada.index')); ?>" class="btn btn-outline-secondary btn-sm">
                            <i data-feather="arrow-left"></i> Kembali
                        </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-1"></i> Simpan Perubahan
                    </button>
                </div>
            </form>
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
                    setTimeout(() => alert.remove(), 150);
                }, 4000); 
            });
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app-admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\project-desoresik\resources\views/admin/armada/edit.blade.php ENDPATH**/ ?>