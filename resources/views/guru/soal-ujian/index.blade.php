@extends('layouts.main')

@section('content')
<div class="container-fluid pt-4 px-6">
    <div class="row">
        <!-- Card untuk Informasi Soal Ujian -->
        <div class="col-lg-12 mb-4">
            <div class="bg-light rounded p-4">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h5>Daftar Soal Ujian</h5>
                    <div>
                        <!-- Tombol Unggah Soal menggunakan Form -->
                        <a href="{{ route('soal.create.guru') }}" class="btn btn-primary btn-sm me-2">
                            <i class="fas fa-download"></i>upload
                        </a>
                        <!-- Tombol Download Blangko -->
                        <a href="{{ route('download.soal') }}" class="btn btn-primary btn-sm me-2">
                            <i class="fas fa-download"></i> Download Blangko
                        </a>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Nama Guru</th>
                                <th>Mapel</th>
                                <th>Tingkat</th>
                                <th>Konsentrasi</th>
                                <th>Soal</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($soalUjian as $soal)
                            <tr>
                                <td>{{ $soal->nama_guru }}</td>
                                <td>{{ $soal->mapel }}</td>
                                <td>{{ $soal->tingkat }}</td>
                                <td>{{ $soal->konsentrasi }}</td>
                                <td>{{ $soal->soal }}</td>
                                <td class="text-center">
                                    <a href="{{ route('soal.edit.guru', $soal->id) }}" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <form action="{{ route('soal.destroy.guru', $soal->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus soal ini?')">
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
