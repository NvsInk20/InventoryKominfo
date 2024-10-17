<?php

namespace App\Http\Controllers;

use App\Models\PenanggungJawab;
use Illuminate\Http\Request;

class PenanggungJawabController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Ambil parameter sorting
        $sortType1 = $request->input('sort_type1', 'Sort by');
        $sortType2 = $request->input('sort_type2', 'Bidang');

        // Query dasar
        $query = PenanggungJawab::query();

        // Apply sort based on the dropdown choices
        if ($sortType1 && $sortType1 !== 'Sort by') {
            switch ($sortType1) {
                case 'Barang':
                    $query->where('category', 'Barang');
                    break;
                case 'Kendaraan':
                    $query->where('category', 'Kendaraan');
                    break;
                case 'Ruangan':
                    $query->where('category', 'Ruangan');
                    break;
            }
        }

        if ($sortType2 && $sortType2 !== 'Bidang') {
            switch ($sortType2) {
                case 'Bidang 1':
                    $query->where('Bidang', 'Bidang 1');
                    break;
                case 'Bidang 2':
                    $query->where('Bidang', 'Bidang 2');
                    break;
                case 'Bidang 3':
                    $query->where('Bidang', 'Bidang 3');
                    break;
            }
        }

        // Ambil data penanggung jawab
        $penanggung_jawabs = $query->get();

        // Cek apakah permintaan AJAX
        if ($request->ajax()) {
            return view('partials.PJTable', ['penanggung_jawabs' => $penanggung_jawabs]);
        }

        return view('Admin.PJ', [
            'title' => 'Penanggung Jawab',
            'penanggung_jawabs' => $penanggung_jawabs,
            'sortType1' => $sortType1,
            'sortType2' => $sortType2,
            'activePage' => 'Admin.PJ',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'name' => 'required|string|max:255',
            'ID_Produk' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'penanggung_jawab' => 'required|string|max:255',
            'Bidang' => 'required|string|max:255',
            'nomor_telp' => 'required|string|max:15',
            'periode' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Mengolah file gambar jika ada
        try {
            // Simpan gambar
            $imagePath = $request->file('image')->store('images/peminjam', 'public');

        // Menyimpan data ke database
        PenanggungJawab::create([
            'name' => $request->name,
            'ID_Produk' => $request->ID_Produk,
            'category' => $request->category,
            'penanggung_jawab' => $request->penanggung_jawab,
            'Bidang' => $request->Bidang,
            'nomor_telp' => $request->nomor_telp,
            'periode' => $request->periode,
            'image_path' => $imagePath,
        ]);
        return redirect()->route('Admin.PJ')->with('success', 'Data peminjam berhasil ditambahkan.');
        } catch (\Exception $e) {
            return redirect()->route('Admin.PJ')->with('error', 'Gagal menambahkan peminjam: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $penanggungjawab = PenanggungJawab::find($id);

        if ($penanggungjawab) {
            // Hapus gambar dari penyimpanan jika ada
            if ($penanggungjawab->image_path) {
                \Storage::delete('public/' . $penanggungjawab->image_path);
            }
            $penanggungjawab->delete();
            return redirect()->route('Admin.PJ')->with('success', 'Data peminjam berhasil dihapus.');
        }

        return redirect()->route('Admin.PJ')->with('error', 'Data peminjam tidak ditemukan.');
    }

    public function edit($id)
    {
        // Mencari item berdasarkan ID
        $penanggungjawab = PenanggungJawab::findOrFail($id);
        $title = 'Edit Data Penanggung Jawab';

        // Mengembalikan view dengan data peminjam dan title
        return view('Admin.komponen.PJawab.formEdit', compact('penanggungjawab', 'title'));
    }

    public function update(Request $request, $id)
    {
        $penanggungjawab = PenanggungJawab::findOrFail($id);

        // Validasi data
        $request->validate([
            'name' => 'required|string|max:255',
            'ID_Produk' => 'required|string|max:255',
            'category' => 'required|string',
            'penanggung_jawab' => 'required|string|max:15',
            'Bidang' => 'required|string|in:Bidang 1,Bidang 2,Bidang 3',
            'nomor_telp' => 'required|string|max:15',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Update data peminjam
        $penanggungjawab->name = $request->input('name');
        $penanggungjawab->ID_Produk = $request->input('ID_Produk');
        $penanggungjawab->category = $request->input('category');
        $penanggungjawab->penanggung_jawab = $request->input('penanggung_jawab');
        $penanggungjawab->Bidang = $request->input('Bidang');
        $penanggungjawab->nomor_telp = $request->input('nomor_telp');
        $penanggungjawab->periode = $request->input('periode');

        // Handle upload gambar jika ada file baru
        if ($request->hasFile('image')) {
            // Hapus file gambar lama jika ada
            if ($penanggungjawab->image_path) {
                \Storage::delete('public/' . $penanggungjawab->image_path);
            }
            // Simpan gambar baru
            $imagePath = $request->file('image')->store('images/peminjam', 'public');
            $penanggungjawab->image_path = $imagePath; // Pastikan kolom ini benar
        }

        // Simpan perubahan
        $penanggungjawab->save();

        return redirect()->route('Admin.PJ')->with('success', 'Data peminjam berhasil diperbarui.');
    }
}
