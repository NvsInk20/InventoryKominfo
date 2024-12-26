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
                <tr class="border border-slate-950">
                    <th
                        class="text-sm border-l border-b border-slate-950 font-bold leading-none text-center text-slate-950">
                        NO</th>
                    <th class="p-4 border-b border-slate-950 text-sm font-bold leading-none text-center text-slate-950">
                        Produk</th>
                    <th class="p-4 border-b border-slate-950 text-sm font-bold leading-none text-center text-slate-950">
                        ID
                        Number</th>
                    <th class="p-4 border-b border-slate-950 text-sm font-bold leading-none text-center text-slate-950">
                        Nama Inventaris</th>
                    <th class="p-4 border-b border-slate-950 text-sm font-bold leading-none text-center text-slate-950">
                        Bidang</th>
                    <th class="p-4 border-b border-slate-950 text-sm font-bold leading-none text-center text-slate-950">
                        Penanggung Jawab</th>
                    <th
                        class="p-4 border-b border-r border-slate-950 text-sm font-bold leading-none text-center text-slate-950">
                        Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($penanggung_jawabs as $penanggungjawab)
                    <tr class="hover:bg-slate-50 border-gray-400">
                        <td class="p-4 border-l border-b border-slate-950 text-center">{{ $loop->iteration }}</td>
                        <td class="p-4 border-b border-slate-950 text-center">
                            <div class="gambar">
                                <img src="{{ asset('storage/' . $penanggungjawab->image_path) }}"
                                    alt="{{ $penanggungjawab->name }}" class="w-16 h-16 object-cover rounded" />
                            </div>
                        </td>
                        <td class="p-4 border-b border-slate-950 text-center">
                            <p class="font-semibold text-sm text-slate-800">{{ $penanggungjawab->ID_Produk }}</p>
                        </td>
                        <td class="p-4 border-b border-slate-950 text-center">
                            <p class="font-semibold text-sm text-slate-800">{{ $penanggungjawab->name }}</p>
                        </td>
                        <td class="p-4 border-b border-slate-950 text-center">
                            <p class="text-sm text-slate-800">{{ $penanggungjawab->Bidang }}</p>
                        </td>
                        <td class="p-4 border-b border-slate-950 text-center">
                            <p class="text-sm text-slate-800">{{ $penanggungjawab->penanggung_jawab }}</p>
                        </td>
                        <td class="p-4 border-b border-r border-slate-950 text-center">
                            <button type="button"
                                class="text-white p-3 bg-blue-600 hover:bg-white border rounded-lg border-blue-600 hover:text-slate-950"
                                onclick="toggleDetails('accordion-color-body-{{ $penanggungjawab->id }}')">
                                Details
                            </button>
                        </td>
                    </tr>
                    <tr id="accordion-color-body-{{ $penanggungjawab->id }}" class="hidden border-gray-400">
                        <td colspan="7" class="p-4 border border-slate-950">
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
                                                class="border border-red-500 font-bold text-red-700 rounded-md px-4 py-2 m-2 hover:text-white hover:bg-red-500">
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center py-6 text-slate-500">
                            <strong>Tidak ada data yang tersedia.</strong>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <!-- Pagination -->
        <div class="flex justify-between items-center px-6 py-4 bg-gray-50">
            <div class="text-sm text-gray-500">
                Menampilkan
                <b>{{ $penanggung_jawabs->firstItem() ?? 0 }}-{{ $penanggung_jawabs->lastItem() ?? 0 }}</b> dari
                {{ $penanggung_jawabs->total() }}
            </div>
            <div class="flex space-x-2 items-center">
                @if ($penanggung_jawabs->onFirstPage())
                    <button
                        class="px-3 py-1 min-w-9 min-h-9 text-sm font-normal text-gray-400 bg-white border border-gray-200 rounded cursor-not-allowed">
                        Prev
                    </button>
                @else
                    <a href="{{ $penanggung_jawabs->previousPageUrl() }}"
                        class="px-3 py-1 min-w-9 min-h-9 text-sm font-normal text-slate-500 bg-white border border-slate-200 rounded hover:bg-slate-50 hover:border-slate-400 transition duration-200 ease">
                        Prev
                    </a>
                @endif

                @foreach ($penanggung_jawabs->getUrlRange(1, $penanggung_jawabs->lastPage()) as $page => $url)
                    @if ($page == $penanggung_jawabs->currentPage())
                        <button
                            class="px-3 py-1 min-w-9 min-h-9 text-sm font-normal text-white bg-slate-800 border border-slate-800 rounded hover:bg-slate-600 hover:border-slate-600 transition duration-200 ease">
                            {{ $page }}
                        </button>
                    @else
                        <a href="{{ $url }}"
                            class="px-3 py-1 min-w-9 min-h-9 text-sm font-normal text-slate-500 bg-white border border-slate-200 rounded hover:bg-slate-50 hover:border-slate-400 transition duration-200 ease">
                            {{ $page }}
                        </a>
                    @endif
                @endforeach

                @if ($penanggung_jawabs->hasMorePages())
                    <a href="{{ $penanggung_jawabs->nextPageUrl() }}"
                        class="px-3 py-1 min-w-9 min-h-9 text-sm font-normal text-slate-500 bg-white border border-slate-200 rounded hover:bg-slate-50 hover:border-slate-400 transition duration-200 ease">
                        Next
                    </a>
                @else
                    <button
                        class="px-3 py-1 min-w-9 min-h-9 text-sm font-normal text-gray-400 bg-white border border-gray-200 rounded cursor-not-allowed">
                        Next
                    </button>
                @endif
            </div>
        </div>
    </div>
    </form>
</div>
</div>

<script>
    function toggleDeleteButton() {
        const checkboxes = document.querySelectorAll('input[type="checkbox"]');
        const deleteButton = document.getElementById('deleteButton');

        // Enable or disable the delete button based on checkbox selection
        deleteButton.disabled = !Array.from(checkboxes).some(checkbox => checkbox.checked);
    }

    function submitDeleteForm() {
        const form = document.getElementById('deleteForm');
        const checkboxes = form.querySelectorAll('input[type="checkbox"]:checked');

        // Confirm deletion
        if (checkboxes.length === 0) {
            alert('Silakan pilih setidaknya satu item untuk dihapus.');
            return;
        }

        // If checkboxes are selected, submit the form
        if (confirm('Anda yakin ingin menghapus item yang dipilih?')) {
            form.submit();
        }
    }

    function toggleDetails(id) {
        const detailsRow = document.getElementById(id);
        detailsRow.classList.toggle('hidden');
    }
</script>
