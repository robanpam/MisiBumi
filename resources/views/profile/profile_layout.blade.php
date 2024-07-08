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
                <ul class="list-unstyled ">
                    <a href="" class="text-decoration-none text-dark">
                        <li class="nav-item tabs py-2 ps-2 @yield('active_history')">
                            <i class="fa-solid fa-clock"></i>
                            Histori Misi
                        </li>
                    </a>
                    <a href="" class="text-decoration-none text-dark">
                        <li class="nav-item tabs py-2 ps-2 @yield('active_kampanye')">
                            <i class="fa-solid fa-users"></i>
                            Riwayat Kampanye
                        </li>
                    </a>
                    <a href="" class="text-decoration-none text-dark">
                        <li class="nav-item tabs py-2 ps-2 @yield('active_pengaturan')">
                            <i class="fa-solid fa-gear"></i>
                            Pengaturan
                        </li>
                    </a>
                    <a href="" class="text-decoration-none text-dark">
                        <li class="nav-item tabs py-2 ps-2 @yield('active_keluar')">
                            <i class="fa-solid fa-arrow-right-from-bracket"></i>
                            Keluar
                        </li>
                    </a>
                </ul>
            </div>
            <div class="col-9">
                @yield('ins')
            </div>
        </div>
    </div>
@endsection('content')