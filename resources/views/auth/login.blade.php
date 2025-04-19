<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8" />
    <title>TB Kurnia Jaya - Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="TB Kurnia Jaya Admin Portal" />
    <meta name="author" content="TB Kurnia Jaya" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('admiiin/assets/logo/tb-96x96.png') }}">

    <!-- App css -->
    <link href="{{ asset('admiiin/assets/css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-style" />

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Custom CSS -->
    <style>
        :root {
            --primary-color: #9e9e9e;         /* Light gray instead of blue */
            --secondary-color: #616161;       /* Darker gray */
            --accent-color: #757575;          /* Medium gray accent */
            --light-color: #f5f5f5;           /* Very light gray */
            --dark-color: #424242;            /* Dark gray */
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #f5f5f5 0%, #e0e0e0 100%);
            height: 100vh;
            margin: 0;
            overflow: hidden;
        }

        .account-page {
            height: 100vh;
        }

        .row-full-height {
            height: 100vh;
        }

        .login-container {
            max-width: 450px;
            width: 100%;
            margin-left: 100px;
            position: relative;
            z-index: 2;
        }

        .card {
            border-radius: 15px;
            border: none;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1), 0 5px 15px rgba(0, 0, 0, 0.07);
            overflow: hidden;
            backdrop-filter: blur(10px);
            background: rgba(255, 255, 255, 0.95);
            transition: all 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15), 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .card-body {
            padding: 2.5rem;
        }

        .form-control {
            padding: 12px 15px;
            font-size: 15px;
            border-radius: 10px;
            border: 1px solid #e0e0e0;
            background-color: #f9f9f9;
            transition: all 0.3s;
        }

        .form-control:focus {
            box-shadow: 0 0 0 3px rgba(158, 158, 158, 0.25);
            border-color: var(--primary-color);
            background-color: #fff;
        }

        .input-group {
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        .input-group-text {
            cursor: pointer;
            background-color: var(--light-color);
            border: none;
            transition: all 0.3s;
        }

        .input-group-text:hover {
            background-color: var(--primary-color);
            color: white;
        }

        .form-label {
            font-weight: 500;
            color: var(--dark-color);
            margin-bottom: 8px;
            font-size: 0.9rem;
        }

        .btn-custom {
            width: 100%;
            padding: 12px;
            font-size: 16px;
            border-radius: 10px;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-weight: 600;
            position: relative;
            overflow: hidden;
            transition: all 0.3s;
            background: linear-gradient(45deg, var(--primary-color), #757575);
            border: none;
            color: white;
        }

        .btn-custom:hover {
            transform: translateY(-2px);
            box-shadow: 0 7px 14px rgba(158, 158, 158, 0.3);
        }

        .btn-custom:before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: 0.5s;
        }

        .btn-custom:hover:before {
            left: 100%;
        }

        .account-page-bg {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            height: 100%;
            position: relative;
        }

        .auth-image {
            position: relative;
            animation: float 6s ease-in-out infinite;
        }

        .auth-image img {
            max-width: 100%;
            height: auto;
            filter: drop-shadow(0 10px 15px rgba(0, 0, 0, 0.3));
            transition: all 0.3s ease;
        }

        .auth-image img:hover {
            transform: scale(1.05);
        }

        .decorative-circle {
            position: absolute;
            border-radius: 50%;
            opacity: 0.1;
            background: white;
        }

        #circle1 {
            width: 300px;
            height: 300px;
            top: 10%;
            right: 10%;
            animation: pulse 10s infinite alternate;
        }

        #circle2 {
            width: 200px;
            height: 200px;
            bottom: 15%;
            left: 5%;
            animation: pulse 7s infinite alternate-reverse;
        }

        #circle3 {
            width: 150px;
            height: 150px;
            top: 60%;
            right: 20%;
            animation: pulse 12s infinite alternate;
        }

        @keyframes float {
            0% {
                transform: translateY(0px);
            }
            50% {
                transform: translateY(-20px);
            }
            100% {
                transform: translateY(0px);
            }
        }

        @keyframes pulse {
            0% {
                transform: scale(1);
                opacity: 0.1;
            }
            50% {
                transform: scale(1.05);
                opacity: 0.15;
            }
            100% {
                transform: scale(1);
                opacity: 0.1;
            }
        }

        .invalid-feedback {
            color: #e57373;
            font-size: 0.85rem;
            margin-top: 5px;
        }

        .logo-container {
            position: relative;
            margin-bottom: 2rem;
        }

        .logo-container:after {
            content: '';
            position: absolute;
            width: 50px;
            height: 3px;
            background: linear-gradient(90deg, var(--primary-color), transparent);
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
        }

        .welcome-text {
            margin-bottom: 1.5rem;
            text-align: center;
        }

        .welcome-text h4 {
            font-weight: 600;
            color: var(--dark-color);
            margin-bottom: 0.5rem;
        }

        .welcome-text p {
            color: #757575;
            font-size: 0.9rem;
        }

        @media (max-width: 1200px) {
            .login-container {
                margin-left: 50px;
            }
        }

        @media (max-width: 992px) {
            .login-container {
                margin: 0 auto;
                padding: 0 20px;
            }

            .row-full-height {
                flex-direction: column-reverse;
            }

            .col-xl-7 {
                height: 35vh;
            }

            .col-xl-5 {
                height: 65vh;
            }
        }
    </style>
