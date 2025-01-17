<?php

namespace App\Http\Controllers;

use App\Models\KisiKisi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KisiKisiController extends Controller
{
    public function index()
    {
        $kisiKisi = KisiKisi::all();
        return view('kisi_kisi.index', compact('kisiKisi'));
    }

    public function create()
    {
        return view('kisi_kisi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_file' => 'required|file|max:10240',
            'nama_guru' => 'required|string|max:255',
            'mapel' => 'required|string|max:255',
            'tingkat' => 'required|string|max:50',
            'konsentrasi' => 'required|string|max:255',
            'jawaban' => 'nullable|string',
        ]);

        if ($request->hasFile('nama_file')) {
            $file = $request->file('nama_file');
            $path = $file->storeAs('kisi_kisi', $file->getClientOriginalName(), 'public');
            $ukuran = $file->getSize();
        }

        KisiKisi::create([
            'nama_file' => $path ?? null,
            'ukuran' => $ukuran ?? null,
            'nama_guru' => Auth::user()->name,
            'mapel' => $request->mapel,
            'tingkat' => $request->tingkat,
            'konsentrasi' => $request->konsentrasi,
            'jawaban' => $request->jawaban,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('kisi_kisi.index')->with('success', 'Data Kisi-Kisi berhasil ditambahkan.');
    }

    public function show(KisiKisi $kisiKisi)
    {
        return view('kisi_kisi.show', compact('kisiKisi'));
    }

    public function edit(KisiKisi $kisiKisi)
    {
        return view('kisi_kisi.edit', compact('kisiKisi'));
    }

    public function update(Request $request, KisiKisi $kisiKisi)
    {
        $request->validate([
            'nama_file' => 'required|file|max:10240',
            'nama_guru' => 'required|string|max:255',
            'mapel' => 'required|string|max:255',
            'tingkat' => 'required|string|max:50',
            'konsentrasi' => 'required|string|max:255',
            'jawaban' => 'nullable|string',
        ]);

        if ($request->hasFile('nama_file')) {
            $file = $request->file('nama_file');
            $path = $file->storeAs('kisi_kisi', $file->getClientOriginalName(), 'public');
            $ukuran = $file->getSize();
            $kisiKisi->update([
                'nama_file' => $path,
                'ukuran' => $ukuran
            ]);
        }

        $kisiKisi->update([
            'nama_guru' => $request->nama_guru,
            'mapel' => $request->mapel,
            'tingkat' => $request->tingkat,
            'konsentrasi' => $request->konsentrasi,
            'jawaban' => $request->jawaban,
        ]);

        return redirect()->route('kisi_kisi.index')->with('success', 'Data Kisi-Kisi berhasil diperbarui.');
    }

    public function destroy(KisiKisi $kisiKisi)
    {
        $kisiKisi->delete();
        return redirect()->route('kisi_kisi.index')->with('success', 'Data Kisi-Kisi berhasil dihapus.');
    }
}
