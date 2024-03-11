<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resign extends Model
{
    use HasFactory;
    protected $table='tbl_resign';
    protected $fillable = [
        'pegawai_id',
        'tgl_resign',
        'usia_resign',
        'masa_kerja_resign',
    ];
  
}
