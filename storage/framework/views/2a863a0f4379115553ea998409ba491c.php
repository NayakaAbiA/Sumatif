<?php $__env->startSection('content'); ?>
<div class="container-fluid pt-4 px-4">
    <div class="bg-light text-center rounded p-4">
    <head>
        <style>
            .profile-pic {
                width: 150px;
                height: 150px;
                border-radius: 50%;
                object-fit: cover;
            }
            .card {
                margin-bottom: 20px;
            }
        </style>
    </head>
    <body>
        <div class="container mt-4">
            <div class="row">
                <div class="col-md-4">
                    <div class="card text-center">
                        <div class="card-body">
                            <?php if($user->foto_profile): ?>
                                <img src="<?php echo e(asset('storage/' . $user->foto_profile)); ?>" alt="Foto Profil" class="profile-pic">
                            <?php else: ?>
                                <img src="https://via.placeholder.com/150" alt="Default Foto Profil" class="profile-pic">
                            <?php endif; ?>
                            <h4 class="mt-3"><?php echo e($user->name); ?></h4>
                            <p><?php echo e(ucfirst($user->role)); ?></p>
                            <p><?php echo e($user->email); ?></p>
                            <a href="<?php echo e(route('profile.edit')); ?>" class="btn btn-primary">Edit Foto</a>
                            <a href="<?php echo e(route('profile.edit')); ?>" class="btn btn-outline-primary">Edit Profile</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Informasi Data Diri</div>
                        <div class="card-body">
                            <table class="table">
                                <tr>
                                    <th style="text-align: left;">Nama Lengkap</th>
                                    <td style="text-align: left;">: <?php echo e($user->name); ?></td>
                                </tr>
                                <tr>
                                    <th style="text-align: left;">Email</th>
                                    <td style="text-align: left;">: <?php echo e($user->email); ?></td>
                                </tr>
                                <tr>
                                    <th style="text-align: left;">Sebagai</th>
                                    <td style="text-align: left;">: <?php echo e(ucfirst($user->role)); ?></td>
                                </tr>
                            </table>

                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">Kelas Anda</div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Kelas</th>
                                        <th>Mapel</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>

    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Formatif_sumatif\resources\views/guru/dashboard.blade.php ENDPATH**/ ?>