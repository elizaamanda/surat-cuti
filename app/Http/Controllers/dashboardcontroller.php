<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Akses ditolak.');
        }

        return view('dashboard');
    }

    public function pegawai()
    {
        if (Auth::user()->role !== 'pegawai') {
            abort(403, 'Akses ditolak.');
        }

        return view('pegawai-dashboard');
    }

    // ✅ Tambahkan method ini
    public function profile()
    {
        $user = Auth::user();

        if ($user->role !== 'pegawai') {
            abort(403, 'Akses ditolak.');
        }

        return view('pegawai.profile', compact('user'));
    }
    public function editProfile()
{
    $user = Auth::user();
    return view('pegawai.edit-profile', compact('user'));
}
    // Update profil
    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        $user->nama = $request->nama;
        $user->save();

        return redirect()->route('pegawai.profile')->with('success', 'Profil berhasil diperbarui!');
    }
}
