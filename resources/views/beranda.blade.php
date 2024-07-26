@extends('layout.master')

@section('title', 'Beranda')

@section('beranda_aktif', 'nav-active')

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
<div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner caro-contain">
    <div class="carousel-item img-caro active">
      <img src="{{ asset('asset/beranda/1.png') }}" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item img-caro">
      <img src="{{ asset('asset/beranda/2.jpg') }}" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item img-caro">
      <img src="{{ asset('asset/beranda/5.jpg') }}" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item img-caro">
      <img src="{{ asset('asset/beranda/6.jpg') }}" class="d-block w-100" alt="...">
    </div>
    <h1 class="centered-title text-white">Misi Bumi</h1>
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
                <h1>{{$donasi}}</h1>
                <p>Donasi Terkumpul</p>
                <div class="green-line"></div>
            </div>
            <div class="col-md-3 col-6 d-flex flex-column justify-content-center align-items-center stats">
                <h1>{{$pohon}}</h1>
                <p>Pohon Ditanam</p>
                <div class="green-line"></div>
            </div>
            <div class="col-md-3 col-6 d-flex flex-column justify-content-center align-items-center stats">
                <h1>{{ $emisi }}</h1>
                <p>Emisi Terserap</p>
                <div class="green-line"></div>
            </div>
            <div class="col-md-3 col-6 d-flex flex-column justify-content-center align-items-center stats">
                <h1>{{ $kampanye }}</h1>
                <p>Kampanye</p>
                <div class="green-line"></div>
            </div>
        </div>
        <div class="row">
            <div class="d-flex justify-content-center mt-3">
                <div class="d-grid gap-2">
                    <a href="{{ route('laporan')}}"
                        class="btn btn-primary rounded-5 laporan">
                        <div class="text-btn">Lihat Laporan</div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="row section2">
        <div class="col-12 d-flex flex-column align-items-center justify-content-center">
            <h1>Titik Penghijauan di Indonesia</h1>
            <div id="map"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 d-flex flex-column align-items-center justify-content-center">
            <h1>Jalani Misi Pertamamu</h1>
            <div class="row">
            @foreach ($kampanyes->where('status', 2)->take(6) as $kampanye)
                <div class="col-4 my-3">
                    <div class="col">
                        <div class="card h-50">
                            <img src="{{ $kampanye->gambar_kampanye }}" class="card-img-top"
                                alt="...">
                            <div class="card-body">
                                <h5 class="card-title d-flex justify-content-center">{{ $kampanye->nama_kampanye }}</h5>
                                <div class="row">
                                    <div class="col-md-5 card-dsk">Campaigner :</div>
                                    <div class="col-md-7 ms-auto d-flex justify-content-end card-dsk">
                                        {{ $kampanye->user_name }}</div>
                                </div>
                                <div class="row card-dsk1">
                                    <div class="col-md-5">Batas Donasi :</div>
                                    <div class="col-md-7 ms-auto d-flex justify-content-end">
                                        {{ \Carbon\Carbon::parse($kampanye->batas_donasi)->translatedFormat('d F Y') }}
                                    </div>
                                </div>
                                <div class="progress mt-3 rounded-0">
                                    <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25"
                                        aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="d-flex justify-content-start">
                                            <div class="bwh1">{{ $kampanye->jumlah_pohon }}</div>
                                            <div class="bwh2">Pohon terkumpul</div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="d-flex justify-content-end">
                                            <div class="bwh1">{{ $kampanye->donasis->count() }}</div>
                                            <div class="bwh2">Donatur</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-grid gap-2 mt-3">
                                    <a href="{{ route('detailkampanye2', ['id' => $kampanye->id]) }}"
                                        class="btn btn-primary1 rounded-5">
                                        <div class="text-btn">Lihat Kampanye</div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        </div>
    </div>
    <div class="row">
        <div class="col-4">
            
        </div>
        <div class="col-4"></div>
        <div class="col-4"></div>
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