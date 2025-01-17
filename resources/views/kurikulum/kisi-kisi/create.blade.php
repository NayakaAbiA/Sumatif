@extends('layouts.main')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row">
            <div class="col-lg-8 mb-4">
                <div class="bg-light text-center rounded p-4">
                    <h5>Tambah Data Kisi-Kisi</h5>
                    
                    <!-- Menampilkan pesan error global -->
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('kisi.store.kurikulum') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="nama_file" class="form-label">File Kisi-Kisi (opsional)</label>
                            <input type="file" name="nama_file" id="nama_file" class="form-control @error('nama_file') is-invalid @enderror">
                            @error('file')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-success">Simpan Data</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
