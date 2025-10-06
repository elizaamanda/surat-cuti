<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        // Buat admin berdasarkan username, bukan email
        User::firstOrCreate(
            ['username' => 'admin'],
            [
                'password' => Hash::make('123456'),
            ]
        );
    }
}
