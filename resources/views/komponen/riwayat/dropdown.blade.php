        <!-- Dropdown Container -->
        <div class="dropdown-container" id="container">
            <!-- Dropdown Kiri -->
            <div class="dropdown">
                <div @click.away="openSort1 = false" class="relative" x-data="{ openSort1: false, sortType1: 'Sort by' }">
                    <button @click="openSort1 = !openSort1"
                        class="flex items-center justify-center py-2 px-4 text-sm font-semibold bg-transparent rounded-lg ">
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
                                <a @click="sortType1='Barang', openSort1=false" x-show="sortType1 != 'Barang'"
                                    class="flex flex-row items-start rounded-lg bg-transparent p-2 hover:bg-gray-200"
                                    href="#">
                                    <p class="font-semibold">Barang</p>
                                </a>
                                <a @click="sortType1='Kendaraan Dinas', openSort1=false"
                                    x-show="sortType1 != 'Kendaraan Dinas'"
                                    class="flex flex-row items-start rounded-lg bg-transparent p-2 hover:bg-gray-200"
                                    href="#">
                                    <p class="font-semibold">Kendaraan Dinas</p>
                                </a>
                                <a @click="sortType1='Ruangan', openSort1=false" x-show="sortType1 != 'Ruangan'"
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
                <div @click.away="openSort2 = false" class="relative" x-data="{ openSort2: false, sortType2: 'Status' }">
                    <button @click="openSort2 = !openSort2"
                        class="flex items-center justify-center py-2 px-4 text-sm font-semibold bg-transparent rounded-lg ">
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
                                <a @click="sortType2='Tersedia', openSort2=false" x-show="sortType2 != 'Tersedia'"
                                    class="flex flex-row items-start rounded-lg bg-transparent p-2 hover:bg-gray-200"
                                    href="#">
                                    <p class="font-semibold">Tersedia</p>
                                </a>
                                <a @click="sortType2='Tidak Tersedia', openSort2=false"
                                    x-show="sortType2 != 'Tidak Tersedia'"
                                    class="flex flex-row items-start rounded-lg bg-transparent p-2 hover:bg-gray-200"
                                    href="#">
                                    <p class="font-semibold">Tidak Tersedia</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
