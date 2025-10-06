<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PegawaiSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('pegawai')->updateOrInsert(
            ['username' => 'admin'], // pastikan username unik
            [
                'nama' => 'Admin',
                'nip' => '123456',
                'jabatan' => 'Administrator',
                'pangkat' => 'IV/a',
                'username' => 'admin',
                'password' => Hash::make('123456'), // password default: 123456
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
    }
}
