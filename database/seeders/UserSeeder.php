<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $existingUser = DB::table('users')->where('username', 'admin')->first();

        if (!$existingUser) {
            DB::table('users')->insert([
                'username' => 'admin',
                'password' => Hash::make('123456'), // password di-hash
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            $this->command->info('✅ User admin berhasil dibuat.');
        } else {
            $this->command->warn('⚠️ User admin sudah ada, tidak dibuat ulang.');
        }
    }
}
