<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/status', function () {
    return view('status');
});
Route::get('/coba', function () {
    return view('coba');
});
Route::get('/inventory', function () {
    return view('inventory');
});
