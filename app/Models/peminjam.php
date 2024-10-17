<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Peminjam extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'nama_peminjam',
        'name',
        'email',
        'phone_number',
        'category',
        'tanggal_peminjaman',
        'tanggal_pengembalian',
        'image_path',
        'status'
    ];
    protected $dates = ['deleted_at'];
}
