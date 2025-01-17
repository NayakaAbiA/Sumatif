<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\KisiKisi;
use App\Models\SoalUjian;
use Illuminate\Support\Facades\Storage;

class KurikulumController extends Controller
{
    // DASHBOARD
    public function dashKurikulum()
    {
        $user = Auth::user();
        return view('kurikulum.dashboard', compact('user'));
    }
    


    //KISI - KISI
    public function index()
    {
        $kisiKisi = KisiKisi::all();
        $user = Auth::user();
        return view('kurikulum.kisi-kisi.index', compact('kisiKisi', 'user'));
    }

    public function create()
    {
        $user = Auth::user();
        return view('kurikulum.kisi-kisi.create', compact('user'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_file' => 'nullable|file|mimes:pdf,jpg,png,doc,docx,xls,xlsx|max:10240',
            'mapel' => 'nullable|string|max:255',
            'tingkat' => 'nullable|string|max:50',
            'kosentrasi' => 'nullable|string|max:255',
        ]);

        $filePath = null;
        $fileSize = null;

        // Proses upload file jika ada
        if ($request->hasFile('nama_file') && $request->file('nama_file')->isValid()) {
            $filePath = $request->file('nama_file')->store('kisi_kisi', 'public');
            $fileSize = $request->file('nama_file')->getSize();
        }

        // Mendapatkan nama guru dan user_id dari akun yang sedang login
        $namaGuru = Auth::user()->name;
        $userId = Auth::id();

        // Menyimpan data ke database
        KisiKisi::create([
            'nama_file' => $filePath,
            'ukuran' => $fileSize,
            'nama_guru' => $namaGuru,
            'mapel' => $request->input('mapel'),
            'tingkat' => $request->input('tingkat'),
            'kosentrasi' => $request->input('kosentrasi'),
            'user_id' => $userId,  // Menyimpan user_id yang sedang login
        ]);

        return redirect()->route('kisi.kurikulum')->with('success', 'Data Kisi-Kisi berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $kisiKisi = KisiKisi::findOrFail($id);
        $user = Auth::user();
        return view('kurikulum.kisi-kisi.edit', compact('kisiKisi', 'user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_file' => 'nullable|file|mimes:pdf,jpg,png,doc,docx,xls,xlsx|max:10240',
            'mapel' => 'nullable|string|max:255',
            'tingkat' => 'nullable|string|max:50',
            'kosentrasi' => 'nullable|string|max:255',
        ]);

        $kisiKisi = KisiKisi::findOrFail($id);
        $filePath = $kisiKisi->nama_file;
        $fileSize = $kisiKisi->ukuran;

        // Jika ada file baru yang diupload
        if ($request->hasFile('nama_file') && $request->file('nama_file')->isValid()) {
            if (Storage::exists('public/' . $filePath)) {
                Storage::delete('public/' . $filePath);
            }
            $filePath = $request->file('nama_file')->store('kisi_kisi', 'public');
            $fileSize = $request->file('nama_file')->getSize();
        }

        // Mendapatkan nama guru dan user_id dari akun yang sedang login
        $namaGuru = Auth::user()->name;
        $userId = Auth::id();

        // Update data di database
        $kisiKisi->update([
            'nama_file' => $filePath,
            'ukuran' => $fileSize,
            'nama_guru' => $namaGuru,
            'mapel' => $request->input('mapel'),
            'tingkat' => $request->input('tingkat'),
            'kosentrasi' => $request->input('kosentrasi'),
            'user_id' => $userId,  // Menyimpan user_id yang sedang login
        ]);

        return redirect()->route('kisi.kurikulum')->with('success', 'Data Kisi-Kisi berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $kisiKisi = KisiKisi::findOrFail($id);

        // Hapus file dari storage jika ada
        if (Storage::exists('public/' . $kisiKisi->nama_file)) {
            Storage::delete('public/' . $kisiKisi->nama_file);
        }

        // Hapus data dari database
        $kisiKisi->delete();

        return redirect()->route('kisi.kurikulum')->with('success', 'Data Kisi-Kisi berhasil dihapus.');
    }


    //DAFTAR HADIR
    public function dftrHadirKurikulum(){
        $user = Auth::user();
        return view('kurikulum.daftar-hadir.index' , compact('user'));
    }

    public function editProfile($id)
    {
        $kisiKisi = KisiKisi::findOrFail($id);

        // Mengecek apakah file ada di storage
        if (Storage::exists('public/' . $kisiKisi->nama_file)) {
            return response()->download(storage_path('app/public/' . $kisiKisi->nama_file));
        }

        return redirect()->route('kisi.kurikulum')->with('error', 'File tidak ditemukan.');
    }

    public function downloadBlanko()
    {
        // Pastikan file sudah ada di folder yang tepat
        $filePath = storage_path('app/public/uploads/blanko.pdf');

        if (file_exists($filePath)) {
            return response()->download($filePath);
        } else {
            return redirect()->back()->with('error', 'File blanko tidak ditemukan.');
        }
    }


    //Soal Ujian
    public function indexSoal()
    {
        $user = Auth::user();
        $soalUjian = SoalUjian::all();
        return view('kurikulum.soal-ujian.index', compact('soalUjian', 'user'));
    }

    public function createSoal()
    {
        $user = Auth::user();
        $soalUjian = SoalUjian::all();
        return view('kurikulum.soal-ujian.create', compact('soalUjian', 'user'));
    }

    public function storeSoal(Request $request)
    {
        $request->validate([
            'nama_guru' => 'required',
            'mapel' => 'required',
            'tingkat' => 'required',
            'konsentrasi' => 'required',
            'soal' => 'nullable|string',
        ]);

        SoalUjian::create($request->all());

        return redirect()->route('soal.kurikulum')->with('success', 'Soal ujian berhasil ditambahkan.');
    }

    public function editSoal($id)
    {
        $user = Auth::user();
        $soalUjian = SoalUjian::findOrFail($id);
        return view('soal.edit.kurikulum', compact('soalUjian', 'user'));
    }

    public function updateSoal(Request $request, $id)
    {
        $request->validate([
            'nama_guru' => 'required',
            'mapel' => 'required',
            'tingkat' => 'required',
            'konsentrasi' => 'required',
            'soal' => 'nullable|string',
        ]);

        $soalUjian = SoalUjian::findOrFail($id);
        $soalUjian->update($request->all());

        return redirect()->route('soal.kurikulum')->with('success', 'Soal ujian berhasil diperbarui.');
    }

    public function destroySoal($id)
    {
        $soalUjian = SoalUjian::findOrFail($id);
        $soalUjian->delete();

        return redirect()->route('soal.kurikulum')->with('success', 'Soal ujian berhasil dihapus.');
    }
}
