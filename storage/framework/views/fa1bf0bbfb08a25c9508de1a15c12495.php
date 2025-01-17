<?php $__env->startSection('content'); ?>
<div class="container-fluid pt-4 px-4">
    <div class="row">
        <!-- Card untuk Nama File (Bagian atas) -->
        <div class="col-lg-12 mb-4">
            <div class="bg-light text-center rounded p-4">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h5>Detail Kisi-Kisi</h5>
                    <a href="<?php echo e(route('kisi.create.kurikulum')); ?>" class="btn btn-sm btn-success">
                        <i class="fas fa-upload"></i> Unggah</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>  <!-- Kolom untuk nomor -->
                                <th>Nama File</th>
                                <th>Aksi</th> <!-- Kolom aksi untuk edit dan hapus -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $kisiKisi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($index + 1); ?></td>  <!-- Menampilkan nomor baris -->
                                    <td><?php echo e($item->nama_file ?? 'Tidak ada file'); ?></td>
                                    <td>
                                        <a href="<?php echo e(route('kisi.edit.kurikulum', $item->id)); ?>" class="btn btn-warning btn-sm">
                                            <i class="fas fa-edit"></i> 
                                        </a>
                                        <form action="<?php echo e(route('kisi.destroy.kurikulum', $item->id)); ?>" method="POST" style="display:inline;">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus file ini?')">
                                                <i class="fas fa-trash"></i> 
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

        <!-- Card untuk Informasi Lain (Bagian bawah) -->
        <div class="col-lg-12 mb-4">
    <div class="bg-light text-center rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h5>Daftar Kisi-Kisi</h5>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>  <!-- Kolom untuk nomor -->
                        <th>Nama Guru</th>
                        <th>Mapel</th>
                        <th>Tingkat</th>
                        <th>Konsentrasi</th>
                        <th>File</th>
                        <th>Aksi</th> <!-- Kolom aksi untuk edit dan hapus -->
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $kisiKisi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($index + 1); ?></td>  <!-- Menampilkan nomor baris -->
                            <td><?php echo e($item->nama_guru); ?></td>
                            <td><?php echo e($item->mapel); ?></td>
                            <td><?php echo e($item->tingkat); ?></td>
                            <td><?php echo e($item->konsentrasi); ?></td>
                            <td><?php echo e($item->nama_file ?? 'Tidak ada file'); ?></td>

                            <!-- Kolom untuk melihat file -->
                            <td>
                                <?php if($item->nama_file): ?>
                                    <!-- Menampilkan tombol Lihat jika file ada -->
                                    <a href="<?php echo e(asset('storage/' . $item->nama_file)); ?>" target="_blank" class="btn btn-info btn-sm">
                                        <i class="fas fa-eye"></i> Lihat
                                    </a>
                                <?php else: ?>
                                    <span>Tidak ada file</span>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Formatif_sumatif\resources\views/kurikulum/kisi-kisi/index.blade.php ENDPATH**/ ?>