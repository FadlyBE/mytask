<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JaminanSosial extends Model
{
    use HasFactory;
    protected $table='tbl_jaminan_sosial';
    protected $fillable = [
        'pegawai_id',
        'asuransi_pa',
        'bpjs_kesehatan',
        'bpjs_tk',
    ];

}
