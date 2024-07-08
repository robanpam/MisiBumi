@extends('layout.master')

@section('title', 'Password Reset')

@section('content')
    <!-- Card -->
    <div class="tab-content" style="display: flex; justify-content: center; align-items: center; height: 100vh;">
        <div class="container centered-card" style="width: 452px; font-family: 'Poppins';">
            <div class="card card-custom" style="padding: 50px; box-shadow: 0px 2px 50px rgba(128, 128, 128, 1);">
                <p style="font-weight: 600; text-align: center;">PASSWORD RESET</p>
                <form style="text-align: center;">
                    <!-- Email input -->
                    <div data-mdb-input-init class="form-outline mb-4" style="margin: 0 auto; width: 330px;">
                        <input type="email" id="resetEmail" class="form-control" style="width: 100%; height: 36px; font-size: 12px" placeholder="Email"/>
                    </div>
                    
                    <!-- Submit button -->
                    <div class="d-flex justify-content-center">
                        <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-block mb-2" style="width: 330px; border-radius: 20px;
                        font-size: 15px; background-color: #114232; border-color: #114232; font-weight: 600; margin-bottom: 10px;">Kirim</button>
                    </div>

                    <!-- Back button -->
                    <div class="d-flex justify-content-center">
                        <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-block" style="width: 330px; border-radius: 20px;
                        font-size: 15px; background-color: #114232; border-color: #114232; font-weight: 600;">Kembali</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Card -->
@endsection
