@extends('layout.master')

@section('css', asset('css/kampanye/detailKampanye2.css'))

@section('content')
<div class="container">
    <h3 class="subJudul"><strong>Belum Selesai</strong></h3>
    <div class="row">
        @foreach ($kampanyes as $kampanye)
            @if ($kampanye->status == 0)
                <div class="col-4">
                    <div class="col">
                        <div class="card h-50">
                            <img src="{{ asset('asset/kampanye/' . $kampanye->gambar_kampanye) }}"
                                 class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title d-flex justify-content-center">{{ $kampanye->nama_kampanye }}</h5>
                                <div class="row">
                                    <div class="col-md-5 card-dsk">Campaigner :</div>
                                    <div class="col-md-7 ms-auto d-flex justify-content-end card-dsk">{{ $kampanye->user_name }}</div>
                                </div>
                                <div class="row card-dsk1">
                                    <div class="col-md-5">Batas Donasi :</div>
                                    <div class="col-md-7 ms-auto d-flex justify-content-end">{{ \Carbon\Carbon::parse($kampanye->batas_donasi)->format('d-m-Y') }}</div>
                                </div>
                                <div class="progress mt-3 rounded-0">
                                    <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="d-flex justify-content-start">
                                            <div class="bwh1">{{ $kampanye->total_pohon }}</div>
                                            <div class="bwh2">Pohon terkumpul</div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="d-flex justify-content-end">
                                            <div class="bwh1">{{ $kampanye->total_donatur }}</div>
                                            <div class="bwh2">Donatur</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-grid gap-2 mt-3">
                                    <a href="{{ route('detailkampanye2', ['id' => $kampanye->id]) }}" class="btn btn-primary rounded-5">
                                        <div class="text-btn">Lihat Kampanye</div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
@endsection
