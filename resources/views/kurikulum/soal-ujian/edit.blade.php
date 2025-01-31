@extends('layouts.main')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row">
            <div class="col-lg-8 mb-4">
                <div class="bg-light text-center rounded p-4">
                    <h5>Edit Data Kisi-Kisi</h5>

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

                    <form action="{{ route('soal.update.kurikulum', $soalUjian->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="nama_file" class="form-label">File Kisi-Kisi (opsional)</label>
                            <input type="file" name="nama_file" id="nama_file" class="form-control @error('nama_file') is-invalid @enderror">
                            
                            <!-- Menampilkan nama file lama -->
                            @if ($soalUjian->nama_file)
                                <div class="mt-2">
                                    <strong>File Lama:</strong> {{ $soalUjian->nama_file }}
                                </div>
                            @endif
                            
                            @error('nama_file')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-success">Update Data</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
