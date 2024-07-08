@extends('layout.master')

@section('title', 'Beranda')

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
<div class="container-md">
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
            <div class="wall"></div>
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
                <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel" data-interval="1000">
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