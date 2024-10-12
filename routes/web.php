<?php

use App\Http\Controllers\login;
use App\Http\Controllers\register;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);

Route::get('/register', [register::class, 'index']);
Route::post('/register', [register::class, 'store']);

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

Route::get('/dashboard', function () {
    return view('Admin.dashboard', ['title' => 'Dashboard']);
});

Route::get('/status barang', function () {
    return view('Admin.inventory', ['title' => 'Status Barang']);
});

Route::get('/riwayat', function () {
    return view('Admin.riwayat', ['title' => 'Riwayat Barang']);
});

Route::get('/penanggung jawab', function () {
    return view('Admin.PJ', ['title' => 'Penanggung Jawab']);
});