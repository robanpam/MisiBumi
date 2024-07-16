@extends('layout.master')

@section('css', asset('css/kampanye/mainKampanye.css'))


@section('content')
    <div class="bg">
        <div class="container">
            <div class="row">
                <div class="col-2"></div>
                <div class="col cont banner text-light">
                    <h1><strong>Kampanye Misi Bumi</strong></h1>
                    <p>Dengan hati yang penuh dengan kepedulian dan tekad yang bulat, kami hadir
                        untuk mengajak Anda semua bergabung dalam kampanye Misi Bumi ini. Mari bersama kita jaga kelestarian tumbuhan,
                        sebagai sumber kehidupan yang tak ternilai, melalui aksi nyata & donasi yang berdampak
                        positif bagi lingkungan kita semua
                    </p>
                </div>
                <div class="col-2"></div>
            </div>
        </div>
    </div>

    <!-- CARD BELUM SELESAI () -->
    <div class="container">
        <h3 class="subJudul"><strong>Belum Selesai</strong></h3>
        <div class="row">
            @for ($i = 1; $i < 4; $i++)
                <div class="col-4">

                    <div class="col">
                        <div class="card h-50">
                            <img src="{{ asset('asset/artikel/1720746208.jpg') }}"
                                class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title d-flex justify-content-center">{{ $kampanye->nama_kampanye }}</h5>
                                <div class="row">
                                    <div class="col-md-5 card-dsk">Campaigner :</div>
                                    <div class="col-md-7 ms-auto d-flex justify-content-end card-dsk">{{ $kampanye->user_name }}</div>
                                </div>
                                <div class="row card-dsk1">
                                    <div class="col-md-5 ">Batas Donasi :</div>
                                    <div class="col-md-7 ms-auto d-flex justify-content-end">{{ \Carbon\Carbon::parse($kampanye->batas_donasi)->format('d-m-Y') }}</div>
                                </div>
                                <div class="progress mt-3 rounded-0">
                                    <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25"
                                        aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="d-flex justify-content-start">
                                            <div class="bwh1">45</div>
                                            <div class="bwh2">Pohon terkumpul</div>
                                        </div>
                                    </div>
                                    <div class="col-6 ">
                                        <div class="d-flex justify-content-end">
                                            <div class="bwh1">100</div>
                                            <div class="bwh2">Donatur</div>
                                        </div>
                                    </div>

                                </div>
                                <div class="d-grid gap-2 mt-3">
                                    <a href="{{ route('detailkampanye2', ['id' => $i]) }}" class="btn btn-primary rounded-5">
                                        <div class="text-btn">Lihat Kampanye</div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endfor

            <div class="container">
                <div class="row">
                    <div class="col btnLihatLainnya">
                        <div class="col-auto d-md-flex justify-content-md-end">
                            <button type="button" class="btn btn-outline-success">Lihat lainnya</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- CARD TELAH SELESAI -->
            <div class="container">
                <h3 class="subJudul"><strong>Telah Selesai</strong></h3>
                <div class="row">
                    @for ($i = 1; $i < 4; $i++)
                        <div class="col-4">
                            <div class="col">
                                <div class="card h-50">
                                    <img src=""
                                        class="card-img-top" alt="...">

                                    <div class="card-body">
                                        <h5 class="card-title d-flex justify-content-center">{{ $kampanye->nama_kampanye }}</h5>

                                        <div class="row">
                                            <div class="col-7 card-dsk3">Campaigner</div>
                                            <div class="col-5 card-dsk3">Pohon Ditanam</div>
                                        </div>

                                        <div class="row">
                                            <div class="col-7 card-dsk4">{{ $kampanye->user_name }}</div>
                                            <div class="col-5 card-dsk4">150</div>
                                        </div>

                                        <div class="d-grid gap-2 mt-2">
                                            <button class="btn btn-primary rounded-5" type="button">
                                                <div class="text-btn">Pantau Kampanye</div>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endfor

                    {{-- BUNTTON --}}
                    <div class="container">
                        <div class="row">
                            <div class="col btnLihatLainnya">
                                <div class="col-auto d-md-flex justify-content-md-end">
                                    <button type="button" class="btn btn-outline-success">Lihat lainnya</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            @endsection
