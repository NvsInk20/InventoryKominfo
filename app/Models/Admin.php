<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable; // Import Authenticatable
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str; // Tambahkan ini untuk menggunakan Str::random()

class Admin extends Authenticatable // Ubah dari Model menjadi Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'admins';
    protected $primaryKey = 'id_admin';
    public $incrementing = false; // Non-increment karena akan diisi secara manual (random string)
    protected $keyType = 'string'; // id_admin adalah string
    protected $fillable = ['username', 'password'];

    // Fungsi boot untuk membuat ID secara otomatis dengan 5 karakter
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->{$model->getKeyName()})) {
                // Generate random 5 characters string for id_admin
                $model->{$model->getKeyName()} = Str::random(5);
            }
        });
    }

    protected $hidden = [
        'password',
    ];
}
