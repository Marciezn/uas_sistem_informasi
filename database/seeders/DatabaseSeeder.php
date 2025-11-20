<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Buat admin hanya jika belum ada
        User::firstOrCreate(
            ['email' => 'admin@gmail.com'], // kondisi pengecekan unik
            [
                'name' => 'Admin Demo',
                'password' => bcrypt('12345678'),
                'role' => 'admin',
            ]
        );

        // Buat user hanya jika belum ada
        User::firstOrCreate(
            ['email' => 'user@gmail.com'],
            [
                'name' => 'User Demo',
                'password' => bcrypt('12345678'),
                'role' => 'user',
            ]
        );
    }
}
