<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth; // Pastikan Auth diimpor
use Illuminate\Http\Request;

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
}
