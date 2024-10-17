<?php
use Carbon\Carbon;
?>
<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="table-container">
        <div class="w-full flex justify-between items-center mb-3 pl-3">
            <div>
                <h3 class="text-lg font-semibold text-slate-800">Pinjam Dinas Kominfo</h3>
                <p class="text-slate-500">Penanggung Jawab</p>
            </div>
            <div class="text-right ml-40">
                <a href='/riwayat'>
                    <button type="button"
                        class="border border-blue-800 font-bold text-blue-500 rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:text-white hover:bg-blue-700 focus:outline-none focus:shadow-outline">
                        Kembali
                    </button>
                </a>
            </div>
        </div>
        <div
            class="relative flex flex-col w-full h-full overflow-x-auto text-green-700 bg-white shadow-md rounded-lg bg-clip-border">
            <table class="w-full text-left table-auto min-w-max mb-16">
                <thead>
                    <tr class="border-b border-slate-300 bg-slate-50">
                        <th class="text-sm font-bold leading-none text-center text-slate-500">NO</th>
                        <th class="p-4 text-sm font-bold leading-none text-center text-slate-500">Produk</th>
                        <th class="p-4 text-sm font-bold leading-none text-center text-slate-500">No. Telp</th>
                        <th class="p-4 text-sm font-bold leading-none text-center text-slate-500">Nama</th>
                        <th class="p-4 text-sm font-bold leading-none text-center text-slate-500">Peminjam</th>
                        <th class="p-4 text-sm font-bold leading-none text-center text-slate-500">Status</th>
                        <th class="p-4 text-sm font-bold leading-none text-center text-slate-500">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($peminjams as $pinjam)
                        <tr class="hover:bg-slate-50 border-gray-400">
                            <td class="p-4 border-b border-slate-200 text-center">{{ $loop->iteration }}</td>
                            <td class="p-4 border-b border-slate-200 text-center">
                                <div class="gambar">
                                    <img src="{{ asset('storage/' . $pinjam->image_path) }}" alt="{{ $pinjam->name }}"
                                        class="w-16 h-16 object-cover rounded" />
                                </div>
                            </td>
                            <td class="p-4 border-b border-slate-200 text-center">
                                <p class="font-semibold text-sm text-slate-800">{{ $pinjam->phone_number }}</p>
                            </td>
                            <td class="p-4 border-b border-slate-200 text-center">
                                <p class="font-semibold text-sm text-slate-800">{{ $pinjam->name }}</p>
                            </td>
                            <td class="p-4 text-center border-b border-slate-200">
                                <p class="text-sm text-slate-500">{{ $pinjam->nama_peminjam }}</p>
                            </td>
                            <td class="p-4 text-center border-b border-slate-200">
                                @if ($pinjam->status == 'Dikembalikan')
                                    <button class="bg-green-500 rounded-xl py-2 px-4 text-white">
                                        <i class="fas fa-check text-white mr-2"></i> {{ $pinjam->status }}
                                    </button>
                                @else
                                    <button class="bg-red-500 rounded-xl py-2 px-4 text-white">
                                        <i class="fas fa-times text-white mr-2"></i> {{ $pinjam->status }}
                                    </button>
                                @endif
                            </td>
                            <td class="p-4 text-center border-b border-slate-200 flex">
                                <form action="{{ route('peminjam.restore', $pinjam->id) }}" method="POST"
                                    id="restoreForm-{{ $pinjam->id }}"
                                    onsubmit="return confirmRestore(event, '{{ $pinjam->id }}');">
                                    @csrf
                                    <button type="submit"
                                        class="border ml-16 border-green-400 font-bold text-green-400 rounded-md px-4 py-2 m-2 hover:text-white hover:bg-green-400">
                                        Restore
                                    </button>
                                </form>
                                <form action="{{ route('peminjam.forceDelete', $pinjam->id) }}" method="POST"
                                    id="deleteForm-{{ $pinjam->id }}"
                                    onsubmit="return confirmDelete(event, '{{ $pinjam->id }}');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="border border-orange-500 font-bold text-orange-800 rounded-md px-4 py-2 m-2 hover:text-white hover:bg-orange-500">
                                        Hapus Permanent
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script>
        function confirmRestore(event, id) {
            event.preventDefault(); // Mencegah formulir dari submit secara langsung
            if (confirm('Apakah Anda yakin ingin mengembalikan item ini?')) {
                document.getElementById('restoreForm-' + id).submit(); // Melakukan submit formulir jika konfirmasi
            }
        }

        function confirmDelete(event, id) {
            event.preventDefault(); // Mencegah formulir dari submit secara langsung
            if (confirm('Apakah Anda yakin ingin menghapus permanent item ini?')) {
                document.getElementById('deleteForm-' + id).submit(); // Melakukan submit formulir jika konfirmasi
            }
        }
    </script>
</x-layout>
