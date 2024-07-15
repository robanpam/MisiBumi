<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pohon>
 */
class PohonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama' => fake()->word(),
            'nama_latin' => fake()->sentence(2, true),
            'deskripsi' => fake()->paragraph(7, true),
            'gambar_pohon' => 'tes.png',
            'syarat_tumbuh' => fake()->paragraph(1, true),
            'serapan_karbon' => fake()->sentence(3, true),
            'harga_pohon' => rand(10000, 30000)
        ];
    }
}
