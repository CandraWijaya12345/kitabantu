<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Hapus isi tabel user sebelumnya agar tidak ada duplikat
        User::truncate(); 

        // 1. Buat 1 Akun Admin
        User::factory()->admin()->create([
            'name' => 'Admin KitaBantu',
            'email' => 'admin@kitabantu.com',
            'password' => Hash::make('password'), // Ganti dengan password yang aman
        ]);

        // 2. Buat 1 Akun User Biasa
        User::factory()->create([
            'name' => 'User Biasa',
            'email' => 'user@kitabantu.com',
            'password' => Hash::make('password'), // Ganti dengan password yang aman
        ]);

        // Anda juga bisa membuat data lain jika perlu, contoh:
        // \App\Models\Campaign::factory(10)->create();
    }
}