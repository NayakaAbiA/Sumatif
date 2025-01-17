@extends('layouts.main')

@section('content')
<div class="container-fluid pt-4 px-6">
    <div class="row">
        <!-- Card untuk Informasi Kisi-Kisi -->
        <div class="col-lg-12 mb-4">
            <div class="bg-light rounded p-4">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h5>Daftar Kisi-Kisi</h5>
                    <a href="{{ route('kisi.create.guru') }}" class="btn btn-success btn-sm">
                        <i class="fas fa-plus"></i> Tambah Kisi-Kisi
                    </a>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Nama Guru</th>
                                <th>Mapel</th>
                                <th>Tingkat</th>
                                <th>Konsentrasi</th>
                                <th>Jawaban</th>
                                <th class="text-center">Aksi</th> <!-- Kolom aksi -->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($kisiKisi as $item)
                                <tr>
                                    <td>{{ $item->nama_guru }}</td>
                                    <td>{{ $item->mapel }}</td>
                                    <td>{{ $item->tingkat }}</td>
                                    <td>{{ $item->konsentrasi }}</td>
                                    <td>{{ $item->nama_file ?? 'Tidak ada file' }}</td>
                                    <td class="text-center">
                                        <!-- Tombol Edit -->
                                        <a href="{{ route('kisi.edit.guru', $item->id) }}" class="btn btn-warning btn-sm">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
                                        <!-- Tombol Hapus -->
                                        <form action="{{ route('kisi.destroy.guru', $item->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus kisi-kisi ini?')">
                                                <i class="fas fa-trash"></i> Hapus
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
    </div>
</div>
@endsection
