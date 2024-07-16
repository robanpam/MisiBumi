<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Kampanye>
 */
class KampanyeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => 13,
            'nama_kampanye' => fake()->sentence(3, true),
            'lokasi_kampanye' => fake()->country(),
            'pohon_id' => rand(1, 5),
            'status' => rand(0, 3),
            'jumlah_pohon' => 0,
            'batas_donasi' => now(),
            'deskripsi' => fake()->paragraph(7, true),
            'gambar_kampanye' => 'tes.png',
            'total_pohon' => 250,
            'total_donatur' => 0,
            'harga_pohon' => rand(20000, 30000)
        ];
    }
}
