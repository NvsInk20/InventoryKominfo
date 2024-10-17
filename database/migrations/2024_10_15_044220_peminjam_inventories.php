<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('peminjams', function (Blueprint $table) {
            $table->id();
            $table->string('nama_peminjam');
            $table->string('name');
            $table->string('email');
            $table->string('phone_number', 12);
            $table->string('category');
            $table->date('tanggal_peminjaman');
            $table->date('tanggal_pengembalian')->nullable();
            $table->string('image_path')->nullable(); // Menyimpan path gambar
            $table->enum('status', ['Dipinjam', 'Dikembalikan'])->default('Dipinjam');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('peminjams');
    }
};
