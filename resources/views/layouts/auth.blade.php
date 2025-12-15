<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

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

    <title>{{ $title ?? 'Fujiyama Biomass Energy' }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* Color Variables */
        :root {
            --primary-green: #1b5e20;
            --secondary-green-medium: #228b22;
            --accent-green-light: #4caf50;
            --beige-light: #f8f8e8;
            --beige-medium: #f5f5dc;
            --white: #FFFFFF;
            --gray-100: #F7FAFC;
            --gray-200: #EDF2F7;
            --shadow-lg: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
            --text-dark: #374151;
            --text-light: #6b7280;
            --shape-color-palm-brown: #5C4033;
            --shape-color-palm-dark-brown: #36281F;
            --shape-color-fire-orange: #FF8C00;
            --shape-color-fire-yellow: #FFA500;
            --shape-color-biomass-green: #6C9F4E;
            --shape-color-biomass-dark-green: #4D7736;
            --shape-color-ash-gray: #A9A9A9;
            --shape-color-light-ash-gray: #D3D3D3;
            --shape-color-1-start: var(--shape-color-fire-orange);
            --shape-color-1-end: var(--shape-color-fire-yellow);
            --shape-color-2-start: var(--shape-color-biomass-green);
            --shape-color-2-end: var(--shape-color-biomass-dark-green);
            --shape-color-3-start: var(--shape-color-palm-brown);
            --shape-color-3-end: var(--shape-color-palm-dark-brown);
            --shape-color-4-start: var(--shape-color-ash-gray);
            --shape-color-4-end: var(--shape-color-light-ash-gray);
            --shape-color-5-start: var(--beige-medium);
            --shape-color-5-end: var(--beige-light);
            --shape-color-label-start: var(--primary-green);
            --shape-color-label-end: var(--secondary-green-medium);
            --shadow-shape-1: rgba(255, 140, 0, 0.4);
            --shadow-shape-2: rgba(108, 159, 78, 0.4);
            --shadow-shape-3: rgba(92, 64, 51, 0.4);
            --shadow-shape-4: rgba(169, 169, 169, 0.4);
            --shadow-shape-5: rgba(245, 245, 220, 0.4);
            --shadow-shape-label: rgba(27, 94, 32, 0.4);
            --login-page-bg-top: var(--beige-light);
            --login-page-bg-bottom: var(--beige-medium);
            --input-focus-border: var(--secondary-green-medium);
            --primary-green-rgb: 27, 94, 32;
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

        .login-container,
        .registration-page-container {
            min-height: 100vh;
            width: 100vw;
            padding: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, var(--login-page-bg-top) 0%, var(--login-page-bg-bottom) 100%);
        }

        .login-card-wrapper,
        .registration-content-card-wrapper {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            border-radius: 24px;
            overflow: hidden;
            box-shadow: var(--shadow-lg);
            backdrop-filter: blur(10px);
            background: var(--card-bg);
            display: flex;
        }

        .login-row,
        .registration-main-row {
            min-height: 700px;
            background: var(--card-bg);
            display: flex;
            width: 100%;
        }

        .login-form-column,
        .registration-form-column {
            background: var(--white);
            padding: 60px 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex: 0 0 50%;
            max-width: 600px;
        }

        .login-form-content,
        .registration-form-inner-content {
            width: 100%;
            max-width: 400px;
            margin: auto;
        }

        .logo-and-title,
        .logo-wrapper {
            margin-bottom: 32px;
            text-align: center;
        }

        .app-logo,
        .logo-image {
            width: 45px;
            height: 45px;
            object-fit: contain;
            margin-right: 12px;
        }

        .app-title,
        .logo-wrapper h2 {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--text-dark);
            margin: 0;
        }

        .welcome-section {
            margin-bottom: 32px;
            text-align: center;
        }

        .welcome-section .welcome-title {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 8px;
        }

        .welcome-section .welcome-subtitle {
            font-size: 0.95rem;
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
            color: var(--text-dark);
        }

        .form-group-custom .form-control::placeholder {
            color: var(--text-light);
            opacity: 0.7;
        }

        .form-group-custom .form-control:focus {
            border-color: var(--input-focus-border) !important;
            background: var(--white) !important;
            box-shadow: 0 0 0 3px rgba(var(--primary-green-rgb), 0.15) !important;
        }

        .form-group-custom .icon-left {
            position: absolute;
            left: 18px;
            top: 56px;
            transform: translateY(-50%);
            color: var(--text-light);
            font-size: 16px;
            z-index: 2;
        }

        .toggle-password {
            background: none;
            border: none;
            padding: 0;
            margin: 0;
            color: var(--text-light);
            cursor: pointer;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--secondary-green-medium), var(--primary-green)) !important;
            border-color: var(--primary-green) !important;
            color: var(--white) !important;
            box-shadow: 0 4px 12px var(--button-shadow-color) !important;
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, var(--primary-green), var(--secondary-green-medium)) !important;
            border-color: var(--secondary-green-medium) !important;
            transform: translateY(-2px);
            box-shadow: 0 8px 20px var(--button-shadow-color) !important;
        }

        .login-button,
        .register-button {
            border-radius: 12px;
            padding: 16px 24px;
            font-size: 16px;
            font-weight: 600;
            width: 100%;
            transition: all 0.3s ease;
        }

        .register-now-link,
        .login-now-link,
        .forgot-password-link,
        .already-have-account-text {
            color: var(--link-color) !important;
            font-weight: 600;
            text-decoration: none;
        }

        .already-have-account-text {
            font-size: 0.9rem;
            color: var(--text-light);
            font-weight: 400;
        }

        .register-now-link:hover,
        .login-now-link:hover,
        .forgot-password-link:hover {
            text-decoration: underline !important;
        }

        .decorative-column,
        .decorative-register-column {
            background: linear-gradient(135deg, var(--secondary-green-medium) 0%, var(--primary-green) 100%);
            border-radius: 0 24px 24px 0;
            position: relative;
            overflow: hidden;
            min-height: 600px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-grow: 1;
            flex-basis: 0;
            padding: 40px;
        }

        .decorative-content,
        .decorative-register-content {
            position: relative;
            z-index: 2;
            padding: 20px;
            width: 100%;
            height: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            color: var(--decorative-register-text-color);
            text-align: center;
        }

        .brand-image,
        .register-decorative-image {
            max-width: 80%;
            height: auto;
            object-fit: contain;
            filter: drop-shadow(0 10px 20px rgba(0, 0, 0, 0.2));
            margin-bottom: 40px;
        }

        .decorative-register-title {
            font-size: 2rem;
            font-weight: 700;
            color: var(--decorative-register-text-color);
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.3);
            margin-bottom: 0.5rem;
        }

        .decorative-register-subtitle {
            font-size: 1.1rem;
            color: var(--decorative-register-text-color);
            opacity: 0.9;
            text-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
            margin-bottom: 1.5rem;
        }

        @media (max-width: 991.98px) {

            .login-card-wrapper,
            .registration-content-card-wrapper {
                max-width: 550px;
                border-radius: 24px;
            }

            .login-row,
            .registration-main-row {
                flex-direction: column;
                min-height: auto;
            }

            .login-form-column,
            .registration-form-column {
                border-radius: 24px 24px 0 0;
                padding: 40px !important;
                flex-basis: auto;
                max-width: 100%;
            }

            .decorative-column,
            .decorative-register-column {
                border-radius: 0 0 24px 24px;
                min-height: 350px;
                padding: 30px !important;
                flex-basis: auto;
            }

            .decorative-register-title {
                font-size: 1.8rem;
            }

            .decorative-register-subtitle {
                font-size: 1rem;
            }

            .register-decorative-image {
                max-width: 70%;
            }
        }

        @media (max-width: 767.98px) {

            .login-container,
            .registration-page-container {
                padding: 10px;
            }

            .login-card-wrapper,
            .registration-content-card-wrapper {
                border-radius: 12px;
                box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            }

            .login-form-column,
            .registration-form-column {
                border-radius: 12px;
                padding: 30px 20px !important;
            }

            .decorative-column,
            .decorative-register-column {
                display: none !important;
            }

            .app-title,
            .logo-wrapper h2 {
                font-size: 1.3rem;
            }

            .welcome-title {
                font-size: 1.6rem;
            }

            .welcome-subtitle {
                font-size: 0.85rem;
            }

            .form-group-custom .form-control {
                padding: 14px 18px 14px 45px;
                font-size: 14px;
            }

            .login-button,
            .register-button {
                padding: 14px 20px;
                font-size: 15px;
            }

            .already-have-account-text,
            .login-now-link {
                font-size: 0.85rem;
            }
        }
    </style>

    @stack('styles')
</head>

<body>
    @yield('content')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>

</html>
