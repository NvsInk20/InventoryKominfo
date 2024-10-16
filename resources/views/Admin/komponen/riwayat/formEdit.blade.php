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
            <form action="{{ route('peminjam.update', ['id' => $peminjam->id]) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Nama Peminjam -->
                <div class="relative z-0 w-full mb-5">
                    <input type="text" name="nama_peminjam"
                        value="{{ old('nama_peminjam', $peminjam->nama_peminjam) }}" placeholder=" " required
                        class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200" />
                    <label for="name" class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">Nama
                        Peminjam</label>
                </div>

                <!-- Email -->
                <div class="relative z-0 w-full mb-5">
                    <input type="email" name="email" value="{{ old('email', $peminjam->email) }}" placeholder=" "
                        required
                        class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200" />
                    <label for="year" class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">Email</label>
                </div>

                <!-- Nomor Telepon -->
                <div class="relative z-0 w-full mb-5">
                    <input type="number" name="phone_number" value="{{ old('phone_number', $peminjam->phone_number) }}"
                        placeholder=" " required
                        class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200" />
                    <label for="phone_number" class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">Nomor
                        Telp</label>
                </div>

                <!-- Nama Produk -->
                <div class="relative z-0 w-full mb-5">
                    <input type="text" name="name" value="{{ old('name', $peminjam->name) }}" placeholder=" "
                        required
                        class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200" />
                    <label for="name" class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">Nama
                        Produk</label>
                </div>
                <!-- Kategori -->
                <div class="relative z-0 w-full mb-5">
                    <select name="category" required
                        class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none z-1 focus:outline-none focus:ring-0 focus:border-black border-gray-200">
                        <option value="" disabled hidden>Pilih Kategori</option>
                        <option value="Barang" {{ old('category', $peminjam->category) == 'Barang' ? 'selected' : '' }}>
                            Barang</option>
                        <option value="Kendaraan"
                            {{ old('category', $peminjam->category) == 'Kendaraan' ? 'selected' : '' }}>Kendaraan
                        </option>
                        <option value="Ruangan"
                            {{ old('category', $peminjam->category) == 'Ruangan' ? 'selected' : '' }}>Ruangan</option>
                    </select>
                    <label for="category" class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">Pilih
                        Kategori</label>
                </div>
                <!-- Upload Gambar -->
                <div class="relative z-0 w-full mb-5">
                    <input type="file" name="image" accept="image/*" class="block w-full mt-2 border-gray-200">
                    @error('image')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                    @if ($peminjam->image_path)
                        <!-- Pastikan untuk memeriksa 'image_path' -->
                        <p class="mt-2 text-gray-500">Gambar saat ini: <img
                                src="{{ asset('storage/' . $peminjam->image_path) }}" alt="Image" width="100">
                        </p>
                    @else
                        <p class="mt-2 text-red-500">Tidak ada gambar saat ini.</p>
                    @endif

                </div>

                <!-- Tanggal Peminjaman -->
                <div class="relative z-0 w-full mb-5">
                    <input type="text" name="tanggal_peminjaman" id="date-input"
                        value="{{ old('tanggal_peminjaman', $peminjam->tanggal_peminjaman) }}" placeholder=" "
                        onclick="this.setAttribute('type', 'date'); this.focus();"
                        class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200"
                        onblur="this.setAttribute('type', 'text'); checkDate(this);" />
                    <label for="tanggal_peminjaman"
                        class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">Tanggal Peminjaman</label>
                </div>

                <!-- Tanggal Pengembalian -->
                <div class="relative z-0 w-full mb-5">
                    <input type="text" name="tanggal_pengembalian" id="date-input"
                        value="{{ old('tanggal_pengembalian', $peminjam->tanggal_pengembalian) }}" placeholder=" "
                        onclick="this.setAttribute('type', 'date'); this.focus();"
                        class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200"
                        onblur="this.setAttribute('type', 'text'); checkDate(this);" />
                    <label for="tanggal_pengembalian"
                        class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">Tanggal Pengembalian</label>
                </div>
                <!-- Status -->
                <fieldset class="relative z-0 w-full p-px mb-5">
                    <legend class="absolute text-gray-500 transform scale-75 -top-3 origin-0">Pilih Status</legend>
                    <div class="block pt-3 pb-2 space-x-4">
                        <label>
                            <input type="radio" name="status" value="Dikembalikan"
                                {{ old('status', $peminjam->status) == 'Dikembalikan' ? 'checked' : '' }}
                                class="mr-2 text-blue-500 border-2 border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                                required />
                            Dikembalikan
                        </label>
                        <label>
                            <input type="radio" name="status" value="Dipinjam"
                                {{ old('status', $peminjam->status) == 'Dipinjam' ? 'checked' : '' }}
                                class="mr-2 text-blue-500 border-2 border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                                required />
                            Dipinjam
                        </label>
                    </div>
                </fieldset>

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
