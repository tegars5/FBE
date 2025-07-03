<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" href="{{ asset('assets/fujiyama-logo.png') }}" sizes="96x96" />
    <link rel="icon" type="image/svg+xml" href="{{ asset('assets/fujiyama-logo.svg') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/fujiyama-logo-32.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('assets/fujiyama-logo-96.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/fujiyama-logo-apple.png') }}">
    <link rel="shortcut icon" href="{{ asset('assets/fujiyama-logo.ico') }}" />
    <link rel="manifest" href="/site.webmanifest" />
    <title>Fujiyama Biomass Energy</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&family=Roboto+Slab:wght@400;700&display=swap"
        rel="stylesheet" />

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'green-custom': '#1B5E20',
                        'green-hover': '#228B22',
                        'green-light': '#4CAF50',
                        'beige': '#F5F5DC',
                        'toner': '#926a2d'
                    },
                    boxShadow: {
                        'green-custom': '0 4px 15px rgba(46, 125, 50, 0.4)',
                        'green-hover': '0 6px 20px rgba(46, 125, 50, 0.6)',
                        'white-custom': '0 6px 20px rgba(255, 255, 255, 0.3)'
                    }
                }
            }
        }
    </script>

    <style>
        body {
            font-family: 'Roboto', sans-serif;
            padding-top: 80px;
        }

        @media (min-width: 768px) {
            body {
                padding-top: 100px;
            }
        }

        .logo-image-container {
            transition: top 0.3s ease-in-out;
        }

        nav.scrolled .logo-image-container {
            position: relative;
            top: 0 !important;
            width: 4rem;
            height: 4rem;
        }

        nav.scrolled .logo-image-container img {
            object-fit: contain;
        }

        nav.scrolled .logo-bg {
            display: none;
        }

        nav.scrolled {
            padding-top: 0.75rem;
            padding-bottom: 0.75rem;
        }

        .text-shadow-hero {
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }

        .text-shadow-hero-sub {
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);
        }

        .nav-link::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 2px;
            background: #4CAF50;
            transition: width 0.3s ease;
        }

        .nav-link:hover::after {
            width: 100%;
        }

        /* Hamburger Menu Styles */
        .hamburger {
            position: relative;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            width: 44px;
            height: 44px;
            cursor: pointer;
            border: none;
            background: transparent;
            border-radius: 12px;
            transition: all 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            z-index: 1001;
            outline: none;
            -webkit-tap-highlight-color: transparent;
        }

        .hamburger:hover {
            background: rgba(27, 94, 32, 0.08);
            transform: scale(1.05);
        }

        .hamburger:active {
            transform: scale(0.95);
        }

        .hamburger-line {
            display: block;
            width: 24px;
            height: 2px;
            background: #1B5E20;
            border-radius: 2px;
            transition: all 0.4s cubic-bezier(0.68, -0.55, 0.265, 1.55);
            transform-origin: center;
            position: relative;
        }

        .hamburger-line:nth-child(1) {
            transform: translateY(-6px);
        }

        .hamburger-line:nth-child(2) {
            transform: translateY(0);
            width: 20px;
        }

        .hamburger-line:nth-child(3) {
            transform: translateY(6px);
        }

        .hamburger.active .hamburger-line:nth-child(1) {
            transform: rotate(45deg) translateY(0);
            width: 24px;
        }

        .hamburger.active .hamburger-line:nth-child(2) {
            opacity: 0;
            transform: scale(0) rotate(180deg);
        }

        .hamburger.active .hamburger-line:nth-child(3) {
            transform: rotate(-45deg) translateY(0);
            width: 24px;
        }

        .mobile-menu-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100vh;
            background: rgba(0, 0, 0, 0);
            backdrop-filter: blur(0px);
            z-index: 998;
            visibility: hidden;
            opacity: 0;
            transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        }

        .mobile-menu-overlay.active {
            background: rgba(0, 0, 0, 0.6);
            backdrop-filter: blur(8px);
            visibility: visible;
            opacity: 1;
        }

        .mobile-menu {
            position: fixed;
            top: 0;
            right: 0;
            width: 320px;
            max-width: 85vw;
            height: 100vh;
            background: #ffffff;
            box-shadow: -8px 0 32px rgba(0, 0, 0, 0.15);
            transform: translateX(100%);
            transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            z-index: 999;
            overflow-y: auto;
            visibility: hidden;
            border-radius: 24px 0 0 24px;
        }

        .mobile-menu.active {
            transform: translateX(0);
            visibility: visible;
        }

        .mobile-menu-header {
            position: relative;
            background: linear-gradient(135deg, #F5F5DC 0%, #ffffff 100%);
            border-bottom: 1px solid rgba(27, 94, 32, 0.1);
            padding: 24px;
        }

        .mobile-menu-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 2px;
            background: linear-gradient(90deg, #1B5E20, #4CAF50);
        }

        .mobile-menu-nav {
            padding: 24px 0;
        }

        .mobile-menu-item {
            opacity: 0;
            transform: translateX(20px);
            transition: all 0.3s ease;
        }

        .mobile-menu.active .mobile-menu-item {
            opacity: 1;
            transform: translateX(0);
        }

        .mobile-menu.active .mobile-menu-item:nth-child(1) {
            transition-delay: 0.1s;
        }

        .mobile-menu.active .mobile-menu-item:nth-child(2) {
            transition-delay: 0.15s;
        }

        .mobile-menu.active .mobile-menu-item:nth-child(3) {
            transition-delay: 0.2s;
        }

        .mobile-menu.active .mobile-menu-item:nth-child(4) {
            transition-delay: 0.25s;
        }

        .mobile-menu.active .mobile-menu-item:nth-child(5) {
            transition-delay: 0.3s;
        }

        .mobile-menu.active .mobile-menu-item:nth-child(6) {
            transition-delay: 0.35s;
        }

        .mobile-menu.active .mobile-menu-item:nth-child(7) {
            transition-delay: 0.4s;
        }

        .mobile-menu.active .mobile-menu-item:nth-child(8) {
            transition-delay: 0.45s;
        }

        .mobile-menu-link {
            display: flex;
            align-items: center;
            padding: 16px 24px;
            margin: 0 12px;
            color: #374151;
            font-weight: 500;
            font-size: 16px;
            text-decoration: none;
            border-radius: 16px;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .mobile-menu-link::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(27, 94, 32, 0.1), transparent);
            transition: left 0.5s ease;
        }

        .mobile-menu-link:hover::before {
            left: 100%;
        }

        .mobile-menu-link i {
            margin-right: 12px;
            font-size: 18px;
            color: #1B5E20;
            transition: all 0.3s ease;
        }

        .mobile-menu-link:hover {
            background: rgba(27, 94, 32, 0.08);
            color: #1B5E20;
            transform: translateX(4px);
        }

        .mobile-menu-link:hover i {
            transform: scale(1.1);
        }

        .mobile-menu-footer {
            padding: 24px;
            border-top: 1px solid rgba(27, 94, 32, 0.1);
            background: linear-gradient(135deg, #f9f9f9 0%, #ffffff 100%);
        }

        .mobile-login-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            padding: 16px;
            background: linear-gradient(135deg, #1B5E20 0%, #228B22 100%);
            color: white;
            font-weight: 600;
            font-size: 16px;
            border: none;
            border-radius: 16px;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(27, 94, 32, 0.3);
        }

        .mobile-login-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(27, 94, 32, 0.4);
        }

        .mobile-login-btn:active {
            transform: translateY(0);
        }

        .mobile-login-btn i {
            margin-right: 8px;
            font-size: 16px;
        }

        @media (max-width: 480px) {
            .mobile-menu {
                width: 100%;
                border-radius: 0;
            }
        }

        .logo-bg {
            border-bottom-right-radius: 150px 100px;
        }

        .hero-bg {
            background: linear-gradient(135deg, rgba(37, 41, 37, 0.8) 0%, rgba(32, 36, 32, 0.9) 100%),
                url('{{ asset('assets/background-hero.jpg') }}') center/cover;
            background-size: cover;
            background-position: center;
        }

        .hero-content {
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 1rem;
        }

        @media (min-width: 640px) {
            .hero-content {
                padding: 0 1.5rem;
            }
        }

        @media (min-width: 768px) {
            .hero-content {
                padding: 0 3rem;
            }
        }

        @media (min-width: 1024px) {
            .hero-content {
                padding: 0 5rem;
            }
        }

        @media (max-width: 768px) {
            .hero-title {
                font-size: 2.5rem;
                line-height: 1.2;
            }

            .hero-buttons {
                flex-direction: column;
                align-items: center;
                gap: 1rem;
            }

            .hero-buttons a {
                width: 100%;
                max-width: 200px;
                text-align: center;
            }
        }

        .news-card {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            border-left: 4px solid #1B5E20;
        }

        .co2-diagram {
            background: linear-gradient(135deg, #e8f5e8 0%, #c8e6c8 100%);
        }

        /* Dropdown styles */
        .dropdown:hover .dropdown-menu {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        .dropdown-menu {
            opacity: 0;
            visibility: hidden;
            transform: translateY(-10px);
            transition: all 0.3s ease;
        }
    </style>
</head>

<body class="font-sans leading-relaxed overflow-x-hidden">
    <div class="relative min-h-screen">
        <!-- Hero Section -->
        <header class="absolute top-0 left-0 w-full h-screen hero-bg flex items-center justify-center" id="home">
            <div class="z-30 hero-content w-full animate-fadeInUp">
                <h1
                    class="hero-title text-3xl md:text-5xl font-bold mb-5 text-white text-shadow-hero leading-tight text-center md:text-left">
                    Empowering Sustainable Energy <br class="hidden md:block">with Premium PKS Charcoal
                </h1>
                <div class="hero-buttons flex gap-5 flex-wrap justify-center md:justify-start">
                    <a href="#products"
                        class="px-6 md:px-8 py-3 md:py-4 border-none rounded-md text-sm md:text-base font-semibold cursor-pointer transition-all duration-300 text-center min-w-[140px] md:min-w-[150px] bg-green-custom text-white shadow-green-custom hover:bg-green-hover hover:-translate-y-0.5 hover:shadow-green-hover">
                        View Products
                    </a>
                    <a href="#contact"
                        class="px-6 md:px-8 py-3 md:py-4 border-none rounded-md text-sm md:text-base font-semibold cursor-pointer transition-all duration-300 text-center min-w-[140px] md:min-w-[150px] bg-white bg-opacity-90 text-green-custom border border-white border-opacity-30 hover:bg-white hover:bg-opacity-100 hover:-translate-y-0.5 shadow-white-custom">
                        Contact Us
                    </a>
                </div>
            </div>
        </header>

        <!-- Navbar yang diperbaiki -->
        <nav class="bg-beige py-3 md:py-5 fixed top-0 w-full z-50 transition-all duration-300 ease-in-out shadow-md">
            <div class="max-w-6xl mx-auto flex justify-between items-center px-4 md:px-5">
                <!-- Logo Section -->
                <div class="relative flex items-center gap-4 z-[100]">
                    <div class="hidden md:block absolute top-24 -left-52 w-96 h-24 bg-beige logo-bg -z-10"></div>
                    <div
                        class="logo-image-container w-16 h-16 md:w-24 md:h-24 flex items-center justify-center relative md:top-12 bg-transparent">
                        <img src="{{ asset('assets/fujiyama-logo.png') }}" alt="Fujiyama Biomass Energy Logo"
                            class="w-full h-full object-contain" />
                    </div>
                </div>

                <!-- Desktop Navigation -->
                <ul class="hidden lg:flex list-none gap-6 xl:gap-8 items-center">
                    <li>
                        <a href="#home"
                            class="nav-link text-gray-800 font-medium text-base py-2.5 relative hover:text-green-light transition duration-300">
                            Home
                        </a>
                    </li>
                    <li>
                        <a href="#about"
                            class="nav-link text-gray-800 font-medium text-base py-2.5 relative hover:text-green-light transition duration-300">
                            About Us
                        </a>
                    </li>
                    <li>
                        <a href="#sustainability"
                            class="nav-link text-gray-800 font-medium text-base py-2.5 relative hover:text-green-light transition duration-300">
                            Sustainability
                        </a>
                    </li>
                    <li>
                        <a href="#exports"
                            class="nav-link text-gray-800 font-medium text-base py-2.5 relative hover:text-green-light transition duration-300">
                            Exports & Partnerships
                        </a>
                    </li>
                    <!-- Dropdown More -->
                    <li class="relative dropdown">
                        <button
                            class="nav-link flex items-center gap-1 text-gray-800 font-medium text-base py-2.5 relative hover:text-green-light transition duration-300 focus:outline-none">
                            More
                            <svg class="w-3 h-3 ml-1 transition-transform duration-200" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <ul
                            class="dropdown-menu absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg border border-gray-100 z-50">
                            <li>
                                <a href="#products"
                                    class="block px-6 py-3 text-gray-800 hover:bg-green-50 hover:text-green-custom transition">
                                    Products
                                </a>
                            </li>
                            <li>
                                <a href="#gallery"
                                    class="block px-6 py-3 text-gray-800 hover:bg-green-50 hover:text-green-custom transition">
                                    Gallery
                                </a>
                            </li>
                            <li>
                                <a href="#technical"
                                    class="block px-6 py-3 text-gray-800 hover:bg-green-50 hover:text-green-custom transition">
                                    Technical Data
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#contact"
                            class="nav-link text-gray-800 font-medium text-base py-2.5 relative hover:text-green-light transition duration-300">
                            Contact
                        </a>
                    </li>
                    <li>
                        <a href="#login"
                            class="px-4 xl:px-6 py-2.5 rounded-md text-sm xl:text-base font-semibold bg-green-custom text-white shadow-green-custom hover:bg-green-hover transition-all duration-300">
                            Login
                        </a>
                    </li>
                </ul>

                <!-- Mobile Menu Button -->
                <button class="lg:hidden hamburger" id="menu-btn" aria-label="Toggle mobile menu">
                    <span class="hamburger-line"></span>
                    <span class="hamburger-line"></span>
                    <span class="hamburger-line"></span>
                </button>
            </div>

            <!-- Mobile Menu Overlay -->
            <div class="mobile-menu-overlay" id="menu-overlay"></div>

            <!-- Mobile Menu -->
            <div class="mobile-menu" id="mobile-menu">
                <!-- Mobile Menu Header -->
                <div class="mobile-menu-header">
                    <div class="flex items-center gap-3">
                        <img src="{{ asset('assets/fujiyama-logo.png') }}" alt="Fujiyama logo"
                            class="w-10 h-10 object-contain rounded-full" />
                        <div>
                            <h3 class="font-bold text-lg text-green-custom">Fujiyama</h3>
                            <p class="text-xs text-gray-600">Biomass Energy</p>
                        </div>
                    </div>
                </div>

                <nav class="mobile-menu-nav">
                    <div class="mobile-menu-item">
                        <a href="#home" class="mobile-menu-link">
                            <i class="fas fa-home"></i>Home
                        </a>
                    </div>
                    <div class="mobile-menu-item">
                        <a href="#about" class="mobile-menu-link">
                            <i class="fas fa-info-circle"></i>About Us
                        </a>
                    </div>
                    <div class="mobile-menu-item">
                        <a href="#sustainability" class="mobile-menu-link">
                            <i class="fas fa-leaf"></i>Sustainability
                        </a>
                    </div>
                    <div class="mobile-menu-item">
                        <a href="#exports" class="mobile-menu-link">
                            <i class="fas fa-globe"></i>Exports & Partnerships
                        </a>
                    </div>
                    <div class="mobile-menu-item">
                        <a href="#products" class="mobile-menu-link">
                            <i class="fas fa-boxes"></i>Products
                        </a>
                    </div>
                    <div class="mobile-menu-item">
                        <a href="#gallery" class="mobile-menu-link">
                            <i class="fas fa-images"></i>Gallery
                        </a>
                    </div>
                    <div class="mobile-menu-item">
                        <a href="#technical" class="mobile-menu-link">
                            <i class="fas fa-chart-bar"></i>Technical Data
                        </a>
                    </div>
                    <div class="mobile-menu-item">
                        <a href="#contact" class="mobile-menu-link">
                            <i class="fas fa-envelope"></i>Contact
                        </a>
                    </div>
                </nav>

                <div class="mobile-menu-footer">
                    <button class="mobile-login-btn" onclick="window.location.href='#login'">
                        <i class="fas fa-sign-in-alt"></i>Login
                    </button>
                </div>
            </div>
        </nav>
    </div>
    <section class="bg-beige py-8 md:py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-12 lg:px-20">
            <p class="text-base md:text-lg text-gray-700 text-center mb-8 max-w-3xl mx-auto">
                Focused on PKS charcoal product development, delivering sustainable energy solutions with premium
                quality specifications for global biomass energy needs.
            </p>
            <h2 class="text-xl md:text-2xl font-extrabold text-center mb-6 md:mb-10">Service Highlights</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 md:gap-8 max-w-4xl mx-auto">
                <div
                    class="space-y-3 text-center transition-all transform hover:scale-105 hover:shadow-lg hover:bg-gray-50 rounded-lg p-4 md:p-6">
                    <div class="flex justify-center">
                        <i class="fas fa-fire text-green-custom text-3xl"></i>
                    </div>
                    <h3 class="font-extrabold text-lg md:text-xl">High Calorific Value</h3>
                    <p class="text-sm md:text-base text-gray-600">Premium PKS charcoal with superior energy output for
                        efficient biomass applications.</p>
                </div>
                <div
                    class="space-y-3 text-center transition-all transform hover:scale-105 hover:shadow-lg hover:bg-gray-50 rounded-lg p-4 md:p-6">
                    <div class="flex justify-center">
                        <i class="fas fa-tint text-green-custom text-3xl"></i>
                    </div>
                    <h3 class="font-extrabold text-lg md:text-xl">Low Ash & Moisture</h3>
                    <p class="text-sm md:text-base text-gray-600">Carefully processed to minimize ash and moisture
                        content for cleaner combustion.</p>
                </div>
                <div
                    class="space-y-3 text-center transition-all transform hover:scale-105 hover:shadow-lg hover:bg-gray-50 rounded-lg p-4 md:p-6">
                    <div class="flex justify-center">
                        <i class="fas fa-globe-americas text-green-custom text-3xl"></i>
                    </div>
                    <h3 class="font-extrabold text-lg md:text-xl">Global Export Quality</h3>
                    <p class="text-sm md:text-base text-gray-600">Meeting international standards for worldwide biomass
                        market requirements.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="max-w-7xl mx-auto px-4 sm:px-6 md:px-12 lg:px-20 py-8 md:py-12">
        <div class="news-card rounded-lg p-6 md:p-8 text-center">
            <div class="flex justify-center mb-4">
                <i class="fas fa-certificate text-green-custom text-4xl"></i>
            </div>
            <h3 class="text-xl md:text-2xl font-bold text-green-custom mb-4">News & Insights</h3>
            <p class="text-base md:text-lg text-gray-700 max-w-3xl mx-auto">
                <strong>Our PKS Charcoal certified with top-tier specs by Scovindo Laboratory</strong> — ensuring the
                best performance for your biomass energy needs.
            </p>
            <a href="{{ route('articles.show', 'scovindo-certification-news-id') }}" {{-- Ganti 'scovindo-certification-news-id' dengan ID/slug artikel aktual --}}
                class="inline-block mt-6 bg-green-custom text-white px-6 py-3 rounded-md text-sm font-medium hover:bg-green-hover transition">
                Read Full Report
            </a>
        </div>
    </section>

    <section id="about"
        class="max-w-7xl mx-auto px-4 sm:px-6 md:px-12 lg:px-20 py-8 md:py-12 space-y-8 md:space-y-12">
        <div class="max-w-4xl">
            <h2 class="text-xl md:text-2xl font-extrabold mb-4">About Us</h2>
            <p class="text-sm md:text-base font-normal max-w-3xl mb-6">
                PT Fujiyama Biomass Energy is dedicated to sustainable energy solutions through premium PKS charcoal
                products. With deep expertise in biomass technology and commitment to environmental stewardship, we
                bridge Indonesia's abundant natural resources with global energy needs.
            </p>

            <div class="grid md:grid-cols-2 gap-8 mb-8">
                <div>
                    <h3 class="text-lg font-bold mb-3">Company History</h3>
                    <p class="text-sm text-gray-600 mb-4">
                        Founded in 20XX with a vision to transform agricultural waste into valuable energy resources, we
                        have
                        grown to become a trusted partner in the global biomass industry.
                    </p>
                </div>
                <div>
                    <h3 class="text-lg font-bold mb-3">Our Philosophy</h3>
                    <p class="text-sm text-gray-600 mb-4">
                        We believe in creating a sustainable future through innovative biomass solutions that benefit
                        both the environment and communities. Our core values include integrity, innovation, and impact.
                    </p>
                </div>
            </div>

            <div class="mb-8 text-center flex flex-col items-center px-4 sm:px-6 md:px-8">
                <h3 class="text-lg font-bold mb-4">Management Team</h3>
                <div class="flex gap-4 flex-wrap justify-center sm:justify-center">
                    <div class="flex flex-col items-center mx-4">
                        <img src="{{ asset('assets/foto.jpg') }}" alt="John Doe - CEO"
                            class="w-24 h-24 object-cover rounded-full mb-2 shadow-md hover:scale-105 transition-transform">
                        <p class="text-sm font-medium">John Doe</p>
                        <p class="text-xs text-gray-600">CEO</p>
                    </div>
                    <div class="flex flex-col items-center mx-4">
                        <img src="{{ asset('assets/foto.jpg') }}" alt="Jane Smith - CTO"
                            class="w-24 h-24 object-cover rounded-full mb-2 shadow-md hover:scale-105 transition-transform">
                        <p class="text-sm font-medium">Jane Smith</p>
                        <p class="text-xs text-gray-600">CTO</p>
                    </div>
                    <div class="flex flex-col items-center mx-4">
                        <img src="{{ asset('assets/foto.jpg') }}" alt="Peter Jones - COO"
                            class="w-24 h-24 object-cover rounded-full mb-2 shadow-md hover:scale-105 transition-transform">
                        <p class="text-sm font-medium">Peter Jones</p>
                        <p class="text-xs text-gray-600">COO</p>
                    </div>
                    {{-- Tambahkan lebih banyak thumbnail anggota tim sesuai kebutuhan --}}
                </div>
            </div>

            <div>
                <h3 class="text-lg font-bold mb-4">Our Commitment to SDGs</h3>
                <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4 mb-4">
                    <div class="flex flex-col items-center text-center p-2 rounded-lg hover:bg-gray-50 transition">
                        <img src="{{ asset('assets/logo-brand/SDG-7.png') }}"
                            alt="SDG 7 - Affordable and Clean Energy" class="w-16 h-16 mb-1 object-contain">
                        <p class="text-xs text-gray-700 font-semibold">Affordable & Clean Energy</p>
                    </div>
                    <div class="flex flex-col items-center text-center p-2 rounded-lg hover:bg-gray-50 transition">
                        <img src="{{ asset('assets/logo-brand/SDG-13.png') }}" alt="SDG 13 - Climate Action"
                            class="w-16 h-16 mb-1 object-contain">
                        <p class="text-xs text-gray-700 font-semibold">Climate Action</p>
                    </div>
                    <div class="flex flex-col items-center text-center p-2 rounded-lg hover:bg-gray-50 transition">
                        <img src="{{ asset('assets/logo-brand/SDG-15.png') }}" alt="SDG 15 - Life on Land"
                            class="w-16 h-16 mb-1 object-contain">
                        <p class="text-xs text-gray-700 font-semibold">Life on Land</p>
                    </div>
                    <div class="flex flex-col items-center text-center p-2 rounded-lg hover:bg-gray-50 transition">
                        <img src="{{ asset('assets/logo-brand/SDG-8.png') }}"
                            alt="SDG 8 - Decent Work and Economic Growth" class="w-16 h-16 mb-1 object-contain">
                        <p class="text-xs text-gray-700 font-semibold">Decent Work & Economic Growth</p>
                    </div>
                </div>
                <p class="text-sm text-gray-600">
                    We actively contribute to several UN Sustainable Development Goals, including ensuring access to
                    affordable and clean energy, taking urgent action to combat climate change, promoting sustainable
                    use
                    of terrestrial ecosystems, and fostering decent work and economic growth.
                </p>
            </div>
        </div>
    </section>

    <section id="products" class="bg-beige py-8 md:py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-12 lg:px-20">
            <h2 class="text-xl md:text-2xl font-extrabold text-center mb-8">Our Products</h2>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 max-w-6xl mx-auto">
                <div
                    class="bg-beige rounded-lg shadow-lg overflow-hidden transition-all hover:scale-105 hover:shadow-xl">
                    <img src="{{ asset('assets/pks-material.jpg') }}" alt="PKS Charcoal"
                        class="w-full h-64 md:h-72 object-cover">
                    <div class="p-6 md:p-8">
                        <h3 class="text-xl md:text-2xl font-bold text-green-custom mb-4">Premium PKS Charcoal</h3>
                        <p class="text-gray-600 mb-6">High-quality charcoal made from palm kernel shells, processed
                            with advanced carbonization technology for optimal energy output.</p>

                        <h4 class="font-semibold text-md mb-3 text-gray-800">Key Specifications:</h4>
                        <div class="grid grid-cols-2 gap-4 mb-6">
                            <div class="text-center p-3 bg-green-50 rounded-lg">
                                <div class="text-2xl font-bold text-green-custom">4,200+</div>
                                <div class="text-xs text-gray-600">kcal/kg (min)</div>
                            </div>
                            <div class="text-center p-3 bg-green-50 rounded-lg">
                                <div class="text-2xl font-bold text-green-custom">&lt;8%</div>
                                <div class="text-xs text-gray-600">Moisture</div>
                            </div>
                            <div class="text-center p-3 bg-green-50 rounded-lg">
                                <div class="text-2xl font-bold text-green-custom">&lt;4%</div>
                                <div class="text-xs text-gray-600">Ash Content</div>
                            </div>
                            <div class="text-center p-3 bg-green-50 rounded-lg">
                                <div class="text-2xl font-bold text-green-custom">85%+</div>
                                <div class="text-xs text-gray-600">Fixed Carbon</div>
                            </div>
                        </div>

                        <h4 class="font-semibold text-md mb-3 text-gray-800">Application Specifics:</h4>
                        <div class="flex flex-wrap gap-4 justify-center sm:justify-start mb-6">
                            <div class="flex flex-col items-center text-center">
                                <i class="fas fa-industry text-green-custom text-3xl mb-1"></i>
                                <span class="text-xs text-gray-700">Industrial Boilers</span>
                            </div>
                            <div class="flex flex-col items-center text-center">
                                <i class="fas fa-fire-alt text-green-custom text-3xl mb-1"></i>
                                <span class="text-xs text-gray-700">Power Generation</span>
                            </div>
                            <div class="flex flex-col items-center text-center">
                                <i class="fas fa-warehouse text-green-custom text-3xl mb-1"></i>
                                <span class="text-xs text-gray-700">Cement Kilns</span>
                            </div>
                        </div>

                        <h4 class="font-semibold text-md mb-3 text-gray-800">Specification Sheets:</h4>
                        <div class="flex flex-wrap gap-3 mb-6 justify-center sm:justify-start">
                            <a href="{{ asset('assets/about.jpg') }}" target="_blank" class="block group relative">
                                <img src="{{ asset('assets/about.jpg') }}" alt="PKS Charcoal Spec 1"
                                    class="w-20 h-28 object-cover border border-gray-300 rounded-md shadow-sm group-hover:shadow-md transition">
                                <span
                                    class="absolute bottom-0 left-0 w-full bg-black bg-opacity-70 text-white text-xs text-center py-1 opacity-0 group-hover:opacity-100 transition-opacity">Page
                                    1</span>
                            </a>
                            <a href="{{ asset('assets/about.jpg') }}" target="_blank" class="block group relative">
                                <img src="{{ asset('assets/about.jpg') }}" alt="PKS Charcoal Spec 2"
                                    class="w-20 h-28 object-cover border border-gray-300 rounded-md shadow-sm group-hover:shadow-md transition">
                                <span
                                    class="absolute bottom-0 left-0 w-full bg-black bg-opacity-70 text-white text-xs text-center py-1 opacity-0 group-hover:opacity-100 transition-opacity">Page
                                    2</span>
                            </a>
                            {{-- Tambahkan lebih banyak thumbnail spec sheets jika ada --}}
                        </div>

                        <a href="#contact"
                            class="w-full inline-block text-center bg-green-custom text-white py-3 rounded-lg font-semibold hover:bg-green-hover transition">
                            Request Quote
                        </a>
                    </div>
                </div>

                <div
                    class="bg-beige rounded-lg shadow-lg overflow-hidden transition-all hover:scale-105 hover:shadow-xl">
                    <img src="{{ asset('assets/about.jpg') }}" alt="Raw PKS"
                        class="w-full h-64 md:h-72 object-cover">
                    <div class="p-6 md:p-8">
                        <h3 class="text-xl md:text-2xl font-bold text-green-custom mb-4">Raw PKS (Palm Kernel Shell)
                        </h3>
                        <p class="text-gray-600 mb-6">Unprocessed palm kernel shells, a versatile biomass feedstock
                            ideal
                            for direct combustion or further processing into higher-value products.</p>

                        <h4 class="font-semibold text-md mb-3 text-gray-800">Key Specifications:</h4>
                        <div class="grid grid-cols-2 gap-4 mb-6">
                            <div class="text-center p-3 bg-green-50 rounded-lg">
                                <div class="text-2xl font-bold text-green-custom">4,000+</div>
                                <div class="text-xs text-gray-600">kcal/kg (min)</div>
                            </div>
                            <div class="text-center p-3 bg-green-50 rounded-lg">
                                <div class="text-2xl font-bold text-green-custom">15-20%</div>
                                <div class="text-xs text-gray-600">Moisture</div>
                            </div>
                            <div class="text-center p-3 bg-green-50 rounded-lg">
                                <div class="text-2xl font-bold text-green-custom">2-5%</div>
                                <div class="text-xs text-gray-600">Ash Content</div>
                            </div>
                            <div class="text-center p-3 bg-green-50 rounded-lg">
                                <div class="text-2xl font-bold text-green-custom">50%+</div>
                                <div class="text-xs text-gray-600">Fixed Carbon</div>
                            </div>
                        </div>

                        <h4 class="font-semibold text-md mb-3 text-gray-800">Application Specifics:</h4>
                        <div class="flex flex-wrap gap-4 justify-center sm:justify-start mb-6">
                            <div class="flex flex-col items-center text-center">
                                <i class="fas fa-seedling text-green-custom text-3xl mb-1"></i>
                                <span class="text-xs text-gray-700">Bio-fertilizer</span>
                            </div>
                            <div class="flex flex-col items-center text-center">
                                <i class="fas fa-warehouse text-green-custom text-3xl mb-1"></i>
                                <span class="text-xs text-gray-700">Industrial Fuel</span>
                            </div>
                            <div class="flex flex-col items-center text-center">
                                <i class="fas fa-flask text-green-custom text-3xl mb-1"></i>
                                <span class="text-xs text-gray-700">Further Processing</span>
                            </div>
                        </div>

                        <h4 class="font-semibold text-md mb-3 text-gray-800">Specification Sheets:</h4>
                        <div class="flex flex-wrap gap-3 mb-6 justify-center sm:justify-start">
                            <a href="{{ asset('assets/about.jpg') }}" target="_blank" class="block group relative">
                                <img src="{{ asset('assets/about.jpg') }}" alt="Raw PKS Spec 1"
                                    class="w-20 h-28 object-cover border border-gray-300 rounded-md shadow-sm group-hover:shadow-md transition">
                                <span
                                    class="absolute bottom-0 left-0 w-full bg-black bg-opacity-70 text-white text-xs text-center py-1 opacity-0 group-hover:opacity-100 transition-opacity">Page
                                    1</span>
                            </a>
                            {{-- Tambahkan lebih banyak thumbnail spec sheets jika ada --}}
                        </div>

                        <a href="#contact"
                            class="w-full inline-block text-center bg-green-custom text-white py-3 rounded-lg font-semibold hover:bg-green-hover transition">
                            Request Quote
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="sustainability" class="py-8 md:py-12 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-12 lg:px-20">
            <h2 class="text-xl md:text-2xl font-extrabold text-center mb-8">Sustainability & Environmental Impact</h2>

            <div class="grid md:grid-cols-2 gap-8 items-center max-w-6xl mx-auto">
                <div>
                    <h3 class="text-lg font-bold mb-4 text-green-custom">Our Eco-Friendly Process</h3>
                    <p class="text-gray-600 mb-6">Our PKS charcoal production process is designed to minimize
                        environmental impact while maximizing energy efficiency. By utilizing agricultural waste, we
                        contribute to a circular economy and a greener future.</p>

                    <div class="space-y-4">
                        <div class="flex items-center gap-3">
                            <i class="fas fa-recycle text-green-custom text-xl"></i>
                            <span class="text-sm text-gray-700">100% Agricultural Waste Utilization</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <i class="fas fa-leaf text-green-custom text-xl"></i>
                            <span class="text-sm text-gray-700">Significant Carbon Footprint Reduction</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <i class="fas fa-solar-panel text-green-custom text-xl"></i>
                            <span class="text-sm text-gray-700">Renewable & Sustainable Energy Alternative</span>
                        </div>
                    </div>

                    <div class="mt-8">
                        <h4 class="font-semibold text-md mb-3 text-gray-800">Certified Sustainable:</h4>
                        <img src="{{ asset('assets/about.jpg') }}" alt="GGL Certification Logo"
                            class="w-32 h-auto object-contain">
                        <p class="text-xs text-gray-600 mt-2">Proudly certified with Green Gold Label (GGL) for
                            sustainable biomass practices.</p>
                    </div>
                </div>

                <div>
                    <div class="co2-diagram p-6 rounded-lg shadow-md mb-8">
                        <h4 class="text-lg font-bold text-center mb-4 text-green-custom">CO₂ Emission Comparison</h4>
                        <img src="{{ asset('assets/about.jpg') }}" alt="CO2 Reduction Diagram"
                            class="w-full h-auto object-contain rounded-lg mb-4">
                        <p class="text-xs text-gray-700 text-center">Comparative CO₂ emissions for different fuel
                            types.</p>
                    </div>

                    <h3 class="font-bold text-lg mb-4 text-green-custom">Environmental Initiatives in Action</h3>
                    <div class="grid grid-cols-2 gap-4">
                        <img src="{{ asset('assets/about.jpg') }}" alt="Environmental Initiative 1"
                            class="w-full h-48 object-cover rounded-lg shadow-md hover:scale-105 transition-transform">
                        <img src="{{ asset('assets/about.jpg') }}" alt="Environmental Initiative 2"
                            class="w-full h-48 object-cover rounded-lg shadow-md hover:scale-105 transition-transform">
                        <img src="{{ asset('assets/about.jpg') }}" alt="Environmental Initiative 3"
                            class="w-full h-48 object-cover rounded-lg shadow-md hover:scale-105 transition-transform">
                        <img src="{{ asset('assets/about.jpg') }}" alt="Environmental Initiative 4"
                            class="w-full h-48 object-cover rounded-lg shadow-md hover:scale-105 transition-transform">
                        {{-- Tambahkan lebih banyak foto inisiatif lingkungan jika ada --}}
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="exports" class="bg-beige py-8 md:py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-12 lg:px-20">
            <h2 class="text-xl md:text-2xl font-extrabold text-center mb-8">Global Exports & Partnerships</h2>

            <div class="grid md:grid-cols-2 gap-8 items-center max-w-6xl mx-auto">
                <div>
                    <h3 class="font-bold text-lg mb-4 text-green-custom">Our Global Export Reach</h3>
                    <p class="text-gray-700 mb-6">We proudly serve a wide network of international clients. Our PKS
                        charcoal reaches key markets across the globe, supported by efficient logistics.</p>
                    <img src="{{ asset('assets/map-indonesia.png') }}" alt="World Map Highlighting Export Countries"
                        class="w-full h-auto object-contain rounded-lg shadow-md mb-8">
                </div>

                <div>
                    <h3 class="font-bold text-lg mb-4 text-green-custom">Strategic Partnerships</h3>
                    <p class="text-gray-700 mb-6">We collaborate with leading companies worldwide, ensuring seamless
                        distribution and reliable supply of our biomass products.</p>
                    <div class="flex flex-wrap items-center justify-center gap-6 mb-8">
                        <img src="{{ asset('assets/about.jpg') }}" alt="Partner Company 1 Logo"
                            class="h-16 object-contain grayscale hover:grayscale-0 transition-all duration-300">
                        <img src="{{ asset('assets/about.jpg') }}" alt="Partner Company 2 Logo"
                            class="h-16 object-contain grayscale hover:grayscale-0 transition-all duration-300">
                        <img src="{{ asset('assets/about.jpg') }}" alt="Partner Company 3 Logo"
                            class="h-16 object-contain grayscale hover:grayscale-0 transition-all duration-300">
                        {{-- Tambahkan lebih banyak logo partner --}}
                    </div>

                    <h3 class="font-bold text-lg mb-4 text-green-custom">Efficient Export Operations</h3>
                    <p class="text-gray-700 mb-6">Our dedicated team ensures smooth and efficient container loading
                        operations, guaranteeing timely and secure delivery to our international clients.</p>
                    <div class="grid grid-cols-2 gap-4">
                        <img src="{{ asset('assets/about.jpg') }}" alt="Container Loading Operation 1"
                            class="w-full h-48 object-cover rounded-lg shadow-md hover:scale-105 transition-transform">
                        <img src="{{ asset('assets/about.jpg') }}" alt="Container Loading Operation 2"
                            class="w-full h-48 object-cover rounded-lg shadow-md hover:scale-105 transition-transform">
                        {{-- Tambahkan lebih banyak foto operasi loading --}}
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="gallery" class="py-8 md:py-12 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-12 lg:px-20">
            <h2 class="text-xl md:text-2xl font-extrabold text-center mb-8">Our Visual Gallery</h2>

            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-6">
                <div
                    class="group relative overflow-hidden rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300 cursor-pointer">
                    <img src="{{ asset('assets/about.jpg') }}" alt="Large Stockpile of PKS Charcoal"
                        class="w-full h-48 object-cover transform group-hover:scale-105 transition-transform duration-300">
                    <div
                        class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <p class="text-white text-sm font-bold">Large Stockpile</p>
                    </div>
                </div>
                <div
                    class="group relative overflow-hidden rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300 cursor-pointer">
                    <img src="{{ asset('assets/about.jpg') }}" alt="Raw PKS Material Stock"
                        class="w-full h-48 object-cover transform group-hover:scale-105 transition-transform duration-300">
                    <div
                        class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <p class="text-white text-sm font-bold">Raw Material Stock</p>
                    </div>
                </div>

                <div
                    class="group relative overflow-hidden rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300 cursor-pointer">
                    <img src="{{ asset('assets/about.jpg') }}" alt="PKS Charcoal Production Line"
                        class="w-full h-48 object-cover transform group-hover:scale-105 transition-transform duration-300">
                    <div
                        class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <p class="text-white text-sm font-bold">Production Line</p>
                    </div>
                </div>
                <div
                    class="group relative overflow-hidden rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300 cursor-pointer">
                    <img src="{{ asset('assets/about.jpg') }}" alt="Quality Control Area"
                        class="w-full h-48 object-cover transform group-hover:scale-105 transition-transform duration-300">
                    <div
                        class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <p class="text-white text-sm font-bold">Quality Control</p>
                    </div>
                </div>

                <div
                    class="group relative overflow-hidden rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300 cursor-pointer">
                    <img src="{{ asset('assets/about.jpg') }}" alt="Container Loading for Export"
                        class="w-full h-48 object-cover transform group-hover:scale-105 transition-transform duration-300">
                    <div
                        class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <p class="text-white text-sm font-bold">Container Loading</p>
                    </div>
                </div>
                <div
                    class="group relative overflow-hidden rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300 cursor-pointer">
                    <img src="{{ asset('assets/about.jpg') }}" alt="PKS Charcoal Ready for Shipment"
                        class="w-full h-48 object-cover transform group-hover:scale-105 transition-transform duration-300">
                    <div
                        class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <p class="text-white text-sm font-bold">Ready for Shipment</p>
                    </div>
                </div>
                {{-- Tambahkan lebih banyak thumbnail gambar untuk setiap kategori --}}
            </div>
        </div>
    </section>

    <section id="technical" class="bg-gray-50 py-8 md:py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-12 lg:px-20">
            <h2 class="text-xl md:text-2xl font-extrabold text-center mb-8">Technical Data & Certifications</h2>

            <div class="grid md:grid-cols-2 gap-8 max-w-6xl mx-auto">
                <div class="bg-white p-6 md:p-8 rounded-lg shadow-lg">
                    <h3 class="text-xl font-bold mb-4 text-green-custom">Comprehensive Specifications</h3>
                    <p class="text-gray-700 text-sm mb-6">Access detailed technical specifications for all our PKS
                        charcoal and raw PKS products. Ensure our products meet your exact requirements.</p>

                    <h4 class="font-semibold text-md mb-3 text-gray-800">Download Spec Sheets:</h4>
                    <div class="space-y-4">
                        <a href="{{ asset('assets/specs/pks_charcoal_full_spec.pdf') }}" download
                            class="inline-flex items-center px-6 py-3 border-none rounded-md text-sm font-semibold cursor-pointer transition-all duration-300 bg-green-custom text-white shadow-green-custom hover:bg-green-hover hover:-translate-y-0.5 hover:shadow-green-hover">
                            <i class="fas fa-file-download mr-2"></i> PKS Charcoal Spec Sheet
                        </a>
                        <a href="{{ asset('assets/specs/raw_pks_full_spec.pdf') }}" download
                            class="inline-flex items-center px-6 py-3 border-none rounded-md text-sm font-semibold cursor-pointer transition-all duration-300 bg-green-custom text-white shadow-green-custom hover:bg-green-hover hover:-translate-y-0.5 hover:shadow-green-hover">
                            <i class="fas fa-file-download mr-2"></i> Raw PKS Spec Sheet
                        </a>
                        {{-- Tambahkan tombol download untuk spec sheet lain jika ada --}}
                    </div>
                </div>

                <div class="bg-white p-6 md:p-8 rounded-lg shadow-lg">
                    <h3 class="text-xl font-bold mb-4 text-green-custom">Our Official Certifications</h3>
                    <p class="text-gray-700 text-sm mb-6">Transparency and quality assurance are paramount. View our
                        official certification documents validating our product standards and sustainable practices.</p>

                    <h4 class="font-semibold text-md mb-3 text-gray-800">Certification Documents:</h4>
                    <div class="grid grid-cols-2 gap-4">
                        <a href="{{ asset('assets/certifications/certificate_1_full.pdf') }}" target="_blank"
                            class="block group relative">
                            <img src="{{ asset('assets/certifications/certificate_thumb_1.jpg') }}"
                                alt="Certification Document 1 Thumbnail"
                                class="w-full h-48 object-cover rounded-lg shadow-md group-hover:scale-105 transition-transform">
                            <span
                                class="absolute bottom-0 left-0 w-full bg-black bg-opacity-70 text-white text-xs text-center py-1 opacity-0 group-hover:opacity-100 transition-opacity">View
                                Document</span>
                        </a>
                        <a href="{{ asset('assets/certifications/certificate_2_full.pdf') }}" target="_blank"
                            class="block group relative">
                            <img src="{{ asset('assets/certifications/certificate_thumb_2.jpg') }}"
                                alt="Certification Document 2 Thumbnail"
                                class="w-full h-48 object-cover rounded-lg shadow-md group-hover:scale-105 transition-transform">
                            <span
                                class="absolute bottom-0 left-0 w-full bg-black bg-opacity-70 text-white text-xs text-center py-1 opacity-0 group-hover:opacity-100 transition-opacity">View
                                Document</span>
                        </a>
                        {{-- Tambahkan lebih banyak gambar dokumen sertifikasi --}}
                    </div>
                </div>
            </div>

            <div class="mt-12 text-center bg-green-50 p-8 rounded-lg shadow-md">
                <h3 class="font-bold text-2xl mb-4 text-green-custom">Ready to Experience the Difference?</h3>
                <p class="text-gray-700 text-lg mb-6 max-w-2xl mx-auto">Request a sample of our premium PKS charcoal
                    today
                    and see why we are the trusted choice for sustainable biomass energy.</p>
                <a href="#contact"
                    class="inline-flex items-center px-8 py-4 border-none rounded-md text-base font-semibold cursor-pointer transition-all duration-300 bg-green-custom text-white shadow-green-custom hover:bg-green-hover hover:-translate-y-0.5 hover:shadow-green-hover">
                    <i class="fas fa-flask mr-2"></i> Request Your Sample Now!
                </a>
            </div>
        </div>
    </section>
    <section id="contact" class="py-8 sm:py-12 md:py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Title -->
            <h2 class="text-2xl sm:text-3xl md:text-4xl font-extrabold text-center mb-8 sm:mb-12 text-gray-900">
                Contact Us
            </h2>

            <!-- Main Grid -->
            <div class="grid lg:grid-cols-2 gap-8 lg:gap-12 max-w-6xl mx-auto">

                <!-- Contact Information -->
                <div class="space-y-6">
                    <h3 class="text-lg sm:text-xl font-bold mb-6 text-green-custom">Direct Contact</h3>

                    <!-- Contact Details -->
                    <div class="space-y-6">
                        <!-- Head Office -->
                        <div class="flex items-start gap-3 sm:gap-4">
                            <i
                                class="fas fa-map-marker-alt text-green-custom text-lg sm:text-xl mt-1 flex-shrink-0"></i>
                            <div class="min-w-0">
                                <p class="font-semibold text-gray-900 mb-1">Head Office</p>
                                <p class="text-gray-600 text-sm sm:text-base leading-relaxed">
                                    Neo Soho Apartment, Jalan Let. Jend. S. Parman Kav. 28 Unit 2011<br>
                                    Tanjung Duren Selatan Subdistrict, Grogol Petamburan District<br>
                                    West Jakarta, DKI Jakarta, 11470<br>
                                    Indonesia
                                </p>
                            </div>
                        </div>

                        <!-- Phone -->
                        <div class="flex items-start gap-3 sm:gap-4">
                            <i class="fas fa-phone text-green-custom text-lg sm:text-xl mt-1 flex-shrink-0"></i>
                            <div>
                                <p class="font-semibold text-gray-900 mb-1">Phone Number</p>
                                <a href="tel:+6285124790253"
                                    class="text-gray-600 text-sm sm:text-base hover:text-green-custom transition-colors">
                                    +62 851 2479 0253
                                </a>
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="flex items-start gap-3 sm:gap-4">
                            <i class="fas fa-envelope text-green-custom text-lg sm:text-xl mt-1 flex-shrink-0"></i>
                            <div>
                                <p class="font-semibold text-gray-900 mb-1">Email Address</p>
                                <a href="mailto:info@fujiyamabiomass.com"
                                    class="text-gray-600 text-sm sm:text-base hover:text-green-custom transition-colors">
                                    info@fujiyamabiomass.com
                                </a>
                            </div>
                        </div>

                        <!-- Business Hours -->
                        <div class="flex items-start gap-3 sm:gap-4">
                            <i class="fas fa-clock text-green-custom text-lg sm:text-xl mt-1 flex-shrink-0"></i>
                            <div>
                                <p class="font-semibold text-gray-900 mb-1">Business Hours</p>
                                <p class="text-gray-600 text-sm sm:text-base">Monday - Friday: 08:00 - 17:00 WIB</p>
                            </div>
                        </div>

                        <!-- WhatsApp -->
                        <div class="flex items-start gap-3 sm:gap-4 p-4 bg-green-50 rounded-lg">
                            <i class="fab fa-whatsapp text-green-custom text-xl sm:text-2xl mt-1 flex-shrink-0"></i>
                            <div>
                                <p class="font-semibold text-gray-900 mb-1">Contact via WhatsApp</p>
                                <a href="https://wa.me/6285124790253" target="_blank"
                                    class="text-green-custom hover:text-green-hover transition-colors text-sm sm:text-base font-medium">
                                    +62 851 2479 0253
                                </a>
                                <p class="text-xs sm:text-sm text-gray-500 mt-1">Quick response during business hours
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Office Image -->
                    <div class="mt-8">
                        <p class="font-semibold text-gray-900 mb-3">Our Office</p>
                        <div class="w-full h-48 sm:h-64 md:h-80 bg-gray-200 rounded-lg overflow-hidden shadow-md">
                            <img src="{{ asset('assets/neo-soho.jpg') }}" alt="Our Office Building"
                                class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
                        </div>
                        <p class="text-xs sm:text-sm text-gray-500 mt-2">Modern office space at Neo Soho Apartment</p>
                    </div>
                </div>

                <!-- Contact Form and Map -->
                <div class="space-y-8">
                    <!-- Contact Form -->
                    <div>
                        <h3 class="text-lg sm:text-xl font-bold mb-6 text-green-custom">Send a Message</h3>
                        <form class="space-y-4" onsubmit="handleSubmit(event)">
                            <!-- Name Fields -->
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <input type="text" placeholder="First Name" required
                                    class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-custom focus:border-transparent text-sm sm:text-base">
                                <input type="text" placeholder="Last Name"
                                    class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-custom focus:border-transparent text-sm sm:text-base">
                            </div>

                            <!-- Email -->
                            <input type="email" placeholder="Email Address" required
                                class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-custom focus:border-transparent text-sm sm:text-base">

                            <!-- Company -->
                            <input type="text" placeholder="Company (Optional)"
                                class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-custom focus:border-transparent text-sm sm:text-base">

                            <!-- Inquiry Type -->
                            <select required
                                class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-custom focus:border-transparent text-gray-700 text-sm sm:text-base">
                                <option value="">Select Inquiry Type</option>
                                <option value="product">Product Information</option>
                                <option value="quote">Request for Quotation</option>
                                <option value="partnership">Partnership Opportunity</option>
                                <option value="other">Other</option>
                            </select>

                            <!-- Message -->
                            <textarea placeholder="Your Message" rows="4" required
                                class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-custom focus:border-transparent text-sm sm:text-base resize-none"></textarea>

                            <!-- Submit Button -->
                            <button type="submit"
                                class="w-full bg-green-custom text-white py-3 px-6 rounded-lg font-semibold hover:bg-green-hover transition-colors text-sm sm:text-base">
                                Send Message
                            </button>
                        </form>
                    </div>

                    <!-- Map Section -->
                    <div>
                        <h3 class="text-lg sm:text-xl font-bold mb-4 text-green-custom">Office Location</h3>
                        <div class="w-full">
                            <div class="w-full h-64 sm:h-80 bg-gray-200 rounded-lg overflow-hidden shadow-lg">
                                <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.671136532199!2d106.78738997458905!3d-6.174763660506777!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f7002212556b%3A0xd553386b470af88!2sNEO%20SOHO%20APARTEMENT!5e0!3m2!1sid!2sid!4v1751515557555!5m2!1sid!2sid"
                                    width="100%" height="100%" style="border:0;" allowfullscreen=""
                                    loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="rounded-lg">
                                </iframe>
                            </div>
                            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mt-3 gap-2">
                                <p class="text-xs sm:text-sm text-gray-600">
                                    Click the map for directions to Neo Soho Central Park
                                </p>
                                <a href="https://maps.app.goo.gl/3JPcUpRDfP28vtj6A" target="_blank"
                                    class="text-green-custom hover:text-green-hover transition-colors text-xs sm:text-sm flex items-center gap-1 font-medium">
                                    <i class="fas fa-external-link-alt"></i>
                                    Open in Google Maps
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="bg-green-custom text-white py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-12 lg:px-20">
            <div class="grid md:grid-cols-4 gap-6">
                <div>
                    <div class="flex items-center gap-3 mb-4">
                        <img src="{{ asset('assets/fujiyama-logo.png') }}" alt="Fujiyama logo"
                            class="w-10 h-10 object-contain">
                        <div>
                            <h3 class="font-bold text-lg">Fujiyama</h3>
                            <p class="text-sm opacity-80">Biomass Energy</p>
                        </div>
                    </div>
                    <p class="text-sm opacity-80">Leading the future of sustainable energy through premium PKS charcoal
                        solutions.</p>
                </div>

                <div>
                    <h4 class="font-bold mb-4">Quick Links</h4>
                    <ul class="space-y-2 text-sm">
                        <li><a href="#home" class="opacity-80 hover:opacity-100 transition">Home</a></li>
                        <li><a href="#about" class="opacity-80 hover:opacity-100 transition">About Us</a></li>
                        <li><a href="#products" class="opacity-80 hover:opacity-100 transition">Products</a></li>
                        <li><a href="#sustainability"
                                class="opacity-80 hover:opacity-100 transition">Sustainability</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="font-bold mb-4">Services</h4>
                    <ul class="space-y-2 text-sm">
                        <li><a href="#exports" class="opacity-80 hover:opacity-100 transition">Global Exports</a></li>
                        <li><a href="#technical" class="opacity-80 hover:opacity-100 transition">Technical Data</a>
                        </li>
                        <li><a href="#contact" class="opacity-80 hover:opacity-100 transition">Consulting</a></li>
                        <li><a href="#gallery" class="opacity-80 hover:opacity-100 transition">Gallery</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="font-bold mb-4">Contact</h4>
                    <div class="space-y-2 text-sm">
                        <p class="opacity-80">Jakarta, Indonesia</p>
                        <p class="opacity-80">info@fujiyamabiomass.com</p>
                        <p class="opacity-80">+62 877 8877 2342</p>
                    </div>

                    <div class="flex gap-3 mt-4">
                        <a href="#"
                            class="w-8 h-8 bg-white bg-opacity-20 rounded-full flex items-center justify-center hover:bg-opacity-30 transition">
                            <i class="fab fa-linkedin-in text-sm"></i>
                        </a>
                        <a href="#"
                            class="w-8 h-8 bg-white bg-opacity-20 rounded-full flex items-center justify-center hover:bg-opacity-30 transition">
                            <i class="fab fa-twitter text-sm"></i>
                        </a>
                        <a href="#"
                            class="w-8 h-8 bg-white bg-opacity-20 rounded-full flex items-center justify-center hover:bg-opacity-30 transition">
                            <i class="fab fa-instagram text-sm"></i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="border-t border-white border-opacity-20 mt-8 pt-6 text-center">
                <p class="text-sm opacity-80">© {{ date('Y') }} PT Fujiyama Biomass Energy. All rights reserved.
                </p>
            </div>
        </div>
    </footer>

    <script>
        // Mobile Menu Toggle
        const menuBtn = document.getElementById('menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');
        const menuOverlay = document.getElementById('menu-overlay');

        function toggleMobileMenu() {
            menuBtn.classList.toggle('active');
            mobileMenu.classList.toggle('active');
            menuOverlay.classList.toggle('active');
            document.body.classList.toggle('overflow-hidden');
        }

        menuBtn.addEventListener('click', toggleMobileMenu);
        menuOverlay.addEventListener('click', toggleMobileMenu);

        // Close menu when clicking on menu links
        document.querySelectorAll('.mobile-menu-link').forEach(link => {
            link.addEventListener('click', toggleMobileMenu);
        });

        // Close menu on Escape key
        document.addEventListener('keydown', e => {
            if (e.key === 'Escape' && mobileMenu.classList.contains('active')) {
                toggleMobileMenu();
            }
        });

        // Close menu on resize for desktop
        window.addEventListener('resize', () => {
            if (window.innerWidth >= 1024 && mobileMenu.classList.contains('active')) {
                toggleMobileMenu();
            }
        });

        // Navbar scroll effect
        window.addEventListener('scroll', function() {
            const nav = document.querySelector('nav');
            if (window.scrollY > 100) {
                nav.classList.add('scrolled');
            } else {
                nav.classList.remove('scrolled');
            }
        });

        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const targetId = this.getAttribute('href');
                const target = document.querySelector(targetId);
                if (target) {
                    // Adjust scroll position by subtracting navbar height
                    const navbarHeight = document.querySelector('nav').offsetHeight;
                    const offset = target.offsetTop - navbarHeight;

                    window.scrollTo({
                        top: offset,
                        behavior: 'smooth'
                    });
                }
            });
        });

        // Simple Form submission alert (for demonstration)
        const contactForm = document.querySelector('#contact form');
        if (contactForm) {
            contactForm.addEventListener('submit', function(e) {
                e.preventDefault();
                alert('Thank you for your message! We will get back to you soon.');
                this.reset(); // Clear form fields
            });
        }

        function handleSubmit(event) {
            event.preventDefault();
            alert('Terima kasih! Pesan Anda telah dikirim. Kami akan merespons dalam waktu 24 jam.');
        }
    </script>
</body>

</html>
