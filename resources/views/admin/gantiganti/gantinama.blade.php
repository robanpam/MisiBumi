@extends('layout.master')

@section('title', 'Ubah Nama')

@section('content')
<div class="container d-flex justify-content-center align-items-center full-height prot ">
    <div class="card boldborder" style="width: 100%; max-width: 80rem;">
        <div class="card-header">
            <h5>Ubah Nama</h5>
        </div>
        <div class="card-body">
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <form action="{{ route('updateNama') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <input type="text" class="form-control boldborder2" id="gantiUname" name="gantiUname" placeholder="Masukkan Nama baru" required value="{{ auth()->user()->nama }}">
                </div>
                <div class="mb-4">
                    <input type="password" class="form-control boldborder2" id="password_confirmation" name="password_confirmation" placeholder="Masukkan Kata sandi saat ini" required>
                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-success">Simpan</button>
                    <button type="button" class="btn btn-danger" onclick="window.history.back();">Tolak</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('more_files')
<style>
    .card-header {
        background-color: #f8f9fa;
        font-weight: bold;
    }
    .card-body {
        background-color: #fff;
        border-radius: 20rem
    }
    .form-label {
        font-weight: bold;
    }
    .btn {
        padding: 10px 20px;
        border-radius: 20rem;
    }
    .btn-success {
        background-color: #114232;
        border-color: #114232;
        margin-right: 1rem

    }
    .btn-danger {
        background-color: #853B3B;
        border-color: #853B3B;
    }
    .vh-100 {
        min-height: 100vh;
    }
    .prot div{
      box-shadow:  50rem rgba(0, 0, 0, 0.1);
    }
    .full-height {
        min-height: 70vh;

    }
    .boldborder {
      border: 1px solid #000;
    }
    .boldborder2{
      border: 0.1px solid #000;
      background-color: #F9F9F9;
    }
</style>
@endsection
