<?php

namespace App\Http\Controllers;

use App\Models\SoalUjian;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class SoalUjianController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $soalUjian = SoalUjian::all();
        return view('guru.soal-ujian.index', compact('soalUjian', 'user'));
    }

    public function create()
    {
        $user = Auth::user();
        $soalUjian = SoalUjian::all();
        return view('guru.soal-ujian.create', compact('soalUjian', 'user'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_guru' => 'required',
            'mapel' => 'required',
            'tingkat' => 'required',
            'konsentrasi' => 'required',
            'soal' => 'nullable|string',
        ]);

        SoalUjian::create($request->all());

        return redirect()->route('soal.guru')->with('success', 'Soal ujian berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $user = Auth::user();
        $soalUjian = SoalUjian::findOrFail($id);
        return view('soal.edit.guru', compact('soalUjian', 'user'));
    }

    public function update(Request $request, $id)
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

        return redirect()->route('soal.guru')->with('success', 'Soal ujian berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $soalUjian = SoalUjian::findOrFail($id);
        $soalUjian->delete();

        return redirect()->route('soal.guru')->with('success', 'Soal ujian berhasil dihapus.');
    }

    public function downloadTemplate()
    {
        $path = 'template/blangko_soal.docx'; // Path template
        return response()->download(storage_path("app/public/$path"));
    }
}
