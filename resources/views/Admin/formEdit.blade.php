<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <!-- component -->
    <!-- Code on GiHub: https://github.com/vitalikda/form-floating-labels-tailwindcss -->
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
            /* @apply transform; scale-75; -translate-y-6; */
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
            /* @apply text-black; left-0; */
            --tw-text-opacity: 1;
            color: rgba(0, 0, 0, var(--tw-text-opacity));
            left: 0px;
        }
    </style>

    <div class="min-h-screen bg-gray-100 p-0 sm:p-12 -mt-10">
        <div class="mx-auto max-w-md px-6 py-12 bg-white border-0 shadow-lg sm:rounded-3xl">
            <h1 class="text-2xl font-bold mb-8">Form Data Inventory Diskominfo</h1>
            <form id="form" novalidate>
                <div class="relative z-0 w-full mb-5">
                    <input type="text" name="name" placeholder=" " required
                        class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200" />
                    <label for="name" class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">Nama
                        Produk</label>
                    <span class="text-sm text-red-600 hidden" id="error">Nama harap diisi terlebih dahulu</span>
                </div>
                <div class="relative z-0 w-full mb-5">
                    <input type="text" name="name" placeholder=" " required
                        class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200" />
                    <label for="name" class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">Tahun
                        Pengunaan</label>
                    <span class="text-sm text-red-600 hidden" id="error">Harap diisi terlebih dahulu</span>
                </div>
                <div class="relative z-0 w-full mb-5">
                    <input type="text" name="name" placeholder=" " required
                        class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200" />
                    <label for="name" class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">Penanggung
                        Jawab</label>
                    <span class="text-sm text-red-600 hidden" id="error">Harap diisi terlebih dahulu</span>
                </div>

                <div class="relative z-0 w-full mb-5">
                    <input type="email" name="email" placeholder=" "
                        class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200" />
                    <label for="email" class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">ID
                        Number</label>
                    <span class="text-sm text-red-600 hidden" id="error">ID Number harus diisi</span>
                </div>

                <fieldset class="relative z-0 w-full p-px mb-5">
                    <legend class="absolute text-gray-500 transform scale-75 -top-3 origin-0">Pilih Status</legend>
                    <div class="block pt-3 pb-2 space-x-4">
                        <label>
                            <input type="radio" name="radio" value="1"
                                class="mr-2 text-blue-500 border-2 border-gray-300 focus:border-blue-500 focus:ring-blue-500" />
                            Tersedia
                        </label>
                        <label>
                            <input type="radio" name="radio" value="2"
                                class="mr-2 text-blue-500 border-2 border-gray-300 focus:border-blue-500 focus:ring-blue-500" />
                            Tidak Tersedia
                        </label>
                    </div>
                    <span class="text-sm text-red-600 hidden" id="error">Silahkan Pilih Status Terlebih
                        Dahulu</span>
                </fieldset>

                <div class="relative z-0 w-full mb-5">
                    <select name="select" value="" onclick="this.setAttribute('value', this.value);"
                        class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none z-1 focus:outline-none focus:ring-0 focus:border-black border-gray-200">
                        <option value="" selected disabled hidden></option>
                        <option value="1">Barang</option>
                        <option value="2">Kendaraan</option>
                        <option value="3">Ruangan</option>
                    </select>
                    <label for="select" class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">Pilih
                        Kategori</label>
                    <span class="text-sm text-red-600 hidden" id="error">Silahkan Pilih Kategori terlebih
                        dahulu</span>
                </div>

                <div class="flex flex-row space-x-4">
                    <div class="relative z-0 w-full mb-5">
                        <input type="text" name="date" placeholder=" "
                            onclick="this.setAttribute('type', 'date');"
                            class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200" />
                        <label for="date" class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">Tanggal
                            Peminjaman</label>
                        <span class="text-sm text-red-600 hidden" id="error">Tolong isi tanggal peminjaman terlebih
                            dahulu</span>
                    </div>
                </div>

                <div class="relative z-0 w-full mb-5">
                    <input type="number" name="" placeholder=" "
                        class="pt-3 pb-2 pl-5 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200" />
                    <label for=""
                        class="absolute duration-300 top-3 left-5 -z-1 origin-0 text-gray-500">Jumlah</label>
                    <span class="text-sm text-red-600 hidden" id="error">Harap diisi terlebih dahulu</span>
                </div>

                <button id="button" type="button"
                    class="w-full px-6 py-3 mt-3 text-lg text-white transition-all duration-150 ease-linear rounded-lg shadow outline-none bg-blue-500 hover:bg-blue-700 hover:shadow-lg focus:outline-none">
                    Kirim
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

            // Highlight input and label with red
            const allBorders = document.querySelectorAll('.border-gray-200')
            const allTexts = document.querySelectorAll('.text-gray-500')
            allBorders.forEach((el) => {
                el.classList.toggle('border-red-600')
            })
            allTexts.forEach((el) => {
                el.classList.toggle('text-red-600')
            })
        }
    </script>
</x-layout>
