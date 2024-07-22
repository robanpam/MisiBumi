@extends('layout.master')

@section('title', 'Detail Artikel')

@section('content')
    <div class="container mt-5"
        style="font-family: 'Poppins', sans-serif; padding-top: 20px; padding-left: 20px; padding-right: 20px;">
        <h1 class="text-center">{{ $artikels->judul_artikel }}</h1>
        <p class="text-center"><strong>Oleh: {{ $admins1->first()->name }}</strong></p>

        <div class="text-center">
            <img src="{{ asset($artikels->gambar_artikel) }}" alt="Planting Trees"
                class="article-image img-fluid mb-4" style="max-width: 100%; height: auto;">
        </div>

        <p class="text-end">{{ $formattedDate }}</p>
        <p class="text-justify" style="text-align: justify;">{{ $artikels->isi_artikel }}</p>
    </div>
@endsection()
