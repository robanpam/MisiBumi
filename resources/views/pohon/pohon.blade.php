@extends('layout.master')

@section('title', 'Pohon Anti-Emisi')

@section('css', asset('css/pohon/pohon.css'))

@section('pohon_aktif', 'nav-active')

@section('content')
    <div class="container m-0 p-0">
        <div class="col-md-6 col-12">
            <div class="header bg-image"></div>
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
        <div class="section d-flex flex-column justify-content-evenly">
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
