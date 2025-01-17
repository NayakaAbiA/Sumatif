@extends('layouts.main')

@section('content')
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
                            @foreach ($kelas['kelas10'] as $kelas10)
                                <li class="list-group-item">{{ $kelas10 }}</li>
                            @endforeach
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
                            @foreach ($kelas['kelas11'] as $kelas11)
                                <li class="list-group-item">{{ $kelas11 }}</li>
                            @endforeach
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
                            @foreach ($kelas['kelas12'] as $kelas12)
                                <li class="list-group-item">{{ $kelas12 }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
