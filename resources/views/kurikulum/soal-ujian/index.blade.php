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
                        <!-- Tombol Unggah Soal -->
                        <a href="{{ route('soal.create.kurikulum') }}" class="btn btn-primary btn-sm me-2">
                            <i class="fas fa-upload"></i> Upload
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
                      
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Card untuk Informasi Kurikulum -->
        <div class="col-lg-12">
            <div class="bg-light rounded p-4">
                <h5 class="mb-4">Kurikulum dengan Soal Terunggah</h5>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Kurikulum</th>
                                <th>Jumlah Soal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
