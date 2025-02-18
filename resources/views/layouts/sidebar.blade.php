<div class="sidebar pe-4 pb-3">
    <nav class="navbar bg-light navbar-light">
        <a class="navbar-brand mx-4 mb-3">
            <h3 class="text-primary">K-ONE</h3>
        </a>
        <div class="d-flex align-items-center ms-4 mb-4">
            <div class="position-relative">
                @if ($user->foto_profile)
                    <img src="{{ asset('storage/' . $user->foto_profile) }}" alt="Foto Profil" class="profile-pic" alt="" style="width: 40px; height: 40px; border-radius: 50%;">
                @else
                    <img src="https://via.placeholder.com/150" alt="Default Foto Profil" class="profile-pic">
                @endif                <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
            </div>
            <div class="ms-3">
                @if (Auth::check())
                    <h6 class="mb-0">{{ Auth::user()->name }}</h6>
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
                @else
                    <h6 class="mb-0">Guest</h6>
                    <span>Guest</span>
                @endif
            </div>
        </div>

        <div class="navbar-nav w-100">
            @if (Auth::check() && Auth::user()->role === 'kurikulum')
                <a href="{{ route('dashboard.kurikulum') }}" class="nav-item nav-link {{ request()->routeIs('dashboard.kurikulum') ? 'active' : '' }}">
                    <i class="fa fa-tachometer-alt me-2"></i>Dashboard
                </a>
                <a href="{{ route('kisi.kurikulum') }}" class="nav-item nav-link {{ request()->routeIs('kisi.kurikulum') ? 'active' : '' }}">
                    <i class="fa fa-book me-2"></i>Kisi - Kisi
                </a>
                <a href="{{ route('daftarhadir.kurikulum') }}" class="nav-item nav-link {{ request()->routeIs('daftarhadir.kurikulum') ? 'active' : '' }}">
                    <i class="fa fa-book me-2"></i>Daftar Hadir
                </a>
                <a href="{{ route('soal.kurikulum') }}" class="nav-item nav-link {{ request()->routeIs('soalujian.kurikulum') ? 'active' : '' }}">
                    <i class="fa fa-book me-2"></i>Soal Ujian
                </a>
                <a href="{{ route('kelas.index') }}" class="nav-item nav-link {{ request()->routeIs('soalujian.kurikulum') ? 'active' : '' }}">
                    <i class="fa fa-book me-2"></i>Tambah Kelas
                </a>
            @elseif (Auth::check() && Auth::user()->role === 'guru')
                <a href="{{ route('dashboard.guru') }}" class="nav-item nav-link {{ request()->routeIs('dashboard.guru') ? 'active' : '' }}">
                    <i class="fa fa-chalkboard-teacher me-2"></i>Dashboard Guru
                </a>
                <a href="{{ route('kelas.index') }}" class="nav-item nav-link {{ request()->routeIs('kelas.index') ? 'active' : '' }}">
                    <i class="fa fa-users me-2"></i>Kelas
                </a>
                <a href="{{ route('kisi.guru') }}" class="nav-item nav-link">
                    <i class="fa fa-book me-2"></i>Kisi - Kisi
                </a>
                <a href="{{ route('soal.guru') }}" class="nav-item nav-link">
                    <i class="fa fa-book me-2"></i>Soal Ujian
                </a>
            @elseif (Auth::check() && Auth::user()->role === 'kaprog')
                <a href="" class="nav-item nav-link {{ request()->routeIs('dashboard.kaprog') ? 'active' : '' }}">
                    <i class="fa fa-briefcase me-2"></i>Dashboard Kaprog
                </a>
                <a href="" class="nav-item nav-link {{ request()->routeIs('laporan.kaprog') ? 'active' : '' }}">
                    <i class="fa fa-file-alt me-2"></i>Laporan
                </a>
            @else
                <a href="{{ route('login') }}" class="nav-item nav-link {{ request()->routeIs('login') ? 'active' : '' }}">
                    <i class="fa fa-sign-in-alt me-2"></i>Login
                </a>
            @endif
        </div>

    </nav>
</div>
