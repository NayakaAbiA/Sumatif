<?php $__env->startSection('content'); ?>
<div class="container-fluid pt-4 px-6">
    <h4>Tambah Soal Ujian</h4>
    <div class="bg-light rounded p-4">
        <form action="<?php echo e(route('soal.store.guru')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <div class="mb-3">
                <label for="nama_guru" class="form-label">Nama Guru</label>
                <input type="text" name="nama_guru" value="<?php echo e(Auth::user()->name); ?>" class="form-control" required readonly>
            </div>
            <div class="mb-3">
                <label for="mapel" class="form-label">Mapel</label>
                <input type="text" name="mapel" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="tingkat" class="form-label">Tingkat</label>
                <select name="tingkat" class="form-select" required>
                    <option value="" selected disabled>Pilih Tingkat</option>
                    <option value="X">X</option>
                    <option value="XI">XI</option>
                    <option value="XII">XII</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="konsentrasi" class="form-label">Konsentrasi</label>
                <select name="konsentrasi" class="form-select" required>
                    <option value="" selected disabled>Pilih Konsentrasi</option>
                    <option value="TKRO">TKRO</option>
                    <option value="TKJT">TKJT</option>
                    <option value="PPLG">PPLG</option>
                    <option value="DPIB">DPIB</option>
                    <option value="AK">AK</option>
                    <option value="MP">MP</option>
                    <option value="SP">SP</option>
                </select>
            </div>
            <div class="mb-3">
            <label for="soal" class="form-label">Soal</label>
            <input type="file" class="form-control" id="soal" name="soal">
            </div>
            <button type="submit" class="btn btn-success">Simpan</button>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Formatif_sumatif\resources\views/guru/soal-ujian/create.blade.php ENDPATH**/ ?>