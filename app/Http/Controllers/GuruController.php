<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\KisiKisi;

class GuruController extends Controller
{
    // Menampilkan dashboard guru
    public function dashGuru()
    {
        $user = Auth::user();
        if (!$user) {
            return redirect('/login')->with('error', 'Silakan login terlebih dahulu.');
        }
        return view('guru.dashboard', compact('user'));
    }

    // Menampilkan daftar kisi-kisi milik user login
    public function index()
    {
        $user = Auth::user();
        $kisiKisi = KisiKisi::where('user_id', Auth::id())->get(); // Filter hanya data milik user login
        return view('guru.kisi-kisi.index', compact('kisiKisi', 'user'));
    }

    // Menampilkan form tambah kisi-kisi
    public function create()
    {
        $user = Auth::user();
        return view('guru.kisi-kisi.create', compact('user'));
    }

    // Menyimpan kisi-kisi baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'nama_file' => 'nullable|file|mimes:pdf,jpg,png,doc,docx,xls,xlsx|max:10240',
            'ukuran' => 'nullable|integer',
            'nama_guru' => 'nullable|string|max:255',
            'mapel' => 'nullable|string|max:255',
            'tingkat' => 'nullable|array',
            'tingkat.*' => 'nullable|string|max:50',
            'konsentrasi' => 'nullable|array',
            'konsentrasi.*' => 'nullable|string|max:50',
        ]);

        $fileName = null;
        $fileSize = null;

        if ($request->hasFile('nama_file') && $request->file('nama_file')->isValid()) {
            $file = $request->file('nama_file');
            $fileName = $file->getClientOriginalName();
            $file->storeAs('public/kisi_kisi', $fileName);
            $fileSize = $file->getSize();
        }

        $tingkat = $request->input('tingkat') ? implode(', ', $request->input('tingkat')) : null;
        $konsentrasi = $request->input('konsentrasi') ? implode(', ', $request->input('konsentrasi')) : null;

        KisiKisi::create([
            'nama_file' => $fileName,
            'ukuran' => $fileSize,
            'nama_guru' => $request->input('nama_guru'),
            'mapel' => $request->input('mapel'),
            'tingkat' => $tingkat,
            'konsentrasi' => $konsentrasi,
            'user_id' => Auth::id(), // Menyimpan ID user login
        ]);

        return redirect()->route('kisi.guru')->with('success', 'Data Kisi-Kisi berhasil ditambahkan.');
    }

    // Menampilkan form edit kisi-kisi
    public function edit($id)
    {
        $user = Auth::user();
        $kisiKisi = KisiKisi::where('id', $id)->where('user_id', Auth::id())->firstOrFail(); // Filter data milik user login
        return view(view: 'guru.kisi-kisi.edit', data: compact('kisiKisi', 'user'));
    }

    // Memperbarui data kisi-kisi
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_file' => 'nullable|file|mimes:pdf,jpg,png,doc,docx,xls,xlsx|max:10240',
            'ukuran' => 'nullable|integer',
            'nama_guru' => 'nullable|string|max:255',
            'mapel' => 'nullable|string|max:255',
            'tingkat' => 'nullable|array',
            'tingkat.*' => 'nullable|string|max:50',
            'konsentrasi' => 'nullable|array',
            'konsentrasi.*' => 'nullable|string|max:50',
        ]);

        $kisiKisi = KisiKisi::where('id', $id)->where('user_id', Auth::id())->firstOrFail(); // Filter data milik user login
        $fileName = $kisiKisi->nama_file;
        $fileSize = $kisiKisi->ukuran;

        if ($request->hasFile('nama_file') && $request->file('nama_file')->isValid()) {
            $file = $request->file('nama_file');
            $fileName = $file->getClientOriginalName();
            $file->storeAs('public/kisi_kisi', $fileName);
            $fileSize = $file->getSize();
        }

        $tingkat = $request->input('tingkat') ? implode(', ', $request->input('tingkat')) : null;
        $konsentrasi = $request->input('konsentrasi') ? implode(', ', $request->input('konsentrasi')) : null;

        $kisiKisi->update([
            'nama_file' => $fileName,
            'ukuran' => $fileSize,
            'nama_guru' => $request->input('nama_guru'),
            'mapel' => $request->input('mapel'),
            'tingkat' => $tingkat,
            'konsentrasi' => $konsentrasi,
        ]);

        return redirect()->route('kisi.guru')->with('success', 'Data Kisi-Kisi berhasil diperbarui.');
    }

    // Menghapus kisi-kisi
    public function destroy($id)
    {
        $kisiKisi = KisiKisi::where('id', $id)->where('user_id', Auth::id())->firstOrFail(); // Filter data milik user login
        if ($kisiKisi->nama_file) {
            Storage::delete('public/kisi_kisi/' . $kisiKisi->nama_file);
        }
        $kisiKisi->delete();

        return redirect()->route('kisi.guru')->with('success', 'Data Kisi-Kisi berhasil dihapus.');
    }

    public function download($id)
{
    $kisiKisi = KisiKisi::findOrFail($id);

    // Mengecek apakah file ada di storage
    if (Storage::exists('public/' . $kisiKisi->nama_file)) {
        return response()->download(storage_path('app/public/' . $kisiKisi->nama_file));
    }

    return redirect()->route('kisi.guru')->with('error', 'File tidak ditemukan.');
}
}
