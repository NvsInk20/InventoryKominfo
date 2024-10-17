<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="//unpkg.com/alpinejs" defer></script>

<!-- Dropdown Container -->
<form method="GET" action="{{ route('Admin.PJ') }}">
    <div class="dropdown-container" id="container">
        <!-- Dropdown Kiri -->
        <div class="dropdown">
            <div @click.away="openSort1 = false" class="relative" x-data="{ openSort1: false, sortType1: '{{ request('sort_type1', 'Sort by') }}' }">
                <input type="hidden" name="sort_type1" x-model="sortType1">
                <button @click.prevent="openSort1 = !openSort1"
                    class="flex items-center justify-center py-2 px-4 text-sm font-semibold bg-transparent rounded-lg">
                    <span x-text="sortType1"></span>
                    <svg fill="currentColor" viewBox="0 0 20 20"
                        :class="{ 'rotate-180': openSort1, 'rotate-0': !openSort1 }"
                        class="w-5 h-5 transition-transform duration-200 transform">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
                <div x-show="openSort1" x-transition class="dropdown-content">
                    <div class="px-2 pt-2 pb-2 text-black rounded-md shadow-lg bg-white">
                        <div class="flex flex-col">
                            <a @click.prevent="if (sortType1 !== 'Barang') { sortType1='Barang'; openSort1=false; $event.target.closest('form').submit(); }"
                                class="flex flex-row items-start rounded-lg bg-transparent p-2 hover:bg-gray-200"
                                href="#">
                                <p class="font-semibold">Barang</p>
                            </a>
                            <a @click.prevent="if (sortType1 !== 'Kendaraan') { sortType1='Kendaraan'; openSort1=false; $event.target.closest('form').submit(); }"
                                class="flex flex-row items-start rounded-lg bg-transparent p-2 hover:bg-gray-200"
                                href="#">
                                <p class="font-semibold">Kendaraan</p>
                            </a>
                            <a @click.prevent="if (sortType1 !== 'Ruangan') { sortType1='Ruangan'; openSort1=false; $event.target.closest('form').submit(); }"
                                class="flex flex-row items-start rounded-lg bg-transparent p-2 hover:bg-gray-200"
                                href="#">
                                <p class="font-semibold">Ruangan</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Dropdown Kanan -->
        <div class="dropdown">
            <div @click.away="openSort2 = false" class="relative" x-data="{ openSort2: false, sortType2: '{{ request('sort_type2', 'Bidang') }}' }">
                <input type="hidden" name="sort_type2" x-model="sortType2">
                <button @click.prevent="openSort2 = !openSort2"
                    class="flex items-center justify-center py-2 px-4 text-sm font-semibold bg-transparent rounded-lg">
                    <span x-text="sortType2"></span>
                    <svg fill="currentColor" viewBox="0 0 20 20"
                        :class="{ 'rotate-180': openSort2, 'rotate-0': !openSort2 }"
                        class="w-5 h-5 transition-transform duration-200 transform">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
                <div x-show="openSort2" x-transition class="dropdown-content">
                    <div class="px-2 pt-2 pb-2 text-black rounded-md shadow-lg bg-white">
                        <div class="flex flex-col">
                            <a @click.prevent="if (sortType2 !== 'Bidang 1') { sortType2='Bidang 1'; openSort2=false; $event.target.closest('form').submit(); }"
                                class="flex flex-row items-start rounded-lg bg-transparent p-2 hover:bg-gray-200"
                                href="#">
                                <p class="font-semibold">Bidang 1</p>
                            </a>
                            <a @click.prevent="if (sortType2 !== 'Bidang 2') { sortType2='Bidang 2'; openSort2=false; $event.target.closest('form').submit(); }"
                                class="flex flex-row items-start rounded-lg bg-transparent p-2 hover:bg-gray-200"
                                href="#">
                                <p class="font-semibold">Bidang 2</p>
                            </a>
                            <a @click.prevent="if (sortType2 !== 'Bidang 3') { sortType2='Bidang 3'; openSort2=false; $event.target.closest('form').submit(); }"
                                class="flex flex-row items-start rounded-lg bg-transparent p-2 hover:bg-gray-200"
                                href="#">
                                <p class="font-semibold">Bidang 3</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
    function updateActivePage(page) {
        // Ubah warna navbar sesuai dengan halaman aktif
        const navbar = document.querySelector('nav'); // Sesuaikan selector ini dengan elemen navbar Anda
        if (navbar) {
            navbar.classList.add('bg-blue-500'); // Ganti warna navbar sesuai kebutuhan
        }
    }
</script>
