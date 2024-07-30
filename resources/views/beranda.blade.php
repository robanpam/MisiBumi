@extends('layout.master')

@section('title', 'Beranda')

@section('beranda_aktif', 'nav-active')

@section('more_files')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
     integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
     crossorigin=""/>
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
     integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
     crossorigin=""></script>
@endsection

@section('css', asset('css/beranda.css'))

@section('content')
<div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner caro-contain">
    <div class="carousel-item img-caro active">
      <img src="{{ asset('asset/beranda/1.png') }}" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item img-caro">
      <img src="{{ asset('asset/beranda/2.jpg') }}" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item img-caro">
      <img src="{{ asset('asset/beranda/5.jpg') }}" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item img-caro">
      <img src="{{ asset('asset/beranda/6.jpg') }}" class="d-block w-100" alt="...">
    </div>
    <h1 class="centered-title text-white">Misi Bumi</h1>
  </div>
</div>
<div class="container">
    <div class="section d-flex flex-column justify-content-evenly">
        <div class="row my-5">
            <div class="col-12 d-flex justify-content-center">
                <h1>Misi Bumi, Misi Kita Semua</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 col-6 d-flex flex-column justify-content-center align-items-center stats">
                <h1>{{$donasi}}</h1>
                <p>Donasi Terkumpul</p>
                <div class="green-line"></div>
            </div>
            <div class="col-md-3 col-6 d-flex flex-column justify-content-center align-items-center stats">
                <h1>{{$pohon}}</h1>
                <p>Pohon Ditanam</p>
                <div class="green-line"></div>
            </div>
            <div class="col-md-3 col-6 d-flex flex-column justify-content-center align-items-center stats">
                <h1>{{ $emisi }}</h1>
                <p>Emisi Terserap</p>
                <div class="green-line"></div>
            </div>
            <div class="col-md-3 col-6 d-flex flex-column justify-content-center align-items-center stats">
                <h1>{{ $kampanye }}</h1>
                <p>Kampanye</p>
                <div class="green-line"></div>
            </div>
        </div>
        <div class="row">
            <div class="d-flex justify-content-center mt-3">
                <div class="d-grid gap-2">
                    <a href="{{ route('laporan')}}"
                        class="btn btn-primary rounded-5 laporan">
                        <div class="text-btn">Lihat Laporan</div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-12 d-flex flex-column align-items-center justify-content-center">
            <h1>Titik Penghijauan di Indonesia</h1>
            <div id="map"></div>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-12 d-flex flex-column align-items-center justify-content-center">
            <h1>Jalani Misi Pertamamu</h1>
            <div class="row">
            @foreach ($kampanyes->where('status', 2)->take(6) as $kampanye)
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
    <div class="row mt-5">
        <div class="col-4">
            
        </div>
        <div class="col-4"></div>
        <div class="col-4"></div>
    </div>
    <div class="row g-4">
        <h1 class="text-center">Brand yang menjalankan Misi Bumi</h1>
        @for ($i = 0; $i < 12; $i++)
            <div class="col-md-3 col-6 d-flex justify-content-center">
                <div class="brand"></div>
            </div>
        @endfor
    </div>
</div>
@endsection

