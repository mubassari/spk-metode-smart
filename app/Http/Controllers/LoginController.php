<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function prosesLogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('beranda')->with('status', 'success')->with('pesan', 'Berhasil Masuk');
        } else {
            return redirect()->route('login')->with('status', 'danger')->with('pesan', 'Email atau password tidak dikenali');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')->with('status', 'success')->with('pesan', 'Berhasil Keluar');
    }
}
