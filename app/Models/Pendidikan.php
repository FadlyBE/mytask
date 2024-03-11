<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendidikan extends Model
{
    use HasFactory;
    protected $table='tbl_pendidikan';
    protected $fillable = [
        'pegawai_id',
        'pendidikan_terakhir',
        'tahun_lulus',
        'jurusan',
        'universitas',
        'alamat',
    ];
}
