<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat</title>
    <!-- Alpine.js -->
    <script src="//unpkg.com/alpinejs" defer></script>
    <!-- Flowbite CSS -->
    @vite('resources/css/app.css')
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
</head>

<body>
    <div class="head">
        <h1>Riwayat Peminjaman</h1>
    </div>
    @include('komponen.riwayat.dropdown')
    @include('komponen.riwayat.tabel')

    <!-- JavaScript untuk Toggle Details -->
    <script>
        function toggleDetails(rowId) {
            const row = document.getElementById(rowId);
            row.classList.toggle('hidden');
        }
    </script>
</body>


</html>
