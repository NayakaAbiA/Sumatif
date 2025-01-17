<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth; // Pastikan Auth diimpor
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\KisiKisi;

class GuruController extends Controller
{
    public function dashGuru()
    {
        // Mendapatkan data pengguna yang sedang login
        $user = Auth::user();

        // Jika pengguna tidak ditemukan (misalnya, belum login), redirect ke halaman login
        if (!$user) {
            return redirect('/login')->with('error', 'Silakan login terlebih dahulu.');
        }

        // Mengirim data pengguna ke view
        return view('guru.dashboard', compact('user'));
    }


    //KISI - KISI
    public function index()
    {
        $kisiKisi = KisiKisi::all();
        $user = Auth::user();
        return view('guru.kisi-kisi.index', compact('kisiKisi', 'user'));
    }

    public function create()
    {
        $user = Auth::user();
        return view('guru.kisi-kisi.create', compact('user'));
    }

    public function store(Request $request)
{
    // Validasi input
    $request->validate([
        'nama_file' => 'nullable|file|mimes:pdf,jpg,png,doc,docx,xls,xlsx|max:10240',
        'ukuran' => 'nullable|integer',
        'nama_guru' => 'nullable|string|max:255',
        'mapel' => 'nullable|string|max:255',
        'tingkat' => 'nullable|array',  // Pastikan tingkat adalah array dan tidak wajib
        'tingkat.*' => 'nullable|string|max:50',  // Validasi elemen dalam array
        'konsentrasi' => 'nullable|array',  // Pastikan konsentrasi adalah array dan tidak wajib
        'konsentrasi.*' => 'nullable|string|max:50',  // Validasi elemen dalam array
    ]);

    // Inisialisasi fileName dan fileSize
    $fileName = null;
    $fileSize = null;

    // Proses upload file jika ada
    if ($request->hasFile('nama_file') && $request->file('nama_file')->isValid()) {
        $file = $request->file('nama_file');
        $fileName = $file->getClientOriginalName();
        $file->storeAs('public/kisi_kisi', $fileName);  // Simpan file di folder 'public/kisi_kisi'
        $fileSize = $file->getSize();  // Ambil ukuran file
    }

    // Menggabungkan array tingkat dan konsentrasi menjadi string
    $tingkat = $request->input('tingkat') ? implode(', ', $request->input('tingkat')) : null;
    $konsentrasi = $request->input('konsentrasi') ? implode(', ', $request->input('konsentrasi')) : null;

    // Menyimpan data ke database
    KisiKisi::create([
        'nama_file' => $fileName,
        'ukuran' => $fileSize,
        'nama_guru' => $request->input('nama_guru'),
        'mapel' => $request->input('mapel'),
        'tingkat' => $tingkat,
        'konsentrasi' => $konsentrasi,  // Pastikan kolom ini ada di database
    ]);

    // Mengarahkan kembali dengan pesan sukses
    return redirect()->route('kisi.guru')->with('success', 'Data Kisi-Kisi berhasil ditambahkan.');
}

    
    public function edit($id)
    {
        $user = Auth::user();
        // Ambil data KisiKisi berdasarkan ID
        $kisiKisi = KisiKisi::findOrFail($id);

        // Mengembalikan view dengan data KisiKisi yang sudah diambil
        return view('kisi_kisi.edit', compact('kisiKisi', 'user'));
    }

    
    public function update(Request $request, $id)
    {
        // Validasi input
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

        // Ambil data KisiKisi berdasarkan ID
        $kisiKisi = KisiKisi::findOrFail($id);

        // Inisialisasi fileName dan fileSize
        $fileName = $kisiKisi->nama_file; // Default file name
        $fileSize = $kisiKisi->ukuran;    // Default file size

        // Proses upload file jika ada
        if ($request->hasFile('nama_file') && $request->file('nama_file')->isValid()) {
            $file = $request->file('nama_file');
            $fileName = $file->getClientOriginalName();
            $file->storeAs('public/kisi_kisi', $fileName);  // Simpan file di folder 'public/kisi_kisi'
            $fileSize = $file->getSize();  // Ambil ukuran file
        }

        // Menggabungkan array tingkat dan konsentrasi menjadi string
        $tingkat = $request->input('tingkat') ? implode(', ', $request->input('tingkat')) : null;
        $konsentrasi = $request->input('konsentrasi') ? implode(', ', $request->input('konsentrasi')) : null;

        // Update data KisiKisi
        $kisiKisi->update([
            'nama_file' => $fileName,
            'ukuran' => $fileSize,
            'nama_guru' => $request->input('nama_guru'),
            'mapel' => $request->input('mapel'),
            'tingkat' => $tingkat,
            'konsentrasi' => $konsentrasi,
        ]);

        // Mengarahkan kembali dengan pesan sukses
        return redirect()->route('kisi.guru')->with('success', 'Data Kisi-Kisi berhasil diperbarui.');
    }

    public function destroy($id)
    {
        // Ambil data KisiKisi berdasarkan ID
        $kisiKisi = KisiKisi::findOrFail($id);

        // Hapus file jika ada
        if ($kisiKisi->nama_file) {
            Storage::delete('public/kisi_kisi/' . $kisiKisi->nama_file);
        }

        // Hapus data KisiKisi
        $kisiKisi->delete();

        // Mengarahkan kembali dengan pesan sukses
        return redirect()->route('kisi.guru')->with('success', 'Data Kisi-Kisi berhasil dihapus.');
    }
}
