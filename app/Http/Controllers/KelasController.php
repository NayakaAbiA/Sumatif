<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index()
    {
        $kelas = Kelas::with('siswa')->get();
        $user = Auth::user();
        $jurusan = Kelas::all();
        return view('kurikulum.kelas.index', compact('kelas', 'user', 'jurusan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kelas' => 'required|string|max:255',
            'tingkat' => 'required|string|in:X,XI,XII',
        ]);

        Kelas::create($request->only('nama_kelas', 'tingkat', 'deskripsi'));

        return redirect()->route('kelas.index')->with('success', 'Kelas berhasil ditambahkan!');
    }

    public function detail($id)
    {
        $kelas = Kelas::with('siswa')->findOrFail($id);
        $user = Auth::user();
        return view('kurikulum.kelas.detail', compact('kelas', 'user'));
    }

    public function getJurusan($tingkat)
    {
        $jurusan = Kelas::where('tingkat', $tingkat)->get();
        return response()->json($jurusan);
    }
}
