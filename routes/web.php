<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/login', function () {
    return view('Login.login');
});
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