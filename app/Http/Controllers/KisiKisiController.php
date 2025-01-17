<?php

namespace App\Http\Controllers;

use App\Models\KisiKisi;
use Illuminate\Http\Request;

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
            'nama_file' => 'required|string|max:255',
            'ukuran' => 'required|integer',
            'nama_guru' => 'required|string|max:255',
            'mapel' => 'required|string|max:255',
            'tingkat' => 'required|string|max:50',
            'konsentrasi' => 'required|string|max:255',
            'jawaban' => 'nullable|string',
        ]);

        KisiKisi::create($request->all());

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
            'nama_file' => 'required|string|max:255',
            'ukuran' => 'required|integer',
            'nama_guru' => 'required|string|max:255',
            'mapel' => 'required|string|max:255',
            'tingkat' => 'required|string|max:50',
            'konsentrasi' => 'required|string|max:255',
            'jawaban' => 'nullable|string',
        ]);

        $kisiKisi->update($request->all());

        return redirect()->route('kisi_kisi.index')->with('success', 'Data Kisi-Kisi berhasil diperbarui.');
    }

    public function destroy(KisiKisi $kisiKisi)
    {
        $kisiKisi->delete();

        return redirect()->route('kisi_kisi.index')->with('success', 'Data Kisi-Kisi berhasil dihapus.');
    }
}
