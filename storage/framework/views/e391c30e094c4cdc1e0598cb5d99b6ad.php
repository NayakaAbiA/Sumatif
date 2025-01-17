<?php $__env->startSection('content'); ?>
<div class="container mt-4">
    <h2 class="text-center mb-4">Detail Kelas: <?php echo e($kelas->nama_kelas); ?> (<?php echo e($kelas->tingkat); ?>)</h2>

    <div class="card">
        <div class="card-header">
            Daftar Siswa
        </div>
        <div class="card-body">
            <?php if($kelas->siswa->isEmpty()): ?>
                <p class="text-center">Tidak ada siswa dalam kelas ini.</p>
            <?php else: ?>
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Siswa</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $kelas->siswa; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $siswa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($index + 1); ?></td>
                                <td><?php echo e($siswa->nama); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            <?php endif; ?>
        </div>
    </div>
    <div class="mt-3 text-center">
        <a href="<?php echo e(route('kelas.index')); ?>" class="btn btn-secondary">Kembali</a>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Project Pak Jajat\Sumatif\resources\views/kurikulum/kelas/detail.blade.php ENDPATH**/ ?>