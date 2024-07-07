@extends('layout.master')

@section('css', asset('../css/kalkulator/kalkulator.css'))

@section('title', 'Kalkulator')

@section('content')
<div>
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-6">
                <h1>Kalkulator Emisi</h1>
                <h5>Kategori Kalkulator Emisi</h5>
                <div class="d-flex">
                    <a class="text-black link-underline link-underline-opacity-0" href="">
                        <div class="btn-calc me-2">
                            <p>Kendaraan</p>
                        </div>
                    </a>
                    <a class="text-black link-underline link-underline-opacity-0" href="">
                        <div class="btn-calc me-2">
                            <p>Peralatan Listrik</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection('content')

