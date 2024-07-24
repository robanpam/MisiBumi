@extends('layout.master')

@section('css', asset('css/artikel/mainArtikel.css'))
<!-- @section('kampanye_aktif', 'nav-active') -->

@section('content')
    <div class="container">
        <h3 class="subJudul"><strong>Artikel</strong></h3>
        <div class="row">
            <div class="col">
                @foreach ($artikels as $items)
                    <a href="{{ route('detailArtikel', ['id' => $items->id]) }}" class="no-underline">
                        <div class="card artikel my-3">
                            <div class="row konten">
                                <div class="col-4">
                                    <div class="row d-flex justify-content-center">
                                        <img src="{{ $items->gambar_artikel }}"
                                            class="card-img gbrArtikel  d-flex justify-content-center" alt="...">
                                    </div>
                                    <p class="nama">{{ $admins1->first()->name }}</p>
                                </div>
                                <div class="col-8">
                                    <div class="row atas">
                                        <p class="judul">{{ $items->judul_artikel }}</p>
                                        <p class="dsk">{{ $items->isi_artikel }}</p>
                                    </div>
                                    <div class="row bwh">
                                        <p class="tgl">{{ \Carbon\Carbon::parse($items->created_at)->format('d F Y') }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </a>
                @endforeach

            </div>
        </div>

    </div>
@endsection
