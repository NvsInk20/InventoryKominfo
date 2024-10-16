<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'id_number',
        'quantity',
        'status',
        'category',
        'image_path',
        'pdf_path',
        'year',
        'keadaan_barang',
        'responsible',
    ];
    // // Definisi relasi ke model peminjam
    // public function peminjams()
    // {
    //     return $this->hasMany(peminjam::class);
    // }
}
