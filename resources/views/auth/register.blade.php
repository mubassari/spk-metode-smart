<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="img/logo/logo.png" rel="icon">
    <title>Aplikasi SPK Metode Smart</title>
    <link href="{{ asset('assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/ruang-admin.min.css') }}" rel="stylesheet">

</head>

<body class="bg-gradient-login">
    <!-- Login Content -->
    <div class="container-login">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-12 col-md-9">
                <div class="card shadow-sm my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="login-form">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Register</h1>
                                    </div>
                                    <form class="user mb-5" action="{{ route('register') }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <input type="text" name="nama"
                                                class="form-control" @error('nama') is-invalid @enderror"
                                                placeholder="Masukkan Nama" value="{{ old('nama', '') }}">
                                            <x-errormessage error="nama" />
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="email"
                                                class="form-control" @error('email') is-invalid @enderror"
                                                placeholder="Masukkan Email" value="{{ old('nama', '') }}">
                                            <x-errormessage error="email" />
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <input type="password" name="password"
                                                    class="form-control password" @error('password') is-invalid @enderror"
                                                    placeholder="Masukkan Password">
                                                <div class="input-group-append toggle-password">
                                                    <span class="input-group-text">
                                                        <i class="fas fa-eye-slash toggle-password-icon"></i>
                                                    </span>
                                                </div>
                                            </div>
                                            <x-errormessage error="password" />
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <input type="password" name="konfirmasi_password"
                                                    class="form-control password" @error('password') is-invalid @enderror"
                                                    placeholder="Konfirmasi Password">
                                                <x-errormessage error="konfirmasi_password" />
                                                <div class="input-group-append toggle-password">
                                                    <span class="input-group-text">
                                                        <i class="fas fa-eye-slash toggle-password-icon"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <button class="btn btn-lg btn-primary btn-block" type="submit">Daftar</button>
                                    </form>
                                    <div class="text-center">
                                        Sudah mempunyai akun? <a class="font-weight-bold small"
                                            href="{{ route('login') }}">Masuk</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Login Content -->
    <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('assets/js/ruang-admin.min.js') }}"></script>
    <script>
        $(document).ready(function(){
            let button =  $('.toggle-password-icon');
            $('.toggle-password').click(function(){
                let password = $('.password');
                if(password.attr("type")== "password") {
                    console.log(button)
                    password.attr("type","text");
                    button.removeClass('fa-eye-slash').addClass('fa-eye');
                } else {
                    password.attr("type","password");
                    button.removeClass('fa-eye').addClass('fa-eye-slash');
                }
            })
        });
    </script>

</body>

</html>
