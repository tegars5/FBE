<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" href="{{ asset('assets/fujiyama-logo.png') }}" sizes="96x96" />
    <link rel="icon" type="image/svg+xml" href="{{ asset('assets/fujiyama-logo.svg') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/fujiyama-logo-32.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('assets/fujiyama-logo-96.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/fujiyama-logo-apple.png') }}">
    <link rel="shortcut icon" href="{{ asset('assets/fujiyama-logo.ico') }}" />
    <link rel="manifest" href="/site.webmanifest" />

    <!-- Title of the Page -->
    <title>{{ $title ?? 'Fujiyama Biomass Energy' }}</title>


    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* Import Google Fonts */
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');

        /* Color Variables */
        :root {
            --primary-green: #1b5e20;
            /* Dark Green */
            --secondary-green-medium: #228b22;
            /* Medium Green */
            --accent-green-light: #4caf50;
            /* Light Green */
            --beige-light: #f8f8e8;
            /* Light Beige */
            --beige-medium: #f5f5dc;
            /* Medium Beige */
            --white: #FFFFFF;
            --gray-100: #F7FAFC;
            --gray-200: #EDF2F7;
            --shadow-lg: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);

            /* Text Colors */
            --text-dark: #374151;
            /* Dark gray for general text */
            --text-light: #6b7280;
            /* Medium gray for secondary text */

            /* Colors for the 3D elements (adapted to green/beige/palm theme) */
            /* Menggunakan inspirasi warna dari cangkang sawit, api, dan biomassa */
            --shape-color-palm-brown: #5C4033;
            /* Warna coklat sawit */
            --shape-color-palm-dark-brown: #36281F;
            /* Coklat sawit yang lebih gelap */
            --shape-color-fire-orange: #FF8C00;
            /* Oranye api/energi */
            --shape-color-fire-yellow: #FFA500;
            /* Kuning api/energi */
            --shape-color-biomass-green: #6C9F4E;
            /* Hijau biomassa */
            --shape-color-biomass-dark-green: #4D7736;
            /* Hijau biomassa gelap */
            --shape-color-ash-gray: #A9A9A9;
            /* Abu-abu sisa pembakaran */
            --shape-color-light-ash-gray: #D3D3D3;
            /* Abu-abu terang */


            --shape-color-1-start: var(--shape-color-fire-orange);
            /* Sphere 1: Orange/Energy */
            --shape-color-1-end: var(--shape-color-fire-yellow);
            --shape-color-2-start: var(--shape-color-biomass-green);
            /* Sphere 2: Biomass Green */
            --shape-color-2-end: var(--shape-color-biomass-dark-green);
            --shape-color-3-start: var(--shape-color-palm-brown);
            /* Cube 1: Palm Shell Brown */
            --shape-color-3-end: var(--shape-color-palm-dark-brown);
            --shape-color-4-start: var(--shape-color-ash-gray);
            /* Cube 2: Ash Gray */
            --shape-color-4-end: var(--shape-color-light-ash-gray);
            --shape-color-5-start: var(--beige-medium);
            /* Cylinder: Beige */
            --shape-color-5-end: var(--beige-light);
            --shape-color-label-start: var(--primary-green);
            /* Label (e.g., PKS) */
            --shape-color-label-end: var(--secondary-green-medium);

            /* Shadow colors for 3D elements (adjusted to new shape colors) */
            --shadow-shape-1: rgba(255, 140, 0, 0.4);
            /* Orange shadow */
            --shadow-shape-2: rgba(108, 159, 78, 0.4);
            /* Green shadow */
            --shadow-shape-3: rgba(92, 64, 51, 0.4);
            /* Brown shadow */
            --shadow-shape-4: rgba(169, 169, 169, 0.4);
            /* Gray shadow */
            --shadow-shape-5: rgba(245, 245, 220, 0.4);
            /* Beige shadow */
            --shadow-shape-label: rgba(27, 94, 32, 0.4);
            /* Green shadow */

            /* Added/Modified for consistent page background */
            --login-page-bg-top: var(--beige-light);
            --login-page-bg-bottom: var(--beige-medium);

        }

        /* Global styles and base font */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html,
        body {
            height: 100%;
            width: 100%;
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            background: linear-gradient(135deg, var(--login-page-bg-top) 0%, var(--login-page-bg-bottom) 100%);
            overflow-x: hidden;
        }

        /* Login Container */
        .login-container {
            min-height: 100vh;
            width: 100vw;
            padding: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, var(--login-page-bg-top) 0%, var(--login-page-bg-bottom) 100%);
        }

        .login-card-wrapper {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            border-radius: 24px;
            overflow: hidden;
            box-shadow: var(--shadow-lg);
            backdrop-filter: blur(10px);
        }

        .login-row {
            min-height: 700px;
            background: var(--white);
            display: flex;
            width: 100%;
        }

        /* Left Column - Login Form */
        .login-form-column {
            background: var(--white);
            padding: 60px 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex: 0 0 42%;
            max-width: 500px;
        }

        .login-form-content {
            width: 100%;
            max-width: 400px;
        }

        .logo-wrapper {
            margin-bottom: 32px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .logo-image {
            /* Added this for the Fujiyama logo */
            width: 40px;
            height: 40px;
            object-fit: contain;
            margin-right: 12px;
            /* Spacing from title */
        }

        .logo-wrapper h2 {
            font-size: 24px;
            font-weight: 700;
            color: var(--text-dark);
            margin: 0;
            /* Remove default margin */
        }

        .welcome-section {
            margin-bottom: 32px;
            text-align: center;
        }

        .welcome-section .welcome-title {
            font-size: 32px;
            font-weight: 600;
            color: var(--text-dark);
            margin-bottom: 8px;
        }

        .welcome-section .welcome-subtitle {
            font-size: 16px;
            color: var(--text-light);
            margin-bottom: 0;
        }

        .form-group-custom {
            position: relative;
            margin-bottom: 24px;
        }

        .form-group-custom .form-control {
            border: 2px solid var(--gray-200);
            border-radius: 12px;
            padding: 16px 20px 16px 50px;
            font-size: 16px;
            transition: all 0.3s ease;
            background: var(--gray-100);
            width: 100%;
        }

        .form-group-custom .form-control:focus {
            border-color: var(--primary-green);
            background: var(--white);
            box-shadow: 0 0 0 3px rgba(27, 94, 32, 0.1);
        }

        .form-group-custom .icon-left {
            position: absolute;
            left: 18px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-light);
            font-size: 16px;
            z-index: 2;
        }

        .form-group-custom select.form-control {
            padding-left: 20px;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 20 20' fill='%23228b22'%3E%3Cpath fill-rule='evenodd' d='M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z' clip-rule='evenodd'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 1rem center;
            background-size: 1.2em 1.2em;
            padding-right: 2.5rem;
        }

        .toggle-password {
            background: none;
            border: none;
            padding: 0;
            margin: 0;
            color: var(--text-light);
        }

        .login-options {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 32px;
        }

        .remember-me .form-check-input {
            border: 2px solid var(--gray-200);
            border-radius: 4px;
        }

        .remember-me .form-check-input:checked {
            background-color: var(--primary-green);
            border-color: var(--primary-green);
        }

        .forgot-password-link {
            color: var(--primary-green) !important;
            font-weight: 500;
            text-decoration: none;
        }

        .login-button {
            background: linear-gradient(135deg, var(--primary-green), var(--secondary-green-medium));
            border: none;
            border-radius: 12px;
            padding: 16px 24px;
            font-size: 16px;
            font-weight: 600;
            color: white;
            transition: all 0.3s ease;
            box-shadow: 0 4px 12px rgba(27, 94, 32, 0.3);
            width: 100%;
        }

        .login-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(27, 94, 32, 0.4);
        }

        .register-now-link {
            color: var(--primary-green) !important;
            font-weight: 600;
        }

        /* Right Column - 3D Scene */
        .decorative-column {
            background: linear-gradient(135deg, var(--secondary-green-medium) 0%, var(--primary-green) 100%);
            position: relative;
            overflow: hidden;
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .decorative-content {
            position: relative;
            z-index: 2;
            width: 100%;
            height: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .brand-logo {
            text-align: center;
            margin-bottom: 40px;
        }

        .brand-image {
            max-width: 150px;
            height: auto;
            filter: brightness(1.2) drop-shadow(0 0 10px rgba(0, 0, 0, 0.2));
        }

        .scene-3d {
            position: relative;
            width: 100%;
            height: 400px;
            perspective: 1000px;
        }

        /* Geometric Shapes (Individual 3D elements) */
        .geometric-shapes {
            position: relative;
            width: 100%;
            height: 100%;
            transform-style: preserve-3d;
        }

        .shape {
            position: absolute;
            border-radius: 50%;
            /* Default to circle, override for cubes */
            animation: float 6s ease-in-out infinite;
        }

        .shape-sphere-1 {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, var(--shape-color-1-start), var(--shape-color-1-end));
            box-shadow: 0 10px 30px var(--shadow-shape-1);
            top: 20%;
            left: 20%;
        }

        .shape-sphere-2 {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, var(--shape-color-2-start), var(--shape-color-2-end));
            box-shadow: 0 8px 25px var(--shadow-shape-2);
            top: 60%;
            right: 25%;
            animation-delay: -2s;
        }

        .shape-cube-1 {
            width: 40px;
            height: 40px;
            border-radius: 8px;
            /* Override to cube */
            background: linear-gradient(135deg, var(--shape-color-3-start), var(--shape-color-3-end));
            box-shadow: 0 6px 20px var(--shadow-shape-3);
            top: 40%;
            left: 60%;
            animation-delay: -1s;
        }

        .shape-cube-2 {
            width: 35px;
            height: 35px;
            border-radius: 6px;
            /* Override to cube */
            background: linear-gradient(135deg, var(--shape-color-4-start), var(--shape-color-4-end));
            box-shadow: 0 5px 15px var(--shadow-shape-4);
            top: 25%;
            right: 15%;
            animation-delay: -3s;
        }

        .shape-cylinder {
            width: 50px;
            height: 25px;
            border-radius: 25px / 12.5px;
            /* Creates oval for cylinder top */
            background: linear-gradient(135deg, var(--shape-color-5-start), var(--shape-color-5-end));
            box-shadow: 0 7px 22px var(--shadow-shape-5);
            top: 70%;
            left: 40%;
            animation-delay: -4s;
            /* Simulating cylinder body: */
            position: absolute;
            transform: rotateX(70deg) translateY(-50%);
            /* Rotate to look 3D */
        }

        .shape-5g {
            width: 70px;
            height: 70px;
            border-radius: 12px;
            background: linear-gradient(135deg, var(--shape-color-label-start), var(--shape-color-label-end));
            box-shadow: 0 8px 25px var(--shadow-shape-label);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            font-weight: bold;
            top: 45%;
            left: 25%;
            animation-delay: -5s;

            /* Override 5G text to be relevant */
            content: "PKS";
            /* Example: Palm Kernel Shells */
            font-size: 24px;
            font-weight: bold;
        }

        .floating-elements .element {
            background: rgba(255, 255, 255, 0.3);
        }

        .copyright-info {
            position: absolute;
            bottom: 30px;
            left: 50%;
            transform: translateX(-50%);
            text-align: center;
            color: rgba(255, 255, 255, 0.8);
            font-size: 12px;
            line-height: 1.5;
            width: 100%;
        }

        /* Animations */
        @keyframes float {

            0%,
            100% {
                transform: translateY(0px) rotate(0deg);
            }

            50% {
                transform: translateY(-20px) rotate(180deg);
            }
        }

        /* Responsive Design */
        @media (max-width: 991.98px) {
            .login-card-wrapper {
                max-width: 500px;
            }

            .login-form-column {
                flex: 1;
                max-width: none;
                padding: 40px 30px;
            }

            .decorative-column {
                display: none !important;
            }
        }

        @media (max-width: 767.98px) {
            .login-container {
                padding: 15px;
            }

            .login-form-column {
                padding: 30px 20px;
            }

            .welcome-section .welcome-title {
                font-size: 24px;
            }

            .form-group-custom .form-control {
                padding: 14px 18px 14px 45px;
                font-size: 14px;
            }

            .logo-wrapper h2 {
                font-size: 20px;
            }
        }

        /* Dalam bagian .decorative-column */

        .brand-logo {
            text-align: center;
            margin-bottom: 40px;
        }

        /* Dalam bagian .decorative-column */

        .brand-logo {
            text-align: center;
            margin-bottom: 40px;
        }

        .logo-circle-wrapper {
            width: 150px;
            /* Perbesar ukuran lingkaran */
            height: 150px;
            /* Harus sama untuk lingkaran sempurna */
            background-color: var(--white);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            margin: 0 auto;
            padding: 10px;
            /* Sesuaikan padding jika perlu */
            flex-shrink: 0;
        }

        .brand-image {
            max-width: 120px;
            /* Perbesar ukuran maksimum logo */
            max-height: 120px;
            /* Perbesar ukuran maksimum logo */
            width: auto;
            height: auto;
            object-fit: contain;
            filter: none;
            display: block;
        }
    </style>
