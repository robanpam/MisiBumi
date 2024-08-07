@extends('layout.master')

@section('title', 'Hasil Kalkulasi')

@section('css', asset('../css/kalkulator/kalkulator_hasil.css'))

@section('kalku_aktif', 'nav-active')

@section('css')
   
@endsection('css')

@section('content')
    <div class="row">
        <div class="col-12 d-flex justify-content-center flex-column align-items-center">
            <h5 class="pt-5">Jumlah Karbon yang Dikeluarkan</h5>
            <img class="kalku-img" src="{{ asset('asset/kalkulator/produk/' . $item->foto_produk) }}" alt="">
            <h2 class="color_pal">{{ $item->nama_produk }}</h2>
            <div class="hasil_calc p-3">
                <h6>Rincian</h6>
                <div class="calc_type">
                    <p class="m-0 mb-1">{{ $namaJenis == 'Kendaraan Bermotor' ? 'Konsumsi Bahan Bakar' : 'Daya'}} : {{ $jarak }} {{ $namaJenis == 'Kendaraan Bermotor' ? 'liter/km' : 'kWh'}}</p>
                </div>
                <div class="calc_type">
                    <p class="m-0 mb-1">Penggunaan : {{ $frekuensi }} {{ $namaJenis == 'Kendaraan Bermotor' ? 'km' : 'jam/siklus'}}</p>
                </div>
                <div class="calc_type">
                    <p class="m-0 mb-1">Emisi : {{ $emisi }} kg CO<span class="subscript">2</span></p>
                </div>
            </div>
            <a class="text-decoration-none" href="{{ route('kalkulator.list') }}">
                <button type="button" class="btn btn-primary mt-3 py-3 px-4">
                    Kembali
                </button>
            </a>
        </div>
    </div>
@endsection('content')