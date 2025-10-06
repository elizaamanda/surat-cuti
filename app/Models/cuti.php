<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cuti extends Model
{
    use HasFactory;

    protected $table = 'cuti';

    // Sesuaikan fillable dengan kolom di database
    protected $fillable = [
        'nama',
        'jenis_cuti',
        'alasan',
        'tanggal_mulai',
        'tanggal_kembali',
    ];
}




