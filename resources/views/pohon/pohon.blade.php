@extends('layout.master')

@section('title', 'Pohon Anti-Emisi')

@section('css', asset('css/pohon/pohon.css'))

@section('pohon_aktif', 'nav-active')

@section('content')
    <div class="container m-0 p-0">
        <div class="col-md-6 col-12">
            <div class="header">
                <img src="{{ asset('asset/pohon/header.png') }}" alt="" class="img-fluid">
            </div>
        </div>
        <div class="content-section m-5 p-5">
            <div class="row ms-5 my-3">
                <div class="col-md-6 tree-details d-flex justify-content-center my-5">
                    <h1>{{$pohon->nama}}</h1>
                    <h4><i>{{$pohon->nama_latin}}</i></h4><br>
                    <p>{{$pohon->deskripsi}}</p>
                    <p>Syarat Tumbuh:</p>
                    <ul>
                        @foreach(explode("\n", $pohon->syarat_tumbuh) as $s)
                            <li>{{ $s }}</li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-md-6 d-flex align-items-center justify-content-center">
                    <div class="image-container">
                        <div class="background-circle"></div>
                        <img src="{{ asset('asset/pohon/'. $pohon->gambar_pohon) }}">
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
        <div class="d-flex justify-content-center my-5">
            <div class="row tree-gallery ms-5">
                <div class="col-12 d-flex align-items-center justify-content-center">
                    <a href="{{route('pohon.show', 2)}}"><img src="{{ asset('asset/pohon/trembesi.png') }}" alt="Trembesi" class="img-fluid tree-nav"></a>
                    <a href="{{route('pohon.show', 3)}}"><img src="{{ asset('asset/pohon/cassia.png') }}" alt="Cassia" class="img-fluid tree-nav"></a>
                    <a href="{{route('pohon.show', 4)}}"><img src="{{ asset('asset/pohon/kenanga.png') }}" alt="Kenanga" class="img-fluid tree-nav"></a>
                    <a href="{{route('pohon.show', 1)}}"><img src="{{ asset('asset/pohon/beringin.png') }}" alt="Beringin" class="img-fluid tree-nav"></a>
                    <a href="{{route('pohon.show', 5)}}"><img src="{{ asset('asset/pohon/kiara_payung.png') }}" alt="Kiara Payung" class="img-fluid tree-nav"></a>
                    <a href="{{route('pohon.show', 6)}}"><img src="{{ asset('asset/pohon/bungur.png') }}" alt="Bungur" class="img-fluid tree-nav" tree-nav></a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
@endsection
