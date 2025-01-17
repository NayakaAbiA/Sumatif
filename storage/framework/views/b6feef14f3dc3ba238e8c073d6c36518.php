<?php $__env->startSection('content'); ?>
<div class="container-fluid pt-4 px-4">
    <div class="bg-light text-center rounded p-4">
        <h2 class="mb-4">Daftar Kelas</h2>
        <div class="row">
            <!-- Kelas 10 -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h5>Kelas 10</h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            <?php $__currentLoopData = $kelas['kelas10']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kelas10): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="list-group-item"><?php echo e($kelas10); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Kelas 11 -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header bg-success text-white">
                        <h5>Kelas 11</h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            <?php $__currentLoopData = $kelas['kelas11']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kelas11): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="list-group-item"><?php echo e($kelas11); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Kelas 12 -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header bg-danger text-white">
                        <h5>Kelas 12</h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            <?php $__currentLoopData = $kelas['kelas12']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kelas12): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="list-group-item"><?php echo e($kelas12); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Project Pak Jajat\Sumatif\resources\views/kelas/index.blade.php ENDPATH**/ ?>