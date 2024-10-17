<?php
use Carbon\Carbon;
?>
<div class="table-container">
    <div class="w-full flex justify-between items-center mb-3 pl-3">
        <div>
            <h3 class="text-lg font-semibold text-slate-800">Dinas Kominfo Kabupaten Boyolali</h3>
            <p class="text-slate-500">Penanggung Jawab</p>
        </div>
        <div class="w-40 text-right ml-4">
            <a href='/penanggungjawab/add-items'>
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
                    <th class="p-4 text-sm font-bold leading-none text-center text-slate-500">ID Number</th>
                    <th class="p-4 text-sm font-bold leading-none text-center text-slate-500">Nama Inventory</th>
                    <th class="p-4 text-sm font-bold leading-none text-center text-slate-500">Bidang</th>
                    <th class="p-4 text-sm font-bold leading-none text-center text-slate-500">Penanggung Jawab</th>
                    <th class="p-4 text-sm font-bold leading-none text-center text-slate-500">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($penanggung_jawabs as $penanggungjawab)
                    <tr class="hover:bg-slate-50 border-gray-400">
                        <td class="p-4 border-b border-slate-200 text-center">{{ $loop->iteration }}</td>
                        <td class="p-4 border-b border-slate-200 text-center">
                            <div class="gambar">
                                <img src="{{ asset('storage/' . $penanggungjawab->image_path) }}"
                                    alt="{{ $penanggungjawab->name }}" class="w-16 h-16 object-cover rounded" />
                            </div>
                        </td>
                        <td class="p-4 border-b border-slate-200 text-center">
                            <p class="font-semibold text-sm text-slate-800">{{ $penanggungjawab->ID_Produk }}</p>
                        </td>
                        <td class="p-4 border-b border-slate-200 text-center">
                            <p class="font-semibold text-sm text-slate-800">{{ $penanggungjawab->name }}</p>
                        </td>
                        <td class="p-4 text-center border-b border-slate-200">
                            <p class="text-sm text-slate-500">{{ $penanggungjawab->Bidang }}</p>
                        </td>
                        <td class="p-4 text-center border-b border-slate-200">
                            <p class="text-sm text-slate-500">{{ $penanggungjawab->penanggung_jawab }}</p>
                        </td>
                        <td class="p-4 text-center border-b border-slate-200">
                            <button type="button" class="text-slate-500 hover:text-slate-700"
                                onclick="toggleDetails('accordion-color-body-{{ $penanggungjawab->id }}')">
                                Details
                            </button>
                        </td>
                    </tr>
                    <tr id="accordion-color-body-{{ $penanggungjawab->id }}" class="hidden border-gray-400">
                        <td colspan="6" class="p-4 border-b border-slate-200">
                            <div class="flex">
                                <div class="w-1/4">
                                    <img src="{{ asset('storage/' . $penanggungjawab->image_path) }}"
                                        alt="{{ $penanggungjawab->name }}"
                                        class="w-28 h-28 object-cover rounded ml-10" />
                                </div>
                                <div class="w-3/4 ml-10 text-cyan-950">
                                    <div class="grid grid-cols-2 gap-4">
                                        <div>
                                            <h3 class="font-bold">Nama Inventory</h3>
                                            <p>{{ $penanggungjawab->name }}</p>
                                        </div>
                                        <div>
                                            <h3 class="font-bold">ID Produk</h3>
                                            <p>{{ $penanggungjawab->ID_Produk }}</p>
                                        </div>
                                        <div>
                                            <h3 class="font-bold">Kategori</h3>
                                            <p>{{ $penanggungjawab->category }}</p>
                                        </div>
                                        <div>
                                            <h3 class="font-bold">Bidang</h3>
                                            <p>{{ $penanggungjawab->Bidang }}</p>
                                        </div>
                                        <div>
                                            <h3 class="font-bold">Nomor Telp.</h3>
                                            <p>{{ $penanggungjawab->nomor_telp }}</p>
                                        </div>
                                        <div>
                                            <h3 class="font-bold">Periode</h3>
                                            <p>{{ $penanggungjawab->periode }}</p>
                                        </div>
                                    </div>
                                    <div class="flex justify-end mt-6">
                                        <a href="{{ route('PJ.edit', $penanggungjawab->id) }}">
                                            <button type="button"
                                                class="border border-green-400 font-bold text-green-400 rounded-md px-4 py-2 m-2 hover:text-white hover:bg-green-400">
                                                Edit
                                            </button>
                                        </a>
                                        <form action="{{ route('PJ.destroy', $penanggungjawab->id) }}" method="POST"
                                            id="deleteForm-{{ $penanggungjawab->id }}"
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
