<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\UploadKisi;
use Illuminate\Http\Request;

class UploadKisiController extends Controller
{
    public function index()
    {
        $UploadKisi = UploadKisi::all();
        $user = Auth::user();// Ambil semua data dari tabel Upload$UploadKisi
        return view('kurikulum.uploadfile.index', compact('UploadKisi' , 'user'));
    }

    public function create(){
        $user = Auth::user();
        return view('kurikulum.uploadfile.create', compact('user'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:pdf,doc,docx,xls,xlsx|max:2048',
        ]);

        if ($file = $request->file('file')) {
            $path = $file->store('uploads', 'public');
            $UploadKisi = UploadKisi ::create([
                'path' => $path,
                'type' => $file->getClientOriginalExtension(),
                'size' => $file->getSize(),
            ]);

            return redirect()->route('upload.kurikulum')->with('success', 'File berhasil diunggah!')->with('file', $UploadKisi);
        }

        return back()->with('error', 'Gagal mengunggah file.');
    }
}
