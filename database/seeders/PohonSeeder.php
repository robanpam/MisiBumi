<?php

namespace Database\Seeders;

use App\Models\Pohon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PohonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pohon::create([
            'nama' => 'Beringin Pencekik',
            'nama_latin' => 'Ficus annulata',
            'deskripsi' => 'Beringin pencekik merupakan pohon dari jenis Ficus yang dapat tumbuh setinggi 30 meter. Tanaman ini biasanya mulai hidup sebagai tanaman epifit atau tumbuh di cabang pohon lain. Seiring bertambahnya usia, pohon beringin mengirimkan akar udara atau akar gantung yang mencapai tanah. Persebaran tanaman ini meliputi daerah Indo China, Semenanjung Malaysia, Sumatera, Jawa, Kalimantan, dan Sulawesi. Beringin pencekik juga dapat ditemukan di Pulau Peucang tepatnya di Taman Nasional Ujung Kulon.',
            'gambar_pohon' => 'beringin.png',
            'manfaat' => 'Ekologi: Peneduh, penyejuk, penghasil oksigen, dan dimanfaatkan untuk konservasi air dan tanah. Ekonomi: Batangnya biasanya dimanfaatkan untuk bahan baku pembuatan triplek. Sosial: Daun dan akarnya sebagai obat herbal untuk penyakit seperti demam, pilek, kanker, dll.',
            'syarat_tumbuh' => 'Ketinggian (mdpl): 600. pH: 5-7. Suhu (oC): 26-36. Curah Hujan (mm/tahun): 1000-2000',
            'serapan_karbon' => '0.0409944034',
            'harga_pohon' => '15000'
        ]);
        Pohon::create([
            'nama' => 'Trembesi',
            'nama_latin' => fake()->sentence(2, true),
            'deskripsi' => 'Beringin pencekik merupakan pohon dari jenis Ficus yang dapat tumbuh setinggi 30 meter. Tanaman ini biasanya mulai hidup sebagai tanaman epifit atau tumbuh di cabang pohon lain. Seiring bertambahnya usia, pohon beringin mengirimkan akar udara atau akar gantung yang mencapai tanah. Persebaran tanaman ini meliputi daerah Indo China, Semenanjung Malaysia, Sumatera, Jawa, Kalimantan, dan Sulawesi. Beringin pencekik juga dapat ditemukan di Pulau Peucang tepatnya di Taman Nasional Ujung Kulon.',
            'gambar_pohon' => 'trembesi.png',
            'manfaat' => 'Ekologi: Peneduh, penyejuk, penghasil oksigen, dan dimanfaatkan untuk konservasi air dan tanah. Ekonomi: Batangnya biasanya dimanfaatkan untuk bahan baku pembuatan triplek. Sosial: Daun dan akarnya sebagai obat herbal untuk penyakit seperti demam, pilek, kanker, dll.',
            'syarat_tumbuh' => 'Ketinggian (mdpl): 600. pH: 5-7. Suhu (oC): 26-36. Curah Hujan (mm/tahun): 1000-2000',
            'serapan_karbon' => '0.0409944034',
            'harga_pohon' => '15000'
        ]);
        Pohon::create([
            'nama' => 'Trembesi',
            'nama_latin' => fake()->sentence(2, true),
            'deskripsi' => 'Beringin pencekik merupakan pohon dari jenis Ficus yang dapat tumbuh setinggi 30 meter. Tanaman ini biasanya mulai hidup sebagai tanaman epifit atau tumbuh di cabang pohon lain. Seiring bertambahnya usia, pohon beringin mengirimkan akar udara atau akar gantung yang mencapai tanah. Persebaran tanaman ini meliputi daerah Indo China, Semenanjung Malaysia, Sumatera, Jawa, Kalimantan, dan Sulawesi. Beringin pencekik juga dapat ditemukan di Pulau Peucang tepatnya di Taman Nasional Ujung Kulon.',
            'gambar_pohon' => 'trembesi.png',
            'manfaat' => 'Ekologi: Peneduh, penyejuk, penghasil oksigen, dan dimanfaatkan untuk konservasi air dan tanah. Ekonomi: Batangnya biasanya dimanfaatkan untuk bahan baku pembuatan triplek. Sosial: Daun dan akarnya sebagai obat herbal untuk penyakit seperti demam, pilek, kanker, dll.',
            'syarat_tumbuh' => 'Ketinggian (mdpl): 600. pH: 5-7. Suhu (oC): 26-36. Curah Hujan (mm/tahun): 1000-2000',
            'serapan_karbon' => '0.0409944034',
            'harga_pohon' => '15000'
        ]);
        Pohon::create([
            'nama' => 'Trembesi',
            'nama_latin' => fake()->sentence(2, true),
            'deskripsi' => 'Beringin pencekik merupakan pohon dari jenis Ficus yang dapat tumbuh setinggi 30 meter. Tanaman ini biasanya mulai hidup sebagai tanaman epifit atau tumbuh di cabang pohon lain. Seiring bertambahnya usia, pohon beringin mengirimkan akar udara atau akar gantung yang mencapai tanah. Persebaran tanaman ini meliputi daerah Indo China, Semenanjung Malaysia, Sumatera, Jawa, Kalimantan, dan Sulawesi. Beringin pencekik juga dapat ditemukan di Pulau Peucang tepatnya di Taman Nasional Ujung Kulon.',
            'gambar_pohon' => 'trembesi.png',
            'manfaat' => 'Ekologi: Peneduh, penyejuk, penghasil oksigen, dan dimanfaatkan untuk konservasi air dan tanah. Ekonomi: Batangnya biasanya dimanfaatkan untuk bahan baku pembuatan triplek. Sosial: Daun dan akarnya sebagai obat herbal untuk penyakit seperti demam, pilek, kanker, dll.',
            'syarat_tumbuh' => 'Ketinggian (mdpl): 600. pH: 5-7. Suhu (oC): 26-36. Curah Hujan (mm/tahun): 1000-2000',
            'serapan_karbon' => '0.0409944034',
            'harga_pohon' => '15000'
        ]);
        Pohon::create([
            'nama' => 'Trembesi',
            'nama_latin' => fake()->sentence(2, true),
            'deskripsi' => 'Beringin pencekik merupakan pohon dari jenis Ficus yang dapat tumbuh setinggi 30 meter. Tanaman ini biasanya mulai hidup sebagai tanaman epifit atau tumbuh di cabang pohon lain. Seiring bertambahnya usia, pohon beringin mengirimkan akar udara atau akar gantung yang mencapai tanah. Persebaran tanaman ini meliputi daerah Indo China, Semenanjung Malaysia, Sumatera, Jawa, Kalimantan, dan Sulawesi. Beringin pencekik juga dapat ditemukan di Pulau Peucang tepatnya di Taman Nasional Ujung Kulon.',
            'gambar_pohon' => 'trembesi.png',
            'manfaat' => 'Ekologi: Peneduh, penyejuk, penghasil oksigen, dan dimanfaatkan untuk konservasi air dan tanah. Ekonomi: Batangnya biasanya dimanfaatkan untuk bahan baku pembuatan triplek. Sosial: Daun dan akarnya sebagai obat herbal untuk penyakit seperti demam, pilek, kanker, dll.',
            'syarat_tumbuh' => 'Ketinggian (mdpl): 600. pH: 5-7. Suhu (oC): 26-36. Curah Hujan (mm/tahun): 1000-2000',
            'serapan_karbon' => '0.0409944034',
            'harga_pohon' => '15000'
        ]);
        Pohon::create([
            'nama' => 'Trembesi',
            'nama_latin' => fake()->sentence(2, true),
            'deskripsi' => 'Beringin pencekik merupakan pohon dari jenis Ficus yang dapat tumbuh setinggi 30 meter. Tanaman ini biasanya mulai hidup sebagai tanaman epifit atau tumbuh di cabang pohon lain. Seiring bertambahnya usia, pohon beringin mengirimkan akar udara atau akar gantung yang mencapai tanah. Persebaran tanaman ini meliputi daerah Indo China, Semenanjung Malaysia, Sumatera, Jawa, Kalimantan, dan Sulawesi. Beringin pencekik juga dapat ditemukan di Pulau Peucang tepatnya di Taman Nasional Ujung Kulon.',
            'gambar_pohon' => 'trembesi.png',
            'manfaat' => 'Ekologi: Peneduh, penyejuk, penghasil oksigen, dan dimanfaatkan untuk konservasi air dan tanah. Ekonomi: Batangnya biasanya dimanfaatkan untuk bahan baku pembuatan triplek. Sosial: Daun dan akarnya sebagai obat herbal untuk penyakit seperti demam, pilek, kanker, dll.',
            'syarat_tumbuh' => 'Ketinggian (mdpl): 600. pH: 5-7. Suhu (oC): 26-36. Curah Hujan (mm/tahun): 1000-2000',
            'serapan_karbon' => '0.0409944034',
            'harga_pohon' => '15000'
        ]);
    }
}
