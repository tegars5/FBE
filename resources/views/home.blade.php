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
            /* Tambahkan padding-top ke body untuk mengkompensasi navbar fixed */
            padding-top: 80px;
            /* Sesuaikan nilai ini dengan tinggi navbar Anda (misal: py-5 = 20px atas + 20px bawah + tinggi konten = ~80px) */
        }

        @media (min-width: 768px) {

            /* Untuk md breakpoint dan di atasnya */
            body {
                padding-top: 100px;
                /* Sesuaikan lagi jika navbar lebih tinggi di desktop */
            }
        }

        /* --- CSS Tambahan untuk Efek Scroll --- */
        /* Pastikan transisi mulus saat logo bergerak */
        .logo-image-container {
            transition: top 0.3s ease-in-out;
            /* Tambahkan transisi ke properti top */
        }

        /* Gaya saat navbar di-scroll (kelas 'scrolled' ditambahkan via JS) */
        nav.scrolled .logo-image-container {
            position: relative;
            /* Pastikan posisi relatif agar 'top' bekerja */
            top: 0 !important;
            /* Menimpa md:top-12 agar logo sejajar */
            width: 4rem;
            /* Contoh: perkecil logo saat di-scroll */
            height: 4rem;
        }

        nav.scrolled .logo-image-container img {
            object-fit: contain;
            /* Pastikan gambar tetap proporsional */
        }


        /* Sembunyikan elemen dekoratif logo-bg saat di-scroll */
        nav.scrolled .logo-bg {
            display: none;
            /* Atau gunakan opacity untuk efek fade: opacity: 0; transition: opacity 0.3s ease; */
        }

        /* Opsional: Ubah tinggi navigasi saat di-scroll jika Anda ingin lebih ringkas */
        nav.scrolled {
            padding-top: 0.75rem;
            /* py-3 */
            padding-bottom: 0.75rem;
            /* py-3 */
            /* box-shadow: 0 2px 5px rgba(0,0,0,0.1); */
            /* Tambahkan shadow ringan */
        }

        /* Pastikan tautan navigasi mobile tidak terpengaruh */
        .mobile-menu {
            transition: transform 0.3s ease-in-out;
        }

        /* --- CSS Anda yang sudah ada --- */
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

        /* ========== IMPROVED HAMBURGER MENU STYLES ========== */

        /* Hamburger Button - Modern Design */
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

        /* Hamburger Lines - Premium Animation */
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

        /* Active State - Smooth X Animation */
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

        /* Mobile Menu Overlay - Smooth Backdrop */
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

        /* Mobile Menu - Modern Slide-in Design */
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

        /* Mobile Menu Header - Clean Design */
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

        /* Mobile Menu Items - Enhanced Styling */
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

        /* Mobile Menu Footer - Login Button */
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

        /* Responsive Adjustments */
        @media (max-width: 480px) {
            .mobile-menu {
                width: 100%;
                border-radius: 0;
            }
        }

        /* Dark Mode Support (Optional) */
        @media (prefers-color-scheme: dark) {
            .mobile-menu {
                background: #1f2937;
                color: #f9fafb;
            }

            .mobile-menu-header {
                background: linear-gradient(135deg, #374151 0%, #1f2937 100%);
                border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            }

            .mobile-menu-link {
                color: #f9fafb;
            }

            .mobile-menu-link:hover {
                background: rgba(255, 255, 255, 0.1);
                color: #4CAF50;
            }

            .mobile-menu-footer {
                background: linear-gradient(135deg, #374151 0%, #1f2937 100%);
                border-top: 1px solid rgba(255, 255, 255, 0.1);
            }
        }

        /* ========== END HAMBURGER MENU STYLES ========== */

        .logo-bg {
            border-bottom-right-radius: 150px 100px;
        }

        .hero-bg {
            background: linear-gradient(135deg, rgba(37, 41, 37, 0.8) 0%, rgba(32, 36, 32, 0.9) 100%),
                url('https://images.unsplash.com/photo-1466611653911-95081537e5b7?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80') center/cover;
        }

        /* Hero content alignment with about section */
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

        @media (max-width: 480px) {
            .mobile-menu {
                width: 100%;
            }
        }

        /* Animation for menu items */
        .mobile-menu-item {
            opacity: 1;
            transform: translateX(0);
        }
    </style>
</head>

<body class="font-sans leading-relaxed overflow-x-hidden">
    <div class="relative min-h-screen">
        <header class="absolute top-0 left-0 w-full h-screen hero-bg flex items-center justify-center" id="home">
            <div class="z-30 hero-content w-full animate-fadeInUp">
                <h1
                    class="hero-title text-3xl md:text-5xl font-bold mb-5 text-white text-shadow-hero leading-tight text-center md:text-left">
                    Sustainable Biomass Energy from <br class="hidden md:block">Indonesia to the World
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

        <nav class="bg-beige py-3 md:py-5 fixed top-0 w-full z-50 transition-all duration-300 ease-in-out">
            <div class="max-w-6xl mx-auto flex justify-between items-center px-4 md:px-5">
                <div class="relative flex items-center gap-4 z-[100]">
                    <div class="hidden md:block absolute top-24 -left-52 w-96 h-24 bg-beige logo-bg -z-10"></div>
                    <div
                        class="logo-image-container w-16 h-16 md:w-24 md:h-24 flex items-center justify-center relative md:top-12 bg-transparent">
                        <img src="{{ asset('assets/fujiyama-logo.png') }}" alt="Fujiyama Biomass Energy Logo"
                            class="w-full h-full object-contain" />
                    </div>
                </div>

                <ul class="hidden lg:flex list-none gap-6 xl:gap-10">
                    <li><a href="#home"
                            class="nav-link text-gray-800 font-medium text-base py-2.5 relative hover:text-green-light">Home</a>
                    </li>
                    <li><a href="#about"
                            class="nav-link text-gray-800 font-medium text-base py-2.5 relative hover:text-green-light">About
                            Us</a></li>
                    <li><a href="#products"
                            class="nav-link text-gray-800 font-medium text-base py-2.5 relative hover:text-green-light">Products</a>
                    </li>
                    <li><a href="#exports"
                            class="nav-link text-gray-800 font-medium text-base py-2.5 relative hover:text-green-light">Exports
                            & Partnerships</a></li>
                    <li>
                        <a href="{{ route('admin.login') }}"
                            class="px-4 xl:px-6 py-4 xl:py-3 rounded-md text-sm xl:text-base font-semibold bg-green-custom text-white shadow-green-custom hover:bg-green-hover transition-all">
                            Login
                        </a>
                    </li>
                </ul>

                <!-- IMPROVED HAMBURGER BUTTON -->
                <button class="lg:hidden hamburger" id="menu-btn" aria-label="Toggle mobile menu">
                    <span class="hamburger-line"></span>
                    <span class="hamburger-line"></span>
                    <span class="hamburger-line"></span>
                </button>
            </div>

            <!-- Mobile Menu Overlay -->
            <div class="mobile-menu-overlay" id="menu-overlay"></div>

            <!-- IMPROVED MOBILE MENU -->
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

                <!-- Mobile Menu Navigation -->
                <nav class="mobile-menu-nav">
                    <ul class="space-y-2">
                        <li class="mobile-menu-item">
                            <a href="#home" class="mobile-menu-link">
                                <i class="fas fa-home"></i>
                                Home
                            </a>
                        </li>
                        <li class="mobile-menu-item">
                            <a href="#about" class="mobile-menu-link">
                                <i class="fas fa-info-circle"></i>
                                About Us
                            </a>
                        </li>
                        <li class="mobile-menu-item">
                            <a href="#products" class="mobile-menu-link">
                                <i class="fas fa-cube"></i>
                                Products
                            </a>
                        </li>
                        <li class="mobile-menu-item">
                            <a href="#exports" class="mobile-menu-link">
                                <i class="fas fa-globe"></i>
                                Exports & Partnerships
                            </a>
                        </li>
                    </ul>
                </nav>

                <!-- Mobile Menu Footer -->
                <div class="mobile-menu-footer">
                    <button class="mobile-login-btn" onclick="window.location.href='{{ route('admin.login') }}'">
                        <i class="fas fa-sign-in-alt"></i>
                        Login
                    </button>
                </div>
            </div>
        </nav>
    </div>

    <section class="bg-beige py-8 md:py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-12 lg:px-20">
            <p class="text-base md:text-lg text-gray-700 text-center mb-8 max-w-3xl mx-auto">
                We are committed to the development of sustainable PKS charcoal products, ensuring the best quality and
                performance
                to meet global biomass energy needs.
            </p>

            <h2 class="text-xl md:text-2xl font-extrabold text-center mb-6 md:mb-10">Our PKS Charcoal Highlights</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 md:gap-8 max-w-6xl mx-auto">

                <div
                    class="space-y-3 text-left transition-all transform hover:scale-105 hover:shadow-lg hover:bg-gray-50 rounded-lg p-4 md:p-6">
                    <div class="flex justify-start">
                        <i class="fas fa-fire text-green-custom text-2xl"></i>
                    </div>
                    <h3 class="font-extrabold text-sm md:text-base">High Calorific Value</h3>
                    <p class="text-xs md:text-sm text-gray-600">Our PKS charcoal has a high calorific value, providing
                        efficient and powerful energy for various industrial applications.</p>
                </div>

                <div
                    class="space-y-3 text-left transition-all transform hover:scale-105 hover:shadow-lg hover:bg-gray-50 rounded-lg p-4 md:p-6">
                    <div class="flex justify-start">
                        <i class="fas fa-water text-green-custom text-2xl"></i>
                    </div>
                    <h3 class="font-extrabold text-sm md:text-base">Low Ash & Moisture</h3>
                    <p class="text-xs md:text-sm text-gray-600">Carefully processed to ensure minimal ash and moisture
                        content, resulting in cleaner and more efficient combustion.</p>
                </div>

                <div
                    class="space-y-3 text-left transition-all transform hover:scale-105 hover:shadow-lg hover:bg-gray-50 rounded-lg p-4 md:p-6">
                    <div class="flex justify-start">
                        <i class="fas fa-globe-americas text-green-custom text-2xl"></i>
                    </div>
                    <h3 class="font-extrabold text-sm md:text-base">Global Export Quality</h3>
                    <p class="text-xs md:text-sm text-gray-600">Meeting strict international standards, our PKS
                        charcoal is ready for export to global markets and recognized for its quality.</p>
                </div>

                <div
                    class="space-y-3 text-left transition-all transform hover:scale-105 hover:shadow-lg hover:bg-gray-50 rounded-lg p-4 md:p-6">
                    <div class="flex justify-start">
                        <i class="fas fa-cogs text-green-custom text-2xl"></i>
                    </div>
                    <h3 class="font-extrabold text-sm md:text-base">Continuous Innovation</h3>
                    <p class="text-xs md:text-sm text-gray-600">We continuously innovate in the development of biomass
                        products to provide superior and sustainable renewable energy solutions.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- About Section --}}
    <section id="about"
        class="max-w-7xl mx-auto px-4 sm:px-6 md:px-12 lg:px-20 py-8 md:py-12 space-y-8 md:space-y-12">
        <div class="max-w-4xl">
            <h2 class="text-xl md:text-2xl font-extrabold mb-2">About Us</h2>
            <p class="text-sm md:text-base font-normal max-w-xl"> PT Fujiyama Biomass Energy supports renewable energy
                through PKS charcoal products. </p>
        </div>

        <div class="flex flex-col lg:flex-row lg:items-center lg:space-x-12 space-y-6 lg:space-y-0 max-w-4xl">
            <img src="{{ asset('assets/about.jpg') }}"
                alt="Close-up image of PKS charcoal pellets and a white block product on a wooden pallet"
                class="w-full lg:w-48 h-48 lg:h-36 object-cover rounded-md flex-shrink-0" />
            <div>
                <h3 class="text-lg md:text-xl font-extrabold mb-3">Products</h3>
                <ul class="list-disc list-inside space-y-1 text-sm md:text-base font-normal max-w-md">
                    <li>High calorific value</li>
                    <li>Low ash and moisture-content</li>
                    <li>Export quality specifications</li>
                </ul>
            </div>
        </div>

        <div class="flex flex-col lg:flex-row lg:items-center lg:space-x-12 space-y-6 lg:space-y-0 max-w-4xl">
            <div class="flex flex-col space-y-4 lg:flex-1 order-2 lg:order-1">
                <h3 class="text-lg md:text-xl font-extrabold">Exports &amp; Partnerships</h3>
                <div class="flex flex-wrap gap-4 items-center">
                    <div class="flex items-center space-x-2">
                        <div class="w-5 h-5 rounded-full bg-green-custom"></div>
                        <span class="font-bold text-sm">LOGO</span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <div class="w-5 h-5 rounded-full bg-green-custom"></div>
                        <span class="font-bold text-sm">LOGO</span>
                    </div>
                </div>
                <button
                    class="bg-green-custom text-white px-5 py-2 rounded-md w-max text-sm font-medium hover:bg-green-hover transition">
                    Contact Us
                </button>
            </div>
            <img src="{{ asset('assets/map-indonesia.png') }}" alt="Green colored map of Indonesia showing islands"
                class="w-full max-w-md rounded-md object-contain lg:flex-1 order-1 lg:order-2" />
        </div>
    </section>

    <div class="bg-toner text-white text-center py-3 px-4 text-xs md:text-sm font-normal">
        PKS charcoal products that benefit both the planet and its people
    </div>

    {{-- Why Choose Us Section --}}
    <section class="bg-beige py-8 md:py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-12 lg:px-20">
            <h2 class="text-xl md:text-2xl font-extrabold text-center mb-6 md:mb-10">Why choose us?</h2>

            <!-- Layout 4 kolom sesuai gambar -->
            <div class="grid grid-cols-1 lg:grid-cols-4 gap-6 md:gap-8 max-w-6xl mx-auto">

                <!-- Kolom 1: High-Quality PKS Material (Text) -->
                <div
                    class="space-y-3 text-left transition-all transform hover:scale-105 hover:shadow-lg hover:bg-gray-50 rounded-lg p-4 md:p-6">
                    <div class="flex justify-start">
                        <i class="fas fa-shield-alt text-green-custom text-2xl"></i>
                    </div>
                    <h3 class="font-extrabold text-sm md:text-base">High-Quality PKS Material</h3>
                    <p class="text-xs md:text-sm text-gray-600">Sourced from selected plantations, our PKS ensures high
                        calorific value and low ash content.</p>
                    <a href="#"
                        class="text-xs md:text-sm font-semibold text-green-custom hover:text-green-hover hover:underline flex items-center justify-start">
                        View Product Specs <i class="fas fa-arrow-right ml-1"></i>
                    </a>
                </div>

                <!-- Kolom 2: Gambar High-Quality PKS Material -->
                <div class="transition-all transform hover:scale-105">
                    <img src="{{ asset('assets/pks-material.jpg') }}" alt="High quality PKS material"
                        class="rounded-md w-full h-48 md:h-64 object-cover" />
                    <div class="text-center mt-2">
                        <h4 class="font-bold text-sm md:text-base">High-Quality PKS Material</h4>
                    </div>
                </div>

                <!-- Kolom 3: Reliable Logistics & Support (Text) -->
                <div
                    class="space-y-3 text-left transition-all transform hover:scale-105 hover:shadow-lg hover:bg-gray-50 rounded-lg p-4 md:p-6">
                    <div class="flex justify-start">
                        <i class="fas fa-globe text-green-custom text-2xl"></i>
                    </div>
                    <h3 class="font-extrabold text-sm md:text-base">Reliable Logistics & Support</h3>
                    <p class="text-xs md:text-sm text-gray-600">We provide export-ready packaging with global shipping
                        support.</p>
                    <a href="#"
                        class="text-xs md:text-sm font-semibold text-green-custom hover:text-green-hover hover:underline flex items-center justify-start">
                        View Product Specs <i class="fas fa-arrow-right ml-1"></i>
                    </a>
                </div>

                <!-- Kolom 4: Gambar High-Quality PKS Material -->
                <div class="transition-all transform hover:scale-105">
                    <img src="{{ asset('assets/product.png') }}" alt="High quality PKS material"
                        class="rounded-md w-full h-48 md:h-64 object-cover" />
                    <div class="text-center mt-2">
                        <h4 class="font-bold text-sm md:text-base">High-Quality PKS Material</h4>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{--  Articles Section --}}
    <section class="max-w-7xl mx-auto px-4 sm:px-6 md:px-12 lg:px-20 pb-8 md:pb-12" id="articles">
        <div class="flex justify-between items-center mb-4 md:mb-6">
            <h3 class="font-extrabold text-sm md:text-lg max-w-xs leading-tight">The latest articles and industry
                insights</h3>
            <a href="{{ route('articles.index') }}"
                class="text-xs md:text-sm text-blue-700 font-semibold hover:underline">View All →</a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-6">
            @if (!empty($articles) && $articles->isNotEmpty())
                @php $featured = $articles->first(); @endphp
                <article
                    class="md:col-span-2 lg:col-span-1 space-y-2 transition-all hover:scale-105 hover:shadow-lg hover:text-blue-700">
                    <a href="{{ route('articles.show', $featured->id) }}" class="block">
                        @if ($featured->photo)
                            <img src="{{ Storage::disk('s3')->url($featured->photo) }}" alt="{{ $featured->title }}"
                                class="rounded-md w-full object-cover h-40 md:h-48 transition-all hover:scale-105" />
                        @else
                            <img src="{{ asset('images/no-image.png') }}" alt="No Image Available"
                                class="rounded-md w-full object-cover h-40 md:h-48 transition-all hover:scale-105" />
                        @endif
                        <h4 class="font-semibold text-sm md:text-base leading-tight mt-2">{{ $featured->title }}</h4>
                        <p class="text-xs md:text-sm text-gray-600">Article —
                            {{ $featured->created_at->format('F j, Y') }}</p>
                    </a>
                </article>

                @if ($articles->count() > 1)
                    <div class="space-y-6 md:space-y-8">
                        @foreach ($articles->skip(1)->take(2) as $article)
                            <article
                                class="flex space-x-3 transition-all hover:scale-105 hover:shadow-lg hover:text-blue-700">
                                <a href="{{ route('articles.show', $article->id) }}" class="flex space-x-3">
                                    @if ($article->photo)
                                        <img src="{{ Storage::disk('s3')->url($article->photo) }}"
                                            alt="{{ $article->title }}"
                                            class="rounded-md w-20 md:w-24 h-12 md:h-16 object-cover flex-shrink-0 transition-all hover:scale-105" />
                                    @else
                                        <img src="{{ asset('images/no-image.png') }}" alt="No Image Available"
                                            class="rounded-md w-20 md:w-24 h-12 md:h-16 object-cover flex-shrink-0 transition-all hover:scale-105" />
                                    @endif
                                    <div class="flex flex-col justify-between">
                                        <h4 class="font-semibold text-xs md:text-sm leading-tight">
                                            {{ $article->title }}</h4>
                                        <p class="text-xs text-gray-600">Article —
                                            {{ $article->created_at->format('F j, Y') }}</p>
                                    </div>
                                </a>
                            </article>
                        @endforeach
                    </div>
                @endif

                @if ($articles->count() > 3)
                    <div class="space-y-6 md:space-y-8">
                        @foreach ($articles->skip(3)->take(2) as $article)
                            <article
                                class="flex space-x-3 transition-all hover:scale-105 hover:shadow-lg hover:text-blue-700">
                                <a href="{{ route('articles.show', $article->id) }}" class="flex space-x-3">
                                    @if ($article->photo)
                                        <img src="{{ Storage::disk('s3')->url($article->photo) }}"
                                            alt="{{ $article->title }}"
                                            class="rounded-md w-20 md:w-24 h-12 md:h-16 object-cover flex-shrink-0 transition-all hover:scale-105" />
                                    @else
                                        <img src="{{ asset('images/no-image.png') }}" alt="No Image Available"
                                            class="rounded-md w-20 md:w-24 h-12 md:h-16 object-cover flex-shrink-0 transition-all hover:scale-105" />
                                    @endif
                                    <div class="flex flex-col justify-between">
                                        <h4 class="font-semibold text-xs md:text-sm leading-tight">
                                            {{ $article->title }}</h4>
                                        <p class="text-xs text-gray-600">Article —
                                            {{ $article->created_at->format('F j, Y') }}</p>
                                    </div>
                                </a>
                            </article>
                        @endforeach
                    </div>
                @endif
            @else
                <div class="col-span-full text-center py-8">
                    <p class="text-gray-500 text-sm md:text-base">No articles available at the moment.</p>
                </div>
            @endif
        </div>
    </section>


    <section
        class="max-w-7xl mx-auto px-4 sm:px-6 md:px-12 lg:px-20 py-6 flex flex-col md:flex-row items-center justify-between border-t border-gray-300 gap-4">
        <h3 class="font-extrabold text-sm md:text-base max-w-xs leading-tight text-center md:text-left">
            Make sure you choose the right expedition services for your delivery
        </h3>
        <button
            class="bg-green-custom text-white px-6 py-3 rounded-md text-sm font-medium hover:bg-green-hover transition w-full md:w-auto max-w-xs">
            Contact Us
        </button>
    </section>

    {{-- Footer Section --}}
    <footer class="bg-beige py-12">
        <div class="max-w-7xl mx-auto px-6 sm:px-12 md:px-20">
            <div class="flex flex-col md:flex-row md:justify-between md:space-x-12">
                <div class="flex flex-col space-y-3 md:flex-1">
                    <div class="flex items-center space-x-2">
                        <img src="{{ asset('assets/fujiyama-logo.png') }}" alt="Fujiyama logo"
                            class="w-6 h-6 object-contain rounded-full" />
                        <span class="font-bold text-xs md:text-sm">fujiyamabiomassenergy</span>
                    </div>
                    <p class="text-[9px] md:text-xs max-w-xs">
                        Fujiyama Biomass Energy provides sustainable energy solutions for customers around the world
                        from 50+ leading
                        industries. For more information please contact us.
                    </p>
                    <p class="text-[8px] md:text-[10px] text-gray-400">© 2025 All rights reserved – fujiyama</p>
                </div>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-6 md:flex-1">
                    <div class="space-y-1">
                        <h4 class="font-semibold text-xs md:text-sm">Products</h4>
                        <ul class="space-y-1 text-[9px] md:text-xs text-gray-600">
                            <li><a href="#" class="hover:underline">Biomass Pellets</a></li>
                            <li><a href="#" class="hover:underline">Wood Chips</a></li>
                            <li><a href="#" class="hover:underline">Briquettes</a></li>
                            <li><a href="#" class="hover:underline">Case Studies</a></li>
                            <li><a href="#" class="hover:underline">Pricing</a></li>
                            <li><a href="#" class="hover:underline">Demo</a></li>
                        </ul>
                    </div>
                    <div class="space-y-1">
                        <h4 class="font-semibold text-xs md:text-sm">Company</h4>
                        <ul class="space-y-1 text-[9px] md:text-xs text-gray-600">
                            <li><a href="#" class="hover:underline">About Us</a></li>
                            <li><a href="#" class="hover:underline">Leadership</a></li>
                            <li><a href="#" class="hover:underline">News</a></li>
                            <li><a href="#" class="hover:underline">Media Kit</a></li>
                            <li><a href="#" class="hover:underline">Career</a></li>
                            <li><a href="#" class="hover:underline">Documentation</a></li>
                        </ul>
                    </div>
                    <div class="space-y-1 col-span-2 md:col-span-1">
                        <h4 class="font-semibold text-xs md:text-sm">Office -</h4>
                        <p class="text-[9px] md:text-xs text-gray-600 max-w-xs">SOHO Podomoro City, Jalan Let. Jend. S.
                            Parman Kav. 28 Unit 2011 Kelurahan Tanjung Duren Selatan, Kec. Grogol Petamburan
                            West Jakarta (Jakarta Barat), DKI Jakarta, 11470
                            Indonesia</p>
                        </p>
                        <h4 class="font-semibold text-xs md:text-sm mt-3">Contact us -</h4>
                        <p class="text-[9px] md:text-xs text-gray-600 max-w-xs">azmi@fbe.co.id</p>
                        <h4 class="font-semibold text-xs md:text-sm mt-3">Phone number</h4>
                        <p class="text-[9px] md:text-xs text-gray-600 max-w-xs">0851 - 2479 - 0253</p>
                        <p class="text-[9px] md:text-xs text-gray-600 max-w-xs">0822 - 1149 - 9289</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script>
        class MobileMenuController {
            constructor() {
                this.menuBtn = document.getElementById('menu-btn')
                this.mobileMenu = document.getElementById('mobile-menu')
                this.menuOverlay = document.getElementById('menu-overlay')
                this.mobileLinks = document.querySelectorAll('.mobile-menu-link')
                this.isMenuOpen = false

                this.init()
            }

            init() {
                this.menuBtn.addEventListener('click', () => this.toggleMenu())
                this.menuOverlay.addEventListener('click', () => this.closeMenu())

                this.mobileLinks.forEach(link => {
                    link.addEventListener('click', () => this.closeMenu())
                })

                document.addEventListener('keydown', e => {
                    if (e.key === 'Escape' && this.isMenuOpen) {
                        this.closeMenu()
                    }
                })

                window.addEventListener('resize', () => {
                    if (window.innerWidth >= 1024 && this.isMenuOpen) {
                        this.closeMenu()
                    }
                })
            }

            toggleMenu() {
                this.isMenuOpen ? this.closeMenu() : this.openMenu()
            }

            openMenu() {
                this.isMenuOpen = true
                this.menuBtn.classList.add('open')
                this.mobileMenu.classList.add('active')
                this.menuOverlay.classList.add('active')
                document.body.style.overflow = 'hidden'
            }

            closeMenu() {
                this.isMenuOpen = false
                this.menuBtn.classList.remove('open')
                this.mobileMenu.classList.remove('active')
                this.menuOverlay.classList.remove('active')
                document.body.style.overflow = ''
            }
        }

        document.addEventListener('DOMContentLoaded', () => {
            new MobileMenuController()

            // Navbar shrink on scroll
            const navbar = document.querySelector('nav')
            window.addEventListener('scroll', () => {
                navbar.classList.toggle('scrolled', window.scrollY > 100)
            })

            // Smooth scroll
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function(e) {
                    e.preventDefault()
                    const target = document.querySelector(this.getAttribute('href'))
                    if (target) {
                        const offset = target.offsetTop - document.querySelector('nav').offsetHeight
                        window.scrollTo({
                            top: offset,
                            behavior: 'smooth'
                        })
                    }
                })
            })
        })
    </script>

</body>

</html>
