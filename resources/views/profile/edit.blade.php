@extends('layouts.main')

@section('content')
<div class="container mt-4">
    <h2>Edit Profil</h2>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="row">
        <!-- Foto Profil di Kiri -->
        <div class="col-md-4 text-center">
            @if($user->foto_profile)
                <img src="{{ asset('storage/' . $user->foto_profile) }}"
                     alt="Profile Picture"
                     class="profile-pic mb-3"
                     style="width: 150px; height: 150px; object-fit: cover; border-radius: 50%; border: 3px solid #ddd;">
            @else
                <img src="{{ asset('default-profile.png') }}"
                     alt="Default Profile"
                     class="profile-pic mb-3"
                     style="width: 150px; height: 150px; object-fit: cover; border-radius: 50%; border: 3px solid #ddd;">
            @endif

            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <label for="foto_profile" class="form-label">Ganti Foto Profil</label>
                <input type="file" class="form-control" id="foto_profile" name="foto_profile">
        </div>

        <!-- Data Diri di Kanan -->
        <div class="col-md-8">
            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>
@endsection
