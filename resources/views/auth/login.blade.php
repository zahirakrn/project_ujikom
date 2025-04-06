<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8" />
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc." />
    <meta name="author" content="Zoyothemes" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
   <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('admiiin/assets/logo/tb-96x96.png') }}">

    <!-- App css -->
    <link href="{{ asset('admiiin/assets/css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-style" />

    <!-- Custom CSS -->
    <style>

        .row-full-height {
            height: 100vh;
            display: flex;
            align-items: center;
        }

        /* Batas lebar form & posisi kiri */
        .login-container {
            max-width: 400px;
            width: 100%;
            margin-left: 150px; /* Jarak dari kiri */
        }

        /* Styling input & button */
        .form-control {
            padding: 12px;
            font-size: 16px;
            border-radius: 6px;
        }

        .btn-custom {
            width: 100%;
            padding: 12px;
            font-size: 16px;
            border-radius: 6px;
        }
    </style>
</head>

<body class="bg-white-subtle">
    <div class="account-page">
        <div class="container-fluid p-0">
            <div class="row g-0 row-full-height">
                <!-- Bagian Form Login -->
                <div class="col-xl-5 d-flex align-items-center">
                    <div class="login-container">
                        <div class="card p-4 shadow">
                            <div class="card-body">
                                <div class="text-center mb-3">
                                    <img src="{{ asset('admiiin/assets/logo/sidebar.png') }}" height="75" alt="Logo">
                                </div>

                                <h3 class="text-dark text-center">Selamat Datang di Admin! 👋</h3>

                                <form class="row g-3 mt-3" action="{{ route('login') }}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label for="email" class="form-label">Masukan Email</label>
                                        <input type="email" name="email"
                                            class="form-control @error('email') is-invalid @enderror" id="email"
                                            placeholder="Enter your email">
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="password" class="form-label">Kata Sandi</label>
                                        <input type="password" name="password"
                                            class="form-control @error('password') is-invalid @enderror" id="password"
                                            placeholder="Enter your password" required>
                                    </div>

                                    <!-- Tombol Masuk -->
                                    <div class="d-grid mt-3">
                                        <button type="button btn-custom" class="btn btn-outline-dark">Masuk</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Bagian Kanan -->
                <div class="col-xl-7">
                    <div class="account-page-bg p-md-5 p-4 d-flex align-items-center justify-content-center">
                        <div class="text-center">
                            <div class="auth-image">
                                <img src="{{ asset('admiiin/assets/logo/tb.png') }}" width="350" height="350">
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Vendor -->
    <script src="{{ asset('admiiin/assets/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admiiin/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('admiiin/assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('admiiin/assets/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('admiiin/assets/libs/waypoints/lib/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('admiiin/assets/libs/jquery.counterup/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('admiiin/assets/libs/feather-icons/feather.min.js') }}"></script>

    <!-- App js-->
    <script src="{{ asset('admiiin/assets/js/app.js') }}"></script>

</body>

</html>
