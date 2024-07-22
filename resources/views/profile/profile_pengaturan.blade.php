@extends('profile.profile_layout')

@section('active_pengaturan', 'active-tab')

@section('flash-msg')
@if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
@endsection

@section('change-btn')
    <!-- <input type="file" id="fileInput" class="file-input" accept="image/*">
    <div class="btn btn-success my-2">Unggah Foto Profil</div> -->
    <form id="profileForm" action="{{ route('profile.foto') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" id="fileInput" class="file-input" name="profile_picture" accept="image/*">
        <button type="button" id="changePicButton" class="btn btn-success my-2">Ganti Foto Profil</button>
        <!-- <button type="submit" class="btn btn-success">Upload</button> -->
    </form>
@endsection

@section('ins')
    <div class="row">
        
        <!-- <div class="col-12 p-2">
            <div class="pic-section d-flex align-items-center">
                <div class="pic"></div>
                <button class="btn btn-success ms-4">Unggah Foto Profil</button>
            </div>
        </div> -->
    </div>
    <form  method="POST" action="{{ route('profile.update') }}">
        <div class="row mb-3 gy-4">
            @csrf
            @method('PUT')
            <div class="col-12 d-flex flex-column">
                <label for="name" class="form-label mb-1">Nama</label>
                <input name="name" value="{{ Session::has('name') ? Session::get('name') : auth()->user()->name }}" type="text" class="form-control" id="name" value="">
                @error('name')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>
            <div class="col-12 d-flex flex-column">
                <label for="email" class="form-label mb-1">Email</label>
                <input name="email" value="{{ Session::has('email') ? Session::get('email') : auth()->user()->email }}" type="email" class="form-control" id="email">
                @error('email')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>
            <div class="col-12 d-flex flex-column">
                <label for="phone"class="form-label mb-1">No. Telepon</label>
                <input name="nomor_telepon" value="{{ Session::has('nomor_telepon') ? Session::get('nomor_telepon') : auth()->user()->nomor_telepon }}" type="tel" class="form-control" id="phone">
                @error('nomor_telepon')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>
            <div class="col-3 mt-3 ms-auto d-flex justify-content-end">
                <button class="btn btn-success">Simpan Perubahan</button>
            </div>
        </div>
    </form>
@endsection('ins')
    <!-- <div class="col-12 d-flex flex-column">
        <label for="password" class="form-label">Password</label>
        <input name="password" type="password" class="form-control" id="password">
        @error('password')
            <p class="error-message">{{ $message }}</p>
        @enderror
    </div> -->

@section('js')
    console.log('a')
    document.getElementById('changePicButton').addEventListener('click', function() {
            document.getElementById('fileInput').click();
        });

        document.getElementById('fileInput').addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.querySelector('.custom-file-upload-placeholder img').src = e.target.result;
                }
                reader.readAsDataURL(file);
            }
            document.getElementById('profileForm').submit();
    });
@endsection