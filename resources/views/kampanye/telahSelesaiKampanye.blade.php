@extends('layout.master')

@section('css', asset('css/kampanye/detailKampanye2.css'))



@section('content')
    <div class="container">
        <h2 class="subJudul mb-4"><strong>Kampanye Telah Selesai</strong></h2>
        <div class="row">
            @for ($i = 1; $i < 7; $i++)
                <div class="col-4">
                    <!-- KONTEN-1 -->
                    <div class="col">
                        <div class="card h-50 mb-4">
                            <img src="https://www.marketeers.com/_next/image/?url=https%3A%2F%2Fimagedelivery.net%2F2MtOYVTKaiU0CCt-BLmtWw%2Fe33fd511-2121-44fc-20e9-3fb547a5f600%2Fw%3D2560&w=1920&q=75"
                                class="card-img-top" alt="...">
                            <!-- Deskripsi -->
                            <div class="card-body">
                                <h5 class="card-title d-flex justify-content-center">Kegiatan Pemantauan &
                                    Pengawasan Lingkungan Alam</h5>

                                <div class="row">
                                    <div class="col-7 card-dsk3">Campaigner</div>
                                    <div class="col-5 card-dsk3">Pohon Ditanam</div>
                                </div>

                                <div class="row">
                                    <div class="col-7 card-dsk4">Restoration Alliance</div>
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

        </div>
    </div>
@endsection
