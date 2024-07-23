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
            'serapan_karbon' => 0.0409944034,
            'harga_pohon' => '10500'
        ]);
        Pohon::create([
            'nama' => 'Trembesi',
            'nama_latin' => 'Samanea saman',
            'deskripsi' => 'Trembesi merupakan pohon peneduh yang dapat tumbuh besar dan cepat, lebih cepat daripada pohon jati. Pohon trembesi dikenal juga sebagai pohon hujan. Usia pohon trembesi dapat mencapai 600 tahun.',
            'gambar_pohon' => 'trembesi.png',
            'manfaat' => 'Ekologi: Pohon sebagai penaung pada perkebunan teh, kopi, dan kokoa. Akar mendukung persediaan cadangan air tanah. Ekonomi: Polong dimakan. Getah digunakan sebagai pengganti getah Arab. Sosial: Kulit kayu dan daun untuk mengobati diare. Biji untuk mengobati radang tenggorokan.',
            'syarat_tumbuh' => 'Ketinggian (mdpl): 0-1.300. pH: 4.6-7. Suhu: 20 - 35°c. Curah hujan: 600 - 3,000mm',
            'serapan_karbon' => 0.3654362926,
            'harga_pohon' => '15000'
        ]);
        Pohon::create([
            'nama' => 'Cassia',
            'nama_latin' => 'C. fistula',
            'deskripsi' => 'Pohon Cassia, dikenal juga sebagai "Golden Shower" (Cassia fistula), adalah pohon berbunga dengan gugusan bunga kuning cerah yang berasal dari Asia Selatan.',
            'gambar_pohon' => 'cassia.png',
            'manfaat' => 'Ekologi: Menyediakan habitat bagi satwa, mendukung keanekaragaman hayati, dan membantu mencegah erosi tanah. Ekonomi: Kayunya digunakan untuk produk furnitur, populer sebagai tanaman hias, dan dimanfaatkan dalam obat tradisional. Sosial: Meningkatkan estetika lingkungan, mendukung program penghijauan, dan membantu mengurangi stres masyarakat.',
            'syarat_tumbuh' => 'Ketinggian (mdpl): 1200. pH: 6-7.5. Suhu (oC): 10-40. Curah Hujan (mm/tahun): 700-4500',
            'serapan_karbon' => 0.0147,
            'harga_pohon' => '13000'
        ]);
        Pohon::create([
            'nama' => 'Kenanga',
            'nama_latin' => 'Cananga odorata',
            'deskripsi' => 'Pohon kenanga menghasilkan bunga yang cukup harum baunya sehingga sering digunakan dalam acara adat dan kematian, sering ditanam dihalaman rumah. Selain itu pohon ini digunakan sebagai tanaman hias, dan bunganya dijadikan sebagai bahan baku parfum.',
            'gambar_pohon' => 'kenanga.png',
            'manfaat' => 'Ekologi: untuk tanaman hias. Ekonomi: diambil minyak kenanga untuk dipasarkan, dijual sebagai bunga tabur. Sosial: Dalam kebudayaan Jawa, kenanga dianggap berkhasiat menangkal pengaruh ilmu hitam, termasuk sihir, santet dan guna-guna. untuk kesehatan dapat sebagai minyak aromaterapi, antidepresan, antiseptik, pemicu gairah, serta menstabilkan tekanan darah dan denyut jantung.',
            'syarat_tumbuh' => 'Ketinggian (mdpl): <1200. pH: 5-6.5. Suhu (oC): 16-34. Curah Hujan (mm/tahun): 1500-2000',
            'serapan_karbon' => 0.0842729026,
            'harga_pohon' => '16500'
        ]);
        Pohon::create([
            'nama' => 'Kiara Payung',
            'nama_latin' => 'Filicium decipiens',
            'deskripsi' => 'Kiara Payung adalah pohon yang berasal dari wilayah tropis dan subtropis, dengan daun berbentuk majemuk yang rimbun, sering digunakan sebagai pohon peneduh di taman dan pinggir jalan.',
            'gambar_pohon' => 'kiara_payung.png',
            'manfaat' => 'Ekologi: Membantu meningkatkan kualitas udara dengan menyerap polutan dan menyediakan habitat bagi berbagai spesies fauna. Ekonomi: Mengurangi biaya energi dengan memberikan naungan yang mengurangi kebutuhan akan pendingin ruangan. Sosial: Meningkatkan estetika lingkungan perkotaan dan menyediakan ruang hijau yang bermanfaat untuk rekreasi masyarakat.',
            'syarat_tumbuh' => 'Ketinggian (mdpl): 0-500. pH: 5.5-7.5. Suhu (oC): 25-30. Curah Hujan (mm/tahun): 1000-2500',
            'serapan_karbon' => 0.0597,
            'harga_pohon' => '30000'
        ]);
        Pohon::create([
            'nama' => 'Bungur',
            'nama_latin' => 'Lagerstroemia speciosa',
            'deskripsi' => 'Pohon Bungur, juga dikenal sebagai Pohon Kembang Sepatu, adalah pohon berbunga besar yang berasal dari Asia Tenggara. Pohon ini dikenal dengan bunga-bunganya yang indah dan berwarna cerah, serta daun-daun yang lebat dan hijau. Bungur sering digunakan sebagai tanaman hias di taman, jalan, dan area perkotaan karena keindahan dan ketahanannya.',
            'gambar_pohon' => 'bungur.png',
            'manfaat' => 'Ekologi: Meningkatkan kualitas udara dengan menyerap polutan dan memberikan habitat bagi berbagai jenis burung dan serangga. Ekonomi: Mengurangi biaya energi dengan menyediakan naungan yang membantu menurunkan suhu di area sekitarnya. Sosial: Menambah keindahan lingkungan dan menciptakan ruang hijau yang menyenangkan untuk masyarakat.',
            'syarat_tumbuh' => 'Ketinggian (mdpl): 0-800. pH: 6-7.5. Suhu (oC): 25-35. Curah Hujan (mm/tahun): 1200-3000',
            'serapan_karbon' => 0.0548,
            'harga_pohon' => '9500'
        ]);
    }
}
