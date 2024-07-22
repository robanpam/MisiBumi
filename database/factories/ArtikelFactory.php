<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Artikel>
 */
class ArtikelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'judul_artikel' => fake()->sentence(3, true),
            'isi_artikel' => fake()->paragraph(7, true),
            'admin_id' => rand(11, 12),
            'gambar_artikel' => '/asset/artikel/'.rand(1,5).'.jpg'
        ];
    }
}
