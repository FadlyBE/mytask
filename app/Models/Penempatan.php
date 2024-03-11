<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penempatan extends Model
{
    use HasFactory;
    protected $table='tbl_penempatan';
    protected $fillable = [
        'pegawai_id',
        'unit_penempatan',
        'tahun_mulai',
        'status_pegawai',
        'tgl_pengangkatan',
    ];
}
