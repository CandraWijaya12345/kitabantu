<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Campaign;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Buat Akun User dan Admin terlebih dahulu
        User::factory()->admin()->create([
            'name' => 'Admin KitaBantu',
            'email' => 'admin@kitabantu.com',
        ]);

        User::factory()->create([
            'name' => 'User Biasa',
            'email' => 'user@kitabantu.com',
        ]);

        // 2. Baru buat data campaign setelah user ada
        Campaign::factory(8)->create();
    }
}