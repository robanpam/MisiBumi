@extends('layout.master')

@section('css', asset('css/laporan/laporanTahunan.css'))



@section('content')

    <!-- BANNER -->
    <div class="bg">
        <div class="container">
            <div class="row">
                <div class="col-2"></div>
                <div class="col cont banner text-light">
                    <h1 class='Judul'><strong>Laporan Tahunan dan Keuangan Misi Bumi</strong></h1>
                    <p>Dengan hati yang penuh dengan kepedulian dan tekad yang bulat, kami hadir untuk
                        mengajak Anda semua bergabung dalam kampanye Misi Bumi ini. Mari bersama kita jaga
                        kelestarian tumbuhan, sebagai sumber kehidupan yang tak ternilai, melalui aksi nyata
                        & donasi yang berdampak positif bagi lingkungan kita semua
                    </p>
                </div>
                <div class="col-2"></div>
            </div>
        </div>
    </div>



    <div class="container">

        <div class="row">
            <div class="col-6 ">
                <div class="d-flex justify-content-end mt-5">
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

            <div class="col-6 ">
                <div class="d-flex justify-content-start mt-5">
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


        <h2 class="subJudulLaporan"><strong>Laporan Tahunan</strong></h2>

        <div class="row">
            <div class="d-flex justify-content-between">
                @for ($i = 1; $i <= 3; $i++)
                    <div class="card text-center mb-3 laporanTahunan" style="width: 25rem;">
                        <div class="card-body">
                            <h5 class="card-title infoTahunan1"><strong>2023</strong></h5>
                            <p class="card-text infoTahunan2">Laporan tahunan dan keuangan</p>
                            <div class="row">
                                <div class="col btnLihatLainnya">
                                    <div class="col-auto d-md-flex justify-content-md-end">
                                        <button type="button" class="btn btn-outline-success">Lihat
                                            laporan</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>

            <div class="d-flex justify-content-between">
                @for ($i = 1; $i <= 3; $i++)
                    <div class="card text-center mb-3 laporanTahunan" style="width: 25rem;">
                        <div class="card-body">
                            <h5 class="card-title infoTahunan1"><strong>2023</strong></h5>
                            <p class="card-text infoTahunan2">Laporan tahunan dan keuangan</p>
                            <div class="row">
                                <div class="col btnLihatLainnya">
                                    <div class="col-auto d-md-flex justify-content-md-end">
                                        <button type="button" class="btn btn-outline-success">Lihat
                                            laporan</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>
        </div>

        {{-- BUTTON --}}
        <div class="row d-flex justify-content-center">
            <button type="button" class="btn btn-success btnDonasi rounded-5"><strong>Laporan lainnya</strong></button>
        </div>

        <h2 class="subJudul"><strong>Laporan Keuangan</strong></h2>

        <div class="row">
            <div class="d-flex justify-content-between">
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

        <h2 class="subJudul"><strong>Dampak Donasi dalam Angka</strong></h2>
    </div>

    <div class="dampakDonasi">
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
