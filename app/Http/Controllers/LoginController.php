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
    $credentials = $request->validate([
    'username' => 'required|string', // Pastikan ini sesuai dengan kolom di database
    'password' => 'required|string',
]);


    if (Auth::guard('admin')->attempt($credentials)) {
    $request->session()->regenerate();
    return redirect()->intended('/dashboard');
}


    return back()->withErrors([
        'login' => 'Username atau password salah.',
    ]);
}


    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
