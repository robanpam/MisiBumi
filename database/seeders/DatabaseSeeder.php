<?php

namespace Database\Seeders;

use App\Models\Artikel;
use App\Models\Donasi;
use App\Models\Kalkulator;
use App\Models\User;
use App\Models\JenisUser;
use App\Models\Emisi;
use App\Models\Pohon;
use App\Models\MetodePembayaran;
use App\Models\Kampanye;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // JenisUser::factory()->create([
        //     'nama_jenis' => 'user',
        // ]);
        // JenisUser::factory()->create([
        //     'nama_jenis' => 'admin',
        // ]);
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test2@example.com',
        //     // 'tanggal_lahir' => now(),
        //     // 'gender' => 'laki-laki',
        //     'profile_photo' => 'tes.png',
        //     'nomor_telepon' => '09212',
        //     'jenis_user_id' => 2
        // ]);

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        //     // 'tanggal_lahir' => now(),
        //     // 'gender' => 'laki-laki',
        //     'profile_photo' => 'tes.png',
        //     'nomor_telepon' => '09212',
        //     'jenis_user_id' => 2
        // ]);
        
        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test3@example.com',
        //     // 'tanggal_lahir' => now(),
        //     // 'gender' => 'laki-laki',
        //     'profile_photo' => 'tes.png',
        //     'password' => Hash::make('12345678'),
        //     'nomor_telepon' => '09212',
        //     'jenis_user_id' => 2
        // ]);

        // Emisi::factory(2)->create();
        // Pohon::factory(5)->create();
        // MetodePembayaran::factory(3)->create();
        // Kampanye::factory(20)->create();
        // Kalkulator::factory(10)->create();
        Donasi::factory(20)->create();
        // Artikel::factory(20)->create();
    }
}
