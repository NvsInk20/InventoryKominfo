<?php

namespace App\Http\Controllers;

use App\Models\Peminjam; // Pastikan model Peminjam ditulis dengan huruf besar
use Illuminate\Http\Request;

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
                case 'Barang':
                case 'Kendaraan':
                case 'Ruangan':
                    $query->where('category', $sortType1);
                    break;
            }
        }

        if ($sortType2 && $sortType2 !== 'Status') {
            switch ($sortType2) {
                case 'Dikembalikan':
                case 'Dipinjam':
                    $query->where('status', $sortType2);
                    break;
            }
        }

        // Ambil data peminjam
        $peminjams = $query->get();

        // Cek apakah permintaan AJAX
        if ($request->ajax()) {
            return view('partials.peminjamTable', ['peminjams' => $peminjams]);
        }

        return view('Admin.peminjam', [
            'title' => 'Riwayat',
            'peminjams' => $peminjams,
            'sortType1' => $sortType1,
            'sortType2' => $sortType2,
            'activePage' => 'Admin.peminjam',
        ]);
    }

    public function datasoft(Request $request)
    {
        // Ambil parameter sorting
        $sortType1 = $request->input('sort_type1', 'Sort by'); // Nilai default
        $sortType2 = $request->input('sort_type2', 'Status'); // Nilai default

        // Query untuk hanya menampilkan data yang dihapus (soft deleted)
        $query = Peminjam::onlyTrashed();

        // Terapkan sort berdasarkan pilihan dropdown
        if ($sortType1 && $sortType1 !== 'Sort by') {
            switch ($sortType1) {
                case 'Barang':
                case 'Kendaraan':
                case 'Ruangan':
                    $query->where('category', $sortType1);
                    break;
            }
        }

        if ($sortType2 && $sortType2 !== 'Status') {
            switch ($sortType2) {
                case 'Dikembalikan':
                case 'Dipinjam':
                    $query->where('status', $sortType2);
                    break;
            }
        }

        // Ambil data peminjam yang sudah dihapus (soft deleted)
        $peminjams = $query->get();

        return view('Admin.komponen.riwayat.datasoft', [
            'title' => 'Riwayat Hapus Data',
            'peminjams' => $peminjams,
            'sortType1' => $sortType1,
            'sortType2' => $sortType2,
            'activePage' => 'Admin.peminjam.soft',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_peminjam' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone_number' => 'required|string|max:15',
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'tanggal_peminjaman' => 'required|date',
            'tanggal_pengembalian' => 'required|date|after:tanggal_peminjaman',
            'image' => 'required|image|mimes:jpg,png,jpeg|max:2048',
            'status' => 'required|string|in:Dikembalikan,Dipinjam',
        ]);

        try {
            // Simpan gambar
            $imagePath = $request->file('image')->store('images/peminjam', 'public');

            // Buat entri peminjam baru
            Peminjam::create([
                'nama_peminjam' => $request->nama_peminjam,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
                'name' => $request->name,
                'category' => $request->category,
                'tanggal_peminjaman' => $request->tanggal_peminjaman,
                'tanggal_pengembalian' => $request->tanggal_pengembalian,
                'image_path' => $imagePath,
                'status' => $request->status,
            ]);

            return redirect()->route('Admin.peminjam')->with('success', 'Data peminjam berhasil ditambahkan.');
        } catch (\Exception $e) {
            return redirect()->route('Admin.peminjam')->with('error', 'Gagal menambahkan peminjam: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $peminjam = Peminjam::find($id);

        if ($peminjam) {
            $peminjam->delete();
            return redirect()->route('Admin.peminjam')->with('success', 'Data peminjam berhasil dihapus.');
        }

        return redirect()->route('Admin.peminjam')->with('error', 'Data peminjam tidak ditemukan.');
    }

    public function edit($id)
    {
        // Mencari item berdasarkan ID
        $peminjam = Peminjam::findOrFail($id);
        $title = 'Edit Data Peminjam'; // Definisikan variabel $title

        // Mengembalikan view dengan data peminjam dan title
        return view('Admin.komponen.riwayat.formEdit', compact('peminjam', 'title'));
    }

    public function update(Request $request, $id)
    {
        $peminjam = Peminjam::findOrFail($id); // Cari item berdasarkan ID

        // Validasi data
        $request->validate([
            'nama_peminjam' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone_number' => 'required|string|max:15',
            'name' => 'required|string|max:255',
            'category' => 'required|string',
            'tanggal_peminjaman' => 'required|date',
            'tanggal_pengembalian' => 'required|date|after:tanggal_peminjaman',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required|string|in:Dikembalikan,Dipinjam',
        ]);

        // Update data peminjam
        $peminjam->nama_peminjam = $request->input('nama_peminjam');
        $peminjam->email = $request->input('email');
        $peminjam->phone_number = $request->input('phone_number');
        $peminjam->name = $request->input('name');
        $peminjam->category = $request->input('category');
        $peminjam->tanggal_peminjaman = $request->input('tanggal_peminjaman');
        $peminjam->tanggal_pengembalian = $request->input('tanggal_pengembalian');
        $peminjam->status = $request->input('status');

        // Handle upload gambar jika ada file baru
        if ($request->hasFile('image')) {
            // Hapus file gambar lama jika ada
            if ($peminjam->image_path) {
                \Storage::delete('public/' . $peminjam->image_path);
            }
            // Simpan gambar baru
            $imagePath = $request->file('image')->store('images/peminjam', 'public');
            $peminjam->image_path = $imagePath; // Pastikan kolom ini benar
        }

        // Simpan perubahan
        $peminjam->save();

        // Redirect ke halaman yang diinginkan
        return redirect()->route('Admin.peminjam')->with('success', 'Data peminjam berhasil diperbarui.');
    }

    public function restore($id)
    {
        $peminjam = Peminjam::withTrashed()->find($id);
        if ($peminjam) {
            $peminjam->restore();
            return redirect()->back()->with('success', 'Data peminjam berhasil dipulihkan.');
        }

        return redirect()->back()->with('error', 'Data peminjam tidak ditemukan.');
    }

    public function forceDelete($id)
    {
        $peminjam = Peminjam::onlyTrashed()->find($id);
        if ($peminjam) {
            $peminjam->forceDelete();
            return redirect()->back()->with('success', 'Data peminjam berhasil dipulihkan.');
        }

        return redirect()->back()->with('error', 'Data peminjam tidak ditemukan.');
    }
}
