<div class="sidebar pe-4 pb-3">
    <nav class="navbar bg-light navbar-light">
        <a class="navbar-brand mx-4 mb-3">
            <h3 class="text-primary">K-ONE</h3>
        </a>
        <div class="d-flex align-items-center ms-4 mb-4">
            <div class="position-relative">
                <?php if($user->foto_profile): ?>
                    <img src="<?php echo e(asset('storage/' . $user->foto_profile)); ?>" alt="Foto Profil" class="profile-pic" alt="" style="width: 40px; height: 40px; border-radius: 50%;">
                <?php else: ?>
                    <img src="https://via.placeholder.com/150" alt="Default Foto Profil" class="profile-pic">
                <?php endif; ?>                <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
            </div>
            <div class="ms-3">
                <?php if(Auth::check()): ?>
                    <h6 class="mb-0"><?php echo e(Auth::user()->name); ?></h6>
                    <span>
                        <?php if(Auth::user()->role === 'kurikulum'): ?>
                            Kurikulum
                        <?php elseif(Auth::user()->role === 'guru'): ?>
                            Guru
                        <?php elseif(Auth::user()->role === 'kaprog'): ?>
                            Kepala Program
                        <?php else: ?>
                            Guest
                        <?php endif; ?>
                    </span>
                <?php else: ?>
                    <h6 class="mb-0">Guest</h6>
                    <span>Guest</span>
                <?php endif; ?>
            </div>
        </div>

        <div class="navbar-nav w-100">
            <?php if(Auth::check() && Auth::user()->role === 'kurikulum'): ?>
                <a href="<?php echo e(route('dashboard.kurikulum')); ?>" class="nav-item nav-link active">
                    <i class="fa fa-tachometer-alt me-2"></i>Dashboard
                </a>
                <a href="<?php echo e(route('upload.kurikulum')); ?>" class="nav-item nav-link">
                    <i class="fa fa-book me-2"></i>Blangko Kisi - Kisi
                </a>
                <a href="<?php echo e(route('daftarhadir.kurikulum')); ?>" class="nav-item nav-link">
                    <i class="fa fa-book me-2"></i>Daftar Hadir
                </a>
                <a href="" class="nav-item nav-link">
                    <i class="fa fa-book me-2"></i>Soal Ujian
                </a>
            <?php elseif(Auth::check() && Auth::user()->role === 'guru'): ?>
                <a href="<?php echo e(route('dashboard.guru')); ?>" class="nav-item nav-link active">
                    <i class="fa fa-chalkboard-teacher me-2"></i>Dashboard Guru
                </a>
                <a href="" class="nav-item nav-link">
                    <i class="fa fa-users me-2"></i>Kelas
                </a>
            <?php elseif(Auth::check() && Auth::user()->role === 'kaprog'): ?>
                <a href="" class="nav-item nav-link active">
                    <i class="fa fa-briefcase me-2"></i>Dashboard Kaprog
                </a>
                <a href="" class="nav-item nav-link">
                    <i class="fa fa-file-alt me-2"></i>Laporan
                </a>
            <?php else: ?>
                <a href="<?php echo e(route('login')); ?>" class="nav-item nav-link">
                    <i class="fa fa-sign-in-alt me-2"></i>Login
                </a>
            <?php endif; ?>
        </div>
    </nav>
</div>
<?php /**PATH C:\Project Pak Jajat\Sumatif\resources\views/layouts/sidebar.blade.php ENDPATH**/ ?>