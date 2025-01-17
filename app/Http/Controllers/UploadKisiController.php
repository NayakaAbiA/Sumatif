<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\UploadKisi;
use Illuminate\Http\Request;

class UploadKisiController extends Controller
{
    public function index()
    {
        $uploadKisi = UploadKisi::all(); // Ambil semua data dari tabel Upload$UploadKisi
        $user = Auth::user();
        return view('kurikulum.uploadfile.index', compact('uploadKisi', 'user'));
    }

    public function create(){
        $user = Auth::user();
        return view('kurikulum.uploadfile.create',  compact('user'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|file|max:20048', // Validasi file
        ]);
    
        $file = $request->file('file');
        $fileName = $file->getClientOriginalName();
        $filePath = $file->store('kisi_kisi');
    
        $uploadKisi = UploadKisi::create([
            'name' => $fileName,
            'type' => $file->getClientOriginalExtension(),
            'size' => $file->getSize(),
        ]);

            return redirect()->route('upload.kurikulum')->with('success', 'File berhasil diunggah!')->with('file', $uploadKisi);
    }
}
