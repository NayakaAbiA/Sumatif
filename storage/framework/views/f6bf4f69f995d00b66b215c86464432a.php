<?php $__env->startSection('content'); ?>
<div class="container-fluid pt-4 px-6">
    <div class="row">
        <!-- Card untuk Informasi Kisi-Kisi -->
        <div class="col-lg-12 mb-4">
            <div class="bg-light rounded p-4">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h5>Daftar Kisi-Kisi</h5>
                    <a href="<?php echo e(route('kisi.create.guru')); ?>" class="btn btn-success btn-sm">
                        <i class="fas fa-plus"></i> Unggah
                    </a>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Nama Guru</th>
                                <th>Mapel</th>
                                <th>Tingkat</th>
                                <th>Konsentrasi</th>
                                <th>Jawaban</th>
                                <th class="text-center">Aksi</th> <!-- Kolom aksi -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $kisiKisi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($item->nama_guru); ?></td>
                                    <td><?php echo e($item->mapel); ?></td>
                                    <td><?php echo e($item->tingkat); ?></td>
                                    <td><?php echo e($item->konsentrasi); ?></td>
                                    <td><?php echo e($item->nama_file ?? 'Tidak ada file'); ?></td>
                                    <td class="text-center">
                                        <!-- Tombol Edit -->
                                        <a href="<?php echo e(route('kisi.edit.guru', $item->id)); ?>" class="btn btn-warning btn-sm">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
                                        <!-- Tombol Hapus -->
                                        <form action="<?php echo e(route('kisi.destroy.guru', $item->id)); ?>" method="POST" style="display:inline;">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus kisi-kisi ini?')">
                                                <i class="fas fa-trash"></i> Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Formatif_sumatif\resources\views/guru/kisi-kisi/index.blade.php ENDPATH**/ ?>