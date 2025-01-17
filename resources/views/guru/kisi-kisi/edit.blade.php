@extends('layouts.main')
@section('content')
<form action="{{ route('kisi.update.guru', $kisiKisi->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <!-- Nama File -->
    <div class="mb-3">
        <label for="nama_file" class="form-label">Nama File</label>
        <input type="file" class="form-control" name="nama_file" id="nama_file">
    </div>

    <!-- Nama Guru -->
    <div class="mb-3">
        <label for="nama_guru" class="form-label">Nama Guru</label>
        <input type="text" class="form-control" name="nama_guru" value="{{ $kisiKisi->nama_guru }}">
    </div>

    <!-- Mapel -->
    <div class="mb-3">
        <label for="mapel" class="form-label">Mapel</label>
        <input type="text" class="form-control" name="mapel" value="{{ $kisiKisi->mapel }}">
    </div>

    <!-- Tingkat (Checkbox) -->
    <div class="mb-3">
        <label class="form-label">Tingkat</label><br>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="tingkat[]" value="X" {{ in_array('X', explode(', ', $kisiKisi->tingkat)) ? 'checked' : '' }}>
            <label class="form-check-label">X</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="tingkat[]" value="XI" {{ in_array('XI', explode(', ', $kisiKisi->tingkat)) ? 'checked' : '' }}>
            <label class="form-check-label">XI</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="tingkat[]" value="XII" {{ in_array('XII', explode(', ', $kisiKisi->tingkat)) ? 'checked' : '' }}>
            <label class="form-check-label">XII</label>
        </div>
    </div>

    <!-- Konsentrasi (Checkbox) -->
    <div class="mb-3">
        <label class="form-label">Konsentrasi</label><br>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="konsentrasi[]" value="TKRO" {{ in_array('TKRO', explode(', ', $kisiKisi->konsentrasi)) ? 'checked' : '' }}>
            <label class="form-check-label">TKRO</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="konsentrasi[]" value="TKJT" {{ in_array('TKJT', explode(', ', $kisiKisi->konsentrasi)) ? 'checked' : '' }}>
            <label class="form-check-label">TKJT</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="konsentrasi[]" value="PPLG" {{ in_array('PPLG', explode(', ', $kisiKisi->konsentrasi)) ? 'checked' : '' }}>
            <label class="form-check-label">PPLG</label>
        </div>
    </div>

    <!-- Submit Button -->
    <button type="submit" class="btn btn-primary">Update</button>
</form>

<!-- Hapus Button -->
<form action="{{ route('kisi.destroy.guru', $kisiKisi->id) }}" method="POST" style="display:inline;">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">Hapus</button>
</form>
@endsection
