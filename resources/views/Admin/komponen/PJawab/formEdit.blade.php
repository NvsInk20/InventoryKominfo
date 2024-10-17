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
            <h1 class="text-2xl font-bold mb-8">Edit Data Penanggung Jawab</h1>
            <form action="{{ route('PJ.update', ['id' => $penanggungjawab->id]) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Nama Produk -->
                <div class="relative z-0 w-full mb-5">
                    <input type="text" name="name" value="{{ old('name', $penanggungjawab->name) }}" placeholder=" "
                        required
                        class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200" />
                    <label for="name" class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">Nama
                        Produk</label>
                </div>

                <!-- ID Produk -->
                <div class="relative z-0 w-full mb-5">
                    <input type="text" name="ID_Produk" value="{{ old('ID_Produk', $penanggungjawab->ID_Produk) }}"
                        placeholder=" " required
                        class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200" />
                    <label for="year" class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">ID
                        Produk</label>
                </div>

                <!-- Nomor Telepon -->
                <div class="relative z-0 w-full mb-5">
                    <input type="number" name="nomor_telp"
                        value="{{ old('nomor_telp', $penanggungjawab->nomor_telp) }}" placeholder=" " required
                        class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200" />
                    <label for="nomor_telp" class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">Nomor
                        Telp</label>
                </div>

                <!-- Nama Penanggung Jawab -->
                <div class="relative z-0 w-full mb-5">
                    <input type="text" name="penanggung_jawab"
                        value="{{ old('penanggung_jawab', $penanggungjawab->penanggung_jawab) }}" placeholder=" "
                        required
                        class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200" />
                    <label for="penanggung_jawab" class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">Nama
                        Penanggung Jawab</label>
                </div>
                <!-- Periode -->
                <div class="relative z-0 w-full mb-5">
                    <input type="text" name="periode" value="{{ old('periode', $penanggungjawab->periode) }}"
                        placeholder=" " required
                        class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200" />
                    <label for="periode"
                        class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">Periode</label>
                </div>

                <!-- Upload Gambar -->
                <div class="relative z-0 w-full mb-5">
                    <input type="file" name="image" accept="image/*" class="block w-full mt-2 border-gray-200">
                    @error('image')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                    @if ($penanggungjawab->image_path)
                        <!-- Pastikan untuk memeriksa 'image_path' -->
                        <p class="mt-2 text-gray-500">Gambar saat ini: <img
                                src="{{ asset('storage/' . $penanggungjawab->image_path) }}" alt="Image"
                                width="100">
                        </p>
                    @else
                        <p class="mt-2 text-red-500">Tidak ada gambar saat ini.</p>
                    @endif

                </div>

                <!-- Kategori -->
                <div class="relative z-0 w-full mb-5">
                    <select name="Bidang" required
                        class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none z-1 focus:outline-none focus:ring-0 focus:border-black border-gray-200">
                        <option value="" disabled hidden>Pilih Kategori</option>
                        <option value="Bidang 1"
                            {{ old('Bidang', $penanggungjawab->Bidang) == 'Bidang 1' ? 'selected' : '' }}>
                            Bidang 1</option>
                        <option value="Bidang 2"
                            {{ old('Bidang', $penanggungjawab->Bidang) == 'Bidang 2' ? 'selected' : '' }}>Bidang 2
                        </option>
                        <option value="Bidang 3"
                            {{ old('Bidang', $penanggungjawab->Bidang) == 'Bidang 3' ? 'selected' : '' }}>Bidang 3
                        </option>
                    </select>
                    <label for="Bidang" class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">Pilih
                        Bidang</label>
                </div>
                <!-- Kategori -->
                <div class="relative z-0 w-full mb-5">
                    <select name="category" required
                        class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none z-1 focus:outline-none focus:ring-0 focus:border-black border-gray-200">
                        <option value="" disabled hidden>Pilih Kategori</option>
                        <option value="Barang"
                            {{ old('category', $penanggungjawab->category) == 'Barang' ? 'selected' : '' }}>
                            Barang</option>
                        <option value="Kendaraan"
                            {{ old('category', $penanggungjawab->category) == 'Kendaraan' ? 'selected' : '' }}>
                            Kendaraan
                        </option>
                        <option value="Ruangan"
                            {{ old('category', $penanggungjawab->category) == 'Ruangan' ? 'selected' : '' }}>Ruangan
                        </option>
                    </select>
                    <label for="category" class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">Pilih
                        Kategori</label>
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
