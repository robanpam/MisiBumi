<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\File;

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
        $files = File::files(public_path('asset/kampanye'));

        $fileName = [];
        foreach($files as $file) {
            $fileNames[] = $file->getFilename();
        }

        $randomFileName = $fileNames[array_rand($fileNames)];

        $userCount = User::count();
        $randomUserId = $userCount > 0 ? rand(1, $userCount) : 1;

        return [
            'user_id' => $randomUserId,
            'nama_kampanye' => fake()->sentence(3, true),
            'lokasi_kampanye' => fake()->country(),
            'pohon_id' => rand(1, 6),
            'status' => rand(0, 3),
            'jumlah_pohon' => 500,
            'batas_donasi' => now(),
            'deskripsi' => fake()->paragraph(7, true),
            'gambar_kampanye' => $randomFileName,
        ];
    }
}
