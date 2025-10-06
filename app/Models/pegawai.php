<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class pegawai extends Model
{
    use HasFactory;

    // Nama tabel (kalau nama default jamak "pegawais", kita pakai manual)
    protected $table = 'pegawai';

    // Kolom yang bisa diisi (mass assignment)
    protected $fillable = [
        'nama',
        'nip',
        'jabatan',
        'pangkat',
    ];

    // Relasi: 1 pegawai punya banyak cuti
    public function cuti()
    {
        return $this->hasMany(Cuti::class, 'pegawai_id', 'id');
    }
}
