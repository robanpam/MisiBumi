@extends('layout.master')

@section('title', 'Sign-In/Sign-Up')

@section('content')
    <!-- Card -->
    <div class="tab-content" style="display: flex; justify-content: center; align-items: center; height: 100vh;">
        <div class="container centered-card" style="width: 452px; font-family: 'Poppins';">
            <div class="card card-custom" style="padding: 30px; box-shadow: 0px 2px 50px rgba(128, 128, 128, 1);">
                <!-- Pills navs -->
                <ul class="nav nav-pills mb-4 justify-content-center" id="ex1" role="tablist" style="border-radius: 5px; font-size: 15px;">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active text-center" id="tab-login" data-bs-toggle="pill" href="#pills-login" role="tab"
                           aria-controls="pills-login" aria-selected="true"
                           style="width: 165px; background-color: #114232; border-color: #114232; 
                           border-top-left-radius: 5px; border-bottom-left-radius: 5px; border-top-right-radius: 0px; border-bottom-right-radius: 0px;
                           font-weight: 600;">LOGIN</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link text-center" id="tab-register" data-bs-toggle="pill" href="#pills-register" role="tab"
                           aria-controls="pills-register" aria-selected="false"
                           style="width: 165px; background-color: #D9D9D9; border-color: #D9D9D9; color: black;
                           border-top-left-radius: 0px; border-bottom-left-radius: 0px; border-top-right-radius: 5px; border-bottom-right-radius: 5px;
                           font-weight: 600;">REGISTER</a>
                    </li>
                </ul>
                <!-- Pills navs -->

                <!-- Pills content -->
                <div class="tab-content">
                    <!-- LOGIN -->
                    <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="tab-login">
                        <form>
                            <div class="form-outline mb-2 d-flex justify-content-center">
                                <!-- Email input -->
                                <div data-mdb-input-init class="form-outline mb-2">
                                    <input type="email" id="loginEmail" class="form-control" style="width: 330px; height: 36px; font-size: 12px;" placeholder="Email" />
                                </div>
                            </div>
                            
                            <div class="form-outline mb-2 d-flex justify-content-center">
                                <!-- Password input -->
                                <div data-mdb-input-init class="form-outline mb-2">
                                    <input type="password" id="loginPassword" class="form-control" style="width: 330px; height: 36px; font-size: 12px;" placeholder="Password" />
                                </div>
                            </div>

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
                    <div class="tab-pane fade" id="pills-register" role="tabpanel" aria-labelledby="tab-register">
                        <form>
                            <!-- Name input -->
                            <div data-mdb-input-init class="form-outline mb-3 d-flex justify-content-center">
                                <input type="text" id="registerName" class="form-control" style="width: 330px; height: 36px; font-size: 12px;" placeholder="Nama Lengkap" />
                            </div>

                            <!-- Email input -->
                            <div data-mdb-input-init class="form-outline mb-3 d-flex justify-content-center">
                                <input type="email" id="registerEmail" class="form-control" style="width: 330px; height: 36px; font-size: 12px;" placeholder="Email" />
                            </div>

                            <!-- Phone number -->
                            <div data-mdb-input-init class="form-outline mb-3 d-flex justify-content-center">
                                <input type="tel" id="registerNumber" class="form-control" style="width: 330px; height: 36px; font-size: 12px;" placeholder="Nomor Telepon / WhatsApp" />
                            </div>

                            <!-- Password input -->
                            <div data-mdb-input-init class="form-outline mb-3 d-flex justify-content-center">
                                <input type="password" id="registerPassword" class="form-control" style="width: 330px; height: 36px; font-size: 12px;" placeholder="Password" />
                            </div>

                            <!-- Password reinput -->
                            <div data-mdb-input-init class="form-outline mb-3 d-flex justify-content-center">
                                <input type="password" id="registerPasswordConfirmation" class="form-control" style="width: 330px; height: 36px; font-size: 12px;" placeholder="Ketik ulang password" />
                            </div>

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
@endsection()

@section('js')
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
@endsection
