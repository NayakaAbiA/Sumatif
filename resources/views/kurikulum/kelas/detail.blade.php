@extends('layouts.main')

@section('content')
<div class="container mt-4">
    <h2 class="text-center mb-4">Detail Kelas: {{ $kelas->nama_kelas }} ({{ $kelas->tingkat }})</h2>

    <div class="card">
        <div class="card-header">
            Daftar Siswa
        </div>
        <div class="card-body">
            @if($kelas->siswa->isEmpty())
                <p class="text-center">Tidak ada siswa dalam kelas ini.</p>
            @else
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Siswa</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($kelas->siswa as $index => $siswa)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $siswa->nama }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
    <div class="mt-3 text-center">
        <a href="{{ route('kelas.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
</div>
@endsection
