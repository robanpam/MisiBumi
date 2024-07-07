@extends('layout.master')

@section('title', 'Hasil Kalkulasi')

@section('css')
    .hasil_calc{
        border: 1px solid gray;
        border-radius: 5px;
    }

    .calc_type{
        display:flex;
        justify-content: space-between;
    }

    .calc_hasil_back{
        width: 100%;
        outline: 2px solid #114232;
        border-radius: 20px;
    }
@endsection('css')

@section('content')
    <div class="row">
        <div class="col-md-1">

        </div>
        <div class="col-md-3">
            <h4 class="mb-4">Kalkulator Emisi</h4>
            <h3>Jejak Karbonmu</h3>
            <h5>Jumlah Karbon yang Dikeluarkan</h5>
            <div class="hasil_calc p-3">
                <h2 class="color_pal">Nunggu Backend</h2>
                <h6>Rincian</h6>
                <div class="calc_type">
                    <p>Tipe</p>
                    <p>: Nunggu Backend</p>
                </div>
                <div class="calc_type">
                    <p>Tipe</p>
                    <p>: Nunggu Backend</p>
                </div>
            </div>
            <button type="button" class="btn calc_hasil_back mt-3">Kembali</button>
        </div>
    </div>
@endsection('content')