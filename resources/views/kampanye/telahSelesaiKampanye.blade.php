@extends('layout.master')

@section('css', asset('css/kampanye/telahSelesaiKampanye.css'))

@section('content')
    <div class="container">
        <h3 class="subJudul"><strong>Kampanye Telah Selesai</strong></h3>
        <div class="row">
        @foreach ($kampanyes ->take(12) as $kampanye)
                @php
                    $pohon_terkumpul = intval(
                        $kampanye->donasis->sum('nilai_donasi') /
                            ($kampanye->harga_pohon > 0 ? $kampanye->harga_pohon : 1),
                    );
                    $persentase_terkumpul = min(100, ($pohon_terkumpul / $kampanye->jumlah_pohon) * 100);
                @endphp
                    <div class="col-4 my-3">
                        <div class="col">
                            <div class="card h-50">
                                <img src="{{ $kampanye->gambar_kampanye }}" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title d-flex justify-content-center">{{ $kampanye->nama_kampanye }}</h5>
                                    <div class="row">
                                        <div class="col-7 card-dsk3">Campaigner</div>
                                        <div class="col-5 card-dsk3">Pohon Ditanam</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-7 card-dsk4">{{ $kampanye->user_name }}</div>
                                        <div class="col-5 card-dsk4">{{ $pohon_terkumpul }}</div>
                                    </div>
                                    <div class="d-grid gap-2 mt-2">
                                        <a href="{{ route('detailkampanye2', ['id' => $kampanye->id]) }}"
                                            class="btn btn-primary rounded-5">
                                            <div class="text-btn">Lihat Kampanye</div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
        @endforeach
            <div class="d-flex justify-content-center">
                {{ $kampanyes->links('pagination::bootstrap-5') }}
            </div>
        </div>
    @endsection
