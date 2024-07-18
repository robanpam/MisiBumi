@extends('layout.master')

@section('css', asset('css/kampanye/detailKampanye2.css'))



@section('content')
    <div class="container">
        <h2 class="subJudul mb-4"><strong>Kampanye Belum Selesai</strong></h2>
        <div class="row">
            @for ($i = 1; $i < 8; $i++)
                <div class="col-4">
                    <!-- KONTEN-1 -->
                    <div class="col">
                        <div class="card h-50 mb-4">
                            <img src="https://www.marketeers.com/_next/image/?url=https%3A%2F%2Fimagedelivery.net%2F2MtOYVTKaiU0CCt-BLmtWw%2Fe33fd511-2121-44fc-20e9-3fb547a5f600%2Fw%3D2560&w=1920&q=75"
                                class="card-img-top" alt="...">
                            <!-- Deskripsi -->
                            <div class="card-body">
                                <h5 class="card-title d-flex justify-content-center">Kegiatan Pemantauan & Pengawasan
                                    Lingkungan Alam</h5>
                                <div class="row">
                                    <div class="col-md-5 card-dsk">Campaigner :</div>
                                    <div class="col-md-7 ms-auto d-flex justify-content-end card-dsk">PT. Berkat Cipta
                                        Abadi</div>
                                </div>
                                <div class="row card-dsk1">
                                    <div class="col-md-5 ">Batas Donasi :</div>
                                    <div class="col-md-7 ms-auto d-flex justify-content-end">9 Juni 2024</div>
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
                                    <button class="btn btn-primary rounded-5" type="button">
                                        <div class="text-btn">Lihat Kampanye</div>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endfor

    </div>
@endsection
