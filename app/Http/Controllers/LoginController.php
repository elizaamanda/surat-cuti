<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            // Redirect sesuai role
            if ($user->role === 'admin') {
                return redirect()->route('dashboard');
            } elseif ($user->role === 'pegawai') {
                return redirect()->route('pegawai.dashboard');
            } else {
                Auth::logout();
                return redirect()->route('login')->withErrors([
                    'username' => 'Role tidak dikenali, hubungi admin sistem.',
                ]);
            }
        }

        return back()->withErrors([
            'username' => 'Username atau password salah.',
        ])->withInput();
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
