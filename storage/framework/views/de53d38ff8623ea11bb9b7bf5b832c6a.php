<nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
                <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                <form class="d-none d-md-flex ms-4">
                    <input class="form-control border-0" type="search" placeholder="Search">
                </form>
                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fa fa-envelope me-lg-2"></i>
                            <span class="d-none d-lg-inline-flex">Message</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <?php if($user->foto_profile): ?>
                                        <img src="<?php echo e(asset('storage/' . $user->foto_profile)); ?>" alt="Foto Profil" class="profile-pic" alt="" style="width: 40px; height: 40px;">
                                    <?php else: ?>
                                        <img src="https://via.placeholder.com/150" alt="Default Foto Profil" class="profile-pic">
                                    <?php endif; ?>                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <?php if($user->foto_profile): ?>
                                        <img src="<?php echo e(asset('storage/' . $user->foto_profile)); ?>" alt="Foto Profil" class="profile-pic" alt="" style="width: 40px; height: 40px;">
                                    <?php else: ?>
                                        <img src="https://via.placeholder.com/150" alt="Default Foto Profil" class="profile-pic">
                                    <?php endif; ?>                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <?php if($user->foto_profile): ?>
                                        <img src="<?php echo e(asset('storage/' . $user->foto_profile)); ?>" alt="Foto Profil" class="profile-pic" alt="" style="width: 40px; height: 40px;">
                                    <?php else: ?>
                                        <img src="https://via.placeholder.com/150" alt="Default Foto Profil" class="profile-pic">
                                    <?php endif; ?>                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item text-center">See all message</a>
                        </div>
                    </div>
                    <!-- <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fa fa-bell me-lg-2"></i>
                            <span class="d-none d-lg-inline-flex">Notificatin</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">Profile updated</h6>
                                <small>15 minutes ago</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">New user added</h6>
                                <small>15 minutes ago</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">Password changed</h6>
                                <small>15 minutes ago</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item text-center">See all notifications</a>
                        </div>
                    </div> -->
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">

                            <?php if($user->foto_profile): ?>
                                <img src="<?php echo e(asset('storage/' . $user->foto_profile)); ?>" alt="Foto Profil" class="profile-pic" alt="" style="width: 40px; height: 40px; border-radius: 50%;">
                            <?php else: ?>
                                <img src="https://via.placeholder.com/150" alt="Default Foto Profil" class="profile-pic">
                            <?php endif; ?>

                            <span class="d-none d-lg-inline-flex"><?php echo e(Auth::user()->name); ?></span>

                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">My Profile</a>
                            <form action="<?php echo e(route('logout')); ?>" method="POST" style="display: inline;">
                                <?php echo csrf_field(); ?>
                                <button type="submit" class="dropdown-item">Logout</button>
                            </form>
                        </div>
                    </div>
                </div>
            </nav>
<?php /**PATH C:\Project Pak Jajat\Sumatif\resources\views/layouts/navbar.blade.php ENDPATH**/ ?>