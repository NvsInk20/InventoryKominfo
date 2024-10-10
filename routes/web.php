<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard', ['title' => 'Dashboard']);
});

Route::get('/status barang', function () {
    return view('status', ['title' => 'Status Barang']);
});

Route::get('/riwayat', function () {
    return view('riwayat', ['title' => 'Riwayat']);
});

Route::get('/penanggung jawab', function () {
    return view('pj', ['title' => 'Penanggung Jawab']);
});
