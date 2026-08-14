<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
$this->call([
        rules_seeder::class,
        gejala_seeder::class,
        keluhan_seeder::class,
        penyakit_seeder::class
    ]);
\App\Models\User::firstOrCreate(
    ['email' => 'test@example.com'], // Cek apakah email ini sudah ada
    [
        'name' => 'Test User',
        'password' => bcrypt('password'),
    ]
);
    }
}
