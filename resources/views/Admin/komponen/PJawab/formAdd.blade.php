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

    <form action="{{ route('PJ.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="min-h-screen bg-gray-100 p-0 sm:p-12 -mt-10">
            <div class="mx-auto max-w-md px-6 py-12 bg-white border-0 shadow-lg sm:rounded-3xl">
                <h1 class="text-2xl font-bold mb-8">Form Data Penanggung Jawab</h1>

                <div class="relative z-0 w-full mb-5">
                    <input type="text" name="name" placeholder=" " required
                        class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200" />
                    <label for="name" class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">Nama
                        Produk</label>
                </div>

                <div class="relative z-0 w-full mb-5">
                    <input type="text" name="ID_Produk" placeholder=" " required
                        class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200" />
                    <label for="ID_Produk" class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">ID
                        Produk</label>
                </div>

                <div class="relative z-0 w-full mb-5">
                    <input type="text" name="nomor_telp" placeholder=" " required
                        class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200" />
                    <label for="nomor_telp" class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">Nomor
                        Telepon</label>
                </div>

                <div class="relative z-0 w-full mb-5">
                    <input type="text" name="penanggung_jawab" placeholder=" " required
                        class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200" />
                    <label for="penanggung_jawab" class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">Nama
                        Penanggung Jawab</label>
                </div>

                <div class="relative z-0 w-full mb-5">
                    <input type="text" name="periode" placeholder=" " required
                        class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200" />
                    <label for="periode"
                        class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">Periode</label>
                </div>

                <label for="image">Upload Gambar:</label>
                <input type="file" name="image" required class="mb-5">

                <div class="relative z-0 w-full mb-5">
                    <select name="Bidang" required
                        class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none z-1 focus:outline-none focus:ring-0 focus:border-black border-gray-200">
                        <option value="" selected disabled hidden>Pilih Bidang</option>
                        <option value="Bidang 1">Bidang 1</option>
                        <option value="Bidang 2">Bidang 2</option>
                        <option value="Bidang 3">Bidang 3</option>
                    </select>
                    <label for="Bidang" class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">Pilih
                        Bidang</label>
                </div>
                <div class="relative z-0 w-full mb-5">
                    <select name="category" required
                        class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none z-1 focus:outline-none focus:ring-0 focus:border-black border-gray-200">
                        <option value="" selected disabled hidden>Pilih Kategori</option>
                        <option value="Barang">Barang</option>
                        <option value="Kendaraan">Kendaraan</option>
                        <option value="Ruangan">Ruangan</option>
                    </select>
                    <label for="category" class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">Pilih
                        Kategori</label>
                </div>

                <button id="button" type="submit"
                    class="w-full px-6 py-3 mt-3 text-lg text-white transition-all duration-150 ease-linear rounded-lg shadow outline-none bg-blue-500 hover:bg-blue-700 hover:shadow-lg focus:outline-none">
                    Kirim
                </button>
            </div>
        </div>
    </form>
</x-layout>
