<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <!-- Teks besar dengan efek bayangan di huruf -->
    <div class="flex max-w-max mt-6">
        <h3 class="absolute text-5xl font-bold text-[#3489D2] leading-tight py-8 max-w-screen-md break-words animate__animated animate__fadeInLeft"
            style="text-shadow: 8px 12px 5px rgba(125, 125, 125, 0.5);">
            Sistem Informasi <br> Penanggung Jawab <br> Inventory
        </h3>
        <img class="h-130 w-50 ml-96 -mt-40 animate__animated animate__fadeInBottomRight" src="/img/sapi.png">
    </div>

    <!-- Bagian ini diubah menjadi flexbox dan pusatkan konten -->
    <div class="flex justify-center items-center space-x-8">
        <!-- Gambar jempol dengan animasi fade-up-left -->
        <img class="h-150 w-100 ml-16" src="/img/jempol.png">

        <!-- Teks Manajemen Inventory dan Perawatan dengan animasi fade-up-right -->
        <h4 class="text-white bg-blue-400 p-8 mr-40" style="padding: 45px; text-align: left;">
            <span class="font-bold">Manajemen Inventory dan Perawatan</span><br><br>
            <span>
                Kelola inventory dan perawatan dengan lebih baik melalui sistem manajemen yang terintegrasi dan canggih.
                Dapat meningkatkan efisiensi operasional, meminimalkan downtime, dan mengurangi biaya perawatan dengan
                pemantauan yang tepat waktu dan perencanaan yang akurat.
            </span>
        </h4>
    </div>
</x-layout>
