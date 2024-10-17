<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('penanggung_jawabs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('ID_Produk');
            $table->string('category');
            $table->string('penanggung_jawab');
            $table->enum('Bidang', ['Bidang 1', 'Bidang 2', 'Bidang 3'])->default('Bidang 1');
            $table->string('nomor_telp');
            $table->string('periode');
            $table->string('image_path')->nullable(); // Menyimpan path gambar
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penanggung_jawabs');
    }
};
