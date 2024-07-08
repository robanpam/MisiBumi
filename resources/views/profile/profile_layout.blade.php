@extends('layout.master')

@section('title', 'Profile')

@section('css', asset('css/profile/profile_layout.css'))

@section('content')
    <div class="container">
        <div class="section d-flex flex-column justify-content-around align-items-stretch">
            <div class="row">
                <div class="col-12 d-flex flex-column justify-content-center align-items-center">
                    <div class="profile"></div>
                    <h2>Sukma</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 d-flex flex-column justify-content-center align-items-center">
                    <h1>5,89M</h1>
                    <p>Donasi Terkumpul</p>
                    <div class="green-line"></div>
                </div>
                <div class="col-md-3 d-flex flex-column justify-content-center align-items-center">
                    <h1>321,3k</h1>
                    <p>Pohon Terkumpul</p>
                    <div class="green-line"></div>
                </div>
                <div class="col-md-3 d-flex flex-column justify-content-center align-items-center">
                    <h1>231,4 ton</h1>
                    <p>Emisi Terkumpul</p>
                    <div class="green-line"></div>
                </div>
                <div class="col-md-3 d-flex flex-column justify-content-center align-items-center">
                    <h1>1,3k</h1>
                    <p>Kampanye</p>
                    <div class="green-line"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-3">
                <ul class="list-unstyled">
                    <li class="nav-item tabs py-2 ps-2 active-tab">Histori Misi</li>
                    <li class="nav-item tabs py-2 ps-2">Riwayat Kampanye</li>
                    <li class="nav-item tabs py-2 ps-2">Pengaturan</li>
                    <li class="nav-item tabs py-2 ps-2">Keluar</li>
                </ul>
                <!-- <div class="tabs active-tab d-flex align-items-center">
                    <p>Histori Misi</p>
                </div>
                <div class="tabs">
                    <p>Riwayat Kampanye</p>
                </div>
                <div class="tabs">
                    <p>Donasi</p>
                </div>
                <div class="tabs">
                    <p>Pengaturan</p>
                </div>
                <div class="tabs">
                    <p>Keluar</p>
                </div> -->
            </div>
        </div>
    </div>
@endsection('content')