<!-- Table Container -->
<?php
use Carbon\Carbon;
?>
<div class="table-container">
    <div class="w-full flex justify-between items-center mb-3 pl-3">
        <div>
            <h3 class="text-lg font-semibold text-slate-800">Dinas Kominfo Kabupaten Boyolali</h3>
            <p class="text-slate-500">Inventory Dinas</p>
        </div>
        <div class="text-right ml-40" id="kiri">
            <a href='/inventory/add-items'>
                <button type="button"
                    class="border border-blue-800 font-bold text-blue-500 rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:text-white hover:bg-blue-700 focus:outline-none focus:shadow-outline">
                    Add Items +
                </button>
            </a>
            <button type="button"
                class="border border-red-400 font-bold text-red-500 rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:text-white hover:bg-red-600 focus:outline-none focus:shadow-outline"
                id="deleteButton" disabled onclick="submitDeleteForm()">
                Delete Item
            </button>
        </div>
        {{-- <div class="w-40 text-right ml-4" id="red">
            <button type="button"
                class="border border-red-400 font-bold text-red-500 rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:text-white focus:outline-none focus:shadow-outline"
                id="deleteButton" disabled onclick="submitDeleteForm()">
                Delete Item
            </button>
        </div> --}}
    </div>
    <div
        class="relative flex flex-col w-full h-full overflow-x-auto text-green-700 bg-white shadow-md rounded-lg bg-clip-border">
        <form action="{{ route('inventory.deleteSelected') }}" method="POST" id="deleteForm">
            @csrf
            @method('DELETE')
            <table class="w-full text-left table-auto min-w-max mb-16">
                <thead>
                    <tr class="border-b border-slate-300 bg-slate-50">
                        <th class="text-sm font-bold leading-none text-center text-slate-500">NO</th>
                        <th class="p-4 text-sm font-bold leading-none text-center text-slate-500">Produk</th>
                        <th class="p-4 text-sm font-bold leading-none text-center text-slate-500">ID Number</th>
                        <th class="p-4 text-sm font-bold leading-none text-center text-slate-500">Nama</th>
                        <th class="p-4 text-sm font-bold leading-none text-center text-slate-500">Jumlah</th>
                        <th class="p-4 text-sm font-bold leading-none text-center text-slate-500">Status</th>
                        <th class="p-4 text-sm font-bold leading-none text-center text-slate-500">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($inventories as $inventory)
                        <tr class="hover:bg-slate-50 border-2px border-gray-400">
                            <td class="p-4 flex-1 border-b border-slate-200 py-5 text-center">{{ $loop->iteration }}
                            </td>
                            <td class="p-4 flex-1 border-b border-slate-200 py-5">
                                <div class="gambar">
                                    <label class="relative flex cursor-pointer items-center rounded-full p-3"
                                        for="checkbox{{ $inventory->id }}" data-ripple-dark="true">
                                        <input type="checkbox" name="inventory_ids[]" value="{{ $inventory->id }}"
                                            class="before:content[''] peer relative h-5 w-5 cursor-pointer appearance-none rounded-md border border-blue-gray-200 transition-all before:absolute before:top-2/4 before:left-2/4 before:block before:h-12 before:w-12 before:-translate-y-2/4 before:-translate-x-2/4 before:rounded-full before:bg-blue-gray-500 before:opacity-0 before:transition-opacity checked:border-pink-500 checked:bg-pink-500 checked:before:bg-pink-500 hover:before:opacity-10"
                                            id="checkbox{{ $inventory->id }}" onchange="toggleDeleteButton()" />
                                    </label>
                                    <img src="{{ asset('storage/' . $inventory->image_path) }}"
                                        alt="{{ $inventory->name }}" class="w-16 h-16 object-cover rounded" />
                                </div>
                            </td>

                            <td class="p-4 border-b border-slate-200 text-center py-5">
                                <p class="block font-semibold text-sm text-slate-800">{{ $inventory->id_number }}</p>
                            </td>
                            <td class="p-4 text-center border-b border-slate-200 py-5">
                                <p class="text-sm text-slate-500">{{ $inventory->name }}</p>
                            </td>
                            <td class="p-4 text-center border-b border-slate-200 py-5">
                                <p class="text-sm text-slate-500">{{ $inventory->quantity }}</p>
                            </td>
                            <td class="p-4 border-b text-center border-slate-200 py-5">
                                @if ($inventory->status == 'Tersedia')
                                    <button
                                        class="items-center justify-center bg-blue-600 rounded-xl text-center py-2 px-4 ml-6 max-w-max text-white">
                                        <i class="fas fa-check text-white mr-2"></i> {{ $inventory->status }}
                                    </button>
                                @else
                                    <button
                                        class="items-center justify-center bg-red-600 rounded-xl text-center py-2 px-4 ml-6 max-w-max text-white">
                                        <i class="fas fa-times text-white mr-2"></i> {{ $inventory->status }}
                                    </button>
                                @endif
                            </td>
                            <td class="p-4 text-center border-b border-slate-200 py-5">
                                <button type="button" class="text-slate-500 hover:text-slate-700"
                                    onclick="toggleDetails('accordion-color-body-{{ $inventory->id }}')">
                                    Details
                                </button>
                            </td>
                        </tr>
                        <tr id="accordion-color-body-{{ $inventory->id }}"
                            class="hidden collapsible-row border-2px border-gray-400">
                            <td colspan="6" class="p-4 border-b border-slate-200">
                                <div class="flex">
                                    <!-- Bagian gambar -->
                                    <div class="w-1/4">
                                        <img src="{{ asset('storage/' . $inventory->image_path) }}"
                                            alt="{{ $inventory->name }}"
                                            class="w-28 h-28 object-cover rounded ml-10" />
                                    </div>
                                    <!-- Bagian detail teks -->
                                    <div class="w-3/4 ml-10 text-cyan-950">
                                        <div class="grid grid-cols-2 gap-4">
                                            <div>
                                                <h3 class="font-bold">Nama Inventory</h3>
                                                <p>{{ $inventory->name }}</p>
                                            </div>
                                            <div>
                                                <h3 class="font-bold">ID Inventory</h3>
                                                <p>{{ $inventory->id_number }}</p>
                                            </div>
                                            <div>
                                                <h3 class="font-bold">Tahun Penggunaan</h3>
                                                <p>{{ $inventory->year }}</p>
                                            </div>
                                            <div>
                                                <h3 class="font-bold">Penanggung Jawab</h3>
                                                <p>{{ $inventory->responsible }}</p>
                                            </div>
                                            <div>
                                                <h3 class="font-bold">Status</h3>
                                                <p>{{ $inventory->status }}</p>
                                            </div>
                                            <div>
                                                <h3 class="font-bold">Kategori</h3>
                                                <p>{{ $inventory->category }}</p>
                                            </div>
                                            <div>
                                                <h3 class="font-bold">Keadaan Barang</h3>
                                                <p>{{ $inventory->keadaan_barang }}</p>
                                            </div>
                                        </div>
                                        <!-- Bagian tombol -->
                                        <div class="flex justify-end mt-6">
                                            <button type="button"
                                                class="border border-green-400 font-bold text-green-400 rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:text-white hover:bg-green-400 focus:outline-none focus:shadow-outline">
                                                <a href="{{ route('inventory.edit', $inventory->id) }}">Edit</a>
                                            </button>

                                            <button type="button"
                                                class="border border-orange-500 font-bold text-orange-800 rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:text-white hover:bg-orange-500 focus:outline-none focus:shadow-outline">
                                                <a href="{{ route('print.pdf', ['id' => $inventory->id]) }}"
                                                    class="flex items-center">
                                                    Cetak PDF
                                                </a>
                                            </button>

                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
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
