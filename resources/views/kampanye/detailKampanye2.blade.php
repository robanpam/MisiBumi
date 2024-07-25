@extends('layout.master')

@section('css', asset('css/kampanye/detailKampanye2.css'))

@section('kampanye_aktif', 'nav-active')

@section('content')
    <div class="container">
        <!-- DETAIL ATAS -->
        <div class="row mt-3">
            {{-- KIRI --}}
            <div class="col-5">
                <div class="row">
                    <div class="col-1"></div>
                    <div class="col-11">
                        <img src="{{ $kampanye->gambar_kampanye }}" class="img-fluid gbrdetail" alt="...">
                    </div>
                </div>
                <div class="row">
                    <div class="col-1"></div>
                    <div class="col-11 dsk-detail">
                        <p class='desk'>{{ $kampanye->user->name }}</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-1"></div>
                    <div class="col-11">
                        @php
                            $pohon_terkumpul = intval(
                                $kampanye->donasis->sum('nilai_donasi') /
                                    ($kampanye->harga_pohon > 0 ? $kampanye->harga_pohon : 1),
                            );
                            $persentase_terkumpul = min(100, ($pohon_terkumpul / $kampanye->jumlah_pohon) * 100);
                        @endphp
                        <div class="progress mt-3 rounded-0">
                            <div class="progress-bar" role="progressbar" style="width: {{ $persentase_terkumpul }}%;"
                                aria-valuenow="{{ $persentase_terkumpul }}" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-1"></div>
                    <div class="col-11">
                        <div class="row">
                            <div class="col-6">
                                <div class="d-flex justify-content-start">
                                    <p class="bwh1">{{ $pohon_terkumpul }}</p>
                                    <p class="bwh2">Pohon terkumpul</p>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="d-flex justify-content-end">
                                    <p class="bwh1">{{ $kampanye->donasis->count() }}</p>
                                    <p class="bwh2">Donatur</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-1"></div>
                    <div class="col-11">
                        <div class="d-flex justify-content-between">
                            <button type="button" class="btn btn-outline-success btnShare" id="btnShare" data-link="{{ route('detailkampanye2', ['id' => $kampanye->id]) }}">Share</button>
                            <form method="POST" action="{{ route('donasi.pilihNominal') }}" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" value="{{ $kampanye->id }}" id='kampanye_id' name="kampanye_id">
                            <button type="submit" class="btn btn-success btnDonasi"><strong>Donasi</strong></button>
                            </form>
                        </div>
                        <div class="alert alert-success mt-3 d-none" id="shareAlert" role="alert">
                            Link berhasil dicopy!
                        </div>
                    </div>
                </div>
            </div>

            {{-- KANAN --}}
            <div class="col-1"></div>
            <div class="col-6">
                <div class="row text-center">
                    <h1><strong>{{ $kampanye->nama_kampanye }}</strong></h1>
                </div>
                <div class="row">
                    <div class="container mt-3">
                        <div class="row">
                            <div class="row biodata-row mb-2">
                                <div class="col-3"><strong>Jenis Tanaman</strong></div>
                                <div class="col-1 dsk1">:</div>
                                <div class="col-8 dsk2">{{ $kampanye->pohon_nama }}</div>
                            </div>
                            <div class="row biodata-row mb-2">
                                <div class="col-3"><strong>Lokasi</strong></div>
                                <div class="col-1 dsk1">:</div>
                                <div class="col-8 dsk2">{{ $kampanye->lokasi_kampanye }}</div>
                            </div>
                            <div class="row biodata-row mb-2">
                                <div class="col-3"><strong>Batas Donasi</strong></div>
                                <div class="col-1 dsk1">:</div>
                                <div class="col-8 dsk2">
                                    {{ \Carbon\Carbon::parse($kampanye->batas_donasi)->translatedFormat('d F Y') }}</div>
                            </div>
                            <div class="row biodata-row mb-2">
                                <div class="col-3"><strong>Harga Pohon</strong></div>
                                <div class="col-1 dsk1">:</div>
                                <div class="col-8 dsk2">{{ 'Rp' . number_format($kampanye->harga_pohon, 0, ',', '.') }}
                                </div>
                            </div>
                            <div class="row biodata-row mb-2">
                                <div class="col-3"><strong>Minimal Pohon</strong></div>
                                <div class="col-1 dsk1">:</div>
                                <div class="col-8 dsk2">{{ $kampanye->jumlah_pohon }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- TENGAH --}}
        <div class="tab-content">
            <div class="container pilih">
                <div class="row lebihDetail border">
                    <div class="col-8">
                        <ul class="nav nav-pills navTengah" id="ex1" role="tablist">
                            <li class="nav-item " role="presentation">
                                <a class="tes nav-link active text-center rounded-0" id="tab-tentang" data-bs-toggle="pill"
                                    href="#pills-tentang" role="tab" aria-controls="pills-tentang"
                                    aria-selected="true">Tentang</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="tes nav-link text-center rounded-0" id="tab-perkembangan" data-bs-toggle="pill"
                                    href="#pills-perkembangan" role="tab" aria-controls="pills-perkembangan"
                                    aria-selected="false">Perkembangan</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="tes nav-link text-center rounded-0" id="tab-donasi" data-bs-toggle="pill"
                                    href="#pills-donasi" role="tab" aria-controls="pills-donasi"
                                    aria-selected="false">Donasi</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-4">
                        <div class="text-muted desk">Kampanye dibuat pada
                            {{ \Carbon\Carbon::parse($kampanye->created_at)->translatedFormat('d F Y') }}</div>
                    </div>
                </div>
                <div class="bordered-section tab-content rounded-0">
                    <!-- TENTANG -->
                    <div class="tab-pane fade show active" id="pills-tentang" role="tabpanel"
                        aria-labelledby="tab-tentang">
                        <h4>Halo Sahabat,</h4>
                        <p class="desk2">{{ $kampanye->deskripsi }}</p>
                    </div>

                    <!-- PERKEMBANGAN -->
                    <div class="tab-pane fade" id="pills-perkembangan" role="tabpanel"
                        aria-labelledby="tab-perkembangan">
                        <img src="https://static.vecteezy.com/system/resources/previews/011/943/648/non_2x/system-software-update-and-upgrade-concept-loading-process-in-laptop-screen-illustration-vector.jpg"
                            class="card-img-top" alt="...">
                    </div>

                    <!-- DONASI -->
                    <div class="donasi tab-pane fade" id="pills-donasi" role="tabpanel" aria-labelledby="tab-donasi">
                        <div class="container">
                            <h4 class="mb-3">Para Donatur ({{ $kampanye->donasis->count() }})</h4>
                            @foreach ($kampanye->donasis as $donasi)
                                <div class="donatur-card d-flex align-items-center p-3">
                                    <div class="donatur-avatar"></div>
                                    <div class="donatur-info">
                                        <strong>{{ $donasi->user->name }}</strong><br>
                                        Donasi <strong>{{ $donasi->nilai_donasi }}</strong>
                                    </div>
                                    <div class="donatur-time">
                                        {{ $donasi->created_at->diffForHumans() }}
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- KAMPANYE TERKAIT --}}
        <h3 class="subJudul my-2"><strong>Kampanye Terkait</strong></h3>
        <div class="row">
            @foreach ($kampanye->take(3) as $kampanye)
                <div class="col-4 my-3">
                    <!-- KONTEN -->
                    <div class="col">
                        <div class="card h-50">
                            <img src="{{ $kampanye->gambar_kampanye }}" class="card-img-top" alt="...">
                            <!-- Deskripsi -->
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
                                @php
                                    $pohon_terkumpul = intval(
                                        $kampanye->donasis->sum('nilai_donasi') /
                                            ($kampanye->harga_pohon > 0 ? $kampanye->harga_pohon : 1),
                                    );
                                    $persentase_terkumpul = min(
                                        100,
                                        ($pohon_terkumpul / $kampanye->jumlah_pohon) * 100,
                                    );
                                @endphp
                                <div class="progress mt-3 rounded-0">
                                    <div class="progress-bar" role="progressbar"
                                        style="width: {{ $persentase_terkumpul }}%;"
                                        aria-valuenow="{{ $persentase_terkumpul }}" aria-valuemin="0"
                                        aria-valuemax="100"></div>
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
@endsection
