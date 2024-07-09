@extends('layout.master')

@section('title', 'Beranda')

@section('more_files')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
     integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
     crossorigin=""/>
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
     integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
     crossorigin=""></script>
@endsection

@section('css', asset('css/beranda.css'))

@section('content')
<div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="..." class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="..." class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="..." class="d-block w-100" alt="...">
    </div>
  </div>
</div>
<div class="container">
    <div class="section d-flex flex-column justify-content-evenly">
        <div class="row my-5">
            <div class="col-12 d-flex justify-content-center">
                <h1>Misi Bumi, Misi Kita Semua</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 col-6 d-flex flex-column justify-content-center align-items-center stats">
                <h1>5,89M</h1>
                <p>Donasi Terkumpul</p>
                <div class="green-line"></div>
            </div>
            <div class="col-md-3 col-6 d-flex flex-column justify-content-center align-items-center stats">
                <h1>321,3k</h1>
                <p>Pohon Terkumpul</p>
                <div class="green-line"></div>
            </div>
            <div class="col-md-3 col-6 d-flex flex-column justify-content-center align-items-center stats">
                <h1>231,4 ton</h1>
                <p>Emisi Terkumpul</p>
                <div class="green-line"></div>
            </div>
            <div class="col-md-3 col-6 d-flex flex-column justify-content-center align-items-center stats">
                <h1>1,3k</h1>
                <p>Kampanye</p>
                <div class="green-line"></div>
            </div>
        </div>
    </div>
    <div class="row section2">
        <div class="col-12 d-flex flex-column align-items-center justify-content-center">
            <h1>Titik Penghijauan di Indonesia</h1>
            <div id="map"></div>
        </div>
    </div>
    <div class="row section2">
        <div class="col-12 d-flex flex-column align-items-center justify-content-center">
            <h1>Jalani Misi Pertamamu</h1>
            <div class="wall"></div>
        </div>
    </div>
    <div class="row section3">
        <div class="col-12 d-flex flex-column align-items-center justify-content-center">
            <h1>Roadmap #MisiBumi</h1>
                <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel" data-interval="500">
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
    <div class="row g-4">
        <h1 class="text-center">Brand yang menjalankan Misi Bumi</h1>
        @for ($i = 0; $i < 12; $i++)
            <div class="col-md-3 col-6 d-flex justify-content-center">
                <div class="brand"></div>
            </div>
        @endfor
    </div>
</div>
@endsection

@section('js')
    var map = L.map('map', {
        center: [-2.5489, 118.0149], // Center of Indonesia
        zoom: 5,
        maxBounds: [
            [-11, 94],  // Southwest coordinates
            [6, 141]    // Northeast coordinates
        ]
    });

    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png?{foo}', 
    {foo: 'bar', attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'})
    .addTo(map);

    L.marker([-7.652, 110.411],{
        title: "Tes 1",

    }).addTo(map);
@endsection