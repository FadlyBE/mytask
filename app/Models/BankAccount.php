<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankAccount extends Model
{
    use HasFactory;
    protected $table='tbl_bank_account';
    protected $fillable = [
        'pegawai_id',
        'nama_bank',
        'no_rekening',
        'pemilik',  
    ];
}
