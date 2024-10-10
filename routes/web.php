<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/status', function () {
    return view('status');
});
Route::get('/riwayat', function () {
    return view('riwayat');
});
Route::get('/inventory', function () {
    return view('inventory');
});
