<div class="sidebar pe-4 pb-3">

            <nav class="navbar bg-light navbar-light">
                <a class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary">K-ONE</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        @if ($user->foto_profile)
                            <img src="{{ asset('storage/' . $user->foto_profile) }}" alt="Foto Profil" class="profile-pic" alt="" style="width: 40px; height: 40px;">
                        @else
                            <img src="https://via.placeholder.com/150" alt="Default Foto Profil" class="profile-pic">
                        @endif
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0">Nayaka Abi</h6>
                        <span>Kurikulum</span>
                    </div>

    <nav class="navbar bg-light navbar-light">
        <a class="navbar-brand mx-4 mb-3">
            <h3 class="text-primary">K-ONE</h3>
        </a>
        <div class="d-flex align-items-center ms-4 mb-4">
            <div class="position-relative">
                <img class="rounded-circle" src="{{ asset('Assets/dashmin-1.0.0/img/user.jpg') }}" alt="" style="width: 40px; height: 40px;">
                <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
            </div>
            @if (Auth::check())
                <div class="ms-3">
                    <h6 class="mb-0">{{ Auth::user()->role }}</h6>
                    <span>
                        @if (Auth::user()->role === 'kurikulum')
                            Kurikulum
                        @elseif (Auth::user()->role === 'guru')
                            Guru
                        @elseif (Auth::user()->role === 'kaprog')
                            Kepala Program
                        @else
                            Guest
                        @endif
                    </span>

                </div>
            @else
                <div class="ms-3">
                    <h6 class="mb-0">Guest</h6>
                    <span>Guest</span>
                </div>

            </nav>
        </div>

            @endif

        </div>
        <div class="navbar-nav w-100">
        @if (Auth::check() && Auth::user()->role === 'kurikulum')
            <a href="{{ route('dashboard.kurikulum') }}" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
            <a href="{{ route('upload.kurikulum') }}" class="nav-item nav-link"><i class="fa fa-book me-2"></i>Blangko Kisi - Kisi</a>
            <a href="{{ route('daftarhadir.kurikulum') }}" class="nav-item nav-link"><i class="fa fa-book me-2"></i>Daftar Hadir</a>
            <a href="" class="nav-item nav-link"><i class="fa fa-book me-2"></i>Soal Ujian</a>
        @elseif (Auth::check() && Auth::user()->role === 'guru')
            <a href="{{ route('dashboard.guru') }}" class="nav-item nav-link active"><i class="fa fa-chalkboard-teacher me-2"></i>Dashboard Guru</a>
            <a href="" class="nav-item nav-link"><i class="fa fa-users me-2"></i>Kelas</a>
        @elseif (Auth::check() && Auth::user()->role === 'kaprog')
            <a href="" class="nav-item nav-link active"><i class="fa fa-briefcase me-2"></i>Dashboard Kaprog</a>
            <a href="" class="nav-item nav-link"><i class="fa fa-file-alt me-2"></i>Laporan</a>
        @else
            <a href="{{ route('login') }}" class="nav-item nav-link"><i class="fa fa-sign-in-alt me-2"></i>Login</a>
        @endif
        </div>
    </nav>
</div>

