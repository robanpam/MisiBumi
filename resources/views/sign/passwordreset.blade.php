@extends('layout.master')

@section('title', 'Password Reset')

@section('content')
<!-- Card -->
<div class="tab-content" style="display: flex; justify-content: center; align-items: center; height: 100vh;">
    <div class="container centered-card" style="width: 452px; font-family: 'Poppins';">
        <div class="card card-custom" style="padding: 50px; box-shadow: 0px 2px 50px rgba(128, 128, 128, 1);">
            <p style="font-weight: 600; text-align: center;">PASSWORD RESET</p>

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

            <form action="{{ route('password.update', ['token' => $token]) }}" method="POST" style="text-align: center;">
                @csrf

                <!-- Token input -->
                <input type="hidden" name="token" value="{{ $token ?? '' }}">

                <!-- Email input -->
                <div class="form-outline mb-4" style="margin: 0 auto; width: 330px;">
                    <input type="email" id="resetEmail" name="email" class="form-control" style="width: 100%; height: 36px; font-size: 12px;" placeholder="Email" value="{{ $email ?? '' }}" required/>
                </div>
                
                <!-- Password input -->
                <div class="form-outline mb-4" style="margin: 0 auto; width: 330px;">
                    <input type="password" id="resetPassword" name="password" class="form-control" style="width: 100%; height: 36px; font-size: 12px;" placeholder="New Password" required/>
                </div>

                <!-- Confirm Password input -->
                <div class="form-outline mb-4" style="margin: 0 auto; width: 330px;">
                    <input type="password" id="resetPasswordConfirmation" name="password_confirmation" class="form-control" style="width: 100%; height: 36px; font-size: 12px;" placeholder="Confirm Password" required/>
                </div>

                <!-- Submit button -->
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary btn-block mb-2" style="width: 330px; border-radius: 20px; font-size: 15px; font-weight: 600; margin-bottom: 10px;">Kirim</button>
                </div>

                <!-- Back button -->
                <div class="d-flex justify-content-center">
                    <a href="{{ route('session.init') }}" class="btn btn-primary btn-block" style="width: 330px; border-radius: 20px; font-size: 15px; font-weight: 600;">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Card -->
@endsection
