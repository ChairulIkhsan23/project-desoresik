<?php $__env->startSection('title', 'Edit TPS'); ?>

<?php $__env->startSection('content'); ?>
<div class="container py-4">
    <h2>Edit TPS</h2>

    <?php if($errors->any()): ?>
        <div class="alert alert-danger">
            <ul class="mb-0">
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="<?php echo e(route('admin.tps.update', $tps->id)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
        <div class="mb-3">
            <label for="nama_tps" class="form-label">Nama TPS</label>
            <input type="text" name="nama_tps" class="form-control" id="nama_tps" value="<?php echo e($tps->nama_tps); ?>" required>
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea name="alamat" class="form-control" id="alamat" rows="2" required><?php echo e($tps->alamat); ?></textarea>
        </div>
        <div class="mb-3">
            <label for="latitude" class="form-label">Latitude</label>
            <input type="text" name="latitude" class="form-control" id="latitude" value="<?php echo e($tps->latitude); ?>" required>
        </div>
        <div class="mb-3">
            <label for="longitude" class="form-label">Longitude</label>
            <input type="text" name="longitude" class="form-control" id="longitude" value="<?php echo e($tps->longitude); ?>" required>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="<?php echo e(route('admin.tps.index')); ?>" class="btn btn-secondary">Kembali</a>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app-admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\project-desoresik\resources\views/admin/tps/edit.blade.php ENDPATH**/ ?>