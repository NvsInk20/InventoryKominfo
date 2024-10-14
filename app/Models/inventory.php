<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class inventory extends Model
{
    protected $fillable = [
        'name',
        'id_number',
        'quantity',
        'status',
        'category',
        'image_url',
        'year',
        'responsible',
    ];
}
