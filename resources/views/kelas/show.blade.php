@extends('layouts.main')

@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-3">
            <div class="bg-dark text-white p-3 rounded">
                <h5 class="mb-3">Daftar Kelas</h5>
                <ul class="list-group">
                    <li class="list-group-item bg-dark text-white">VII.A <i class="bi bi-check-circle-fill text-success"></i></li>
                    <li class="list-group-item bg-dark text-white">VII.B <i class="bi bi-check-circle-fill text-success"></i></li>
                    <li class="list-group-item bg-dark text-white">VII.C <i class="bi bi-check-circle-fill text-success"></i></li>
                    <li class="list-group-item bg-dark text-white">VII.D <i class="bi bi-check-circle-fill text-success"></i></li>
                    <li class="list-group-item bg-dark text-white">VII.E <i class="bi bi-check-circle-fill text-success"></i></li>
                    <li class="list-group-item bg-dark text-white">VIII.A <i class="bi bi-check-circle-fill text-success"></i></li>
                </ul>
            </div>
        </div>

        <!-- Main Content -->
        <div class="col-md-9">
            <div class="bg-light rounded p-4">
                <h4 class="mb-4">Rincian Kelas</h4>
                <div class="row">
                    <!-- Card -->
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body text-center">
                                <img src="{{ asset('assets/img/teacher-icon.png') }}" alt="Icon Guru" class="img-fluid mb-3" style="width: 80px;">
                                <h5 class="card-title">VII.A</h5>
                                <p>Wali Kelas</p>
                                <h6>Imas Siti Masitoh S.Pd.</h6>
                            </div>
                        </div>
                    </div>
                    <!-- Detail -->
                    <div class="col-md-6">
                        <ul class="list-group">
                            <li class="list-group-item"><i class="bi bi-book"></i> Mata Pelajaran: <strong>Bahasa Sunda</strong></li>
                            <li class="list-group-item"><i class="bi bi-people"></i> Jumlah Siswa: <strong>31</strong></li>
                            <li class="list-group-item"><i class="bi bi-calendar"></i> Tahun Ajaran: <strong>2024/2025</strong></li>
                            <li class="list-group-item"><i class="bi bi-clock"></i> Semester: <strong>Ganjil</strong></li>
                            <li class="list-group-item"><i class="bi bi-file-text"></i> Kurikulum: <strong>Kurikulum Merdeka</strong></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="bg-light rounded p-4 mt-4">
                <h4>Siswa Mapel VII.A</h4>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>NIS</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Ahmad</td>
                            <td>123456</td>
                            <td>Aktif</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Budi</td>
                            <td>654321</td>
                            <td>Aktif</td>
                        </tr>
                        <!-- Tambahkan data siswa lainnya -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
 