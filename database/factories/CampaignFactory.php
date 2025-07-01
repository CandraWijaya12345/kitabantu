<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\User;

class CampaignFactory extends Factory
{
    public function definition(): array
    {
        $judul = 'Bantu ' . $this->faker->name . ' Sembuh dari Sakit ' . $this->faker->word;
        $target = $this->faker->randomElement([10000000, 25000000, 50000000]);

        return [
            'user_id' => User::all()->random()->id,
            'judul' => $judul,
            'slug' => Str::slug($judul) . '-' . uniqid(),
            'deskripsi_singkat' => 'Uluran tangan anda sangat berarti untuk membantu meringankan beban mereka.',
            'deskripsi_lengkap' => $this->faker->paragraphs(3, true),
            'target_dana' => $target,
            'dana_terkumpul' => $this->faker->numberBetween(100000, $target - 100000),
            'batas_waktu' => $this->faker->dateTimeBetween('+1 month', '+3 months'),
            'gambar_url' => 'campaigns/placeholder.png', // Pastikan ada gambar contoh di storage
            'status' => 'aktif',
        ];
    }
}