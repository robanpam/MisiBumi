<?php

namespace Database\Seeders;

use App\Models\Artikel;
use App\Models\Donasi;
use App\Models\Kalkulator;
use App\Models\User;
use App\Models\JenisUser;
use App\Models\Emisi;
use App\Models\MetodePembayaran;
use App\Models\Kampanye;
use App\Models\Testimoni;
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
        JenisUser::factory()->create([
            'nama_jenis' => 'user',
        ]);
        JenisUser::factory()->create([
            'nama_jenis' => 'admin',
        ]);

        User::factory(10)->create();

        User::factory()->create([
            'name' => 'User 1',
            'email' => 'test1@example.com',
            'password' => '123456',
            'nomor_telepon' => '09212',
            'profile_photo' => 'tes.png',
            'jenis_user_id' => 1
        ]);

        User::factory()->create([
            'name' => 'User 2',
            'email' => 'test2@example.com',
            'password' => '654321',
            'nomor_telepon' => '09212',
            'profile_photo' => 'tes.png',
            'jenis_user_id' => 1
        ]);

        User::factory()->create([
            'name' => 'Admin 1',
            'email' => 'test3@example.com',
            'password' => 'abce1235',
            'nomor_telepon' => '09212',
            'profile_photo' => 'tes.png',
            'jenis_user_id' => 2
        ]);

        Emisi::factory()->create([
            'nama' => 'Kendaraan Bermotor',
            'img' => 'mobil.jpg',
        ]);

        Emisi::factory()->create([
            'nama' => 'Peralatan Listrik',
            'img' => 'listrik.jpg',
        ]);

        Kalkulator::create([
            'nama_produk' => 'Mobil',
            'foto_produk' => 'mobil.jpg',
            'emisi_id' => 1,
            'faktor_emisi' => 2.31,
            'satuan' => 'km'
        ]);

        Kalkulator::create([
            'nama_produk' => 'Motor',
            'foto_produk' => 'motor.png',
            'emisi_id' => 1,
            'faktor_emisi' => 2.31,
            'satuan' => 'km'
        ]);

        Kalkulator::create([
            'nama_produk' => 'Truk',
            'foto_produk' => 'truk.png',
            'emisi_id' => 1,
            'faktor_emisi' => 2.68,
            'satuan' => 'km',
        ]);

        Kalkulator::create([
            'nama_produk' => 'Mesin Cuci',
            'foto_produk' => 'mesincuci.jpg',
            'emisi_id' => 2,
            'faktor_emisi' => 0.5,
            'satuan' => 'siklus'
        ]);

        Kalkulator::create([
            'nama_produk' => 'Kulkas',
            'foto_produk' => 'kulkas.jpeg',
            'emisi_id' => 2,
            'faktor_emisi' => 0.5,
            'satuan' => 'siklus'
        ]);

        Kalkulator::create([
            'nama_produk' => 'Air Conditioner',
            'foto_produk' => 'ac.jpg',
            'emisi_id' => 2,
            'faktor_emisi' => 0.5,
            'satuan' => 'jam',
        ]);

        $this->call([
            PohonSeeder::class,
        ]);

        MetodePembayaran::factory()->create([
            'nama_metode' => 'qris'
        ]);
        MetodePembayaran::factory()->create([
            'nama_metode' => 'gopay'
        ]);
        MetodePembayaran::factory()->create([
            'nama_metode' => 'ovo'
        ]);

        Kampanye::factory()->create([
            'status' => 0,
            'pohon_id' => 5,
            'updated_at' => '2021-07-11'
        ]);

        Kampanye::factory()->create([
            'status' => 0,
            'pohon_id' => 5,
            'updated_at' => '2022-07-11'
        ]);

        Kampanye::factory()->create([
            'status' => 0,
            'pohon_id' => 5,
            'updated_at' => '2023-07-11'
        ]);

        Kampanye::factory()->create([
            'status' => 0,
            'pohon_id' => 5,
            'updated_at' => '2024-03-11'
        ]);

        Kampanye::factory(3)->create([
            'status' => 1,
        ]);

        Donasi::factory(3)->create([
            'kampanye_id' => 1,
            'nilai_donasi' => 3000000,
            'created_at' => '2024-05-22'
        ]);

        Donasi::factory(3)->create([
            'kampanye_id' => 2,
            'nilai_donasi' => 3000000,
            'created_at' => '2024-05-22'
        ]);

        Donasi::factory(3)->create([
            'kampanye_id' => 3,
            'nilai_donasi' => 3000000,
            'created_at' => '2024-05-22'
        ]);

        Donasi::factory(3)->create([
            'kampanye_id' => 4,
            'nilai_donasi' => 3000000,
            'created_at' => '2024-05-22'
        ]);

        // Donasi::factory(10)->create();
        Artikel::factory(20)->create();
        Testimoni::factory(count:10)->create();
    }
}
