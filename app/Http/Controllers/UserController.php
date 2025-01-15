<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
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

        return redirect()->route('dashboard.guru')->with('success', 'Profil berhasil diperbarui.');
    }
}
