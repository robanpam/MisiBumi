@extends('layout.master')

@section('title', 'Pohon Anti-Emisi')

@section('css', asset('css/pohon/pohon.css'))

@section('pohon_aktif', 'nav-active')

@section('content')
    <div class="header w-100">
        <img src="{{ asset('asset/pohon/header.png') }}" alt="" class="img-fluid w-100">
    </div>
    <div class="container mx-auto p-3">
        <div class="content-section m-5">
            <div class="row my-3">
                <div class="col-md-6 tree-details mx-auto my-5">
                    <h1>{{ $pohon->nama }}</h1>
                    <h4><i>{{ $pohon->nama_latin }}</i></h4><br>
                    <p>{{ $pohon->deskripsi }}</p>
                    <p>Syarat Tumbuh:</p>
                    <ul>
                        @foreach (explode("\n", $pohon->syarat_tumbuh) as $s)
                            <li>{{ $s }}</li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-md-6 d-flex align-items-center justify-content-center">
                    <div class="image-container">
                        <div class="background-circle"></div>
                        <img src="{{ asset('asset/pohon/' . $pohon->gambar_pohon) }}">
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
        <div class="d-flex justify-content-center">
            <div class="row tree-gallery mx-auto">
                <div class="col-12 d-flex align-items-center justify-content-center">
                    <a href="{{ route('pohon.show', 2) }}"><img src="{{ asset('asset/pohon/trembesi.png') }}" alt="Trembesi"
                            class="img-fluid tree-nav"></a>
                    <a href="{{ route('pohon.show', 3) }}"><img src="{{ asset('asset/pohon/cassia.png') }}" alt="Cassia"
                            class="img-fluid tree-nav"></a>
                    <a href="{{ route('pohon.show', 4) }}"><img src="{{ asset('asset/pohon/kenanga.png') }}"
                            alt="Kenanga" class="img-fluid tree-nav"></a>
                    <a href="{{ route('pohon.show', 1) }}"><img src="{{ asset('asset/pohon/beringin.png') }}"
                            alt="Beringin" class="img-fluid tree-nav"></a>
                    <a href="{{ route('pohon.show', 5) }}"><img src="{{ asset('asset/pohon/kiara_payung.png') }}"
                            alt="Kiara Payung" class="img-fluid tree-nav"></a>
                    <a href="{{ route('pohon.show', 6) }}"><img src="{{ asset('asset/pohon/bungur.png') }}" alt="Bungur"
                            class="img-fluid tree-nav" tree-nav></a>
                </div>
            </div>
        </div>
        <div class="line"></div>
        <div class="row my-5 mx-auto m-0 p-0">
            <div class="col-12 d-flex flex-column justify-content-center">
                <h1 class="campaign-title">Daftar Kampanye</h1>
                <div class="row">
                @foreach ($kampanyes->where('status', 1)->take(3) as $kampanye)
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
                            <img src="{{ $kampanye->gambar_kampanye}}" class="card-img-top"
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
                                    <div class="progress-bar" role="progressbar" style="width: {{ $persentase_terkumpul }}%"
                                        aria-valuenow="{{ $persentase_terkumpul }}" aria-valuemin="0" aria-valuemax="100">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="d-flex justify-content-start">
                                            <div class="bwh1">{{ $pohon_terkumpul }}</div>
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
                                        class="btn btn-primary rounded-5">
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
    </div>
@endsection

@section('js')
@endsection
