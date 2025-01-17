<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\KisiKisi;
use Illuminate\Support\Facades\Storage;

class KurikulumController extends Controller
{
    //DASHBOARD
    public function dashKurikulum(){
        $user = Auth::user();
        return view('kurikulum.dashboard' , compact('user'));

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
            'ukuran' => 'nullable|integer',
            'nama_guru' => 'nullable|string|max:255',
            'mapel' => 'nullable|string|max:255',
            'tingkat' => 'nullable|string|max:50',
            'kosentrasi' => 'nullable|string|max:255',
        ]);

        $filePath = null;  // Inisialisasi path file
        $fileSize = null;  // Inisialisasi ukuran file

        // Proses upload file jika ada
        if ($request->hasFile('nama_file') && $request->file('nama_file')->isValid()) {
            $filePath = $request->file('nama_file')->store('uploads', 'public');  // Simpan ke storage/app/public/kisi_kisi
            $fileSize = $request->file('nama_file')->getSize();
        }

        // Menyimpan data ke database
        KisiKisi::create([
            'nama_file' => $filePath,  // Path relatif ke file
            'ukuran' => $fileSize,  // Ukuran file
            'nama_guru' => $request->input('nama_guru'),
            'mapel' => $request->input('mapel'),
            'tingkat' => $request->input('tingkat'),
            'kosentrasi' => $request->input('kosentrasi'), // Pastikan sesuai nama kolom
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
            'nama_guru' => 'nullable|string|max:255',
            'mapel' => 'nullable|string|max:255',
            'tingkat' => 'nullable|string|max:50',
            'kosentrasi' => 'nullable|string|max:255',
        ]);

        $kisiKisi = KisiKisi::findOrFail($id);
        $fileName = $kisiKisi->nama_file;  // Simpan nama file lama
        $fileSize = $kisiKisi->ukuran;     // Simpan ukuran file lama

        if ($request->hasFile('nama_file') && $request->file('nama_file')->isValid()) {
            $file = $request->file('nama_file');
            $fileName = $file->getClientOriginalName();
            $file->storeAs('public/kisi_kisi', $fileName);
            $fileSize = $file->getSize();
        }

        $kisiKisi->update([
            'nama_file' => $fileName,
            'ukuran' => $fileSize,
            'nama_guru' => $request->input('nama_guru'),
            'mapel' => $request->input('mapel'),
            'tingkat' => $request->input('tingkat'),
            'kosentrasi' => $request->input('kosentrasi'),
        ]);

        return redirect()->route('kisi.kurikulum')->with('success', 'Data Kisi-Kisi berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $kisiKisi = KisiKisi::findOrFail($id);

        $kisiKisi->delete();

        return redirect()->route('kisi.kurikulum')->with('success', 'Data Kisi-Kisi berhasil dihapus.');
    }


    //KDAFTAR HADIR
    public function dftrHadirKurikulum(){
        $user = Auth::user();
        return view('kurikulum.daftar-hadir.index' , compact('kurikulum'));
    }

    public function editProfile()
    {
        $user = Auth::user();
        return view('profile.edit', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . Auth::id(),
            'foto_profile' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;

        // Mengelola unggahan foto profil
        if ($request->hasFile('foto_profile')) {
            // Hapus file lama jika ada
            if ($user->foto_profile) {
                Storage::disk('public')->delete($user->foto_profile);
            }

            // Simpan file baru ke folder `public/foto_profiles`
            $path = $request->file('foto_profile')->store('foto_profile', 'public');
            $user->foto_profile = $path;
        }

        $user->save();

        return redirect()->route('profile.edit')->with('success', 'Profil berhasil diperbarui.');
    }
}
