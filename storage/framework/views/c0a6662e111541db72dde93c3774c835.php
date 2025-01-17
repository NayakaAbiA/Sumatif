<?php $__env->startSection('content'); ?>
<div class="container-fluid pt-4 px-4">
    <div class="row">
        <!-- Card Pertama -->
        <div class="col-md-6">
            <div class="bg-light text-center rounded p-4">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <div>
                        <a href="<?php echo e(route('upload.create.kurikulum')); ?>" class="btn btn-sm btn-success"><i class="fa fa-upload"></i> Unggah</a>
                    </div>
                    <div>
                        <a href="#">Show All</a>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table text-start align-middle table-bordered table-hover mb-0">
                        <thead>
                            <tr class="text-dark">
                                <th>Nama File</th>
                                <th>Ukuran</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $uploadKisi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($file->name); ?></td>
                                    <td><?php echo e(number_format($file->size / 1024, 2)); ?> KB</td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Card Kedua -->
        <div class="col-md-6">
            <div class="bg-light text-center rounded p-4">
                <h5 class="mb-4">Data Tambahan</h5>
                <div class="table-responsive">
                    <table class="table text-start align-middle table-bordered table-hover mb-0">
                        <thead>
                            <tr class="text-dark">
                                <th>Nama Data</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Contoh Data 1</td>
                                <td>Keterangan Data 1</td>
                            </tr>
                            <tr>
                                <td>Contoh Data 2</td>
                                <td>Keterangan Data 2</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Formatif_sumatif\resources\views/kurikulum/uploadfile/index.blade.php ENDPATH**/ ?>