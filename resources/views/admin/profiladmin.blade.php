@extends('layout.master')

@section('title', 'User Profile')

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
                            <img src="a-l-l-e-f-v-i-n-i-c-i-u-s-343875-unsplash.png" class="img-fluid rounded-circle" alt="Profile Image">
                        </div>
                        <div class="col-6 text-end">
                            <a href="profiladmin/gantiprofile/1"><img src="material-symbols_pencil.png" alt="" width="25"></a>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-4">
                            <strong>Nama</strong>
                        </div>
                        <div class="col-6">
                            PANDI
                        </div>
                        <div class="col-2 text-end">
                            <a href="profiladmin/gantinama/1"><img src="material-symbols_pencil.png" alt="" width="25"></a>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-4">
                            <strong>Tanggal Lahir</strong>
                        </div>
                        <div class="col-6">
                            17 Agustus 1945
                        </div>
                        <div class="col-2 text-end">
                            <a href="profiladmin/gantiTL/1"><img src="material-symbols_pencil.png" alt="" width="25"></a>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-4">
                            <strong>Gender</strong>
                        </div>
                        <div class="col-6">
                            Pria
                        </div>
                        <div class="col-2 text-end">
                            <a href="profiladmin/gantigender/1"><img src="material-symbols_pencil.png" alt="" width="25"></a>
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
                            <a href="profiladmin/gantisandi/1"><img src="material-symbols_pencil.png" alt="" width="25"></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mb-3">
                <div class="card-header">
                    <h5>Riwayat Artikel</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-10">
                            <p>32 artikel ditulis</p>
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
                            pandi@protprot.com
                        </div>
                        <div class="col-2 text-end">
                            <a href="profiladmin/gantiemail/1"><img src="material-symbols_pencil.png" alt="" width="25"></a>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-4">
                            <strong>Telepon</strong>
                        </div>
                        <div class="col-6">
                            0812345
                        </div>
                        <div class="col-2 text-end">
                            <a href="profiladmin/gantitelp/1"><img src="material-symbols_pencil.png" alt="" width="25"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Other Info Section -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5>Info Lainnya</h5>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-4">
                            <strong>Alamat</strong>
                        </div>
                        <div class="col-6">
                            RTB BCA
                        </div>
                        <div class="col-2 text-end">
                            <a href="profiladmin/gantialamat/1"><img src="material-symbols_pencil.png" alt="" width="30"></a>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-4">
                            <strong>Kode pos</strong>
                        </div>
                        <div class="col-6">
                            696969
                        </div>
                        <div class="col-2 text-end">
                            <a href="profiladmin/gantikodepos/1"><img src="material-symbols_pencil.png" alt="" width="25"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('css')
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

</style>
@endsection
