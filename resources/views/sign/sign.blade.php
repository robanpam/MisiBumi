@extends('layout.master')

@section('title', 'Sign-In/Sign-Up')

@section('content')
    <!-- Card -->
    <div class="tab-content" style="display: flex; justify-content: center; align-items: center; height: 80vh;">
        <div class="container centered-card" style="width: 452px; font-family: 'Poppins';">
            <div class="card card-custom" style="padding: 30px; box-shadow: 0px 2px 50px rgba(128, 128, 128, 1);">
                <!-- Pills navs -->
                <ul class="nav nav-pills mb-4 justify-content-center" id="ex1" role="tablist" style="border-radius: 5px; font-size: 15px;">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link {{ session('form') != 'register' ? 'active' : '' }} text-center" id="tab-login" data-bs-toggle="pill" href="#pills-login" role="tab"
                           aria-controls="pills-login" aria-selected="true"
                           style="width: 165px; background-color: {{ session('form') != 'register' ? '#114232' : '#D9D9D9' }}; border-color: {{ session('form') != 'register' ? '#114232' : '#D9D9D9' }}; 
                           border-top-left-radius: 5px; border-bottom-left-radius: 5px; border-top-right-radius: 0px; border-bottom-right-radius: 0px;
                           font-weight: 600; color: {{ session('form') != 'register' ? 'white' : 'black' }};">LOGIN</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link {{ session('form') == 'register' ? 'active' : '' }} text-center" id="tab-register" data-bs-toggle="pill" href="#pills-register" role="tab"
                           aria-controls="pills-register" aria-selected="false"
                           style="width: 165px; background-color: {{ session('form') == 'register' ? '#114232' : '#D9D9D9' }}; border-color: {{ session('form') == 'register' ? '#114232' : '#D9D9D9' }}; 
                           color: {{ session('form') == 'register' ? 'white' : 'black' }};
                           border-top-left-radius: 0px; border-bottom-left-radius: 0px; border-top-right-radius: 5px; border-bottom-right-radius: 5px;
                           font-weight: 600;">REGISTER</a>
                    </li>
                </ul>
                <!-- Pills navs -->

                <!-- Pills content -->
                <div class="tab-content">
                    <!-- LOGIN -->
                    <div class="tab-pane fade {{ session('form') != 'register' ? 'show active' : '' }}" id="pills-login" role="tabpanel" aria-labelledby="tab-login">
                        <form method="POST" action={{ route('session.login') }}>
                            @csrf
                            <div class="form-outline mb-2 d-flex justify-content-center">
                                <!-- Email input -->
                                <div data-mdb-input-init class="form-outline mb-2">
                                    <input name="email" value="{{ Session::get('email') }}" type="email" id="loginEmail" class="form-control" style="width: 330px; height: 36px; font-size: 12px;" placeholder="Email" />
                                </div>
                            </div>
                            @if ($errors->has('email') && session('form') == 'login')
                                <p class="error-message ms-3">{{ $errors->first('email') }}</p>
                            @endif
                            <div class="form-outline mb-2 d-flex justify-content-center">
                                <!-- Password input -->
                                <div data-mdb-input-init class="form-outline mb-2">
                                    <input name="password" type="password" id="loginPassword" class="form-control" style="width: 330px; height: 36px; font-size: 12px;" placeholder="Password" />
                                </div>
                            </div>
                            @if ($errors->has('password') && session('form') == 'login')
                                <p class="error-message ms-3">{{ $errors->first('password') }}</p>
                            @endif
                            @if ($errors->has('credentials') && session('form') == 'login')
                                <p class="error-message ms-3">{{ $errors->first('credentials') }}</p>
                            @endif
                            <!-- Submit button -->
                            <div class="col-md d-flex justify-content-center">
                                <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-block mb-4" style="width: 330px; border-radius: 20px; 
                                font-size: 15px; background-color: #114232; border-color: #114232; font-weight: 600;">Login</button>
                            </div>

                            <!-- Password reset -->
                            <div class="d-flex justify-content-center">
                                <div class="w-100" style="max-width: 330px;">
                                    <div class="d-flex justify-content-end" style="font-size: 12px;">
                                        <a href="/password-reset">Lupa password?</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <!-- REGISTER -->
                    <div class="tab-pane fade {{ session('form') == 'register' ? 'show active' : '' }}" id="pills-register" role="tabpanel" aria-labelledby="tab-register">
                        <form action="{{ route('session.register') }}" method="POST">
                            @csrf
                            <!-- Name input -->
                            <div data-mdb-input-init class="form-outline mb-3 d-flex justify-content-center">
                                <input name="nama" value="{{ Session::get('nama') }}" type="text" id="registerName" class="form-control" style="width: 330px; height: 36px; font-size: 12px;" placeholder="Nama Lengkap" />
                            </div>
                            @if ($errors->has('nama') && session('form') == 'register')
                                <p class="error-message ms-3">{{ $errors->first('nama') }}</p>
                            @endif
                            <!-- Email input -->
                            <div data-mdb-input-init class="form-outline mb-3 d-flex justify-content-center">
                                <input name="email" value="{{ Session::get('email') }}" type="email" id="registerEmail" class="form-control" style="width: 330px; height: 36px; font-size: 12px;" placeholder="Email" />
                            </div>
                            @if ($errors->has('email') && session('form') == 'register')
                                <p class="error-message ms-3">{{ $errors->first('email') }}</p>
                            @endif
                            <!-- Phone number -->
                            <div data-mdb-input-init class="form-outline mb-3 d-flex justify-content-center">
                                <input name="phone" value="{{ Session::get('phone') }}" type="tel" id="registerNumber" class="form-control" style="width: 330px; height: 36px; font-size: 12px;" placeholder="Nomor Telepon / WhatsApp" />
                            </div>
                            @if ($errors->has('phone') && session('form') == 'register')
                                <p class="error-message ms-3">{{ $errors->first('phone') }}</p>
                            @endif
                            <!-- Password input -->
                            <div data-mdb-input-init class="form-outline mb-3 d-flex justify-content-center">
                                <input name="password" type="password" id="registerPassword" class="form-control" style="width: 330px; height: 36px; font-size: 12px;" placeholder="Password" />
                            </div>
                            @if ($errors->has('password') && session('form') == 'register')
                                <p class="error-message ms-3">{{ $errors->first('password') }}</p>
                            @endif
                            <!-- Password reinput -->
                            <div data-mdb-input-init class="form-outline mb-3 d-flex justify-content-center">
                                <input name="password_confirmation" type="password" id="registerPasswordConfirmation" class="form-control" style="width: 330px; height: 36px; font-size: 12px;" placeholder="Ketik ulang password" />
                            </div>
                            @if ($errors->has('password_confirmation') && session('form') == 'register')
                                <p class="error-message ms-3">{{ $errors->first('repassword') }}</p>
                            @endif
                            <!-- Submit button -->
                            <div class="col-md d-flex justify-content-center">
                                <!-- Submit button -->
                                <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-block mb-4" style="width: 330px; border-radius: 20px; 
                                font-size: 15px; background-color: #114232; border-color: #114232; font-weight: 600;">Register</button>
                            </div>
                        </form>
                    </div>
                    <!-- REGISTER -->

                </div>
                <!-- Pills content -->

            </div>
        </div>
    </div>
    <!-- Card -->

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const loginTab = document.getElementById('tab-login');
            const registerTab = document.getElementById('tab-register');

            loginTab.addEventListener('click', function () {
                loginTab.style.backgroundColor = '#114232';
                loginTab.style.color = 'white';
                registerTab.style.backgroundColor = '#D9D9D9';
                registerTab.style.color = 'black';
            });

            registerTab.addEventListener('click', function () {
                registerTab.style.backgroundColor = '#114232';
                registerTab.style.color = 'white';
                loginTab.style.backgroundColor = '#D9D9D9';
                loginTab.style.color = 'black';
            });
        });
    </script>
@endsection()
