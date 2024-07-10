@extends('layout.master')

@section('css', asset('../css/kalkulator/kalkulator.css'))

@section('title', 'Kalkulator')

@section('content')
<div>
    <div class="container mt-3">
        <div class="row">
            <div class="col-6">
                <h1>Kalkulator Emisi</h1>
                <h5>Kategori Kalkulator Emisi</h5>
                <!-- <div class="d-flex">
                    <a class="text-black link-underline link-underline-opacity-0" href={{ route('kalkulator.index', ['jenis' => 'kendaraan']) }}>
                        <div class="btn-calc me-2">
                            <p>Kendaraan</p>
                        </div>
                    </a>
                    <a class="text-black link-underline link-underline-opacity-0" href={{ route('kalkulator.index', ['jenis' => 'listrik']) }}>
                        <div class="btn-calc me-2">
                            <p>Peralatan Listrik</p>
                        </div>
                    </a>
                </div> -->
            </div>
        </div>
        <div class="row">
            @foreach ($jenis as $j)
                <div class="col-md-2 col-6">
                    <a class="text-black link-underline link-underline-opacity-0" href={{ route('kalkulator.index', ['jenis' => $j->nama]) }}>
                            <div class="btn-calc me-2">
                            <p> {{ $j->nama }} </p>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection('content')

