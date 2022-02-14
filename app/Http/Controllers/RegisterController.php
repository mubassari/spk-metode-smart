<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function prosesRegister(Request $request)
    {
        $newUser = $request->validate([
            'nama' => 'required',
            'email' => 'email|required|unique:users,email',
            'password' => 'required|min:4|confirmed',
            'password_confirmation' => 'required',
        ]);
        $newUser['password'] = \Illuminate\Support\Facades\Hash::make($newUser['password']);
        $user = User::create($newUser);
        return redirect('login')->with(['pesan' => 'Berhasil membuat akun, silakan login untuk masuk kehalaman website.']);
    }
}
