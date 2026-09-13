<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfilSekolah extends Model
{
    protected $table = 'profil_sekolah';

    protected $fillable = [
        'nama_sekolah',
        'npsn',
        'akreditasi',
        'nama_kepala_sekolah',
        'sambutan_kepala_sekolah',
        'foto_kepala_sekolah',
        'alamat',
        'telepon',
        'email',
        'visi',
        'misi',
        'sejarah',
        'jumlah_guru',
        'jumlah_siswa',
        'jumlah_kelas',
    ];
}
