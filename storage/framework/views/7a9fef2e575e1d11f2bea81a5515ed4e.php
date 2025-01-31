<?php $__env->startSection('content'); ?>
<div class="container-fluid pt-4 px-6">
    <div class="row">
        <div class="col-lg-8 mb-4 mx-auto">
            <div class="bg-light rounded p-4">
                <h5 class="mb-4">Tambah Kisi-Kisi</h5>
                <form action="<?php echo e(route('kisi.store.guru')); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="mb-3">
                        <label for="nama_guru" class="form-label">Nama Guru</label>
                        <input type="text" class="form-control" id="nama_guru" name="nama_guru" value="<?php echo e(Auth::user()->name); ?>" required readonly>
                    </div>
                    <div class="mb-3">
                        <label for="mapel" class="form-label">Mata Pelajaran</label>
                        <input type="text" class="form-control" id="mapel" name="mapel" required>
                    </div>

                    <!-- Tingkat Checkbox -->
                    <div class="mb-3">
                        <label class="form-label">Tingkat</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="tingkat[]" value="X" id="X">
                            <label class="form-check-label" for="X">X</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="tingkat[]" value="XI" id="XI">
                            <label class="form-check-label" for="XI">XI</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="tingkat[]" value="XII" id="XII">
                            <label class="form-check-label" for="XII">XII</label>
                        </div>
                    </div>

                    <!-- Konsentrasi Checkbox -->
                    <div class="mb-3">
                        <label class="form-label">Konsentrasi</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="konsentrasi[]" value="TKRO" id="tkro">
                            <label class="form-check-label" for="tkro1">TKRO</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="konsentrasi[]" value="TKJT" id="tkjt">
                            <label class="form-check-label" for="tkjt">TKJT</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="konsentrasi[]" value="PPLG" id="pplg">
                            <label class="form-check-label" for="pplg">PPLG</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="nama_file" class="form-label">File Kisi-Kisi</label>
                        <input type="file" class="form-control" id="nama_file" name="nama_file">
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-save"></i> Simpan
                        </button>
                        <a href="<?php echo e(route('kisi.guru')); ?>" class="btn btn-secondary ms-2">
                            <i class="fas fa-arrow-left"></i> Kembali
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Formatif_sumatif\resources\views/guru/kisi-kisi/create.blade.php ENDPATH**/ ?>