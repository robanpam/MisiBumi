@extends('layout.master')

@section('css', asset('css/donasi/mainDampakDonasi.css'))

@section('dampak_aktif', 'nav-active')

@section('content')
    <!-- BANNER -->
    <div class="bg">
        <div class="container">
            <div class="row">
                <div class="col-2"></div>
                <div class="col cont banner text-light">
                    <h1><strong>Jejak Hijau Donasi Bagi Bumi</strong></h1>
                    <p class="isiBanner">Donasi yang Anda berikan bukan hanya angka, itu adalah langkah nyata dalam
                        menciptakan dampak positif yang luas bagi lingkungan dan masyarakat.
                        Dengan dukungan Anda, kita tidak hanya menanam pohon, tetapi juga menanam harapan dan masa depan
                        yang lebih cerah.Inilah bagaimana kontribusi Anda membuat perubahan besar
                    </p>
                    <div class="row d-flex justify-content-center">
                        <a href="#">
                            <button type="button" class="btn btn-success btnDonasi1 rounded-5 mt-1 shadow-light"><strong>Donasi Sekarang</strong></button>
                        </a>
                    </div>
                </div>
                <div class="col-2"></div>
            </div>

            <div class="row">
                <div class="col-3"></div>
                <div class="border col-6 border-4 rounded-1 shadow infoBanner">
                    <div class="row mt-2">
                        <div class="col-4">
                            <h2 class="infoBanner1"><strong>{{ $kampanye }}</strong></h2>
                            <p class="infoBanner2">Kampanye</p>
                        </div>
                        <div class="col-4">
                            <h2 class="infoBanner1"><strong>{{ $pohon }}</strong></h2>
                            <p class="infoBanner2">Pohon tertanam </p>
                        </div>
                        <div class="col-4">
                            <h2 class="infoBanner1"><strong>{{ $donasi }}</strong></h2>
                            <p class="infoBanner2">Donasi terkumpul</p>
                        </div>

                    </div>
                </div>
                <div class="col-3"></div>
            </div>
        </div>
    </div>


    <div class="container">

        <!-- JEJAK HIJAU -->
        <h3 class="subJudul0 my-2"><strong>Jejak Hijau</strong></h3>
        <div class="row my-3">
            <div class="d-flex justify-content-between">
                <div class="card text-center mb-3" style="width: 25rem;">
                    <div class="card-body">
                        <h5 class="card-title fw-semibold">Memulihkan Alam</h5>
                        <p class="card-text">Setiap donasi yang Anda berikan akan membantu memulihkan hutan/ ekosistem
                            yang
                            telah hilang atau rusak. Dengan setiap pohon yang ditanam, kita memberikan rumah baru bagi
                            ribuan spesies flora dan fauna</p>
                    </div>
                </div>
                <div class="card text-center mb-3" style="width: 25rem;">
                    <div class="card-body">
                        <h5 class="card-title fw-semibold">Mengurangi Emisi</h5>
                        <p class="card-text">Pohon-pohon yang Anda donasikan akan menyerap karbon dioksida dan
                            menghasilkan oksigen
                            guna membantu menyediakan udara bersih yang sangat dibutuhkan oleh dunia
                        </p>
                    </div>
                </div>
                <div class="card text-center mb-3" style="width: 25rem;">
                    <div class="card-body">
                        <h5 class="card-title fw-semibold">Memitigasi perubahan iklim</h5>
                        <p class="card-text">Setiap pohon yang ditanam berkontribusi dalam menyerap gas rumah kaca,
                            membantu
                            menurunkan suhu global dan memitigasi dampak perubahan iklim.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-1"></div>
            <div class="col-10">
                <div class="d-flex justify-content-evenly">
                    <div class="card text-center mb-3" style="width: 25rem;">
                        <div class="card-body">
                            <h5 class="card-title fw-semibold">Menginspirasi generasi mendatang</h5>
                            <p class="card-text">Setiap pohon yang ditanam menjadi warisan hijau yang dapat dinikmati
                                oleh generasi
                                mendatang. Aksi Anda akan menginspirasi anak-anak dan generasi muda untuk mencintai
                                dan melesatarikan lingkungan
                            </p>
                        </div>
                    </div>
                    <div class="card text-center mb-3" style="width: 25rem;">
                        <div class="card-body">
                            <h5 class="card-title fw-semibold">Membangun masa depan yang lebih hijau</h5>
                            <p class="card-text">Dengan setiap donasi, maka Anda telah berinvestasi dalam masa depan
                                yang lebih
                                hijau dan berkelanjutan. Pohon yang ditanam hari ni akan memberikan manfaat jangka
                                panjang bagi generasi mendatang
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-1"></div>
        </div>


        {{-- ARTIKEL TERBARU --}}
        <h3 class="subJudul my-2"><strong>Artikel Terbaru</strong></h3>
        <div class="row">
            @foreach ($artikels as $items)
                <div class="col-2 cardArtikel d-flex justify-content-between my-3">
                    <a href="{{ route('detailArtikel', ['id' => $items->id]) }}">
                        <div class="card ">
                            <img src="{{ $items->gambar_artikel }}" class="card-img-top mx-auto" alt="...">
                            <div class="card-body">
                                <h5 class="card-title fw-semibold mb-3">{{ $items->judul_artikel }}</h5>
                                <div class="row">
                                    <div class="col-6 detailArtikel">
                                        <p class="artikelAtas">Karya</p>
                                        <p class="artikelBawah">{{ $admins1->first()->name }}</p>
                                    </div>
                                    <div class="col-6">
                                        <p class="artikelAtas2">Tanggal Terbit</p>
                                        <p class="artikelBawah2">{{ $items->formatted_created_at }}</p>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>

        <!-- BTN -->
        <div class="container">
            <div class="row">

                <div class="col btnLihatLainnya">
                    <a href="/artikel" class="no-underline">
                        <div class="col-auto d-md-flex justify-content-md-end">
                            <button type="button" class="btn btn-outline-success">Lihat lainnya</button>
                        </div>
                    </a>
                </div>


            </div>
        </div>


        {{-- TESTIMONI --}}
        <h3 class="subJudul my-2"><strong>Testimoni, Suara Bumi</strong></h3>

        <div class="d-flex justify-content-between">
            <button id="prevButton" class="btn1 btn-secondary customBtn">❮</button>

            <div id="testimonialsCarousel" class="carousel slide w-100" data-bs-ride="carousel">
                <div class="carousel-inner">

                    @php
                        $chunks = $testimonis->chunk(2);
                    @endphp

                    @foreach ($chunks as $chunkIndex => $chunk)
                        <div class="carousel-item {{ $chunkIndex == 0 ? 'active' : '' }}">
                            <div class="row justify-content-center my-3">
                                @foreach ($chunk as $item)
                                    <div class="col-6">
                                        <div class="border border-4 testimony-card">
                                            <div class="row">
                                                <div class="col-1">
                                                    <div class="donatur-avatar">
                                                        <img src="{{ $item->gambar_testimoni }}" alt="Gambar Testimoni">
                                                    </div>
                                                    <h5 class="namaTestimoni">{{ $item->nama_testimoni }}</h5>
                                                </div>
                                                <div class="col-11">
                                                    <p class="testimoni">
                                                        {{ $item->isi_testimoni }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
            <button id="nextButton" class="btn1 btn-secondary customBtn">❯</button>
        </div>

    </div>
    {{-- TESTIMONI --}}


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('prevButton').addEventListener('click', function() {
            const carousel = new bootstrap.Carousel(document.getElementById('testimonialsCarousel'));
            carousel.prev();
        });
        document.getElementById('nextButton').addEventListener('click', function() {
            const carousel = new bootstrap.Carousel(document.getElementById('testimonialsCarousel'));
            carousel.next();
        });
    </script>
@endsection
