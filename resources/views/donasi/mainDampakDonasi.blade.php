@extends('layout.master')

@section('css', asset('css/donasi/mainDampakDonasi.css'))

@section('dampak_aktif', 'nav-active')

@section('content')
    <!-- BANNER -->
    <div class="bg mt-5">
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
                        <button type="button" class="btn btn-success btnDonasi1 rounded-5"><strong>Donasi
                                Sekarang</strong></button>
                    </div>
                </div>
                <div class="col-2"></div>
            </div>

            <div class="row">
                <div class="col-3"></div>
                <div class="border col-6 border-4 rounded-1 shadow infoBanner">
                    <div class="row mt-2">
                        <div class="col-4">
                            <h2 class="infoBanner1"><strong>1,3K</strong></h2>
                            <p class="infoBanner2">Kampanye</p>
                        </div>
                        <div class="col-4">
                            <h2 class="infoBanner1"><strong>321.3K</strong></h2>
                            <p class="infoBanner2">Pohon tertanam </p>
                        </div>
                        <div class="col-4">
                            <h2 class="infoBanner1"><strong>5.89M</strong></h2>
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
            @for ($i = 1; $i <= 5; $i++)
                <div class="col-2 cardArtikel d-flex justify-content-between my-3">
                    <div class="card ">
                        <img src="https://www.marketeers.com/_next/image/?url=https%3A%2F%2Fimagedelivery.net%2F2MtOYVTKaiU0CCt-BLmtWw%2Fe33fd511-2121-44fc-20e9-3fb547a5f600%2Fw%3D2560&w=1920&q=75"
                            class="card-img-top mx-auto" alt="...">
                        <div class="card-body">
                            <h5 class="card-title fw-semibold mb-3">500 Bibit Pohon untuk Desa yang Lebih Sejuk</h5>
                            <div class="row">
                                <div class="col-6 detailArtikel">
                                    <p class="artikelAtas">Karya</p>
                                    <p class="artikelBawah">Rahmat Kurniawan</p>
                                </div>
                                <div class="col-6">
                                    <p class="artikelAtas2">Tanggal Terbit</p>
                                    <p class="artikelBawah2">28 Februari 2024</p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            @endfor
        </div>

        <!-- BTN -->
        <div class="container">
            <div class="row">
                <div class="col btnLihatLainnya">
                    <div class="col-auto d-md-flex justify-content-md-end">
                        <button type="button" class="btn btn-outline-success">Lihat lainnya</button>
                    </div>
                </div>
            </div>
        </div>


        {{-- TESTIMONI --}}
        <h3 class="subJudul my-2"><strong>Testimoni, Suara Bumi</strong></h3>

        <div class="d-flex justify-content-between">
            <button id="prevButton" class="btn1 btn-secondary customBtn">❮</button>

            <div id="testimonialsCarousel" class="carousel slide w-100" data-bs-ride="carousel">
                <div class="carousel-inner">

                    {{-- TESTIMONI 1 --}}
                    <div class="carousel-item active">
                        <div class="row justify-content-center my-3">
                            {{-- Konten baris 1 --}}
                            <div class="col-6">
                                <div class="border border-4 testimony-card">
                                    <div class="row">
                                        <div class="col-1">
                                            <div class="donatur-avatar">
                                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSaxnn_VRGWO72bMlOqeH7UV2P4oCpu1OB1JQ&s"
                                                    alt="">
                                            </div>
                                            <h5 class="namaTestimoni">Sarah</h5>
                                        </div>
                                        <div class="col-11">
                                            <p class="testimoni">
                                                Menyaksikan bagaimana pohon-pohon yang ditanam tumbuh dan
                                                berkembang memberikan kepuasan tersendiri. Saya senang bisa
                                                berkontribusi untuk masa depan yang lebih hiaju dan sehat.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="border border-4 testimony-card">
                                    <div class="row">
                                        <div class="col-1">
                                            <div class="donatur-avatar">
                                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSaxnn_VRGWO72bMlOqeH7UV2P4oCpu1OB1JQ&s"
                                                    alt="">
                                            </div>
                                            <h5 class="namaTestimoni">Anonim</h5>
                                        </div>
                                        <div class="col-11">
                                            <p class="testimoni">Saya merasa bangga menjadi bagian dari kampanye ini.
                                                Dengan setiap pohon yang
                                                ditanam, saya tahu bahwa kita membantu mencegah bencana alam dan
                                                menyediakan udara yang
                                                lebih bersih untuk semua orang</p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>



                        <div class="row justify-content-center my-3">

                            {{-- Konten baris 1 --}}
                            <div class="col-6">
                                <div class="border border-4 testimony-card">
                                    <div class="row">
                                        <div class="col-1">
                                            <div class="donatur-avatar">
                                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSaxnn_VRGWO72bMlOqeH7UV2P4oCpu1OB1JQ&s"
                                                    alt="">
                                            </div>
                                            <h5 class="namaTestimoni">Sarah</h5>
                                        </div>
                                        <div class="col-11">
                                            <p class="testimoni">
                                                Menyaksikan bagaimana pohon-pohon yang ditanam tumbuh dan
                                                berkembang memberikan kepuasan tersendiri. Saya senang bisa
                                                berkontribusi untuk masa depan yang lebih hiaju dan sehat.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="border border-4 testimony-card">
                                    <div class="row">
                                        <div class="col-1">
                                            <div class="donatur-avatar">
                                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSaxnn_VRGWO72bMlOqeH7UV2P4oCpu1OB1JQ&s"
                                                    alt="">
                                            </div>
                                            <h5 class="namaTestimoni">Anonim</h5>
                                        </div>
                                        <div class="col-11">
                                            <p class="testimoni">Saya merasa bangga menjadi bagian dari kampanye ini.
                                                Dengan setiap pohon yang
                                                ditanam, saya tahu bahwa kita membantu mencegah bencana alam dan
                                                menyediakan udara yang
                                                lebih bersih untuk semua orang</p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>

                    {{-- TESTIMONI 2 --}}
                    <div class="carousel-item">
                        <div class="row justify-content-center my-3">
                            <div class="row justify-content-center">

                                {{-- Konten baris 1 --}}
                                <div class="col-6">
                                    <div class="border border-4 testimony-card">
                                        <div class="row">
                                            <div class="col-1">
                                                <div class="donatur-avatar">
                                                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSaxnn_VRGWO72bMlOqeH7UV2P4oCpu1OB1JQ&s"
                                                        alt="">
                                                </div>
                                                <h5 class="namaTestimoni">Sarah</h5>
                                            </div>
                                            <div class="col-11">
                                                <p class="testimoni">
                                                    Menyaksikan bagaimana pohon-pohon yang ditanam tumbuh dan
                                                    berkembang memberikan kepuasan tersendiri. Saya senang bisa
                                                    berkontribusi untuk masa depan yang lebih hiaju dan sehat.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="border border-4 testimony-card">
                                        <div class="row">
                                            <div class="col-1">
                                                <div class="donatur-avatar">
                                                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSaxnn_VRGWO72bMlOqeH7UV2P4oCpu1OB1JQ&s"
                                                        alt="">
                                                </div>
                                                <h5 class="namaTestimoni">Anonim</h5>
                                            </div>
                                            <div class="col-11">
                                                <p class="testimoni">Saya merasa bangga menjadi bagian dari kampanye ini.
                                                    Dengan setiap pohon yang
                                                    ditanam, saya tahu bahwa kita membantu mencegah bencana alam dan
                                                    menyediakan udara yang
                                                    lebih bersih untuk semua orang</p>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>


                            <div class="row justify-content-center my-3">

                                {{-- Konten baris 1 --}}
                                <div class="col-6">
                                    <div class="border border-4 testimony-card">
                                        <div class="row">
                                            <div class="col-1">
                                                <div class="donatur-avatar">
                                                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSaxnn_VRGWO72bMlOqeH7UV2P4oCpu1OB1JQ&s"
                                                        alt="">
                                                </div>
                                                <h5 class="namaTestimoni">Sarah</h5>
                                            </div>
                                            <div class="col-11">
                                                <p class="testimoni">
                                                    Menyaksikan bagaimana pohon-pohon yang ditanam tumbuh dan
                                                    berkembang memberikan kepuasan tersendiri. Saya senang bisa
                                                    berkontribusi untuk masa depan yang lebih hiaju dan sehat.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="border border-4 testimony-card">
                                        <div class="row">
                                            <div class="col-1">
                                                <div class="donatur-avatar">
                                                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSaxnn_VRGWO72bMlOqeH7UV2P4oCpu1OB1JQ&s"
                                                        alt="">
                                                </div>
                                                <h5 class="namaTestimoni">Anonim</h5>
                                            </div>
                                            <div class="col-11">
                                                <p class="testimoni">Saya merasa bangga menjadi bagian dari kampanye ini.
                                                    Dengan setiap pohon yang
                                                    ditanam, saya tahu bahwa kita membantu mencegah bencana alam dan
                                                    menyediakan udara yang
                                                    lebih bersih untuk semua orang</p>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
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
