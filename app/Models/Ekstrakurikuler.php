<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ekstrakurikuler extends Model
{
    protected $table = 'ekstrakurikuler';

    protected $fillable = [
        'nama_ekskul',
        'nama_pembina',
        'jadwal',
        'deskripsi',
        'gambar',
    ];
}
