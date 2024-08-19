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

        $testimonies =
            [
                [
                    'gambar_testimoni' => '/asset/testimoni/1.jpeg',
                    'nama_testimoni' => 'John Doe',
                    'isi_testimoni' => 'This app exceeded my expectations. It’s incredibly user-friendly!',
                ],
                [
                    'gambar_testimoni' => '/asset/testimoni/2.jpeg',
                    'nama_testimoni' => 'Jane Smith',
                    'isi_testimoni' => 'A game-changer for my daily routine. I can’t imagine going without it now!',
                ],
                [
                    'gambar_testimoni' => '/asset/testimoni/3.jpeg',
                    'nama_testimoni' => 'Michael Brown',
                    'isi_testimoni' => 'Fantastic design and functionality. Highly recommended!',
                ],
                [
                    'gambar_testimoni' => '/asset/testimoni/4.jpeg',
                    'nama_testimoni' => 'Emily Davis',
                    'isi_testimoni' => 'This app has simplified my tasks significantly. Love it!',
                ],
                [
                    'gambar_testimoni' => '/asset/testimoni/5.jpeg',
                    'nama_testimoni' => 'David Wilson',
                    'isi_testimoni' => 'An essential tool that delivers as promised. Very impressed!',
                ],
                [
                    'gambar_testimoni' => '/asset/testimoni/6.jpeg',
                    'nama_testimoni' => 'Olivia Martinez',
                    'isi_testimoni' => 'User-friendly and efficient. It’s become an everyday necessity for me.',
                ],
                [
                    'gambar_testimoni' => '/asset/testimoni/7.jpeg',
                    'nama_testimoni' => 'James Johnson',
                    'isi_testimoni' => 'The best app I’ve used in a long time. It just works!',
                ],
                [
                    'gambar_testimoni' => '/asset/testimoni/8.jpeg',
                    'nama_testimoni' => 'Sophia Lee',
                    'isi_testimoni' => 'I’m amazed at how much this app has improved my productivity. A must-have!',
                ],
                [
                    'gambar_testimoni' => '/asset/testimoni/1.jpeg',
                    'nama_testimoni' => 'Daniel Taylor',
                    'isi_testimoni' => 'Simple, effective, and reliable. Exactly what I needed.',
                ],
                [
                    'gambar_testimoni' => '/asset/testimoni/2.jpeg',
                    'nama_testimoni' => 'Grace Harris',
                    'isi_testimoni' => 'This app has made my life so much easier. Highly recommend giving it a try!',
                ],
            ];

        foreach ($testimonies as $testimony) {
            Testimoni::factory()->create($testimony);
        }

        // Donasi::factory(10)->create();
        Artikel::factory(20)->create();
        Testimoni::factory(count: 10)->create();
    }
}
