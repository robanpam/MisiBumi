<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Donasi>
 */
class DonasiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => rand(1, 13),
            'kampanye_id' => rand(1, 20),
            'nilai_donasi' => fake()->randomElement([25000, 50000, 75000, 100000]),
            'metode_pembayaran_id' => rand(1, 3),
            'status' => 2,
        ];
    }
}
