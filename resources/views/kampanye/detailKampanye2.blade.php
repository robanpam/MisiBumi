@extends('layout.master')

@section('css', asset('css/kampanye/detailKampanye2.css'))



@section('content')
    <div class="container">

        <!-- DETAIL ATAS -->
        <div class="row mt-3">
            {{-- KIRI --}}
            <div class="col-5">
                <div class="row">
                    <div class="col-1"></div>
                    <div class="col-11"><img src="https://fwi.or.id/wp-content/uploads/2023/09/5-1024x576.png "
                            class="img-fluid gbrdetail" alt="..."></div>
                </div>
                <div class="row">
                    <div class="col-1"></div>
                    <div class="col-11 dsk-detail">
                        <p>Progressif foundation</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-1"></div>
                    <div class="col-11">
                        <div class="progress mt-3 rounded-0">
                            <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-1"></div>
                    <div class="col-11">
                        <div class="row">
                            <div class="col-6">
                                <div class="d-flex justify-content-start">
                                    <p class="bwh1">45</p>
                                    <p class="bwh2">Pohon terkumpul</p>
                                </div>
                            </div>
                            <div class="col-6 ">
                                <div class="d-flex justify-content-end">
                                    <p class="bwh1">100</p>
                                    <p class="bwh2">Donatur</p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-1"></div>
                    <div class="col-11">
                        <div class="d-flex justify-content-between">
                            <button type="button" class="btn btn-outline-success btnShare">Share</button>
                            <button type="button" class="btn btn-success btnDonasi"><strong>Donasi</strong></button>
                        </div>
                    </div>
                </div>

            </div>

            {{-- KANAN --}}
            <div class="col-1"></div>
            <div class="col-6">
                <div class="row text-center">
                    <h1><strong>Penanaman 500 Pohon Mangrove</strong></h1>
                </div>
                <div class="row">
                    <div class="container mt-3">
                        <div class="row">
                            <div class="row biodata-row mb-2">
                                <div class="col-3"><strong>Jenis Tanaman</strong></div>
                                <div class="col-1 dsk1">:</div>
                                <div class="col-8 dsk1">Mangrove</div>
                            </div>
                            <div class="row biodata-row mb-2">
                                <div class="col-3"><strong>Lokasi</strong></div>
                                <div class="col-1 dsk1">:</div>
                                <div class="col-8 dsk1">Kawasan Pesisir Cagar Alam Panua Kabupaten Pohuwato</div>
                            </div>
                            <div class="row biodata-row mb-2">
                                <div class="col-3"><strong>Batas Donasi</strong></div>
                                <div class="col-1 dsk1">:</div>
                                <div class="col-8 dsk1">20 Mei 2024</div>
                            </div>
                            <div class="row biodata-row mb-2">
                                <div class="col-3"><strong>Harga Pohon</strong></div>
                                <div class="col-1 dsk1">:</div>
                                <div class="col-8 dsk1">Rp25.000</div>
                            </div>
                            <div class="row biodata-row mb-2">
                                <div class="col-3"><strong>Minimal Pohon</strong></div>
                                <div class="col-1 dsk1">:</div>
                                <div class="col-8 dsk1">500 pohon</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- TENGAH --}}
        <div class="tab-content">
            <div class="container pilih">
                {{-- <div class="card card-custom"> --}}
                <!-- Pills navs -->
                <div class="row lebihDetail border">
                    <div class="col-8">
                        <ul class="nav nav-pills navTengah" id="ex1" role="tablist">
                            <li class="nav-item " role="presentation">
                                <a class="nav-link active text-center rounded-0" id="tab-tentang" data-bs-toggle="pill"
                                    href="#pills-tentang" role="tab" aria-controls="pills-tentang"
                                    aria-selected="true">Tentang</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link text-center rounded-0" id="tab-perkembangan" data-bs-toggle="pill"
                                    href="#pills-perkembangan" role="tab" aria-controls="pills-perkembangan"
                                    aria-selected="false">Perkembangan</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link text-center rounded-0" id="tab-donasi" data-bs-toggle="pill"
                                    href="#pills-donasi" role="tab" aria-controls="pills-donasi"
                                    aria-selected="false">Donasi</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-4">
                        <div class="text-muted">Kampanye dibuat pada 1 Januari 2024</div>
                    </div>
                </div>
                <!-- Pills content -->
                <div class="bordered-section tab-content rounded-0">
                    <!-- TENTANG -->
                    <div class="tab-pane fade show active" id="pills-tentang" role="tabpanel"
                        aria-labelledby="tab-tentang">
                        <h4>Halo Sahabat,</h4>
                        <p>
                            Kami dari Progresif Foundation mengajak kawan-kawan semuanya untuk ikut serta berdonasi
                            bibit
                            mangrove
                            yang nantinya akan kita tanam di Desa Bedono, Sayung, Demak.
                        </p>
                        <p>
                            Desa bedono merupakan wilayah di Kabupaten Demak, Jawa Tengah yang berada di Kawasan pesisir
                            pantai.
                            Wilayah ini memiliki potensi yang sangat prospektif di bidang perikanan, budi daya hasil
                            laut, dan
                            wisata bahari. Meskipun begitu, laut Demak memiliki risiko daya rusak yang besar. Dengan
                            potensi
                            kenaikan air laut mencapai 3 cm/tahun dan penurunan muka tanah mencapai 25 cm/tahun, daratan
                            Demak
                            terancam tenggelam dalam 10-20 tahun dan sudah menenggelamkan kurang lebih 200 rumah
                            penduduk, jika
                            tidak ada tindakan konservasi dan restorasi, serta peraturan yang mencegah berlanjutnya
                            tindakan
                            perusakan lingkungan.
                        </p>
                        <p>
                            Untuk itu, Progresif Foundation melalui Bakti Progresif akan melakukan penanaman pohon
                            Mangrove
                            Rhizophora yang dapat mengendapkan lumpur di akar-akar pohon bakau sehingga mencegah
                            terjadinya
                            intrusi
                            air laut ke daratan. Selain itu, Mangrove Rhizophora memiliki akar yang dapat mempercepat
                            penguraian
                            limbah organik dan limbah kimia yang dapat mencemari laut. Besaran Donasi yang diperlukan
                            untuk
                            melakukan penanaman dan perawatan pohon adalah Rp 20,000/pohon.
                        </p>
                    </div>

                    <!-- PERKEMBANGAN -->
                    <div class="tab-pane fade" id="pills-perkembangan" role="tabpanel"
                        aria-labelledby="tab-perkembangan">
                        <img src="https://static.vecteezy.com/system/resources/previews/011/943/648/non_2x/system-software-update-and-upgrade-concept-loading-process-in-laptop-screen-illustration-vector.jpg"
                            class="card-img-top" alt="...">
                    </div>


                    <!-- DONASI -->
                    <div class="donasi tab-pane fade" id="pills-donasi" role="tabpanel" aria-labelledby="tab-donasi">
                        <div class="container">
                            <h4 class="mb-3">Para Donatur (350)</h4>
                            <div class="donatur-card d-flex align-items-center p-3">
                                <div class="donatur-avatar"></div>
                                <div class="donatur-info">
                                    <strong>Anonymous</strong><br>
                                    Donasi <strong>4 Pohon</strong>
                                </div>
                                <div class="donatur-time">
                                    3 Hari yang lalu
                                </div>
                            </div>
                            <div class="donatur-card d-flex align-items-center p-3">
                                <div class="donatur-avatar"></div>
                                <div class="donatur-info">
                                    <strong>Anonymous</strong><br>
                                    Donasi <strong>1 Pohon</strong>
                                </div>
                                <div class="donatur-time">
                                    5 Hari yang lalu
                                </div>
                            </div>
                            <div class="donatur-card d-flex align-items-center p-3">
                                <div class="donatur-avatar"></div>
                                <div class="donatur-info">
                                    <strong>M. Aldi</strong><br>
                                    Donasi <strong>10 Pohon</strong><br>
                                    <small>Semoga pohonnya bisa tumbuh dan berkembang dengan baik.</small>
                                </div>
                                <div class="donatur-time">
                                    1 Minggu yang lalu
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        {{-- KAMPANYE TERKAIT --}}
        <h3 class="subJudul"><strong>Kampanye Terkait</strong></h3>
        <div class="row">
            @for ($i = 1; $i < 4; $i++)
                <div class="col-4">
                    <!-- KONTEN -->
                    <div class="col">
                        <div class="card h-50">
                            <img src="https://www.marketeers.com/_next/image/?url=https%3A%2F%2Fimagedelivery.net%2F2MtOYVTKaiU0CCt-BLmtWw%2Fe33fd511-2121-44fc-20e9-3fb547a5f600%2Fw%3D2560&w=1920&q=75"
                                class="card-img-top" alt="...">
                            <!-- Deskripsi -->
                            <div class="card-body">
                                <h5 class="card-title d-flex justify-content-center">Kegiatan Pemantauan & Pengawasan
                                    Lingkungan Alam</h5>
                                <div class="row">
                                    <div class="col-md-5 card-dsk">Campaigner :</div>
                                    <div class="col-md-7 ms-auto d-flex justify-content-end card-dsk">PT. Berkat Cipta
                                        Abadi</div>
                                </div>
                                <div class="row card-dsk1">
                                    <div class="col-md-5 ">Batas Donasi :</div>
                                    <div class="col-md-7 ms-auto d-flex justify-content-end">9 Juni 2024</div>
                                </div>
                                <div class="progress mt-3 rounded-0">
                                    <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25"
                                        aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="d-flex justify-content-start">
                                            <div class="bwh1">45</div>
                                            <div class="bwh2">Pohon terkumpul</div>
                                        </div>
                                    </div>
                                    <div class="col-6 ">
                                        <div class="d-flex justify-content-end">
                                            <div class="bwh1">100</div>
                                            <div class="bwh2">Donatur</div>
                                        </div>
                                    </div>

                                </div>
                                <div class="d-grid gap-2 mt-3">
                                    <button class="btn btn-primary rounded-5" type="button">
                                        <div class="text-btn">Lihat Kampanye</div>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endfor

            {{-- BUNTTON --}}
            <div class="container">
                <div class="row">
                    <div class="col btnLihatLainnya">
                        <div class="col-auto d-md-flex justify-content-md-end">
                            <button type="button" class="btn btn-outline-success">Lihat lainnya</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>


        <h6 class="subJudul2"><strong>Ada masalah dengan kampanye ini?</h6>
        <div class="d-grid gap-2 ">
            <button type="button" class="btn btn-outline-danger rounded-5">Laporkan Kampanye Ini</button>
        </div>

    </div>

@endsection
