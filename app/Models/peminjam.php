<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjam extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_peminjam',
        'name',
        'email',
        'phone_number',
        'tanggal_peminjaman',
        'tanggal_pengembalian',
        'image_path',
        'status'
    ];
}
