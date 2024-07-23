@extends('layout.master')

@section('title', 'Selesaikan MisiBumi-mu!')

@section('more_files')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
@endsection

@section('css', asset('css/landing.css'))

@section('content')
    <div class="container m-0 p-0">
        <div class="main-section d-flex flex-column justify-content-evenly">
            <div class="row ms-5">
                <div class="col-md-6 col-12 d-flex flex-column justify-content-center align-items-start">
                    <div class="col-12 d-flex justify-content-start">
                        <h1>Siap<br>Menyelesaikan<br>Misi Bumi?</h1>
                    </div>
                    <p>Misi Bumi merupakan platform pendanaan aksi tanam pohon yang dilakukan secara gotong-royong untuk
                        keberlanjutan bumi.</p>
                    <a href="{{ route('mainKampanye') }}"><button class="btn custom-button p-2 mt-2">Gabung Misi</button></a>
                </div>
                <div class="col-md-6 col-12 d-flex flex-column justify-content-center align-items-center custom-right d-none"
                    data-id="1">
                    <img src="{{ asset('asset/pohon/trembesi.png') }}" class="img-fluid d-none d-md-block">
                    <p class="d-none d-md-block">Pohon Trembesi</p>
                </div>
                <div class="col-md-6 col-12 d-flex flex-column justify-content-center align-items-center custom-right d-none"
                    data-id="2">
                    <img src="{{ asset('asset/pohon/cassia.png') }}" class="img-fluid d-none d-md-block">
                    <p class="d-none d-md-block">Pohon Cassia</p>
                </div>
                <div class="col-md-6 col-12 d-flex flex-column justify-content-center align-items-center custom-right d-none"
                    data-id="3">
                    <img src="{{ asset('asset/pohon/kenanga.png') }}" class="img-fluid d-none d-md-block">
                    <p class="d-none d-md-block">Pohon Kenanga</p>
                </div>
                <div class="col-md-6 col-12 d-flex flex-column justify-content-center align-items-center custom-right d-none"
                    data-id="4">
                    <img src="{{ asset('asset/pohon/beringin.png') }}" class="img-fluid d-none d-md-block">
                    <p class="d-none d-md-block">Pohon Beringin</p>
                </div>
                <div class="col-md-6 col-12 d-flex flex-column justify-content-center align-items-center custom-right d-none"
                    data-id="5">
                    <img src="{{ asset('asset/pohon/kiara_payung.png') }}" class="img-fluid d-none d-md-block">
                    <p class="d-none d-md-block">Pohon Kiara Payung</p>
                </div>
                <div class="col-md-6 col-12 d-flex flex-column justify-content-center align-items-center custom-right d-none"
                    data-id="6">
                    <img src="{{ asset('asset/pohon/bungur.png') }}" class="img-fluid d-none d-md-block">
                    <p class="d-none d-md-block">Pohon Bungur</p>
                </div>
            </div>
        </div>
        <div class="row tree-gallery d-none d-md-block">
            <div class="col d-flex align-items-center justify-content-center">
                <img src="{{ asset('asset/pohon/trembesi.png') }}" onclick="showPohon(1)" alt="Trembesi" class="img-fluid">
                <img src="{{ asset('asset/pohon/cassia.png') }}" onclick="showPohon(2)" alt="Cassia" class="img-fluid">
                <img src="{{ asset('asset/pohon/kenanga.png') }}" onclick="showPohon(3)" alt="Kenanga" class="img-fluid">
                <img src="{{ asset('asset/pohon/beringin.png') }}" onclick="showPohon(4)" alt="Beringin" class="img-fluid">
                <img src="{{ asset('asset/pohon/kiara_payung.png') }}" onclick="showPohon(5)" alt="Kiara Payung"
                    class="img-fluid">
                <img src="{{ asset('asset/pohon/bungur.png') }}" onclick="showPohon(6)" alt="Bungur" class="img-fluid">
            </div>
        </div>
        <div class="section-feature d-flex flex-column justify-content-evenly">
            <div class="row pt-4">
                <div class="col-12 d-flex justify-content-center">
                    <h1>Fitur #MisiBumi</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 col-6 d-flex flex-column justify-content-center align-items-center stats">
                    <img src="{{ asset('asset/landing/1.png') }}" class="mb-5" alt="">
                    <h4>Buat<br>Kampanye</h4>
                </div>
                <div class="col-md-3 col-6 d-flex flex-column justify-content-center align-items-center stats">
                    <img src="{{ asset('asset/landing/2.png') }}" class="mb-5" alt="">
                    <h4>Turut<br>Berkontribusi</h4>
                </div>
                <div class="col-md-3 col-6 d-flex flex-column justify-content-center align-items-center stats">
                    <img src="{{ asset('asset/landing/3.png') }}" class="mb-5" alt="">
                    <h4>Menghitung<br>Emisi Karbon</h4>
                </div>
                <div class="col-md-3 col-6 d-flex flex-column justify-content-center align-items-center stats">
                    <img src="{{ asset('asset/landing/4.png') }}" class="mb-5" alt="">
                    <h4>Mengenal Jenis<br>Pohon Anti-Emisi</h4>
                </div>
            </div>
        </div>
        <div class="section d-flex flex-column justify-content-evenly">
            <div class="row mt-2">
                <div class="col-12 d-flex justify-content-center">
                    <h1>#MisiSukses</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 col-6 d-flex flex-column justify-content-center align-items-center stats">
                    <h1>{{ $donasi }}</h1>
                    <p>Donasi Terkumpul</p>
                </div>
                <div class="col-md-3 col-6 d-flex flex-column justify-content-center align-items-center stats">
                    <h1>{{ $pohon }}</h1>
                    <p>Pohon Ditanam</p>
                </div>
                <div class="col-md-3 col-6 d-flex flex-column justify-content-center align-items-center stats">
                    <h1>231,4 ton</h1>
                    <p>Emisi Terserap</p>
                </div>
                <div class="col-md-3 col-6 d-flex flex-column justify-content-center align-items-center stats">
                    <h1>{{ $kampanye }}</h1>
                    <p>Kampanye</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container-map ms-4 mt-5">
        <div class="row section3 d-flex justify-content-center align-items-center">
            <div class="col-12 text-center">
                <h1 class="roadmap-title">Roadmap #MisiBumi</h1>
                <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel"
                    data-interval="500">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="asset/beranda/roadmap1.png" class="d-block w-100" alt="Image 1">
                        </div>
                        <div class="carousel-item">
                            <img src="asset/beranda/roadmap5.png" class="d-block w-100" alt="Image 2">
                        </div>
                        <div class="carousel-item">
                            <img src="asset/beranda/roadmap4.png" class="d-block w-100" alt="Image 3">
                        </div>
                        <div class="carousel-item">
                            <img src="asset/beranda/roadmap3.png" class="d-block w-100" alt="Image 4">
                        </div>
                        <div class="carousel-item">
                            <img src="asset/beranda/roadmap2.png" class="d-block w-100" alt="Image 5">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    document.addEventListener('DOMContentLoaded', function() {
    console.log("landing.js loaded");

    window.showPohon = function(id) {
    document.querySelectorAll('.custom-right').forEach(item => {
    item.classList.add('d-none');
    });

    const element = document.querySelector(`.custom-right[data-id="${id}"]`);
    if (element) {
    element.classList.remove('d-none');
    }
    };

    const firstPohonId = 1;
    showPohon(firstPohonId);

    document.getElementById('tree-gallery').addEventListener('click', function(event) {
    if (event.target.tagName === 'IMG') {
    const id = event.target.getAttribute('data-id');
    showPohon(id);
    }
    });
    });
@endsection
