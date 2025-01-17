@extends('layouts.main')

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4" style="font-family: 'Poppins', sans-serif; font-weight: 600; color: #333;">Manajemen Kelas, Jurusan, dan Siswa</h2>

    @if(session('success'))
        <div class="alert alert-success text-center mb-4">{{ session('success') }}</div>
    @endif

    <div class="row">
        <!-- Form Tambah Kelas -->
        <div class="col-md-6 mb-4">
            <div class="card border-0 shadow-sm rounded-3">
                <div class="card-header text-center bg-light">
                    <strong>Tambah Kelas</strong>
                </div>
                <div class="card-body">
                    <form action="{{ route('kelas.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="nama_kelas" class="form-label">Nama Jurusan</label>
                            <input type="text" class="form-control" id="nama_kelas" name="nama_kelas" required placeholder="Masukkan Nama Jurusan">
                        </div>
                        <div class="mb-3">
                            <label for="tingkat" class="form-label">Tingkat</label>
                            <select class="form-select" id="tingkat" name="tingkat" required>
                                <option value="X">Kelas X</option>
                                <option value="XI">Kelas XI</option>
                                <option value="XII">Kelas XII</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Simpan Kelas</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Form Tambah Siswa -->
        <div class="col-md-6 mb-4">
            <div class="card border-0 shadow-sm rounded-3">
                <div class="card-header text-center bg-light">
                    <strong>Tambah Siswa</strong>
                </div>
                <div class="card-body">
                    <form action="{{ route('siswa.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="nama_siswa" class="form-label">Nama Siswa</label>
                            <input type="text" class="form-control" id="nama_siswa" name="nama_siswa" required placeholder="Masukkan Nama Siswa">
                        </div>
                        <div class="mb-3">
                            <label for="nis" class="form-label">NIS</label>
                            <input type="number" class="form-control" id="nis" name="nis" required placeholder="Masukkan NIS">
                        </div>
                        <div class="mb-3">
                            <label for="nisn" class="form-label">NISN</label>
                            <input type="number" class="form-control" id="nisn" name="nisn" required placeholder="Masukkan NISN">
                        </div>
                        <div class="mb-3">
                            <label for="kelas_id" class="form-label">Jurusan</label>
                            <select class="form-select" id="kelas_id" name="kelas_id" required>
                                @foreach($jurusan as $j)
                                    <option value="{{ $j->id }}">{{ $j->nama_kelas }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                            <select class="form-select" id="jenis_kelamin" name="jenis_kelamin" required>
                                <option value="">Pilih Jenis Kelamin</option>
                                <option value="Laki-Laki">Laki-Laki</option>
                                <option value="Perempuan">Perempuan</option>
                                <option value="Bencong">Bencong</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Simpan Siswa</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Daftar Kelas -->
        <div class="col-md-6 mb-4">
            <div class="card border-0 shadow-sm rounded-3">
                <div class="card-header text-center bg-light">
                    <strong>Daftar Kelas</strong>
                </div>
                <div class="card-body p-2">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <a href="#" class="kelas-link" data-tingkat="X">Kelas X</a>
                        </li>
                        <li class="list-group-item">
                            <a href="#" class="kelas-link" data-tingkat="XI">Kelas XI</a>
                        </li>
                        <li class="list-group-item">
                            <a href="#" class="kelas-link" data-tingkat="XII">Kelas XII</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Daftar Jurusan -->
        <div class="col-md-6 mb-4">
            <div class="card border-0 shadow-sm rounded-3">
                <div class="card-header text-center bg-light">
                    <strong>Daftar Jurusan</strong>
                </div>
                <div class="card-body p-2">
                    <ul class="list-group" id="jurusan-list" style="background-color: #f8f9fa; border-radius: 5px;">
                        <li class="list-group-item">Pilih kelas untuk melihat jurusan</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Tabel Data Siswa -->
        <div class="col-md-12 mb-4">
            <div class="card border-0 shadow-sm rounded-3">
                <div class="card-header text-center bg-light">
                    <strong>Daftar Siswa</strong>
                </div>
                <div class="card-body">
                    <!-- Tombol Hapus Siswa Terpilih -->
                    <button id="delete-selected" class="btn btn-danger mb-3" style="display:none;">Hapus Siswa Terpilih</button>

                    <table class="table table-bordered table-striped table-hover" id="siswa-table">
                        <thead>
                            <tr>
                                <th style="width: 1%;"><input type="checkbox" id="select-all" class="form-check-input" style="width: 10px; height: 10px;"></th>
                                <th>No</th>
                                <th>NISN</th>
                                <th>Nama Siswa</th>
                                <th>Jenis Kelamin</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="4" class="text-center">Pilih jurusan untuk melihat data siswa</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Script AJAX -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Klik kelas untuk memuat jurusan
        $('.kelas-link').on('click', function(e) {
            e.preventDefault();
            const tingkat = $(this).data('tingkat');

            $.ajax({
                url: `/kelas/jurusan/${tingkat}`,
                method: 'GET',
                success: function(data) {
                    const jurusanList = $('#jurusan-list');
                    jurusanList.empty();

                    if (data.length === 0) {
                        jurusanList.append('<li class="list-group-item">Tidak ada jurusan untuk kelas ini</li>');
                    } else {
                        data.forEach(function(jurusan) {
                            jurusanList.append(
                                `<li class="list-group-item">
                                    <a href="#" class="jurusan-link" data-jurusan-id="${jurusan.id}">${jurusan.nama_kelas}</a>
                                </li>`
                            );
                        });
                    }
                },
                error: function() {
                    alert('Gagal mengambil data jurusan.');
                }
            });
        });

        // Klik jurusan untuk memuat data siswa
        $(document).on('click', '.jurusan-link', function(e) {
            e.preventDefault();
            const jurusanId = $(this).data('jurusan-id');

            $.ajax({
                url: `/jurusan/siswa/${jurusanId}`,
                method: 'GET',
                success: function(data) {
                    const siswaTable = $('#siswa-table tbody');
                    siswaTable.empty();
                    $('#delete-selected').hide(); // Hide delete button initially

                    if (data.length === 0) {
                        siswaTable.append('<tr><td colspan="5" class="text-center">Tidak ada siswa di jurusan ini</td></tr>');
                    } else {
                        data.forEach(function(siswa, index) {
                            siswaTable.append(`<tr><td><input type="checkbox" class="form-check-input siswa-checkbox" data-siswa-id="${siswa.id}"></td><td>${index + 1}</td><td>${siswa.nisn}</td><td>${siswa.nama}</td><td>${siswa.jenis_kelamin}</td></tr>`);
                        });
                    }
                },
                error: function() {
                    alert('Gagal mengambil data siswa.');
                }
            });
        });

        // Fungsi untuk memilih atau membatalkan semua siswa
        $('#select-all').on('change', function() {
            const isChecked = $(this).prop('checked');
            $('.siswa-checkbox').prop('checked', isChecked);
            toggleDeleteButton(); // Menampilkan tombol hapus jika ada siswa yang terpilih
        });

        // Cek jika ada siswa yang dipilih atau tidak
        $(document).on('change', '.siswa-checkbox', function() {
            toggleDeleteButton();
        });

        // Fungsi untuk menampilkan atau menyembunyikan tombol Hapus
        function toggleDeleteButton() {
            const selectedSiswa = $('.siswa-checkbox:checked');
            if (selectedSiswa.length > 0) {
                $('#delete-selected').show();
            } else {
                $('#delete-selected').hide();
            }
        }

        // Hapus siswa terpilih
        $('#delete-selected').on('click', function() {
            const selectedIds = [];
            $('.siswa-checkbox:checked').each(function() {
                selectedIds.push($(this).data('siswa-id'));
            });

            if (selectedIds.length > 0) {
                $.ajax({
                    url: '/siswa/hapus', // Ganti dengan URL penghapusan siswa
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        ids: selectedIds
                    },
                    success: function(response) {
                        alert(response.message);
                        location.reload(); // Reload halaman untuk memperbarui data
                    },
                    error: function() {
                        alert('Gagal menghapus siswa.');
                    }
                });
            }
        });
    });
</script>
@endsection
