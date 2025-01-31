@extends('layouts.main')

@section('content')
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
                            @if ($user->foto_profile)
                                <img src="{{ asset('storage/' . $user->foto_profile) }}" alt="Foto Profil" class="profile-pic">
                            @else
                                <img src="https://via.placeholder.com/150" alt="Default Foto Profil" class="profile-pic">
                            @endif
                            <h4 class="mt-3">{{ $user->name }}</h4>
                            <p>{{ ucfirst($user->role) }}</p>
                            <p>{{ $user->email }}</p>
                            <a href="{{ route('profile.edit') }}" class="btn btn-primary">Edit Foto</a>
                            <a href="{{ route('profile.edit') }}" class="btn btn-outline-primary">Edit Profile</a>
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
                                    <td style="text-align: left;">: {{ $user->name }}</td>
                                </tr>
                                <tr>
                                    <th style="text-align: left;">Email</th>
                                    <td style="text-align: left;">: {{ $user->email }}</td>
                                </tr>
                                <tr>
                                    <th style="text-align: left;">Sebagai</th>
                                    <td style="text-align: left;">: {{ ucfirst($user->role) }}</td>
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
                                    {{-- Tambahkan data kelas jika tersedia --}}
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
@endsection
