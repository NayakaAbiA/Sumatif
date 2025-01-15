<?php $__env->startSection('content'); ?>
<div class="container mt-4">
    <h2>Edit Profil</h2>
    <?php if(session('success')): ?>
        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?>

    <form action="<?php echo e(route('profile.update')); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <div class="mb-3">
            <label for="name" class="form-label">Nama Lengkap</label>
            <input type="text" class="form-control" id="name" name="name" value="<?php echo e($user->name); ?>" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo e($user->email); ?>" required>
        </div>

        <div class="mb-3">
            <label for="foto_profile" class="form-label">Foto Profil</label>
            <input type="file" class="form-control" id="foto_profile" name="foto_profile">
            <?php if($user->foto_profile): ?>
                <img src="<?php echo e(asset('storage/' . $user->foto_profile)); ?>" alt="Profile Picture" class="mt-3 profile-pic" style="width: 100px; height: 100px; object-fit: cover; border-radius: 50%;">
            <?php endif; ?>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Project Pak Jajat\Sumatif\resources\views/profile/edit.blade.php ENDPATH**/ ?>