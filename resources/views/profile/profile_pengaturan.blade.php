@extends('profile.profile_layout')

@section('active_pengaturan', 'active-tab')

@section('ins')
    <div class="row">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="col-12 p-2">
            <div class="pic-section d-flex align-items-center">
                <div class="pic"></div>
                <button class="btn btn-success ms-4">Unggah Foto Profil</button>
            </div>
        </div>
    </div>
    <form  method="POST" action="{{ route('profile.update') }}">
        <div class="row mb-3">
            @csrf
            @method('PUT')
            <div class="col-12 d-flex flex-column">
                <label for="name" class="form-label">Nama</label>
                <input name="name" value="{{ Session::has('name') ? Session::get('name') : auth()->user()->name }}" type="text" class="form-control" id="name" value="">
                @error('name')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>
            <div class="col-12 d-flex flex-column">
                <label for="email" class="form-label">Email</label>
                <input name="email" value="{{ Session::has('email') ? Session::get('email') : auth()->user()->email }}" type="email" class="form-control" id="email">
                @error('email')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div>
        </div>
            <!-- <div class="col-12 d-flex flex-column">
                <label for="password" class="form-label">Password</label>
                <input name="password" type="password" class="form-control" id="password">
                @error('password')
                    <p class="error-message">{{ $message }}</p>
                @enderror
            </div> -->
        <div class="col-12 d-flex flex-column">
            <label for="phone"class="form-label">No. Telepon</label>
            <input name="nomor_telepon" value="{{ Session::has('nomor_telepon') ? Session::get('nomor_telepon') : auth()->user()->nomor_telepon }}" type="tel" class="form-control" id="phone">
            @error('nomor_telepon')
                <p class="error-message">{{ $message }}</p>
            @enderror
        </div>
    </form>
    <div class="row">
        <div class="col-3 mt-3 ms-auto d-flex justify-content-end">
            <button class="btn btn-success">Simpan Perubahan</button>
        </div>
    </div>
@endsection('ins')