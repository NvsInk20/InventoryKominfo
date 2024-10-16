<?php

namespace App\Http\Controllers;

use App\Models\Peminjam; // Pastikan model Peminjam ditulis dengan huruf besar
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PeminjamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Ambil parameter sorting
        $sortType1 = $request->input('sort_type1', 'Sort by'); // Nilai default
        $sortType2 = $request->input('sort_type2', 'Status'); // Nilai default

        // Query dasar
        $query = Peminjam::query();

        // Apply sort based on the dropdown choices
        if ($sortType1 && $sortType1 !== 'Sort by') {
            switch ($sortType1) {
                case 'Nama':
                    $query->orderBy('nama_peminjam'); // Ganti dengan kolom yang sesuai
                    break;
                case 'Tanggal Peminjaman':
                    $query->orderBy('tanggal_peminjaman'); // Ganti dengan kolom yang sesuai
                    break;
            }
        }

        if ($sortType2 && $sortType2 !== 'Status') {
            switch ($sortType2) {
                case 'Dipinjam':
                    $query->where('status', 'Dipinjam');
                    break;
                case 'Dikembalikan':
                    $query->where('status', 'Dikembalikan');
                    break;
            }
        }

        // Ambil data yang sudah di-sortir
        $peminjams = $query->get();

        // Cek apakah permintaan AJAX
        if ($request->ajax()) {
            return view('partials.peminjamTable', ['peminjams' => $peminjams]);
        }

        return view('Admin.peminjam', [
            'title' => 'Riwayat',
            'peminjams' => $peminjams,
            'sortType1' => $sortType1, // Menyimpan nilai dropdown ke view
            'sortType2' => $sortType2, // Menyimpan nilai dropdown ke view
            'activePage' => 'Admin.peminjam',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_peminjam' => 'required',
            'name' => 'required',
            'email' => 'required|email',
            'phone_number' => 'required|digits:12', // Pastikan nomor telepon 12 digit
            'tanggal_peminjaman' => 'required|date',
            'tanggal_pengembalian' => 'required|date',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required|in:Dipinjam,Dikembalikan', // Ubah ini sesuai enum
        ]);

        // Upload image
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images', 'public');
            $validatedData['image_path'] = $path;
        }

        // Menyimpan data peminjam
        Peminjam::create($validatedData);
        return redirect()->route('Admin.peminjam')->with('success', 'Data Peminjam berhasil ditambahkan');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $peminjam = Peminjam::findOrFail($id);
        return view('Admin.komponen.riwayat.edit', compact('peminjam'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $peminjam = Peminjam::findOrFail($id);

        $validatedData = $request->validate([
            'nama_peminjam' => 'required',
            'name' => 'required',
            'email' => 'required|email',
            'phone_number' => 'required|digits:12', // Pastikan nomor telepon 12 digit
            'tanggal_peminjaman' => 'required|date',
            'tanggal_pengembalian' => 'required|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required|in:Dipinjam,Dikembalikan', // Validasi status
        ]);

        // Update image if exists
        if ($request->hasFile('image')) {
            // Delete the old image
            if ($peminjam->image_path) {
                Storage::disk('public')->delete($peminjam->image_path);
            }
            // Store the new image
            $path = $request->file('image')->store('images', 'public');
            $validatedData['image_path'] = $path;
        }

        $peminjam->update($validatedData);
        return redirect()->route('Admin.peminjam')->with('success', 'Data Peminjam berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $peminjam = Peminjam::findOrFail($id);
        
        // Delete the image
        if ($peminjam->image_path) {
            Storage::disk('public')->delete($peminjam->image_path);
        }
        
        $peminjam->delete();
        return redirect()->route('Admin.peminjam')->with('success', 'Data Peminjam berhasil dihapus');
    }

    /**
     * Delete selected items.
     */
    public function deleteSelected(Request $request)
    {
        $selectedIds = $request->input('peminjam_ids'); // Ganti 'selected' dengan 'peminjam_ids'

        if ($selectedIds) {
            foreach ($selectedIds as $id) {
                $peminjam = Peminjam::find($id);
                // Delete the image
                if ($peminjam && $peminjam->image_path) {
                    Storage::disk('public')->delete($peminjam->image_path);
                }
                $peminjam->delete();
            }
            return redirect()->route('Admin.peminjam')->with('success', 'Data Peminjam berhasil dihapus');
        }

        return redirect()->route('Admin.peminjam')->with('error', 'Tidak ada peminjam yang dipilih untuk dihapus.');
    }
}
