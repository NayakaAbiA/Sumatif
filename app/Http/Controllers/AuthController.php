<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
     // Menampilkan form login
     public function showLogin()
     {
         return view('login.index');
     }

     // Proses login
     public function login(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if (Auth::attempt($request->only('email', 'password'))) {
        $request->session()->regenerate();

        // Cek role pengguna setelah login
        $user = Auth::user(); // Ambil data pengguna yang sedang login

        if ($user->role == 'kurikulum') {
            return redirect()->intended('/dashboard/kurikulum');
        } elseif ($user->role == 'guru') {
            return redirect()->intended('/dashboard/guru');
        }

        // Default redirect jika tidak ada role yang cocok
        return redirect()->intended('/dashboard');
    }

    // Login gagal
    return back()->withErrors([
        'email' => 'Email atau password salah.',
    ])->withInput();
}
     // Proses logout
     public function logout(Request $request)
     {
         Auth::logout();

         $request->session()->invalidate();
         $request->session()->regenerateToken();

         return redirect('/login');
     }
}
