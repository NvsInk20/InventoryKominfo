<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index', [
            'title' => 'Login',
            'active' => 'login',
        ]);
    }

    public function authenticate(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        // Cek kredensial
        if (Auth::attempt($validatedData)) {
            // Jika berhasil, redirect ke halaman yang diinginkan
            $request->session()->regenerate(); // Mencegah serangan session fixation
            return redirect()->intended('/dashboard'); // Ganti dengan route yang sesuai
        }

        // Jika gagal, kembali ke halaman login dengan pesan error
            return back()->withErrors([
                'login' => 'Username atau Password tidak terdaftar.'
                ])->onlyInput('username'); // Mengembalikan input username saja
    }
}
