<?php

namespace App\Http\Controllers;

use App\Models\SoalUjian;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        return view('guru.soal-ujian.create', compact('user'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_guru' => 'nullable',
            'mapel' => 'nullable',
            'tingkat' => 'nullable',
            'konsentrasi' => 'nullable',
            'nama_file' => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx',
        ]);

        $file = $request->file('nama_file');

        if ($file) {
            $fileName = $file->getClientOriginalName();
            $file->storeAs('soal_files', $fileName, 'public');

            SoalUjian::create([
                'nama_guru' => $request->nama_guru,
                'mapel' => $request->mapel,
                'tingkat' => $request->tingkat,
                'konsentrasi' => $request->konsentrasi,
                'nama_file' => $fileName,
            ]);
        }

        return redirect()->route('soal.guru')->with('success', 'Soal ujian berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $user = Auth::user();
        $soalUjian = SoalUjian::findOrFail($id);
        return view('guru.soal-ujian.edit', compact('soalUjian', 'user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_guru' => 'nullable',
            'mapel' => 'nullable',
            'tingkat' => 'nullable',
            'konsentrasi' => 'nullable',
            'nama_file' => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx',
        ]);

        $soalUjian = SoalUjian::findOrFail($id);

        if ($request->hasFile('nama_file')) {
            if ($soalUjian->nama_file) {
                Storage::disk('public')->delete('soal_files/' . $soalUjian->nama_file);
            }

            $file = $request->file('nama_file');
            $fileName = $file->getClientOriginalName();
            $file->storeAs('soal_files', $fileName, 'public');

            $soalUjian->update([
                'nama_guru' => $request->nama_guru,
                'mapel' => $request->mapel,
                'tingkat' => $request->tingkat,
                'konsentrasi' => $request->konsentrasi,
                'nama_file' => $fileName,
            ]);
        } else {
            $soalUjian->update($request->except('nama_file'));
        }

        return redirect()->route('soal.guru')->with('success', 'Soal ujian berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $soalUjian = SoalUjian::findOrFail($id);
        if ($soalUjian->nama_file) {
            Storage::disk('public')->delete('soal_files/' . $soalUjian->nama_file);
        }
        $soalUjian->delete();

        return redirect()->route('soal.guru')->with('success', 'Soal ujian berhasil dihapus.');
    }

    public function download($id)
    {
        $soalUjian = SoalUjian::findOrFail($id);

        if ($soalUjian->nama_file) {
            $filePath = storage_path('app/public/soal_files/' . $soalUjian->nama_file);

            if (file_exists($filePath)) {
                return response()->download($filePath, $soalUjian->nama_file);
            } else {
                return redirect()->route('soal.guru')->with('error', 'File tidak ditemukan.');
            }
        }

        return redirect()->route('soal.guru')->with('error', 'Soal ujian tidak memiliki file.');
    }
}
