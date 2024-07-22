@extends('layout.master')

@section('title', 'Profile')

@section('css', asset('css/profile/profile_layout.css'))

@section('content')
    <div class="container profile-m">
        @yield('flash-msg')
            <div class="row mb-5">
                <div class="col-12 d-flex flex-column justify-content-center align-items-center custom-file-upload-placeholder">
                    <img src="{{ asset('storage/profile_pictures/' . auth()->user()->profile_photo) }}" class="profile" alt="">
                    @yield('change-btn')
                    <h2>{{ auth()->user()->name }}</h2>
                </div>
            </div>
            <div class="row mb-5">
                <div class="col-md-3 col-6 d-flex flex-column justify-content-center align-items-center stats">
                    <h1>{{ $dcount }}</h1>
                    <p>Total Donasi</p>
                    <div class="green-line"></div>
                </div>
                <div class="col-md-3 col-6 d-flex flex-column justify-content-center align-items-center stats">
                    <h1>{{ $kcount }}</h1>
                    <p>Kampanye</p>
                    <div class="green-line"></div>
                </div>
                <div class="col-md-3 col-6 d-flex flex-column justify-content-center align-items-center stats">
                    <h1>{{ $pcount }}</h1>
                    <p>Pohon Ditanam</p>
                    <div class="green-line"></div>
                </div>
                <div class="col-md-3 col-6 d-flex flex-column justify-content-center align-items-center stats">
                    <h1>231,4 ton</h1>
                    <p>Emisi Terserap</p>
                    <div class="green-line"></div>
                </div>
            </div>
        <div class="row">
            <div class="col-md-3 col-12">
                <ul class="list-unstyled ">
                    <a href="{{ route('profile.history') }}" class="text-decoration-none text-dark">
                        <li class="nav-item tabs py-2 ps-2 @yield('active_history')">
                            <i class="fa-solid fa-clock"></i>
                            Histori Misi
                        </li>
                    </a>
                    <a href="{{ route('profile.kampanye') }}" class="text-decoration-none text-dark">
                        <li class="nav-item tabs py-2 ps-2 @yield('active_kampanye')">
                            <i class="fa-solid fa-users"></i>
                            Riwayat Kampanye
                        </li>
                    </a>
                    <a href="{{ route('profile.pengaturan') }}" class="text-decoration-none text-dark">
                        <li class="nav-item tabs py-2 ps-2 @yield('active_pengaturan')">
                            <i class="fa-solid fa-gear"></i>
                            Pengaturan
                        </li>
                    </a>
                    <a href="{{ route('profile.logout') }}" class="text-decoration-none text-dark">
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