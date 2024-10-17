<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenanggungJawab extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'ID_Produk',
        'category',
        'penanggung_jawab',
        'Bidang',
        'nomor_telp',
        'periode',
        'image_path',
    ];

}
