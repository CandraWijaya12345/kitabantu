<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Campaign; // <-- Tambahkan ini
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema; // <-- Tambahkan ini

    class DatabaseSeeder extends Seeder
    {
        /**
         * Seed the application's database.
         */
        public function run(): void
    {
        // Membuat 1 Akun Admin
        \App\Models\User::factory()->admin()->create([
            'name' => 'Admin KitaBantu',
            'email' => 'admin@kitabantu.com',
        ]);

        // Membuat 1 Akun User Biasa
        \App\Models\User::factory()->create([
            'name' => 'User Biasa',
            'email' => 'user@kitabantu.com',
        ]);

        // Membuat 8 data campaign contoh
        \App\Models\Campaign::factory(8)->create();
    }
}