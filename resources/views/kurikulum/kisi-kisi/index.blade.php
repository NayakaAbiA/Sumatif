@extends('layouts.main')

@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="row">
        <!-- Card untuk Nama File (Bagian atas) -->
        <div class="col-lg-12 mb-4">
            <div class="bg-light text-center rounded p-4">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h5>Detail Kisi-Kisi</h5>
                    <a href="{{ route('kisi.create.kurikulum') }}" class="btn btn-sm btn-success">
                        <i class="fas fa-upload"></i> Unggah</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>  <!-- Kolom untuk nomor -->
                                <th>Nama File</th>
                                <th>Aksi</th> <!-- Kolom aksi untuk edit dan hapus -->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($kisiKisi as $index => $item)
                                <tr>
                                    <td>{{ $index + 1 }}</td>  <!-- Menampilkan nomor baris -->
                                    <td>{{ $item->nama_file ?? 'Tidak ada file' }}</td>
                                    <td>
                                        <a href="{{ route('kisi.edit.kurikulum', $item->id) }}" class="btn btn-warning btn-sm">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('kisi.destroy.kurikulum', $item->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus file ini?')">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Card untuk Informasi Lain (Bagian bawah) -->
        <div class="col-lg-12 mb-4">
    <div class="bg-light text-center rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h5>Daftar Kisi-Kisi</h5>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>  <!-- Kolom untuk nomor -->
                        <th>Nama Guru</th>
                        <th>Mapel</th>
                        <th>Tingkat</th>
                        <th>Konsentrasi</th>
                        <th>File</th>
                        <th>Aksi</th> <!-- Kolom aksi untuk edit dan hapus -->
                    </tr>
                </thead>
                <tbody>
                    @foreach($kisiKisi as $index => $item)
                        <tr>
                            <td>{{ $index + 1 }}</td>  <!-- Menampilkan nomor baris -->
                            <td>{{ $item->nama_guru }}</td>
                            <td>{{ $item->mapel }}</td>
                            <td>{{ $item->tingkat }}</td>
                            <td>{{ $item->konsentrasi }}</td>
                            <td>{{ $item->nama_file ?? 'Tidak ada file' }}</td>

                            <!-- Kolom untuk melihat file -->
                            <td>
                                @if($item->nama_file)
                                    <!-- Menampilkan tombol Lihat jika file ada -->
                                    <a href="{{ asset('storage/' . $item->nama_file) }}" target="_blank" class="btn btn-info btn-sm">
                                        <i class="fas fa-eye"></i> Lihat
                                    </a>
                                @elsez
                                    <span>Tidak ada file</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
