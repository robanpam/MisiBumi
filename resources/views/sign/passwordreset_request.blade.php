@extends('layout.master')

@section('title', 'Request Password Reset')

@section('content')
<!-- Card -->
<div class="tab-content" style="display: flex; justify-content: center; align-items: center; height: 100vh;">
    <div class="container centered-card" style="width: 452px; font-family: 'Poppins';">
        <div class="card card-custom" style="padding: 50px; box-shadow: 0px 2px 50px rgba(128, 128, 128, 1);">
            <p style="font-weight: 600; text-align: center;">REQUEST PASSWORD RESET</p>

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            <form action="{{ route('password.email') }}" method="POST" style="text-align: center;">
                @csrf

                <!-- Email input -->
                <div data-mdb-input-init class="form-outline mb-4" style="margin: 0 auto; width: 330px;">
                    <input type="email" id="requestEmail" name="email" class="form-control" style="width: 100%; height: 36px; font-size: 12px" placeholder="Email" required/>
                </div>

                <!-- Submit button -->
                <div class="d-flex justify-content-center">
                    <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-block mb-2" style="width: 330px; border-radius: 20px; font-size: 15px; background-color: #114232; border-color: #114232; font-weight: 600; margin-bottom: 10px;">Kirim Link Reset</button>
                </div>

                <!-- Back button -->
                <div class="d-flex justify-content-center">
                    <a href="{{ route('session.init') }}" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-block" style="width: 330px; border-radius: 20px; font-size: 15px; background-color: #114232; border-color: #114232; font-weight: 600;">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Card -->
@endsection
