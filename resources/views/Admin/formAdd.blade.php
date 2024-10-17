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

    <form action="{{ route('inventory.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="min-h-screen bg-gray-100 p-0 sm:p-12 -mt-10">
            <div class="mx-auto max-w-md px-6 py-12 bg-white border-0 shadow-lg sm:rounded-3xl">
                <h1 class="text-2xl font-bold mb-8">Form Data Inventory Diskominfo</h1>
                <div class="relative z-0 w-full mb-5">
                    <input type="text" name="name" placeholder=" " required
                        class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200" />
                    <label for="name" class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">Nama
                        Produk</label>
                    {{-- <span class="text-sm text-red-600 hidden" id="error">Nama harap diisi terlebih dahulu</span> --}}
                </div>

                <div class="relative z-0 w-full mb-5">
                    <input type="number" name="year" placeholder=" " required
                        class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200" />
                    <label for="year" class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">Tahun
                        Pengunaan</label>
                    {{-- <span class="text-sm text-red-600 hidden" id="error">Harap diisi terlebih dahulu</span> --}}
                </div>

                <div class="relative z-0 w-full mb-5">
                    <input type="text" name="responsible" placeholder=" " required
                        class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200" />
                    <label for="responsible" class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">Penanggung
                        Jawab</label>
                    {{-- <span class="text-sm text-red-600 hidden" id="error">Harap diisi terlebih dahulu</span> --}}
                </div>

                <div class="relative z-0 w-full mb-5">
                    <input type="text" name="id_number" placeholder=" " required
                        class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200" />
                    <label for="id_number" class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">ID
                        Number</label>
                    {{-- <span class="text-sm text-red-600 hidden" id="error">ID Number harus diisi</span> --}}
                </div>

                <fieldset class="relative z-0 w-full p-px mb-5">
                    <legend class="absolute text-gray-500 transform scale-75 -top-3 origin-0">Pilih Status</legend>
                    <div class="block pt-3 pb-2 space-x-4">
                        <label>
                            <input type="radio" name="status" value="Tersedia"
                                class="mr-2 text-blue-500 border-2 border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                                required />
                            Tersedia
                        </label>
                        <label>
                            <input type="radio" name="status" value="Tidak Tersedia"
                                class="mr-2 text-blue-500 border-2 border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                                required />
                            Tidak Tersedia
                        </label>
                    </div>
                    {{-- <span class="text-sm text-red-600 hidden" id="error">Silahkan Pilih Status Terlebih
                        Dahulu</span> --}}
                </fieldset>
                <fieldset class="relative z-0 w-full p-px mb-5">
                    <legend class="absolute text-gray-500 transform scale-75 -top-3 origin-0">Keadaan Barang</legend>
                    <div class="block pt-3 pb-2 space-x-4">
                        <label>
                            <input type="radio" name="keadaan_barang" value="Baik"
                                class="mr-2 text-blue-500 border-2 border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                                required />
                            Baik
                        </label>
                        <label>
                            <input type="radio" name="keadaan_barang" value="Kurang Baik"
                                class="mr-2 text-blue-500 border-2 border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                                required />
                            Kurang Baik
                        </label>
                        <label>
                            <input type="radio" name="keadaan_barang" value="Rusak Berat"
                                class="mr-2 text-blue-500 border-2 border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                                required />
                            Rusak Berat
                        </label>
                    </div>
                    {{-- <span class="text-sm text-red-600 hidden" id="error">Silahkan Pilih Status Terlebih
                        Dahulu</span> --}}
                </fieldset>

                <label for="image">Upload Gambar:</label>
                <input type="file" name="image" required>

                <label for="pdf">Upload Surat:</label>
                <input type="file" name="pdf" accept=".pdf" required>

                <div class="relative z-0 w-full my-5">
                    <select name="category" required
                        class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none z-1 focus:outline-none focus:ring-0 focus:border-black border-gray-200">
                        <option value="" selected disabled hidden>Pilih Kategori</option>
                        <option value="Barang">Barang</option>
                        <option value="Kendaraan">Kendaraan</option>
                        <option value="Ruangan">Ruangan</option>
                    </select>
                    <label for="category" class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">Pilih
                        Kategori</label>
                    {{-- <span class="text-sm text-red-600 hidden" id="error">Silahkan Pilih Kategori terlebih
                        dahulu</span> --}}
                </div>

                <div class="relative z-0 w-full mb-5">
                    <input type="number" name="quantity" placeholder=" " required
                        class="pt-3 pb-2 pl-5 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200" />
                    <label for="quantity" class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">Jumlah</label>
                    {{-- <span class="text-sm text-red-600 hidden" id="error">Harap diisi terlebih dahulu</span> --}}
                </div>

                <button id="button" type="submit"
                    class="w-full px-6 py-3 mt-3 text-lg text-white transition-all duration-150 ease-linear rounded-lg shadow outline-none bg-blue-500 hover:bg-blue-700 hover:shadow-lg focus:outline-none">
                    Kirim
                </button>
            </div>
        </div>
    </form>

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
