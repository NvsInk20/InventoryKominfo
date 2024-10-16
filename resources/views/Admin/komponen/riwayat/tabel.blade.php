<?php
use Carbon\Carbon;
?>
<div class="table-container">
    <div class="w-full flex justify-between items-center mb-3 pl-3">
        <div>
            <h3 class="text-lg font-semibold text-slate-800">Pinjam Dinas Kominfo</h3>
            <p class="text-slate-500">Penanggung Jawab</p>
        </div>
        <div class="w-40 text-right ml-4">
            <a href='/riwayat/add-items'>
                <button type="button"
                    class="border border-blue-800 font-bold text-blue-500 rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:text-white hover:bg-blue-700 focus:outline-none focus:shadow-outline">
                    Add Items +
                </button>
            </a>
        </div>
    </div>
    <div
        class="relative flex flex-col w-full h-full overflow-x-auto text-green-700 bg-white shadow-md rounded-lg bg-clip-border">
        @csrf
        @method('DELETE')
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
                        <td class="p-4 text-center border-b border-slate-200">
                            <button type="button" class="text-slate-500 hover:text-slate-700"
                                onclick="toggleDetails('accordion-color-body-{{ $pinjam->id }}')">
                                Details
                            </button>
                        </td>
                    </tr>
                    <tr id="accordion-color-body-{{ $pinjam->id }}" class="hidden border-gray-400">
                        <td colspan="6" class="p-4 border-b border-slate-200">
                            <div class="flex">
                                <div class="w-1/4">
                                    <img src="{{ asset('storage/' . $pinjam->image_path) }}" alt="{{ $pinjam->name }}"
                                        class="w-28 h-28 object-cover rounded ml-10" />
                                </div>
                                <div class="w-3/4 ml-10 text-cyan-950">
                                    <div class="grid grid-cols-2 gap-4">
                                        <div>
                                            <h3 class="font-bold">Nama Inventory</h3>
                                            <p>{{ $pinjam->name }}</p>
                                        </div>
                                        <div>
                                            <h3 class="font-bold">Email</h3>
                                            <p>{{ $pinjam->email }}</p>
                                        </div>
                                        <div>
                                            <h3 class="font-bold">Nomor Telepon</h3>
                                            <p>{{ $pinjam->phone_number }}</p>
                                        </div>
                                        <div>
                                            <h3 class="font-bold">Status</h3>
                                            <p>{{ $pinjam->status }}</p>
                                        </div>
                                        <div>
                                            <h3 class="font-bold">Tanggal Peminjaman</h3>
                                            <p>{{ Carbon::parse($pinjam->tanggal_peminjaman)->translatedFormat('d F Y') }}
                                            </p>
                                        </div>
                                        <div>
                                            <h3 class="font-bold">Tanggal Pengembalian</h3>
                                            <p>{{ Carbon::parse($pinjam->tanggal_pengembalian)->translatedFormat('d F Y') }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="flex justify-end mt-6">
                                        <a href="{{ route('pinjam.edit', $pinjam->id) }}">
                                            <button type="button"
                                                class="border border-green-400 font-bold text-green-400 rounded-md px-4 py-2 m-2 hover:text-white hover:bg-green-400">
                                                Edit
                                            </button>
                                        </a>
                                        <form action="{{ route('pinjam.destroy', $pinjam->id) }}" method="POST"
                                            id="deleteForm-{{ $pinjam->id }}"
                                            onsubmit="return confirm('Apakah Anda yakin ingin menghapus item ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="border border-orange-500 font-bold text-orange-800 rounded-md px-4 py-2 m-2 hover:text-white hover:bg-orange-500">
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<script>
    function toggleDetails(id) {
        const detailsRow = document.getElementById(id);
        detailsRow.classList.toggle('hidden');
        detailsRow.classList.toggle('transition-all');
        detailsRow.classList.toggle('duration-300');
        detailsRow.classList.toggle('ease-in-out');
    }
</script>
