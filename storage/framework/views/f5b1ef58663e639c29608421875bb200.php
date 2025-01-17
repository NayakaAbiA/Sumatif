<?php $__env->startSection('content'); ?>
<div class="container mt-5">
    <h1 class="mb-4">Tambah Kelas</h1>
    <form action="<?php echo e(route('tambah.kelas.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <div class="mb-3">
            <label for="nama_kelas" class="form-label">Nama Kelas</label>
            <input type="text" name="nama_kelas" class="form-control" id="nama_kelas" required>
        </div>
        <div class="mb-3">
            <label for="tingkat" class="form-label">Tingkat</label>
            <select name="tingkat" class="form-control" id="tingkat" required>
                <option value="X">Kelas X</option>
                <option value="XI">Kelas XI</option>
                <option value="XII">Kelas XII</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="nama_siswa" class="form-label">Nama Siswa (Maksimal 50)</label>
            <div id="siswa-wrapper">
                <div class="input-group mb-2">
                    <input type="text" name="nama_siswa[]" class="form-control" placeholder="Nama Siswa" required>
                    <button type="button" class="btn btn-secondary btn-tambah-siswa">+</button>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const siswaWrapper = document.getElementById('siswa-wrapper');

        document.querySelector('.btn-tambah-siswa').addEventListener('click', function () {
            if (siswaWrapper.querySelectorAll('input').length < 50) {
                const inputGroup = document.createElement('div');
                inputGroup.className = 'input-group mb-2';

                inputGroup.innerHTML = `
                    <input type="text" name="nama_siswa[]" class="form-control" placeholder="Nama Siswa" required>
                    <button type="button" class="btn btn-danger btn-hapus-siswa">-</button>
                `;
                siswaWrapper.appendChild(inputGroup);

                inputGroup.querySelector('.btn-hapus-siswa').addEventListener('click', function () {
                    inputGroup.remove();
                });
            } else {
                alert('Maksimal 50 siswa!');
            }
        });
    });
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Project Pak Jajat\Sumatif\resources\views/kurikulum/kelas/create.blade.php ENDPATH**/ ?>