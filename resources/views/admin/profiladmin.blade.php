@extends('layout.admin')

@section('title', 'User Profile')

@section('profile_aktif', 'active')

@section('content')
<div class="container mt-4">
    <!-- Basic Info Section -->
    <div class="row">
        <div class="col-md-8 mb-4">
            <div class="card h-100">
                <div class="card-header">
                    <h5>Info Dasar</h5>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-4">
                            <strong>Foto Profil</strong>
                        </div>
                        <div class="col-2 ">
                            <img src="{{ asset('profile_pictures/' . auth()->user()->profile_photo) }}" class="img-fluid rounded-circle" alt="Profile Image">
                        </div>
                        <div class="col-6 text-end">
                            <a href="{{ route('showUpdateProfileForm') }}"><img src="{{ asset('material-symbols_pencil.png') }}" alt="" width="25"></a>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-4">
                            <strong>Nama</strong>
                        </div>
                        <div class="col-6">
                            <h3>{{ auth()->user()->name }}</h3>
                        </div>
                        <div class="col-2 text-end">
                            <a href="{{ route('gantinama') }}"><img src="{{ asset('material-symbols_pencil.png') }}" alt="" width="25"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card mb-3">
                <div class="card-header">
                    <h5>Kata Sandi</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-10">
                            <p>...........</p>
                        </div>
                        <div class="col-2 text-end">
                            <a href="{{ route('ubahkatasandi') }}"><img src="{{ asset('material-symbols_pencil.png') }}" alt="" width="25"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact Info Section -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5>Info Kontak</h5>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-4">
                            <strong>Email</strong>
                        </div>
                        <div class="col-6">
                            <p>{{ auth()->user()->email }}</p>
                        </div>
                        <div class="col-2 text-end">
                            <a href="{{ route('ubahemail') }}"><img src="{{ asset('material-symbols_pencil.png') }}" alt="" width="25"></a>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-4">
                            <strong>Telepon</strong>
                        </div>
                        <div class="col-6">
                            <p>{{ auth()->user()->nomor_telepon }}</p>
                        </div>
                        <div class="col-2 text-end">
                            <a href="{{ route('ubahnomortelpon') }}"><img src="{{ asset('material-symbols_pencil.png') }}" alt="" width="25"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Other Info Section -->
</div>
@endsection

@section('more_files')
<style>
    .card-header {
        background-color: #f8f9fa;
    }
    .card-body {
        background-color: #fff;
    }
    .rounded-circle {
        width: 100px;
        height: 100px;
    }
    .text-end a {
        color: #6c757d;
    }
    .mt-10{
        margin-top: 10rem;
    }
    .btn-sm {
        padding: 5px 10px;
        font-size: 0.875rem;
    }
    .text-white {
        color: white !important;
    }
</style>
@endsection
