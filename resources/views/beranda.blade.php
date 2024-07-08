@extends('layout.master')

@section('title', 'Beranda')

@section('css', asset('css/beranda.css'))

@section('content')
<div class="carousel">

</div>
<div class="container">
    <div class="section d-flex flex-column justify-content-center align-items-lg-stretch">
        <div class="row my-5">
            <div class="col-12 d-flex justify-content-center">
                <h1>Misi Bumi, Misi Kita Semua</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 d-flex flex-column justify-content-center align-items-center">
                <h1>5,89M</h1>
                <p>Donasi Terkumpul</p>
                <div class="green-line"></div>
            </div>
            <div class="col-md-3 d-flex flex-column justify-content-center align-items-center">
                <h1>321,3k</h1>
                <p>Pohon Terkumpul</p>
                <div class="green-line"></div>
            </div>
            <div class="col-md-3 d-flex flex-column justify-content-center align-items-center">
                <h1>231,4 ton</h1>
                <p>Emisi Terkumpul</p>
                <div class="green-line"></div>
            </div>
            <div class="col-md-3 d-flex flex-column justify-content-center align-items-center">
                <h1>1,3k</h1>
                <p>Kampanye</p>
                <div class="green-line"></div>
            </div>
        </div>
    </div>
    <div class="row section2">
        <div class="col-12 d-flex flex-column align-items-center justify-content-center">
            <h1>Titik Penghijauan di Indonesia</h1>
            <div class="carousel"></div>
        </div>
    </div>
    <div class="row section2">
        <div class="col-12 d-flex flex-column align-items-center justify-content-center">
            <h1>Jalani Misi Pertamamu</h1>
            <div class="carousel"></div>
        </div>
    </div>
    <div class="row section2">
        <div class="col-12 d-flex flex-column align-items-center justify-content-center">
            <h1>Roadmap #MisiBumi</h1>
            <div class="carousel"></div>
        </div>
    </div>
    <div class="row g-4">
        <h1 class="text-center">Brand yang menjalankan Misi Bumi</h1>
        @for ($i = 0; $i < 12; $i++)
            <div class="col-3 d-flex justify-content-center">
                <div class="brand"></div>
            </div>
        @endfor
    </div>
</div>
@endsection('content')