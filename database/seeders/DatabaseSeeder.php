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

        Kampanye::factory(10)->create([
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

        // Artikel::factory()->create([
        //     'judul_artikel' => fake()->sentence(3, true),
        //     'isi_artikel' => fake()->paragraph(7, true),
        // ]);

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

        Artikel::factory()->count(20)->create()->each(function ($artikel) {
            $artikel->judul_artikel = fake()->unique()->randomElement([
                'Mendorong Aksi Iklim Melalui Pengurangan Emisi Karbon',
                'Peran Masyarakat dalam Mendukung Penghijauan Global',
                'Pentingnya Edukasi tentang Perubahan Iklim untuk Generasi Muda',
                'Mengurangi Jejak Karbon: Langkah Kecil yang Berdampak Besar',
                'Kampanye Ramah Lingkungan: Melindungi Planet untuk Masa Depan',
                'Inisiatif Lokal dalam Mengatasi Dampak Perubahan Iklim',
                'Teknologi Hijau: Solusi Masa Depan untuk Lingkungan',
                'Bersama Menjaga Keanekaragaman Hayati di Tengah Perubahan Iklim',
                'Membangun Ketahanan Masyarakat terhadap Bencana Iklim',
                'Inovasi Energi Terbarukan untuk Aksi Iklim Berkelanjutan',
                'Aksi Global: Kolaborasi Antar Negara untuk Perubahan Iklim',
                'Menjaga Lautan: Upaya Konservasi untuk Masa Depan',
                'Peran Perempuan dalam Memimpin Aksi Iklim',
                'Mengoptimalkan Transportasi Berkelanjutan untuk Kurangi Emisi',
                'Pertanian Berkelanjutan sebagai Solusi Perubahan Iklim',
                'Mengintegrasikan Aksi Iklim dalam Kebijakan Nasional',
                'Kesadaran Publik tentang Penggunaan Energi Ramah Lingkungan',
                'Pengelolaan Limbah yang Efektif untuk Lingkungan Sehat',
                'Pentingnya Perlindungan Hutan Tropis bagi Aksi Iklim',
                'Menggalang Komitmen Pemuda untuk Aksi Iklim Berkelanjutan',
            ]);

            $artikel->isi_artikel = implode("\n\n", [
                'Perubahan iklim adalah salah satu tantangan terbesar yang dihadapi oleh umat manusia saat ini. Dampaknya dirasakan di seluruh dunia, dari peningkatan suhu global hingga pergeseran pola cuaca yang ekstrem. Untuk itu, diperlukan langkah-langkah konkret dalam mengurangi emisi karbon yang menjadi penyebab utama perubahan iklim ini. Salah satu langkah yang bisa diambil adalah dengan mengadopsi teknologi hijau dan beralih ke sumber energi terbarukan.',

                'Mendorong penghijauan global merupakan salah satu inisiatif penting dalam mengatasi perubahan iklim. Penghijauan tidak hanya membantu dalam menyerap karbon dioksida dari atmosfer, tetapi juga berperan dalam menjaga keanekaragaman hayati. Upaya ini bisa dilakukan dengan menanam pohon di lingkungan sekitar dan mendukung program restorasi hutan. Penghijauan juga berkontribusi dalam mencegah erosi tanah dan menjaga keseimbangan ekosistem.',

                'Pentingnya edukasi tentang perubahan iklim tidak bisa diremehkan. Generasi muda perlu dibekali dengan pengetahuan yang cukup agar mereka bisa berperan aktif dalam menjaga lingkungan. Edukasi ini dapat dilakukan melalui kurikulum sekolah, kampanye publik, maupun melalui media sosial. Dengan edukasi yang baik, masyarakat akan lebih sadar akan pentingnya tindakan yang berkelanjutan untuk mengurangi dampak perubahan iklim.',

                'Penggunaan teknologi hijau juga menjadi solusi yang menjanjikan dalam menghadapi tantangan iklim. Teknologi ini mencakup berbagai inovasi yang bertujuan untuk mengurangi emisi gas rumah kaca, meningkatkan efisiensi energi, dan memanfaatkan sumber daya alam secara lebih berkelanjutan. Contohnya adalah penggunaan panel surya untuk menghasilkan listrik, kendaraan listrik untuk transportasi yang lebih bersih, dan sistem daur ulang air yang canggih.',

                'Tindakan individu, meskipun tampaknya kecil, juga memiliki dampak besar dalam mengurangi jejak karbon. Mengurangi penggunaan plastik sekali pakai, menghemat energi di rumah, serta memilih transportasi yang ramah lingkungan adalah beberapa langkah sederhana yang bisa dilakukan setiap orang. Kesadaran dan tindakan kolektif dari masyarakat global akan menjadi kekuatan yang besar dalam mendorong perubahan positif bagi planet ini.',

                'Akhirnya, kolaborasi antar negara dan sektor swasta sangat diperlukan untuk memastikan bahwa aksi iklim yang diambil bersifat global dan terkoordinasi. Tanpa kerjasama yang baik, upaya dalam mengatasi perubahan iklim tidak akan efektif. Oleh karena itu, penting bagi setiap negara untuk berkomitmen dalam perjanjian internasional seperti Kesepakatan Paris dan untuk secara aktif berpartisipasi dalam upaya mitigasi dan adaptasi perubahan iklim.',
            ]);

            $artikel->save();
        });

        // Donasi::factory(10)->create();
        // Artikel::factory(20)->create();
        // Testimoni::factory(count:10)->create();
        // Artikel::factory(20)->create();
        // Testimoni::factory(count: 10)->create();
    }
}
