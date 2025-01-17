@extends('layouts.main')

@section('content')
<div class="container mt-5">
    <div class="row">
        <!-- Form Tambah Kelas -->
        <div class="col-md-6">
            <h2>Tambah Kelas</h2>
            <form action="{{ route('kelas.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="nama_kelas" class="form-label">Nama Kelas</label>
                    <input type="text" name="nama_kelas" class="form-control" id="nama_kelas" required>
                </div>
                <div class="mb-3">
                    <label for="tingkat" class="form-label">Tingkat</label>
                    <select name="tingkat" class="form-control" id="tingkat" required>
                        <option value="X">Kelas X</option>
                        <option value="XI">Kelas XI</option>
                        <option value="XII">Kelas XII</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <textarea name="deskripsi" class="form-control" id="deskripsi" rows="4"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Tambah Kelas</button>
            </form>
        </div>

        <!-- Form Tambah Siswa ke Kelas -->
        <div class="col-md-6">
            <h2>Tambah Siswa ke Kelas</h2>
            <form action="{{ route('siswa.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="kelas_id" class="form-label">Pilih Kelas</label>
                    <select name="kelas_id" class="form-control" id="kelas_id" required>
                        @foreach ($kelas as $item)
                            <option value="{{ $item->id }}">{{ $item->tingkat }} - {{ $item->nama_kelas }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="nama_siswa" class="form-label">Nama Siswa</label>
                    <input type="text" name="nama_siswa" class="form-control" id="nama_siswa" required>
                </div>
                <button type="submit" class="btn btn-success">Tambah Siswa</button>
            </form>
        </div>
    </div>

    <!-- Daftar Kelas dan Siswa -->
    <div class="mt-5">
        <h2>Daftar Kelas dan Siswa</h2>
        @foreach ($kelas as $item)
            <h4>{{ $item->tingkat }} - {{ $item->nama_kelas }}</h4>
            <ul>
                @forelse ($item->siswa as $siswa)
                    <li>{{ $siswa->nama }}</li>
                @empty
                    <li>Tidak ada siswa di kelas ini.</li>
                @endforelse
            </ul>
        @endforeach
    </div>
</div>
@endsection
