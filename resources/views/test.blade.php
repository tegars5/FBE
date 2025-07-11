<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fujiyama Biomass Energy - Navbar Fixed</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        /*
         * =========================================
         * Global Styles & Reset
         * =========================================
         */
        :root {
            /* Colors */
            --color-green-dark: #1b5e20;
            /* Primary Green */
            --color-green-medium: #228b22;
            /* Green for hover states */
            --color-green-light: #4caf50;
            /* Light green accent */
            --color-beige-light: #f8f8e8;
            /* Light beige for sections */
            --color-beige-medium: #f5f5dc;
            /* Medium beige for accents */
            --color-text-dark: #374151;
            /* Dark gray for general text */
            --color-text-medium: #6b7280;
            /* Medium gray for secondary text */
            --color-white: #ffffff;
            --color-black: #000000;

            /* Spacing & Sizes */
            --spacing-xs: 0.25rem;
            --spacing-sm: 0.5rem;
            --spacing-md: 1rem;
            --spacing-lg: 1.5rem;
            --spacing-xl: 2rem;
        }

        /* Custom Tailwind colors */
        .bg-beige {
            background-color: var(--color-beige-light);
        }

        .bg-green-custom {
            background-color: var(--color-green-dark);
        }

        .bg-green-hover {
            background-color: var(--color-green-medium);
        }

        .text-green-custom {
            color: var(--color-green-dark);
        }

        .text-green-light {
            color: var(--color-green-light);
        }

        .shadow-green-custom {
            box-shadow: 0 4px 15px rgba(27, 94, 32, 0.3);
        }

        .shadow-green-hover {
            box-shadow: 0 8px 25px rgba(27, 94, 32, 0.4);
        }

        .shadow-white-custom {
            box-shadow: 0 4px 15px rgba(255, 255, 255, 0.2);
        }

        .text-shadow-hero {
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }

        /* Universal box-sizing for consistent layout */
        *,
        *::before,
        *::after {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: "Roboto", sans-serif;
            overflow-x: hidden;
        }

        @media (min-width: 768px) {
            body {
                padding-top: 100px;
            }
        }

        /* Hero background */
        .hero-bg {
            /* PERBAIKAN: Gunakan relative positioning dan min-height */
            position: relative;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .hero-content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 1rem;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fadeInUp {
            animation: fadeInUp 0.8s ease-out;
        }

        /*
         * =========================================
         * Navbar & Header Styles - DIPERBAIKI
         * =========================================
         */
        /* Navbar transition for fixed state */
        nav {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 0;
            background-color: rgba(248, 248, 232, 0.95);
            backdrop-filter: blur(10px);
        }

        nav.scrolled {
            padding-top: 0.75rem;
            padding-bottom: 0.75rem;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
        }

        /* PERBAIKAN: Container navbar dengan max-width dan margin auto untuk center, tapi padding kiri lebih kecil */
        .navbar-container {
            max-width: 1400px;
            padding-left: 1rem;
            /* Ini untuk padding kiri */
            padding-right: 2rem;
            width: 100%;
            /* Pastikan lebar navbar penuh */
        }

        /* Logo container styling - DIPERBAIKI */
        .logo-container {
            display: flex;
            align-items: center;
            gap: 1rem;
            position: relative;
            z-index: 100;
            margin-right: auto;
            /* Mendorong elemen lain ke kanan */
        }

        .logo-image-container {
            transition: width 0.3s ease-in-out, height 0.3s ease-in-out, top 0.3s ease-in-out;
            width: 4rem;
            height: 4rem;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            background: transparent;
        }

        @media (min-width: 768px) {
            .logo-image-container {
                width: 6rem;
                height: 6rem;
                top: 2rem;
            }
        }

        /* Logo size when navbar is scrolled */
        nav.scrolled .logo-image-container {
            position: relative;
            top: 0 !important;
            width: 4rem;
            height: 4rem;
        }

        nav.scrolled .logo-image-container img {
            object-fit: contain;
        }

        /* Decorative background behind logo - DIPERBAIKI */
        .logo-bg {
            position: absolute;
            top: 6rem;
            left: -13rem;
            width: 24rem;
            height: 6rem;
            background-color: var(--color-beige-light);
            z-index: -10;
            border-bottom-right-radius: 500px;
        }

        @media (max-width: 1023px) {
            .logo-bg {
                display: none;
            }
        }

        nav.scrolled .logo-bg {
            display: none;
        }

        /* Navigation menu - DIPERBAIKI untuk posisi */
        .nav-menu {
            display: flex;
            align-items: center;
            gap: 2rem;
            margin-left: auto;
            /* Mendorong menu ke kanan */
        }

        .nav-links {
            display: flex;
            list-style: none;
            gap: 2rem;
            align-items: center;
        }

        /* Nav link hover effect */
        .nav-link {
            position: relative;
            color: var(--color-text-dark);
            font-weight: 500;
            transition: color 0.3s ease;
            text-decoration: none;
            padding: 0.625rem 0;
        }

        .nav-link::after {
            content: "";
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 2px;
            background: var(--color-green-light);
            transition: width 0.3s ease;
        }

        .nav-link:hover::after {
            width: 100%;
        }

        .nav-link:hover {
            color: var(--color-green-light);
        }

        /* Dropdown menu styling */
        .dropdown {
            position: relative;
        }

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
            position: absolute;
            right: 0;
            margin-top: 0.5rem;
            width: 12rem;
            background: white;
            border-radius: 0.375rem;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            border: 1px solid #e5e7eb;
            z-index: 50;
        }

        .dropdown-menu li a {
            display: block;
            padding: 0.75rem 1.5rem;
            color: #374151;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .dropdown-menu li a:hover {
            background: #f0f9ff;
            color: var(--color-green-dark);
        }

        /* Login buttons */
        .login-buttons {
            display: flex;
            gap: 0.5rem;
            align-items: center;
        }

        .login-btn {
            padding: 0.625rem 1.5rem;
            border-radius: 0.375rem;
            font-weight: 600;
            background: var(--color-green-dark);
            color: white;
            box-shadow: 0 4px 15px rgba(27, 94, 32, 0.3);
            transition: all 0.3s ease;
            text-decoration: none;
            font-size: 0.875rem;
        }

        .login-btn:hover {
            background: var(--color-green-medium);
            transform: translateY(-1px);
        }

        /* Language link */
        .language-link {
            color: var(--color-green-dark);
            font-weight: 600;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .language-link:hover {
            color: var(--color-green-light);
        }

        /*
         * =========================================
         * Hamburger Menu Styles (Mobile)
         * =========================================
         */
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
            background: var(--color-green-dark);
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
            background: var(--color-white);
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
            background: linear-gradient(135deg, var(--color-beige-medium) 0%, var(--color-white) 100%);
            border-bottom: 1px solid rgba(27, 94, 32, 0.1);
            padding: 24px;
        }

        .mobile-menu-header::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 2px;
            background: linear-gradient(90deg, var(--color-green-dark), var(--color-green-light));
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
            color: var(--color-text-dark);
            font-weight: 500;
            font-size: 16px;
            text-decoration: none;
            border-radius: 16px;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .mobile-menu-link::before {
            content: "";
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
            color: var(--color-green-dark);
            transition: all 0.3s ease;
        }

        .mobile-menu-link:hover {
            background: rgba(27, 94, 32, 0.08);
            color: var(--color-green-dark);
            transform: translateX(4px);
        }

        .mobile-menu-link:hover i {
            transform: scale(1.1);
        }

        .mobile-menu-footer {
            padding: 24px;
            border-top: 1px solid rgba(27, 94, 32, 0.1);
            background: linear-gradient(135deg, #f9f9f9 0%, var(--color-white) 100%);
        }

        .mobile-login-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            padding: 16px;
            background: linear-gradient(135deg, var(--color-green-dark) 0%, var(--color-green-medium) 100%);
            color: var(--color-white);
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

        /* Responsive breakpoints */
        @media (max-width: 1023px) {
            .nav-menu {
                display: none;
            }
        }

        @media (min-width: 1024px) {
            .hamburger {
                display: none;
            }
        }
    </style>
</head>

<body>
    <div class="relative min-h-screen">
        <!-- Hero Section -->
        <header class="absolute top-0 left-0 w-full h-screen hero-bg flex items-center justify-center" id="home-hero">
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

        <!-- Navbar - DIPERBAIKI -->
        <nav class="bg-beige py-3 md:py-5 fixed top-0 w-full z-50 transition-all duration-300 ease-in-out shadow-md">
            <div class="navbar-container flex justify-between items-center">
                <!-- Logo Section - DIPERBAIKI -->
                <div class="logo-container">
                    <div class="hidden lg:block absolute logo-bg"></div>
                    <div class="logo-image-container">
                        <img src="https://images.unsplash.com/photo-1581092921461-eab62e97a780?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=100&q=80"
                            alt="Fujiyama Biomass Energy Logo" class="w-full h-full object-contain rounded-full" />
                    </div>
                </div>

                <!-- Navigation Menu - Desktop -->
                <div class="nav-menu hidden lg:flex">
                    <ul class="nav-links">
                        <li>
                            <a href="#home" class="nav-link">Home</a>
                        </li>
                        <li>
                            <a href="#about" class="nav-link">About Us</a>
                        </li>
                        <li>
                            <a href="#sustainability" class="nav-link">Sustainability</a>
                        </li>
                        <li>
                            <a href="#exports" class="nav-link">Exports & Partnerships</a>
                        </li>
                        <li class="dropdown">
                            <button class="nav-link flex items-center gap-1 focus:outline-none">
                                More
                                <svg class="w-3 h-3 ml-1 transition-transform duration-200" fill="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="#products">Products</a></li>
                                <li><a href="#gallery">Gallery</a></li>
                                <li><a href="#technical">Technical Data</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#supplier-info" class="nav-link">Supplier</a>
                        </li>
                    </ul>

                    <div class="login-buttons">
                        <a href="#" class="login-btn">Buyers Login</a>
                        <a href="#" class="login-btn">Supplier Login</a>
                        <a href="#" class="language-link">
                            <i class="fas fa-globe mr-1"></i>Language
                        </a>
                    </div>
                </div>

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
                <div class="mobile-menu-header">
                    <div class="flex items-center gap-3">
                        <img src="https://images.unsplash.com/photo-1581092921461-eab62e97a780?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=100&q=80"
                            alt="Fujiyama logo" class="w-10 h-10 object-contain rounded-full" />
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
                    <div class="mobile-menu-item">
                        <a href="#supplier-info" class="mobile-menu-link">
                            <i class="fas fa-handshake"></i>Supplier Info
                        </a>
                    </div>
                    <div class="mobile-menu-item">
                        <a href="#" class="mobile-menu-link">
                            <i class="fas fa-globe"></i>Language
                        </a>
                    </div>
                </nav>

                <div class="mobile-menu-footer">
                    <button class="mobile-login-btn">
                        <i class="fas fa-sign-in-alt"></i>Buyers Login
                    </button>
                    <button class="mobile-login-btn mt-2">
                        <i class="fas fa-sign-in-alt"></i>Supplier Login
                    </button>
                </div>
            </div>
        </nav>
    </div>

    <script>
        // Mobile menu toggle
        const menuBtn = document.getElementById('menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');
        const menuOverlay = document.getElementById('menu-overlay');

        function toggleMobileMenu() {
            menuBtn.classList.toggle('active');
            mobileMenu.classList.toggle('active');
            menuOverlay.classList.toggle('active');
        }

        menuBtn.addEventListener('click', toggleMobileMenu);
        menuOverlay.addEventListener('click', toggleMobileMenu);

        // Close mobile menu when clicking on menu links
        const mobileMenuLinks = document.querySelectorAll('.mobile-menu-link');
        mobileMenuLinks.forEach(link => {
            link.addEventListener('click', () => {
                if (mobileMenu.classList.contains('active')) {
                    toggleMobileMenu();
                }
            });
        });

        // Navbar scroll effect
        window.addEventListener('scroll', () => {
            const navbar = document.querySelector('nav');
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });

        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    </script>
</body>

</html>
