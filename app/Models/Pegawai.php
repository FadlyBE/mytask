<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;
    protected $table='tbl_pegawai';
    protected $fillable = [
        'name',
        'status',
        'jabatan',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'status_perkawinan',
        'no_ktp',
        'nip',
        'npwp',
        'no_paspor',
        'tanggal_mulai_tugas',
        'tgl_spk_pertama',
        'no_hp',
        'email_kerja',
        'email_pribadi',
        'alamat_ktp',
        'domisili',
        'nuptk',
        'ppg_2022',
        'sertifikasi',
        'inpassing',
        'photo_resmi',
    ];

    public function pendidikan()
    {
        return $this->hasOne(Pendidikan::class,'pegawai_id','id');
    }
    public function penempatan()
    {
        return $this->hasOne(Penempatan::class,'pegawai_id','id');
    }

    public function bank()
    {
        return $this->hasOne(BankAccount::class,'pegawai_id','id');
    }

    public function jaminan()
    {
        return $this->hasOne(JaminanSosial::class,'pegawai_id','id');
    }

    public function resign()
    {
        return $this->hasOne(Resign::class,'pegawai_id','id');
    }

}
