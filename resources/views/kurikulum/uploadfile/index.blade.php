@extends('layouts.main')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="bg-light text-center rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <div>
                <a href="{{ route('upload.create.kurikulum')}}" class="btn btn-sm btn-success"><i class="fa fa-upload"></i> Unggah</a>
            </div>
            <div>
                <a href="">Show All</a>
            </div>
        </div>
            <div class="table-responsive">
                <table class="table text-start align-middle table-bordered table-hover mb-0">
                <thead>
                    <tr class="text-dark">>
                        <th class="text-center">Blangko Kisi - Kisi</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                    <tbody>
                    @foreach($UploadKisi as $file)
                        <tr>
                            <td>{{ $file->type }}</td>
                            <!-- <td>{{ number_format($file->size / 1024, 2) }} KB</td>
                            <td>
                                <a href="{{ asset('storage/' . $file->path) }}" target="_blank" class="btn btn-sm btn-primary">Lihat</a>
                            </td> -->
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
