<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <style>
        .-z-1 {
            z-index: -1;
        }

        .origin-0 {
            transform-origin: 0%;
        }

        input:focus~label,
        input:not(:placeholder-shown)~label,
        textarea:focus~label,
        textarea:not(:placeholder-shown)~label,
        select:focus~label,
        select:not([value='']):valid~label {
            --tw-translate-x: 0;
            --tw-translate-y: 0;
            --tw-rotate: 0;
            --tw-skew-x: 0;
            --tw-skew-y: 0;
            transform: translateX(var(--tw-translate-x)) translateY(var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
            --tw-scale-x: 0.75;
            --tw-scale-y: 0.75;
            --tw-translate-y: -1.5rem;
        }

        input:focus~label,
        select:focus~label {
            --tw-text-opacity: 1;
            color: rgba(0, 0, 0, var(--tw-text-opacity));
            left: 0px;
        }
    </style>

    <div class="min-h-screen bg-gray-100 p-0 sm:p-12 -mt-10">
        <div class="mx-auto max-w-md px-6 py-12 bg-white border-0 shadow-lg sm:rounded-3xl">
            <h1 class="text-2xl font-bold mb-8">Edit Data Inventory Diskominfo</h1>
            <form action="{{ route('inventory.update', ['id' => $inventory->id]) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Nama Produk -->
                <div class="relative z-0 w-full mb-5">
                    <input type="text" name="name" value="{{ old('name', $inventory->name) }}" placeholder=" "
                        required
                        class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200" />
                    <label for="name" class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">Nama
                        Produk</label>
                </div>

                <!-- Tahun Penggunaan -->
                <div class="relative z-0 w-full mb-5">
                    <input type="number" name="year" value="{{ old('year', $inventory->year) }}" placeholder=" "
                        required
                        class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200" />
                    <label for="year" class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">Tahun
                        Penggunaan</label>
                </div>

                <!-- Penanggung Jawab -->
                <div class="relative z-0 w-full mb-5">
                    <input type="text" name="responsible" value="{{ old('responsible', $inventory->responsible) }}"
                        placeholder=" " required
                        class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200" />
                    <label for="responsible" class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">Penanggung
                        Jawab</label>
                </div>

                <!-- ID Number -->
                <div class="relative z-0 w-full mb-5">
                    <input type="text" name="id_number" value="{{ old('id_number', $inventory->id_number) }}"
                        placeholder=" " required
                        class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200" />
                    <label for="id_number" class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">ID
                        Number</label>
                </div>

                <!-- Status -->
                <fieldset class="relative z-0 w-full p-px mb-5">
                    <legend class="absolute text-gray-500 transform scale-75 -top-3 origin-0">Pilih Status</legend>
                    <div class="block pt-3 pb-2 space-x-4">
                        <label>
                            <input type="radio" name="status" value="Tersedia"
                                {{ old('status', $inventory->status) == 'Tersedia' ? 'checked' : '' }}
                                class="mr-2 text-blue-500 border-2 border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                                required />
                            Tersedia
                        </label>
                        <label>
                            <input type="radio" name="status" value="Tidak Tersedia"
                                {{ old('status', $inventory->status) == 'Tidak Tersedia' ? 'checked' : '' }}
                                class="mr-2 text-blue-500 border-2 border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                                required />
                            Tidak Tersedia
                        </label>
                    </div>
                </fieldset>

                <!-- Keadaan Barang -->
                <fieldset class="relative z-0 w-full p-px mb-5">
                    <legend class="absolute text-gray-500 transform scale-75 -top-3 origin-0">Keadaan Barang</legend>
                    <div class="block pt-3 pb-2 space-x-4">
                        <label>
                            <input type="radio" name="keadaan_barang" value="Baik"
                                {{ old('keadaan_barang', $inventory->keadaan_barang) == 'Baik' ? 'checked' : '' }}
                                class="mr-2 text-blue-500 border-2 border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                                required />
                            Baik
                        </label>
                        <label>
                            <input type="radio" name="keadaan_barang" value="Kurang Baik"
                                {{ old('keadaan_barang', $inventory->keadaan_barang) == 'Kurang Baik' ? 'checked' : '' }}
                                class="mr-2 text-blue-500 border-2 border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                                required />
                            Kurang Baik
                        </label>
                        <label>
                            <input type="radio" name="keadaan_barang" value="Rusak Berat"
                                {{ old('keadaan_barang', $inventory->keadaan_barang) == 'Rusak Berat' ? 'checked' : '' }}
                                class="mr-2 text-blue-500 border-2 border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                                required />
                            Rusak Berat
                        </label>
                    </div>
                </fieldset>

                <!-- Upload Gambar -->
                <div class="relative z-0 w-full mb-5">
                    <input type="file" name="image" accept="image/*" class="block w-full mt-2 border-gray-200">
                    @error('image')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                    @if ($inventory->image_path)
                        <!-- Pastikan untuk memeriksa 'image_path' -->
                        <p class="mt-2 text-gray-500">Gambar saat ini: <img
                                src="{{ asset('storage/' . $inventory->image_path) }}" alt="Image" width="100">
                        </p>
                    @else
                        <p class="mt-2 text-red-500">Tidak ada gambar saat ini.</p>
                    @endif

                </div>

                <!-- Upload PDF -->
                <div class="relative z-0 w-full mb-5">
                    <input type="file" name="pdf" accept=".pdf" class="block w-full mt-2 border-gray-200">
                    @error('pdf')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                    @if ($inventory->pdf_path)
                        <!-- Pastikan untuk memeriksa 'pdf_path' -->
                        <p class="mt-2 text-gray-500">File PDF saat ini:
                            {{-- <a
                                href="{{ asset('storage/' . $inventory->pdf_path) }}" target="_blank">Lihat PDF</a> --}}
                        </p>
                        <p class="mt-2 text-gray-500">Nama file: {{ basename($inventory->pdf_path) }}</p>
                        <!-- Menampilkan nama file PDF -->
                    @else
                        <p class="mt-2 text-red-500">Tidak ada PDF saat ini.</p>
                    @endif

                </div>


                <!-- Kategori -->
                <div class="relative z-0 w-full mb-5">
                    <select name="category" required
                        class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none z-1 focus:outline-none focus:ring-0 focus:border-black border-gray-200">
                        <option value="" disabled hidden>Pilih Kategori</option>
                        <option value="Barang"
                            {{ old('category', $inventory->category) == 'Barang' ? 'selected' : '' }}>Barang</option>
                        <option value="Kendaraan"
                            {{ old('category', $inventory->category) == 'Kendaraan' ? 'selected' : '' }}>Kendaraan
                        </option>
                        <option value="Ruangan"
                            {{ old('category', $inventory->category) == 'Ruangan' ? 'selected' : '' }}>Ruangan</option>
                    </select>
                    <label for="category" class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">Pilih
                        Kategori</label>
                </div>

                <!-- Jumlah -->
                <div class="relative z-0 w-full mb-5">
                    <input type="number" name="quantity" value="{{ old('quantity', $inventory->quantity) }}"
                        placeholder=" " required
                        class="pt-3 pb-2 pl-5 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200" />
                    <label for="quantity"
                        class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">Jumlah</label>
                </div>

                <!-- Button submit -->
                <button id="button" type="submit"
                    class="w-full px-6 py-3 mt-3 text-lg text-white transition-all duration-150 ease-linear rounded-lg shadow outline-none bg-blue-500 hover:bg-blue-700 hover:shadow-lg focus:outline-none">
                    Simpan
                </button>
            </form>
        </div>
    </div>

    <script>
        'use strict'

        document.getElementById('button').addEventListener('click', toggleError)
        const errMessages = document.querySelectorAll('#error')

        function toggleError() {
            // Show error message
            errMessages.forEach((el) => {
                el.classList.toggle('hidden')
            })
        }
    </script>
</x-layout>
