@extends('profile.profile_layout')

@section('active_pengaturan', 'active-tab')

@section('ins')
    <div class="row">
        <div class="col-12 p-2">
            <div class="pic-section d-flex align-items-center">
                <div class="pic"></div>
                <button class="btn btn-success ms-4">Unggah Foto Profil</button>
            </div>
        </div>
    </div>
    <form  method="POST" action="">
        <div class="row mb-3">
            @csrf
            @method('PUT')
            <div class="col-md-6 col-12 d-flex flex-column">
                <label for="name" class="form-label">Nama</label>
                <input type="text" class="form-control" id="name" value="">
                @error('name')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>
            <div class="col-md-6 col-12 d-flex flex-column">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email">
                @error('email')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-12 d-flex flex-column">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password">
                @error('password')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>
            <div class="col-md-6 col-12 d-flex flex-column">
                <label for="phone"class="form-label">No. Telepon</label>
                <input type="tel" class="form-control" id="phone">
                @error('phone')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>
        </div>
    </form>
    <div class="row">
        <div class="col-3 mt-3 ms-auto d-flex justify-content-end">
            <button class="btn btn-success">Simpan Perubahan</button>
        </div>
    </div>
@endsection('ins')