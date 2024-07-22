<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Testimoni>
 */
class TestimoniFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'gambar_testimoni'=>'/asset/testimoni/'.rand(1,8).'.jpeg',
            'nama_testimoni'=>fake()->name(),
            'isi_testimoni'=>fake()->paragraph(1, true)
        ];
    }
}
