<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\User;

class CampaignFactory extends Factory
{
    public function definition(): array
    {
        $judul = 'Bantu ' . $this->faker->name . ' untuk ' . $this->faker->words(3, true);
        $target = $this->faker->randomElement([15000000, 20000000, 35000000, 50000000, 100000000]);
        
        return [
            'user_id' => User::inRandomOrder()->first()->id, // Cara yang lebih efisien
            'judul' => $judul,
            'slug' => Str::slug($judul) . '-' . uniqid(),
            'kategori' => $this->faker->randomElement([
                'Pendidikan', 'Infrastruktur Umum', 'Bencana Alam', 
                'Lingkungan', 'Difabel', 'Menolong Hewan', 'Umum'
            ]),
            'deskripsi_singkat' => 'Uluran tangan anda sangat berarti untuk membantu meringankan beban mereka yang membutuhkan.',
            'deskripsi_lengkap' => $this->faker->paragraphs(5, true),
            'target_dana' => $target,
            'dana_terkumpul' => $this->faker->numberBetween(100000, $target),
            'batas_waktu' => $this->faker->dateTimeBetween('+2 weeks', '+4 months'),
            'gambar_url' => 'campaigns/placeholder.png',
            'status' => 'aktif',
        ];
    }
}