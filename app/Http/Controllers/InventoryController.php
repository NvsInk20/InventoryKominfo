<?php

namespace App\Http\Controllers;

use App\Models\Inventory; // Pastikan model Inventory ditulis dengan huruf besar
use Illuminate\Http\Request;

class InventoryController extends Controller
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
        $query = Inventory::query();

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

        if ($sortType2 && $sortType2 !== 'Status') {
            switch ($sortType2) {
                case 'Tersedia':
                    $query->where('status', 'Tersedia');
                    break;
                case 'Tidak Tersedia':
                    $query->where('status', 'Tidak Tersedia');
                    break;
            }
        }

        // Ambil data yang sudah di-sortir
        $inventories = $query->get();

        // Cek apakah permintaan AJAX
        if ($request->ajax()) {
            return view('partials.inventoryTable', ['inventories' => $inventories]);
        }

        return view('Admin.inventory', [
            'title' => 'Inventory',
            'inventories' => $inventories,
            'sortType1' => $sortType1, // Menyimpan nilai dropdown ke view
            'sortType2' => $sortType2, // Menyimpan nilai dropdown ke view
            'activePage' => 'Admin.inventory',
        ]);
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'id_number' => 'required|string|unique:inventories',
            'quantity' => 'required|integer',
            'status' => 'required|in:Tersedia,Tidak Tersedia',
            'category' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpg,png,jpeg|max:2048',
            'pdf' => 'required|file|mimes:pdf|max:2048',
            'year' => 'required|integer',
            'keadaan_barang' => 'required|string|in:Baik,Kurang Baik,Rusak Berat',
            'responsible' => 'required|string|max:255',
        ]);

        try {
            // Simpan gambar
            $imagePath = $request->file('image')->store('images/inventory', 'public');
            
            // Simpan PDF
    $pdfPath = $request->file('pdf')->storeAs('pdf/inventory', $request->file('pdf')->getClientOriginalName(), 'public');

            // Buat entri inventory baru
            Inventory::create([
                'name' => $request->name,
                'id_number' => $request->id_number,
                'quantity' => $request->quantity,
                'status' => $request->status,
                'category' => $request->category,
                'image_path' => $imagePath, // Pastikan menggunakan 'image_path' jika sesuai dengan migrasi
                'pdf_path' => $pdfPath, // Pastikan field ini ada di migrasi
                'year' => $request->year,
                'keadaan_barang' => $request->keadaan_barang,
                'responsible' => $request->responsible,
            ]);

            return redirect()->route('Admin.inventory')->with('success', 'Item berhasil ditambahkan.');
        } catch (\Exception $e) {
            return redirect()->route('Admin.inventory')->with('error', 'Gagal menambahkan item: ' . $e->getMessage());
        }
    }
    public function printPDF($id)
{
    $inventory = Inventory::findOrFail($id);
    $pdfPath = storage_path('app/public/' . $inventory->pdf_path); // Get the full path to the PDF

    if (file_exists($pdfPath)) {
        $fileName = basename($inventory->pdf_path); // Extract just the filename
        return response()->download($pdfPath, $fileName); // Return the file for download with just the filename
    }

    return redirect()->route('Admin.inventory')->with('error', 'PDF tidak ditemukan.');
}



    /**
     * Delete selected items.
     */
    public function deleteSelected(Request $request)
{
    $selectedIds = $request->input('inventory_ids'); // Ganti 'selected' dengan 'inventory_ids'

    if ($selectedIds) {
        Inventory::whereIn('id', $selectedIds)->delete();
        return redirect()->route('Admin.inventory')->with('success', 'Items berhasil dihapus.');
    }

    return redirect()->route('Admin.inventory')->with('error', 'Tidak ada item yang dipilih untuk dihapus.');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $inventory = Inventory::find($id);

        if ($inventory) {
            $inventory->delete();
            return redirect()->route('Admin.inventory')->with('success', 'Item berhasil dihapus.');
        }

        return redirect()->route('Admin.inventory')->with('error', 'Item tidak ditemukan.');
    }
    

    public function edit($id)
    {
        // Mencari item berdasarkan ID
        $inventory = Inventory::findOrFail($id); 
        $title = 'Edit Data'; // Definisikan variabel $title

        // Mengembalikan view dengan data inventory dan title
        return view('Admin.formEdit', compact('inventory', 'title')); 
    }


public function update(Request $request, $id)
{
    $inventory = Inventory::findOrFail($id); // Cari item berdasarkan ID

    // Validasi data
    $request->validate([
        'name' => 'required|string|max:255',
        'year' => 'required|integer',
        'responsible' => 'required|string|max:255',
        'id_number' => 'required|string|max:100',
        'status' => 'required|string',
        'category' => 'required|string',
        'quantity' => 'required|integer|min:1',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'pdf' => 'nullable|mimes:pdf|max:10000',
        'keadaan_barang' => 'required|string',
    ]);

    // Update data inventory
    $inventory->name = $request->input('name');
    $inventory->year = $request->input('year');
    $inventory->responsible = $request->input('responsible');
    $inventory->id_number = $request->input('id_number');
    $inventory->status = $request->input('status');
    $inventory->category = $request->input('category');
    $inventory->quantity = $request->input('quantity');
    $inventory->keadaan_barang = $request->input('keadaan_barang');

    // Handle upload gambar jika ada file baru
    if ($request->hasFile('image')) {
        // Hapus file gambar lama jika ada
        if ($inventory->image_path) {
            \Storage::delete('public/' . $inventory->image_path);
        }
        // Simpan gambar baru
        $imagePath = $request->file('image')->store('images/inventory', 'public');
        $inventory->image_path = $imagePath; // Pastikan kolom ini benar
    }

    // Handle upload PDF jika ada file baru
    if ($request->hasFile('pdf')) {
        // Hapus file PDF lama jika ada
        if ($inventory->pdf_path) {
            \Storage::delete('public/' . $inventory->pdf_path);
        }
        // Simpan PDF baru
        $pdfPath = $request->file('pdf')->store('pdf/inventory', 'public');
        $inventory->pdf_path = $pdfPath; // Pastikan kolom ini benar
    }

    // Simpan perubahan
    $inventory->save();

    // Redirect ke halaman yang diinginkan
    return redirect()->route('Admin.inventory')->with('success', 'Data berhasil diperbarui.');
}



}