</head>

<body>
    <div class="account-page">
        <div class="container-fluid p-0">
            <div class="row g-0 row-full-height">
                <!-- Login Form Section -->
                <div class="col-xl-5 d-flex align-items-center justify-content-center">
                    <div class="login-container">
                        <div class="card p-0">
                            <div class="card-body">
                                <div class="logo-container text-center">
                                    <img src="{{ asset('admiiin/assets/logo/sidebar.png') }}" height="75" alt="Logo">
                                </div>

                                <div class="welcome-text">
                                    <h4>Selamat Datang!</h4>
                                    <p>Silakan masuk ke akun Anda untuk melanjutkan</p>
                                </div>

                                <form class="row g-3" action="{{ route('login') }}" method="POST">
                                    @csrf

                                    <!-- Email Input -->
                                    <div class="form-group mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <div class="input-group">
                                            <span class="input-group-text">
                                                <i data-feather="mail"></i>
                                            </span>
                                            <input type="email" name="email" id="email"
                                                class="form-control @error('email') is-invalid @enderror"
                                                placeholder="Masukkan email Anda" />
                                        </div>
                                        @error('email')
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <!-- Password Input -->
                                    <div class="form-group mb-4">
                                        <label for="password" class="form-label">Kata Sandi</label>
                                        <div class="input-group" id="show_hide_password">
                                            <span class="input-group-text">
                                                <i data-feather="lock"></i>
                                            </span>
                                            <input type="password" name="password" id="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                placeholder="Masukkan kata sandi Anda" required />
                                            <span class="input-group-text" onclick="togglePassword()"
                                                id="togglePassword">
                                                <i data-feather="eye-off"></i>
                                            </span>
                                        </div>
                                        @error('password')
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <!-- Login Button -->
                                    <div class="d-grid mt-2">
                                        <button type="submit" class="btn btn-custom">Masuk</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Side Branding Section -->
                <div class="col-xl-7">
                    <div class="account-page-bg d-flex align-items-center justify-content-center">
                        <div class="decorative-circle" id="circle1"></div>
                        <div class="decorative-circle" id="circle2"></div>
                        <div class="decorative-circle" id="circle3"></div>
                        <div class="text-center">
                            <div class="auth-image">
                                <img src="{{ asset('admiiin/assets/logo/tb.png') }}" width="400" height="400" alt="TB Kurnia Jaya">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('admiiin/assets/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admiiin/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('admiiin/assets/libs/feather-icons/feather.min.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            feather.replace();
        });

        function togglePassword() {
            const password = document.getElementById('password');
            const toggle = document.getElementById('togglePassword').querySelector('i');

            if (password.type === "password") {
                password.type = "text";
                toggle.setAttribute("data-feather", "eye");
            } else {
                password.type = "password";
                toggle.setAttribute("data-feather", "eye-off");
            }

            feather.replace() ; // refresh icon after change
        }
    </script>
</body>
</html>
