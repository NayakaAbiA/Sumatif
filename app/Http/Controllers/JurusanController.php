<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
    public function getSiswa($jurusanId)
    {
        $siswa = Siswa::where('kelas_id', $jurusanId)->get();
        return response()->json($siswa);
    }
}