</head>

<body>
    <div class="login-container d-flex align-items-center justify-content-center min-vh-100">
        <div class="login-card-wrapper">
            <div class="login-row g-0 shadow-lg">
                <div class="login-form-column d-flex align-items-center justify-content-center">
                    <div class="login-form-content w-100">
                        <div class="text-center mb-4">
                            <div class="logo-wrapper mb-3 d-flex align-items-center justify-content-center">
                                <img src="{{ asset('assets/fujiyama-logo.png') }}" alt="Fujiyama Logo"
                                    class="logo-image me-2">
                                <h2 class="fw-bold text-dark mb-0 ms-2">Fujiyama Biomass Energy</h2>
                            </div>
                        </div>

                        <div class="welcome-section mb-4">
                            <h3 class="welcome-title">Welcome to login system</h3>
                            <p class="welcome-subtitle">Sign in by entering the information below</p>
                        </div>

                        <form method="POST" action="#" class="login-form">
                            @csrf

                            <div class="mb-3 position-relative form-group-custom">
                                <label for="email" class="form-label visually-hidden">Email Address</label>
                                <i class="fas fa-user icon-left"></i>
                                <input id="email" type="email" class="form-control form-control-lg" name="email"
                                    required autocomplete="email" autofocus placeholder="Email Address / Username">
                            </div>

                            <div class="mb-3 position-relative form-group-custom">
                                <label for="password" class="form-label visually-hidden">Password</label>
                                <i class="fas fa-lock icon-left"></i>
                                <div class="position-relative">
                                    <input id="password" type="password" class="form-control form-control-lg"
                                        name="password" required autocomplete="current-password" placeholder="••••••••">
                                    <button type="button"
                                        class="btn position-absolute end-0 top-50 translate-middle-y pe-3 toggle-password"
                                        onclick="togglePassword()">
                                        <i class="fas fa-eye text-muted" id="togglePasswordIcon"></i>
                                    </button>
                                </div>
                            </div>

                            {{-- <div class="mb-4 form-group-custom">
                                <i class="fas fa-chevron-down icon-left select-arrow"></i>
                                <select class="form-control form-control-lg" name="role">
                                    <option value="">Please select user type</option>
                                    <option value="buyer">Buyers</option>
                                    <option value="supplier">Suppliers</option>
                                    <option value="admin">Administrator</option>
                                </select>
                            </div> --}}

                            <div class="d-flex justify-content-between align-items-center mb-4 login-options">
                                <div class="form-check remember-me">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember">
                                    <label class="form-check-label text-muted" for="remember">
                                        Remember Me
                                    </label>
                                </div>
                                <a href="{{ route('password.request') }}"
                                    class="text-decoration-none forgot-password-link">
                                    Forgot Password?
                                </a>
                            </div>

                            <div class="d-grid gap-2 mb-4">
                                <button type="submit" class="btn btn-primary btn-lg fw-semibold login-button">
                                    Login Account
                                </button>
                            </div>

                            <div class="text-center mt-3 register-link-wrapper">
                                <p class="text-muted mb-0 no-account-text">
                                    Don't have an account?
                                    <a href="{{ route('register') }}"
                                        class="fw-semibold text-decoration-none register-now-link">
                                        Register Account
                                    </a>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="decorative-column d-none d-lg-flex align-items-center justify-content-center p-0">
                    <div
                        class="decorative-content w-100 h-100 d-flex flex-column align-items-center justify-content-center">
                        <div class="brand-logo mb-4">
                            {{-- Tambahkan div wrapper untuk lingkaran putih --}}
                            <div class="logo-circle-wrapper">
                                <img src="{{ asset('assets/fujiyama-logo.png') }}" alt="Fujiyama Logo"
                                    class="brand-image">
                            </div>
                        </div>
                        <div class="scene-3d">
                            <div class="geometric-shapes">
                                <div class="shape shape-sphere-1"
                                    style="width: 80px; height: 80px; top: 20%; left: 20%;"></div>
                                <div class="shape shape-sphere-2"
                                    style="width: 60px; height: 60px; top: 60%; right: 25%; animation-delay: -2s;">
                                </div>
                                <div class="shape shape-cube-1"
                                    style="width: 40px; height: 40px; border-radius: 8px; top: 40%; left: 60%; animation-delay: -1s;">
                                </div>
                                <div class="shape shape-cube-2"
                                    style="width: 35px; height: 35px; border-radius: 6px; top: 25%; right: 15%; animation-delay: -3s;">
                                </div>
                                <div class="shape shape-cylinder"
                                    style="width: 50px; height: 25px; border-radius: 25px; top: 70%; left: 40%; animation-delay: -4s;">
                                </div>
                                <div class="shape shape-5g"
                                    style="width: 70px; height: 70px; border-radius: 12px; top: 45%; left: 25%; animation-delay: -5s;">
                                </div>
                                <div class="floating-elements">
                                    <div class="element element-1"
                                        style="width: 20px; height: 20px; top: 15%; left: 70%; animation-delay: -6s;">
                                    </div>
                                    <div class="element element-2"
                                        style="width: 20px; height: 20px; top: 80%; left: 15%; animation-delay: -7s;">
                                    </div>
                                    <div class="element element-3"
                                        style="width: 20px; height: 20px; top: 35%; right: 10%; animation-delay: -8s;">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="copyright-info">
                            <p class="mb-0">© {{ date('Y') }} Fujiyama Biomass Energy</p>
                            <p class="mb-0">All rights reserved.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Toggle Password Visibility
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const toggleIcon = document.getElementById('togglePasswordIcon');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.classList.remove('fa-eye');
                toggleIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                toggleIcon.classList.remove('fa-eye-slash');
                toggleIcon.classList.add('fa-eye');
            }
        }

        // Add smooth animations and effects
        document.addEventListener('DOMContentLoaded', function() {
            // Animate geometric shapes (Only if you intend to keep these separate divs for 3D elements)
            const shapes = document.querySelectorAll('.shape');
            shapes.forEach((shape, index) => {
                shape.style.animationDelay = `${index * 0.5}s`;
            });

            // Form input effects
            const inputs = document.querySelectorAll('.form-control');
            inputs.forEach(input => {
                input.addEventListener('focus', function() {
                    this.style.borderColor = 'var(--primary-green)'; /* Uses primary green */
                    this.style.boxShadow =
                        '0 0 0 3px rgba(27, 94, 32, 0.15)'; /* Uses primary green RGB */
                    this.style.backgroundColor = 'var(--white)'; /* Background white on focus */
                });

                input.addEventListener('blur', function() {
                    this.style.borderColor = 'var(--gray-200)';
                    this.style.boxShadow = 'none';
                    this.style.backgroundColor =
                        'var(--gray-100)'; /* Background gray-100 on blur */
                });
            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
