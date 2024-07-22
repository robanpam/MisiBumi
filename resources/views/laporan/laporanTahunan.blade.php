@extends('layout.master')

@section('css', asset('css/laporan/laporanTahunan.css'))



@section('content')

    <!-- BANNER -->
    <div class="bg">
        <div class="container">
            <div class="row mt-5">
                <div class="col-1"></div>
                <div class="col cont banner text-light">
                    <h1 class='Judul'><strong>Laporan Tahunan dan Keuangan Misi Bumi</strong></h1>
                    <p class="isiBanner">Dengan hati yang penuh dengan kepedulian dan tekad yang bulat, kami hadir untuk
                        mengajak Anda semua bergabung dalam kampanye Misi Bumi ini. Mari bersama kita jaga
                        kelestarian tumbuhan, sebagai sumber kehidupan yang tak ternilai, melalui aksi nyata
                        & donasi yang berdampak positif bagi lingkungan kita semua
                    </p>
                </div>
                <div class="col-1"></div>
            </div>
        </div>
    </div>



    <div class="container">
        <h3 class="subJudul mt-4"><strong>Misi Bumi, Misi Kita Semua</strong></h3>
        <div class="row mb-5">
            <div class="col-6 ">
                <div class="d-flex justify-content-end mt-2">
                    <div class="penjelasan1">Pohon terkumpul</div>
                    <div class="angka1"><strong>45</strong></div>
                </div>
                <div class="d-flex justify-content-end mt-2">
                    <div class="penjelasan1">Emisi karbon terserap</div>
                    <div class="angka1"><strong>1.57M</strong></div>
                </div>
                <div class="d-flex justify-content-end mt-2">
                    <div class="penjelasan1">Kampanye alam</div>
                    <div class="angka1"><strong>837</strong></div>
                </div>

            </div>

            <div class="divider"></div>

            <div class="col-6">
                <div class="d-flex justify-content-start mt-2">
                    <div class="angka2"><strong>5,89M</strong></div>
                    <div class="penjelasan2">Donasi terkumpul</div>
                </div>
                <div class="d-flex justify-content-start mt-2">
                    <div class="angka2"><strong>82K</strong></div>
                    <div class="penjelasan2">Sahabat bumi</div>
                </div>
                <div class="d-flex justify-content-start mt-2">
                    <div class="angka2"><strong>48</strong></div>
                    <div class="penjelasan2">Lokasi penghijauan</div>
                </div>
            </div>
        </div>


        <h3 class="subJudul my-2"><strong>Laporan Tahunan</strong></h3>

        <div class="row d-flex justify-content-between">
            @for ($i = 1; $i <= 4; $i++)
                <div class="card text-center laporanTahunan my-3" style="width: 20rem;">
                    <div class="card-body">
                        <h5 class="card-title infoTahunan1"><strong>2023</strong></h5>
                        <div class="row">
                            <div class="col-4 data">
                                <p class="angka">817.7K</p>
                                <p class="angka">1.57Jt</p>
                                <p class="angka">837</p>
                                <p class="angka">5,89M</p>
                                <p class="angka">82K</p>
                                <p class="angka">48</p>
                            </div>
                            <div class="col-8 penjelasan">
                                <p class="penjelasan3">Pohon tertanam</p>
                                <p class="penjelasan3">Emisi karbon terserap</p>
                                <p class="penjelasan3">Kampanye alam</p>
                                <p class="penjelasan3">Donasi terkumpul</p>
                                <p class="penjelasan3">Sahabat Bumi</p>
                                <p class="penjelasan3">Lokasi penghijauan</p>
                            </div>
                        </div>

                    </div>
                </div>
            @endfor


        </div>

        <h3 class="subJudul my-2 mt-5"><strong>Laporan Keuangan</strong></h3>

        <div class="row">
            <div class="d-flex justify-content-between my-3">
                <div class="card text-center mb-3 pemasukanPengeluaran" style="width: 38rem;">
                    <div class="card-body">
                        <h5 class="card-title pengeluaran1">Pemasukan</h5>
                        <p class="card-text pengeluaran2"><strong>Rp99.875.0345</strong></p>
                    </div>
                </div>

                <div class="card text-center mb-3 pemasukanPengeluaran" style="width: 38rem;">
                    <div class="card-body">
                        <h5 class="card-title pengeluaran1">Pengeluaran</h5>
                        <p class="card-text pengeluaran2"><strong>Rp89.575.0345</strong></p>
                    </div>
                </div>
            </div>
        </div>

        <h3 class="subJudul my-2 mt-5"><strong>Dampak Donasi dalam Angka</strong></h3>

    </div>

    <div class="dampakDonasi my-3">
        <div class="container dampak">
            <div class="row">
                <div class="col-6 diagramBatang">
                    <canvas id="donasiChart"></canvas>
                </div>
                <div class="col-3">
                    <p class="deskDampak">Grafik ini menggambarkan perjalanan kita dalam menciptakan dunia yang lebih hijau.
                        Setiap donasi berkontribusi pada hasil luar biasa yang ditunjukkan di bawah ini.
                    </p>
                </div>
                <div class="col-3">
                    <img src="https://assets.promediateknologi.id/crop/0x0:0x0/750x500/webp/photo/2022/11/28/1893984629.jpg"
                        class="rounded mx-auto d-block gbrDampak" alt="...">
                </div>
            </div>
        </div>
    </div>







    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('donasiChart').getContext('2d');
        const donasiChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Nov', 'Des', 'Jan', 'Feb', 'Mar', 'Apr', 'May'],
                datasets: [{
                    label: 'Donasi',
                    data: [800, 750, 700, 850, 800, 750, 650],
                    backgroundColor: 'green'
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            color: 'black', // Mengatur warna teks pada sumbu Y
                            font: {
                                weight: 'bold' // Membuat teks sumbu Y tebal
                            }
                        },
                        grid: {
                            color: 'rgba(0, 0, 0, 0.2)', // Warna garis grid (tipis dan ringan)
                            borderColor: 'black', // Warna garis sumbu Y
                            borderWidth: 2, // Ketebalan garis sumbu Y
                            drawOnChartArea: true // Menghilangkan garis grid di dalam grafik
                        }
                    },
                    x: {
                        ticks: {
                            color: 'black', // Mengatur warna teks pada sumbu X
                            font: {
                                weight: 'bold' // Membuat teks sumbu X tebal
                            }
                        },
                        grid: {
                            color: 'rgba(0, 0, 0, 0.2)', // Warna garis grid (tipis dan ringan)
                            borderColor: 'black', // Warna garis sumbu X
                            borderWidth: 2, // Ketebalan garis sumbu X
                            drawOnChartArea: false // Menghilangkan garis grid di dalam grafik
                        }
                    }
                },
                plugins: {
                    legend: {
                        labels: {
                            color: 'black' // Mengatur warna teks label
                        }
                    }
                }
            }
        });
    </script>
@endsection
