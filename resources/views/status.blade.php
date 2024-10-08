<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Status Barang</title>
    <!-- Vite atau Tailwind -->
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="../css/style.css">
    <style>
        .hidden {
            display: none;
        }

        .rotate {
            transform: rotate(180deg);
        }

        /* Transisi animasi */
        .detail-container {
            overflow: hidden;
            transition: max-height 0.5s ease, opacity 0.5s ease;
            max-height: 0;
            opacity: 0;
        }

        .detail-container.open {
            max-height: 600px;
            opacity: 1;
        }

        /* Styling detail */
        .detail-content {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
        }

        .detail-left {
            display: flex;
            align-items: center;
        }

        .detail-left img {
            width: 80px;
            height: 80px;
            margin-right: 20px;
            border-radius: 10px;
            border: 2px solid #ccc;
        }

        .detail-right {
            display: flex;
            flex-wrap: wrap;
            width: 70%;
        }

        .detail-right p {
            width: 50%;
            margin: 5px 0;
            font-size: 14px;
        }

        /* Styling untuk tombol di bagian detail */
        .action-buttons {
            margin-top: 20px;
            display: flex;
            gap: 10px;
        }

        .action-buttons button {
            padding: 8px 12px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
            color: white;
        }

        .btn-edit {
            background-color: #4CAF50; /* Hijau */
        }

        .btn-delete {
            background-color: #F44336; /* Merah */
        }

        .btn-edit:hover {
            background-color: #45a049;
        }

        .btn-delete:hover {
            background-color: #e53935;
        }
    </style>
</head>

<body class="flex justify-center items-center h-screen">
    <table class="border-b-2 border-black w-full overflow-hidden">
        <thead class="text-black">
            <tr class="ml-0 border-b-2 border-black">
                <th class="py-3 text-left pl-10">#</th>
                <th class="py-3">ID Number</th>
                <th class="py-3">Nama Benda</th>
                <th class="py-3">Status</th>
                <th class="py-3">Aksi</th>
            </tr>
        </thead>
        <tbody class="text-black-300 text-center scroll-pt-0">
            <!-- Baris Utama -->
            <div class="overscroll-none">
              <tr class="table-row bg-sky-300 hover:bg-cyan-100 border-b-0">
                  <td class="py-3 text-left max-w-1" id="check">
                      <div class="flex items-center space-x-4 ml-8">
                          <!-- Checkbox -->
                          <input class="cursor-pointer h-6 w-6 text-cyan-500 bg-white border-2 border-black rounded" id="check" type="checkbox">
                          <!-- Gambar -->
                          <img src="/images/camera.jpg" class="w-14 h-14 rounded-lg">
                      </div>
                  </td>
                  <td class="py-3 px-3">RK99898</td>
                  <td class="py-3 px-3">Ruang Kerja</td>
                  <td class="relative py-3 px-1">
                      <button class="bg-blue-500 text-white py-1 px-4 rounded hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400">
                          Tersedia
                      </button>
                  </td>
                  <td>
                      <!-- Tombol Dropdown -->
                      <button class="text-black rounded hover:bg-gray-400 focus:outline-none mr-4" onclick="toggleDropdown(event, this)">
                          <svg class="w-5 h-5 transition-transform duration-300 ease-out" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                          </svg>
                      </button>
                  </td>
              </tr>
  
              <!-- Baris Detail yang Tersembunyi -->
              <tr class="bg-white border-t-0 border-black hidden detail-row">
                  <td colspan="5" class="p-4">
                      <div class="p-4 bg-gray-100 border border-gray-200 rounded-lg shadow-md detail-container">
                          <div class="detail-content">
                              <div class="detail-left">
                                  <img src="/images/camera.jpg" class="rounded-lg">
                              </div>
                              <div class="detail-right">
                                  <p><strong>Nama Barang:</strong> Ruang Kerja</p>
                                  <p><strong>ID Number:</strong> RK99898</p>
                                  <p><strong>Status:</strong> Tersedia</p>
                                  <p><strong>Penanggung Jawab:</strong> Bapak William</p>
                                  <p><strong>Peminjam:</strong> Bapak Stefan</p>
                                  <p><strong>Tanggal Peminjaman:</strong> 19 Oktober 2024</p>
                                  <p><strong>Kategori:</strong> Ruangan</p>
                                  <!-- Tombol Edit dan Hapus -->
                                  <div class="action-buttons">
                                      <button class="btn-edit">Edit</button>
                                      <button class="btn-delete">Hapus</button>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </td>
              </tr>
            </div>
            
        </tbody>
    </table>

    <script>
        function toggleDropdown(event, button) {
            event.preventDefault();
            event.stopPropagation();

            const row = button.closest('tr');
            const detailRow = row.nextElementSibling;
            const scrollBtn = document.getElementById('scrollBtn');

            // Tampilkan atau sembunyikan baris detail
            if (detailRow.classList.contains('hidden')) {
                detailRow.classList.remove('hidden');
                detailRow.querySelector('.detail-container').classList.add('open');
                button.querySelector('svg').classList.add('rotate');

                // Scroll ke baris detail
                setTimeout(() => {
                    detailRow.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }, 300);

                // Tampilkan tombol scroll manual
                scrollBtn.classList.add('show');
            } else {
                detailRow.classList.add('hidden');
                detailRow.querySelector('.detail-container').classList.remove('open');
                button.querySelector('svg').classList.remove('rotate');

                // Sembunyikan tombol scroll manual
                scrollBtn.classList.remove('show');
            }
        }

        // Tombol scroll manual ke bawah
        document.getElementById('scrollBtn').addEventListener('click', function () {
            window.scrollBy({ top: window.innerHeight, behavior: 'smooth' });
        });
    </script>
</body>

</html>
