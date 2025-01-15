@extends('layouts.main')

@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="bg-light text-center rounded p-4">
        <h3>Unggah File</h3>
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <form action="{{ route('upload.store.kurikulum') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3 text-start">
                <label for="file" class="form-label">Pilih File (PDF, Word, Excel)</label>
                <input type="file" name="file" class="form-control" required>
                @error('file')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="text-start">
                <button type="submit" class="btn btn-primary">Unggah</button>
            </div>
        </form>
    </div>
</div>
@endsection
