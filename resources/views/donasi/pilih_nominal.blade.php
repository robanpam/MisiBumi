@extends('layout.master')

@section('title', 'Pilih Nominal Dominasi')

@section('css', asset('css/pohon/pohon.css'))

@section('content')
<div class="div">
    <form method="POST" action="{{ route('donasi.store') }}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" value="{{ auth()->user()->id }}" id='user_id' name="user_id">
        <input type="hidden" value="{{ $kampanye_id }}" id='kampanye_id' name="kampanye_id">
        <input type="hidden" value="10000" id='nilai_donasi' name="nilai_donasi">
    <button type="submit" class="btn btn-success btnDonasi"><strong>Next</strong></button>
    </form>
</div>
@endsection

@section('js')
@endsection
