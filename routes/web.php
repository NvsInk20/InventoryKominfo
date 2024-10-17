<?php

use App\Http\Controllers\login;
use App\Http\Controllers\register;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PeminjamController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\PenanggungJawabController;

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

// Status Barang (Inventory)
Route::get('/inventory', [InventoryController::class, 'index'])->name('Admin.inventory');
Route::post('/inventory', [InventoryController::class, 'store'])->name('inventory.store');
Route::delete('/inventory/delete-selected', [InventoryController::class, 'deleteSelected'])->name('inventory.deleteSelected');

Route::get('/inventory/add-items', function () {
    return view('Admin.formAdd', ['title' => 'Tambah Data']);
});
Route::get('/inventory/{id}/edit', [InventoryController::class, 'edit'])->name('inventory.edit');
Route::put('/inventory/{id}', [InventoryController::class, 'update'])->name('inventory.update');

// Rute Peminjam (Riwayat)
    Route::get('/riwayat', [PeminjamController::class, 'index'])->name('Admin.peminjam');
    Route::get('/riwayat/datasoft', [PeminjamController::class, 'datasoft'])->name('peminjam.datasoft');
    Route::post('/riwayat', [PeminjamController::class, 'store'])->name('peminjam.store');
    Route::get('/riwayat/add-items', function () {
        return view('Admin.komponen.riwayat.formAdd', ['title' => 'Tambah Data']);
    });
    Route::get('/riwayat/{id}/edit', [PeminjamController::class, 'edit'])->name('peminjam.edit');
    Route::put('/riwayat/{id}', [PeminjamController::class, 'update'])->name('peminjam.update');
    Route::delete('/destroy/{id}', [PeminjamController::class, 'destroy'])->name('peminjam.destroy');
    Route::post('/riwayat/restore/{id}', [PeminjamController::class, 'restore'])->name('peminjam.restore');
    Route::delete('/riwayat/forceDelete/{id}', [PeminjamController::class, 'forceDelete'])->name('peminjam.forceDelete');
    
    // Rute PenanggungJawab (PJ)
    Route::get('/penanggungjawab', [PenanggungJawabController::class, 'index'])->name('Admin.PJ');
    Route::post('/penanggungjawab', [PenanggungJawabController::class, 'store'])->name('PJ.store');
    Route::get('/penanggungjawab/add-items', function () {
        return view('Admin.komponen.PJawab.formAdd', ['title' => 'Tambah Data']);
    });
    Route::get('/penanggungjawab/{id}/edit', [PenanggungJawabController::class, 'edit'])->name('PJ.edit');
    Route::put('/penanggungjawab/{id}', [PenanggungJawabController::class, 'update'])->name('PJ.update');
    Route::delete('/penanggungjawab/{id}/destroy', [PenanggungJawabController::class, 'destroy'])->name('PJ.destroy');

// Cetak PDF
Route::get('/print-pdf/{id}', [InventoryController::class, 'printPDF'])->name('print.pdf');

// Penanggung Jawab
// Route::get('/penanggung jawab', function () {
//     return view('Admin.PJ', ['title' => 'Penanggung Jawab']);
// });
