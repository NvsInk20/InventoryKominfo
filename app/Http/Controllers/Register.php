<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class Register extends Controller
{
    public function index()
    {
        return view('registrasi.index', [
            'title' => 'Register',
            'active' => 'register',
        ]);
    }

    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'username' => 'required|min:3|unique:admins|max:255',
            'password' => 'required|min:3|max:255|confirmed', // Password harus dikonfirmasi
        ]);

        // Hash password sebelum disimpan
        $validatedData['password'] = Hash::make($validatedData['password']);

        // Buat admin baru
        Admin::create($validatedData);

        // Flash message untuk sukses registrasi
        $request->session()->flash('success', 'Registration successful!');

        // Redirect ke halaman login
        return redirect('/login');
    }
}
