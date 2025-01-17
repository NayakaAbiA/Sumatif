<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'kelas_id' => 'required|exists:kelas,id',
            'nama_siswa' => 'required|string|max:255',
            'nisn' => 'required|unique:siswas,nisn',
            'nis' => 'required|unique:siswas,nis',
            'jenis_kelamin' =>'required|string:jeniske'
        ]);

        Siswa::create([
            'kelas_id' => $request->kelas_id,
            'nama' => $request->nama_siswa,
            'nis' => $request->nis,
            'nisn' => $request->nisn,
            'jenis_kelamin' => $request->jenis_kelamin
        ]);

        return redirect()->route('kelas.index')->with('success', 'Siswa berhasil ditambahkan ke kelas!');
    }

    public function deleteSelected(Request $request)
{
    $siswaIds = $request->input('ids');

    if ($siswaIds) {
        Siswa::whereIn('id', $siswaIds)->delete();
        return response()->json(['message' => 'Siswa terpilih telah dihapus.']);
    }

    return response()->json(['message' => 'Tidak ada siswa yang dipilih.'], 400);
}
}
