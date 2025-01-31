<?php $__env->startSection('content'); ?>
<div class="container-fluid pt-4 px-6">
    <div class="row">
        <!-- Card untuk Informasi Soal Ujian -->
        <div class="col-lg-12 mb-4">
            <div class="bg-light rounded p-4">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h5>Daftar Soal Ujian</h5>
                    <div>
                        <!-- Tombol Unggah Soal menggunakan Form -->
                        <a href="<?php echo e(route('soal.create.guru')); ?>" class="btn btn-primary btn-sm me-2">
                            <i class="fas fa-download"></i>upload
                        </a>
                        <!-- Tombol Download Blangko -->
                        <?php $__currentLoopData = $soalUjian; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $soal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <a href="<?php echo e(route('download.soal', $soal->id)); ?>" class="btn btn-primary btn-sm me-2">
                                <i class="fas fa-download"></i> Download Blangko
                            </a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Nama Guru</th>
                                <th>Mapel</th>
                                <th>Tingkat</th>
                                <th>Konsentrasi</th>
                                <th>Soal</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $soalUjian; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $soal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($soal->nama_guru); ?></td>
                                <td><?php echo e($soal->mapel); ?></td>
                                <td><?php echo e($soal->tingkat); ?></td>
                                <td><?php echo e($soal->konsentrasi); ?></td>
                                <td><?php echo e($soal->soal); ?></td>
                                <td class="text-center">
                                    <a href="<?php echo e(route('soal.edit.guru', $soal->id)); ?>" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <form action="<?php echo e(route('soal.destroy.guru', $soal->id)); ?>" method="POST" style="display:inline;">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus soal ini?')">
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

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Formatif_sumatif\resources\views/guru/soal-ujian/index.blade.php ENDPATH**/ ?>