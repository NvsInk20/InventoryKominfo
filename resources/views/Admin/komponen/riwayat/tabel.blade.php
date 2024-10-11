 <!-- Table Container -->
 <div class="table-container">
     <div
         class="relative flex flex-col w-full h-full overflow-x-auto text-green-700 bg-white shadow-md rounded-lg bg-clip-border">
         <table class="w-full text-left table-auto min-w-max">
             <thead>
                 <tr class="border-b border-slate-300 bg-slate-50">
                     <th class="text-sm font-bold leading-none text-center text-slate-500">NO</th>
                     <th class="p-4 text-sm font-bold leading-none text-center text-slate-500">Produk</th>
                     <th class="p-4 text-sm font-bold leading-none text-center text-slate-500">ID Number</th>
                     <th class="p-4 text-sm font-bold leading-none text-center text-slate-500">Nama</th>
                     <th class="p-4 text-sm font-bold leading-none text-center text-slate-500">Kategori</th>
                     <th class="p-4 text-sm font-bold leading-none text-center text-slate-500">Status</th>
                     <th class="p-4 text-sm font-bold leading-none text-center text-slate-500">Aksi</th>
                 </tr>
             </thead>
             <tbody>
                 <!-- Row 1 -->
                 <tr class="hover:bg-slate-50 border-2 border-black">
                     <td class="p-4 flex-1 border-b border-slate-200 py-5 text-center">1</td>
                     <td class="p-4 border-b border-slate-200 py-5">
                         <div class="gambar">
                             <div
                                 class="pointer-events-none absolute top-2/4 left-2/4 -translate-y-2/4 -translate-x-2/4 text-white opacity-0 transition-opacity peer-checked:opacity-100">
                                 <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" viewBox="0 0 20 20"
                                     fill="currentColor" stroke="currentColor" stroke-width="1">
                                     <path fill-rule="evenodd"
                                         d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                         clip-rule="evenodd"></path>
                                 </svg>
                             </div>
                             </label>
                             <img src="https://demos.creative-tim.com/corporate-ui-dashboard-pro/assets/img/kam-idris-_HqHX3LBN18-unsplash.jpg"
                                 alt="Product 1" class="w-16 h-16 object-cover rounded" />
                         </div>
                     </td>
                     <td class="p-4 border-b border-slate-200 text-center py-5">
                         <p class="block font-semibold text-sm text-centertext-slate-800">F2024009</p>
                     </td>
                     <td class="p-4 text-center border-b border-slate-200 py-5">
                         <p class="text-sm text-slate-500">Kamera</p>
                     </td>
                     <td class="p-4 text-center border-b border-slate-200 py-5">
                         <p class="text-sm text-slate-500">Barang</p>
                     </td>
                     <td class="p-4 border-b text-center border-slate-200 py-5">
                         <button
                             class="items-center justify-center bg-green-400 rounded-xl text-center py-2 px-4 ml-6 max-w-max text-white">
                             <i class="fas fa-check text-white mr-2"></i>Sudah Dikembalikan
                         </button>
                     </td>
                     <td class="p-4 text-center border-b border-slate-200 py-5">
                         <button type="button" class="text-slate-500 hover:text-slate-700"
                             onclick="toggleDetails('accordion-color-body-1')">
                             Details
                         </button>
                     </td>
                 </tr>
                 <tr id="accordion-color-body-1" class="hidden collapsible-row border-2 border-black">
                     <td colspan="6" class="p-4 border-b border-slate-200">
                         <div class="flex">
                             <!-- Bagian gambar -->
                             <div class="w-1/4">
                                 <img src="https://demos.creative-tim.com/corporate-ui-dashboard-pro/assets/img/kam-idris-_HqHX3LBN18-unsplash.jpg"
                                     alt="Product 1" class="w-28 h-28 object-cover rounded ml-10" />
                             </div>

                             <!-- Bagian detail teks -->
                             <div class="w-3/4 ml-10 text-cyan-950">
                                 <div class="grid grid-cols-2 gap-4">
                                     <div>
                                         <h3 class="font-bold">Nama Inventory</h3>
                                         <p>Kamera</p>
                                     </div>
                                     <div>
                                         <h3 class="font-bold">ID Inventory</h3>
                                         <p>K202409</p>
                                     </div>

                                     <div>
                                         <h3 class="font-bold">Tahun Penggunaan</h3>
                                         <p>2024</p>
                                     </div>
                                     <div>
                                         <h3 class="font-bold">Penanggung Jawab</h3>
                                         <p>Bapak William</p>
                                     </div>

                                     <div>
                                         <h3 class="font-bold">Status</h3>
                                         <p>Sudah Dikembalikan</p>
                                     </div>
                                     <div>
                                         <h3 class="font-bold">Kategori</h3>
                                         <p>Barang</p>
                                     </div>

                                     <div>
                                         <h3 class="font-bold">Peminjam</h3>
                                         <p>Bapak Steffan</p>
                                     </div>
                                     <div>
                                         <h3 class="font-bold">Tanggal Peminjaman</h3>
                                         <p>19 Oktober 2024</p>
                                     </div>
                                 </div>

                                 <!-- Bagian tombol -->
                                 <div class="flex justify-end mt-6">
                                     <button type="button"
                                         class="border border-green-400 font-bold text-green-400 rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:text-white hover:bg-green-400 focus:outline-none focus:shadow-outline">
                                         Edit
                                     </button>
                                     <button type="button"
                                         class="border border-red-500 font-bold text-red-600 rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:text-white hover:bg-red-600 focus:outline-none focus:shadow-outline">
                                         Hapus
                                     </button>
                                 </div>
                             </div>
                         </div>
                     </td>
                 </tr>

                 <!-- Row 2 -->
                 <tr class="hover:bg-slate-50 border-2 border-black">
                     <td class="p-4 flex-1 border-b border-slate-200 py-5 text-center">2</td>
                     <td class="p-4 border-b border-slate-200 py-5">
                         <div class="gambar">
                             <div
                                 class="pointer-events-none absolute top-2/4 left-2/4 -translate-y-2/4 -translate-x-2/4 text-white opacity-0 transition-opacity peer-checked:opacity-100">
                                 <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" viewBox="0 0 20 20"
                                     fill="currentColor" stroke="currentColor" stroke-width="1">
                                     <path fill-rule="evenodd"
                                         d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                         clip-rule="evenodd"></path>
                                 </svg>
                             </div>
                             </label>
                             <img src="https://demos.creative-tim.com/corporate-ui-dashboard-pro/assets/img/kam-idris-_HqHX3LBN18-unsplash.jpg"
                                 alt="Product 1" class="w-16 h-16 object-cover rounded" />
                         </div>
                     </td>
                     <td class="p-4 border-b border-slate-200 text-center py-5">
                         <p class="block font-semibold text-sm text-centertext-slate-800">M202498</p>
                     </td>
                     <td class="p-4 text-center border-b border-slate-200 py-5">
                         <p class="text-sm text-slate-500">Mobil Dinas</p>
                     </td>
                     <td class="p-4 text-center border-b border-slate-200 py-5">
                         <p class="text-sm text-slate-500">Kendaraan</p>
                     </td>
                     <td class="p-4 border-b text-center border-slate-200 py-5">
                         <button
                             class="items-center justify-center bg-green-400 rounded-xl text-center py-2 px-4 ml-6 max-w-max text-white">
                             <i class="fas fa-check text-white mr-2"></i>Sudah Dikembalikan
                         </button>
                     </td>
                     <td class="p-4 text-center border-b border-slate-200 py-5">
                         <button type="button" class="text-slate-500 hover:text-slate-700"
                             onclick="toggleDetails('accordion-color-body-2')">
                             Details
                         </button>
                     </td>
                 </tr>
                 <tr id="accordion-color-body-2" class="hidden collapsible-row border-2 border-x-black border-b-black">
                     <td colspan="6" class="p-4 border-b border-slate-200">
                         <div class="flex">
                             <!-- Bagian gambar -->
                             <div class="w-1/4">
                                 <img src="https://demos.creative-tim.com/corporate-ui-dashboard-pro/assets/img/kam-idris-_HqHX3LBN18-unsplash.jpg"
                                     alt="Product 1" class="w-28 h-28 object-cover rounded ml-10" />
                             </div>

                             <!-- Bagian detail teks -->
                             <div class="w-3/4 ml-10 text-cyan-950">
                                 <div class="grid grid-cols-2 gap-4">
                                     <div>
                                         <h3 class="font-bold">Nama Inventory</h3>
                                         <p>Mobil Dinas</p>
                                     </div>
                                     <div>
                                         <h3 class="font-bold">ID Inventory</h3>
                                         <p>M202498</p>
                                     </div>

                                     <div>
                                         <h3 class="font-bold">Tahun Penggunaan</h3>
                                         <p>2024</p>
                                     </div>
                                     <div>
                                         <h3 class="font-bold">Penanggung Jawab</h3>
                                         <p>Bapak William</p>
                                     </div>

                                     <div>
                                         <h3 class="font-bold">Status</h3>
                                         <p>Sudah Dikembalikan</p>
                                     </div>
                                     <div>
                                         <h3 class="font-bold">Kategori</h3>
                                         <p>Barang</p>
                                     </div>

                                     <div>
                                         <h3 class="font-bold">Peminjam</h3>
                                         <p>Bapak Steffan</p>
                                     </div>
                                     <div>
                                         <h3 class="font-bold">Tanggal Peminjaman</h3>
                                         <p>19 Oktober 2024</p>
                                     </div>
                                 </div>

                                 <!-- Bagian tombol -->
                                 <div class="flex justify-end mt-6">
                                     <button type="button"
                                         class="border border-green-400 font-bold text-green-400 rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:text-white hover:bg-green-400 focus:outline-none focus:shadow-outline">
                                         Edit
                                     </button>
                                     <button type="button"
                                         class="border border-red-500 font-bold text-red-600 rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:text-white hover:bg-red-600 focus:outline-none focus:shadow-outline">
                                         Hapus
                                     </button>
                                 </div>
                             </div>
                         </div>
                     </td>
                 </tr>
                 <!-- Baris ketiga -->
                 <tr class="hover:bg-slate-50 border-2 border-black">
                     <td class="p-4 flex-1 border-b border-slate-200 py-5 text-center">3</td>
                     <td class="p-4 border-b border-slate-200 py-5">
                         <div class="gambar">
                             <div
                                 class="pointer-events-none absolute top-2/4 left-2/4 -translate-y-2/4 -translate-x-2/4 text-white opacity-0 transition-opacity peer-checked:opacity-100">
                                 <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" viewBox="0 0 20 20"
                                     fill="currentColor" stroke="currentColor" stroke-width="1">
                                     <path fill-rule="evenodd"
                                         d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                         clip-rule="evenodd"></path>
                                 </svg>
                             </div>
                             </label>
                             <img src="https://demos.creative-tim.com/corporate-ui-dashboard-pro/assets/img/kam-idris-_HqHX3LBN18-unsplash.jpg"
                                 alt="Product 1" class="w-16 h-16 object-cover rounded" />
                         </div>
                     </td>
                     <td class="p-4 border-b border-slate-200 text-center py-5">
                         <p class="block font-semibold text-sm text-centertext-slate-800">R202409</p>
                     </td>
                     <td class="p-4 text-center border-b border-slate-200 py-5">
                         <p class="text-sm text-slate-500">Ruang Rapat</p>
                     </td>
                     <td class="p-4 text-center border-b border-slate-200 py-5">
                         <p class="text-sm text-slate-500">Ruangan</p>
                     </td>
                     <td class="p-4 border-b text-center border-slate-200 py-5">
                         <button
                             class="items-center justify-center bg-red-600 rounded-xl text-center py-2 px-4 ml-6 max-w-max text-white">
                             <i class="fas fa-check text-white mr-2"></i>Belum Dikembalikan
                         </button>
                     </td>
                     <td class="p-4 text-center border-b border-slate-200 py-5">
                         <button type="button" class="text-slate-500 hover:text-slate-700"
                             onclick="toggleDetails('accordion-color-body-3')">
                             Details
                         </button>
                     </td>
                 </tr>
                 <tr id="accordion-color-body-3"
                     class="hidden collapsible-row border-2 border-x-black border-b-black">
                     <td colspan="6" class="p-4 border-b border-slate-200">
                         <div class="flex">
                             <!-- Bagian gambar -->
                             <div class="w-1/4">
                                 <img src="https://demos.creative-tim.com/corporate-ui-dashboard-pro/assets/img/kam-idris-_HqHX3LBN18-unsplash.jpg"
                                     alt="Product 1" class="w-28 h-28 object-cover rounded ml-10" />
                             </div>

                             <!-- Bagian detail teks -->
                             <div class="w-3/4 ml-10 text-cyan-950">
                                 <div class="grid grid-cols-2 gap-4">
                                     <div>
                                         <h3 class="font-bold">Nama Inventory</h3>
                                         <p>Mobil Dinas</p>
                                     </div>
                                     <div>
                                         <h3 class="font-bold">ID Inventory</h3>
                                         <p>M202498</p>
                                     </div>

                                     <div>
                                         <h3 class="font-bold">Tahun Penggunaan</h3>
                                         <p>2024</p>
                                     </div>
                                     <div>
                                         <h3 class="font-bold">Penanggung Jawab</h3>
                                         <p>Bapak William</p>
                                     </div>

                                     <div>
                                         <h3 class="font-bold">Status</h3>
                                         <p>Sudah Dikembalikan</p>
                                     </div>
                                     <div>
                                         <h3 class="font-bold">Kategori</h3>
                                         <p>Barang</p>
                                     </div>

                                     <div>
                                         <h3 class="font-bold">Peminjam</h3>
                                         <p>Bapak Steffan</p>
                                     </div>
                                     <div>
                                         <h3 class="font-bold">Tanggal Peminjaman</h3>
                                         <p>19 Oktober 2024</p>
                                     </div>
                                 </div>

                                 <!-- Bagian tombol -->
                                 <div class="flex justify-end mt-6">
                                     <button type="button"
                                         class="border border-green-400 font-bold text-green-400 rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:text-white hover:bg-green-400 focus:outline-none focus:shadow-outline">
                                         Edit
                                     </button>
                                     <button type="button"
                                         class="border border-red-500 font-bold text-red-600 rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:text-white hover:bg-red-600 focus:outline-none focus:shadow-outline">
                                         Hapus
                                     </button>
                                 </div>
                             </div>
                         </div>
                     </td>
                 </tr>

             </tbody>
         </table>
     </div>
