<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cuti extends Model
{
    use HasFactory;

    protected $table = 'cuti';

    protected $fillable = [
        'user_id',
        'nama',
        'nip',
        'jabatan',
        'masa_kerja',
        'jenis_cuti',
        'alasan',
        'tanggal_mulai',
        'tanggal_kembali',
        'status',
    ];

    // Relasi ke tabel pegawai
    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'user_id', 'user_id');
    }
}