@section('js')
    var map = L.map('map', {
        center: [-2.5489, 118.0149], // Center of Indonesia
        zoom: 5,
        minZoom: 5,
        maxBounds: [
            [-11, 94],  // Southwest coordinates
            [6, 141]    // Northeast coordinates
        ]
    });

    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png?{foo}',
    {foo: 'bar', attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'})
    .addTo(map);

    var greenIcon = L.icon({
    iconUrl: 'https://leafletjs.com/examples/custom-icons/leaf-green.png',
    shadowUrl: 'https://leafletjs.com/examples/custom-icons/leaf-shadow.png',
    iconSize: [24, 40], // smaller size of the icon
    shadowSize: [30, 40], // smaller size of the shadow
    iconAnchor: [12, 40], // point of the icon which will correspond to marker's location
    shadowAnchor: [4, 40],  // the same for the shadow
    popupAnchor: [0, -40] // point from which the popup should open relative to the iconAnchor
});

var redIcon = L.icon({
    iconUrl: 'https://leafletjs.com/examples/custom-icons/leaf-red.png',
    shadowUrl: 'https://leafletjs.com/examples/custom-icons/leaf-shadow.png',
    iconSize: [24, 40], // smaller size of the icon
    shadowSize: [30, 40], // smaller size of the shadow
    iconAnchor: [12, 40], // point of the icon which will correspond to marker's location
    shadowAnchor: [4, 40],  // the same for the shadow
    popupAnchor: [0, -40] // point from which the popup should open relative to the iconAnchor
});

var markers = [
    {
        coords: [-6.2088, 106.8456],
        title: "Jakarta",
        popup: "Membutuhkan penanaman pohon untuk mengurangi efek pulau panas perkotaan dan meningkatkan kualitas udara.",
        icon: greenIcon
    },
    {
        coords: [-7.7956, 110.3695],
        title: "Yogyakarta",
        popup: "Reforestasi diperlukan di daerah sekitar untuk mencegah longsor dan meningkatkan keanekaragaman hayati.",
        icon: redIcon
    },
    {
        coords: [-8.3405, 115.0920],
        title: "Bali",
        popup: "Inisiatif penanaman pohon untuk memulihkan hutan bakau dan daerah pesisir.",
        icon: greenIcon
    },
    {
        coords: [1.4822, 124.8489],
        title: "Manado",
        popup: "Proyek penghijauan kota diperlukan untuk memperbaiki ruang hijau di kota.",
        icon: redIcon
    },
    {
        coords: [-3.3119, 114.5908],
        title: "Banjarmasin",
        popup: "Penanaman pohon di sepanjang tepi sungai untuk mencegah erosi dan meningkatkan kualitas air.",
        icon: greenIcon
    },
    {
        coords: [-5.1477, 119.4327],
        title: "Makassar",
        popup: "Penghijauan diperlukan untuk memulihkan lahan terdegradasi dan meningkatkan lingkungan perkotaan.",
        icon: redIcon
    },
    {
        coords: [-0.7893, 113.9213],
        title: "Pontianak",
        popup: "Penanaman pohon untuk mengurangi banjir dan meningkatkan penyerapan air.",
        icon: greenIcon
    },
    {
        coords: [-7.2575, 112.7521],
        title: "Surabaya",
        popup: "Penghijauan kota untuk mengurangi polusi udara dan meningkatkan kualitas hidup warga.",
        icon: redIcon
    },
    {
        coords: [-2.9909, 104.7564],
        title: "Palembang",
        popup: "Penanaman pohon di sekitar kawasan industri untuk mengurangi polusi.",
        icon: greenIcon
    },
    {
        coords: [-0.8615, 134.064],
        title: "Sorong",
        popup: "Restorasi hutan hujan untuk melindungi spesies endemik dan menjaga keanekaragaman hayati.",
        icon: redIcon
    },
    {
        coords: [-8.5833, 116.1167],
        title: "Lombok",
        popup: "Penanaman pohon untuk memulihkan daerah yang terkena dampak erosi dan longsor.",
        icon: greenIcon
    },
    {
        coords: [-1.6099, 103.6123],
        title: "Jambi",
        popup: "Reforestasi di lahan gambut untuk mencegah kebakaran hutan dan menjaga keanekaragaman hayati.",
        icon: redIcon
    },
    {
        coords: [-2.5321, 140.7181],
        title: "Jayapura",
        popup: "Penghijauan kota untuk memperbaiki lingkungan hidup dan meningkatkan kesejahteraan warga.",
        icon: greenIcon
    },
    {
        coords: [3.5952, 98.6722],
        title: "Medan",
        popup: "Penanaman pohon di kawasan perkotaan untuk mengurangi suhu dan meningkatkan kualitas udara.",
        icon: redIcon
    },
    {
        coords: [-0.1207, 117.4783],
        title: "Balikpapan",
        popup: "Penanaman pohon di daerah pesisir untuk melindungi garis pantai dan meningkatkan kualitas air.",
        icon: greenIcon
    },
    {
        coords: [-3.655, 128.1909],
        title: "Ambon",
        popup: "Reforestasi di daerah pegunungan untuk mencegah longsor dan meningkatkan sumber air.",
        icon: redIcon
    },
    {
        coords: [-7.9666, 112.6326],
        title: "Malang",
        popup: "Penanaman pohon di taman kota untuk meningkatkan ruang hijau dan kualitas udara.",
        icon: greenIcon
    },
    {
        coords: [0.5333, 123.0667],
        title: "Gorontalo",
        popup: "Restorasi hutan mangrove untuk melindungi pantai dan mendukung keanekaragaman hayati.",
        icon: redIcon
    },
    {
        coords: [-0.024, 109.3411],
        title: "Pontianak",
        popup: "Penanaman pohon di kawasan perkotaan untuk meningkatkan kualitas udara dan mengurangi polusi.",
        icon: greenIcon
    },
    {
        coords: [-6.9147, 107.6098],
        title: "Bandung",
        popup: "Penghijauan kota untuk mengurangi polusi dan meningkatkan kualitas hidup warga.",
        icon: redIcon
    }
];

markers.forEach(function(marker) {
    L.marker(marker.coords, {
        title: marker.title,
        icon: marker.icon
    }).addTo(map)
    .bindPopup(`<b>${marker.title}</b><br>${marker.popup}`);
});
@endsection