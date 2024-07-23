@extends('layout.master')

@section('title', 'Pohon Anti-Emisi')

@section('css', asset('css/pohon/pohon.css'))

@section('pohon_aktif', 'nav-active')

@section('content')
    <div class="container m-0 p-0">
        <div class="col-md-6 col-12">
            <div class="header">
                <img src="{{asset('asset/pohon/header.png')}}" alt="" class="img-fluid">
            </div>
        </div>
        <div class="content-section m-5 p-5">
            <div class="row">
                <div class="col-md-6 tree-details">
                    <h1>Beringin Pencekik</h1>
                    <h4><i>Ficus annulata</i></h4>
                    <p>Beringin pencekik merupakan...</p>
                    <ul>
                        <li>Ketinggian (mdpl): 600-800</li>
                        <li>ph: 5-7</li>
                        <li>Suhu (oC): 26-36</li>
                        <li>Curah Hujan (mm/tahun): 1000-2000</li>
                    </ul>
                </div>
                <div class="col-md-6 d-flex align-items-center justify-content-center">
                    <div class="image-container">
                        <div class="background-circle"></div>
                        <img src="{{ asset('asset/pohon/trembesi.png') }}" alt="Beringin Pencekik">
                    </div>
                </div>
            </div>
            {{-- <div class="row tree-details"> --}}
                {{-- <div class="col-md-6 tree-info">
                    <div class="benefits-box">
                        <h5>Manfaat</h5>
                        <ul>
                            <li><strong>Ekologi:</strong> Peneduh, peny...
                            <li><strong>Ekonomi:</strong> Batangnya b...
                            <li><strong>Sosial:</strong> Daun dan aka...
                        </ul>
                        <p><strong>Serapan Karbon:</strong> 0.0409944034 kg CO2eq</p>
                    </div>
                </div> --}}
            {{-- </div> --}}
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
