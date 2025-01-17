<?php $__env->startSection('content'); ?>
<form action="<?php echo e(route('kisi.update.guru', $kisiKisi->id)); ?>" method="POST" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
    <?php echo method_field('PUT'); ?>

    <!-- Nama File -->
    <div class="mb-3">
        <label for="nama_file" class="form-label">Nama File</label>
        <input type="file" class="form-control" name="nama_file" id="nama_file">
    </div>

    <!-- Nama Guru -->
    <div class="mb-3">
        <label for="nama_guru" class="form-label">Nama Guru</label>
        <input type="text" class="form-control" name="nama_guru" value="<?php echo e($kisiKisi->nama_guru); ?>">
    </div>

    <!-- Mapel -->
    <div class="mb-3">
        <label for="mapel" class="form-label">Mapel</label>
        <input type="text" class="form-control" name="mapel" value="<?php echo e($kisiKisi->mapel); ?>">
    </div>

    <!-- Tingkat (Checkbox) -->
    <div class="mb-3">
        <label class="form-label">Tingkat</label><br>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="tingkat[]" value="X" <?php echo e(in_array('X', explode(', ', $kisiKisi->tingkat)) ? 'checked' : ''); ?>>
            <label class="form-check-label">X</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="tingkat[]" value="XI" <?php echo e(in_array('XI', explode(', ', $kisiKisi->tingkat)) ? 'checked' : ''); ?>>
            <label class="form-check-label">XI</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="tingkat[]" value="XII" <?php echo e(in_array('XII', explode(', ', $kisiKisi->tingkat)) ? 'checked' : ''); ?>>
            <label class="form-check-label">XII</label>
        </div>
    </div>

    <!-- Konsentrasi (Checkbox) -->
    <div class="mb-3">
        <label class="form-label">Konsentrasi</label><br>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="konsentrasi[]" value="TKRO" <?php echo e(in_array('TKRO', explode(', ', $kisiKisi->konsentrasi)) ? 'checked' : ''); ?>>
            <label class="form-check-label">TKRO</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="konsentrasi[]" value="TKJT" <?php echo e(in_array('TKJT', explode(', ', $kisiKisi->konsentrasi)) ? 'checked' : ''); ?>>
            <label class="form-check-label">TKJT</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="konsentrasi[]" value="PPLG" <?php echo e(in_array('PPLG', explode(', ', $kisiKisi->konsentrasi)) ? 'checked' : ''); ?>>
            <label class="form-check-label">PPLG</label>
        </div>
    </div>

    <!-- Submit Button -->
    <button type="submit" class="btn btn-primary">Update</button>
</form>

<!-- Hapus Button -->
<form action="<?php echo e(route('kisi.destroy.guru', $kisiKisi->id)); ?>" method="POST" style="display:inline;">
    <?php echo csrf_field(); ?>
    <?php echo method_field('DELETE'); ?>
    <button type="submit" class="btn btn-danger">Hapus</button>
</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Project Pak Jajat\Sumatif\resources\views/guru/kisi-kisi/edit.blade.php ENDPATH**/ ?>