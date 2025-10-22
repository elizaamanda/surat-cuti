<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'username' => 'admin1',
            'nama' => 'Admin Satu',
            'password' => Hash::make('12345'),
            'role' => 'admin',
        ]);

        User::create([
            'username' => 'pegawai1',
            'nama' => 'Pegawai Satu',
            'password' => Hash::make('12345'),
            'role' => 'pegawai',
        ]);
    }
}
