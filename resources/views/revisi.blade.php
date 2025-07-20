<!DOCTYPE html>
<html lang="id">
<x-layout.head title="Homes" />

<body class="font-sans leading-relaxed overflow-x-hidden">
    <div class="relative min-h-screen">
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
                <div class="absolute bottom-20 left-1/2 transform -translate-x-1/2 z-10 flex space-x-3" id="hero-dots">
                </div>
            </div>
        </header>
        <nav class="bg-beige py-3 md:py-5 fixed top-0 w-full z-50 transition-all duration-300 ease-in-out shadow-md">
            <div class="navbar-inner-container flex justify-between items-center px-4 md:px-5">
                <div class="relative flex items-center gap-4 z-[100]">
                    <div class="hidden md:block absolute top-24 -left-52 w-96 h-24 bg-beige logo-bg -z-10"></div>
                    <div
                        class="logo-image-container w-16 h-16 md:w-24 md:h-24 flex items-center justify-center relative md:top-8 bg-transparent">
                        <img src="{{ asset('assets/fujiyama-logo.png') }}" alt="Fujiyama Biomass Energy Logo"
                            class="w-full h-full object-contain" />
                    </div>
                </div>

                <ul class="hidden lg:flex list-none gap-6 xl:gap-8 items-center navbar-links-left">
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
                    <li class="relative dropdown">
                        <button
                            class="nav-link flex items-center gap-1 text-gray-800 font-medium text-base py-2.5 relative hover:text-green-light transition duration-300 focus:outline-none">
                            More
                            <svg class="w-3 h-3 ml-1 transition-transform duration-200" fill="currentColor"
                                viewBox="0 0 24 24">
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
                    <li class="relative dropdown">
                        <button
                            class="nav-link flex items-center gap-1 text-gray-800 font-medium text-base py-2.5 relative hover:text-green-light transition duration-300 focus:outline-none">
                            Supplier
                            <svg class="w-3 h-3 ml-1 transition-transform duration-200" fill="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <ul
                            class="dropdown-menu absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg border border-gray-100 z-50">
                            <li>
                                <a href="{{ route('supplier.formFactory') }}"
                                    class="block px-6 py-3 text-gray-800 hover:bg-green-50 hover:text-green-custom transition">
                                    Mill Factory
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('supplier.formCollector') }}"
                                    class="block px-6 py-3 text-gray-800 hover:bg-green-50 hover:text-green-custom transition">
                                    Collector
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"
                            class="px-4 xl:px-6 py-2.5 rounded-md text-sm xl:text-base font-semibold bg-green-custom text-white shadow-green-custom hover:bg-green-hover transition-all duration-300">
                            Buyers&nbsp;Login
                        </a>
                    </li>
                    <li>
                        <a href="#"
                            class="px-4 xl:px-6 py-2.5 rounded-md text-sm xl:text-base font-semibold bg-green-custom text-white shadow-green-custom hover:bg-green-hover transition-all duration-300">
                            Supplier&nbsp;Login
                        </a>
                    </li>
                    <li class="relative flex items-center">
                        <a href="#"
                            class="text-sm xl:text-base font-semibold text-green-custom hover:text-green-light transition duration-300">
                            <i class="fas fa-globe mr-1"></i>
                            Language
                        </a>
                    </li>
                </ul>

                <button class="lg:hidden hamburger" id="menu-btn" aria-label="Toggle mobile menu">
                    <span class="hamburger-line"></span>
                    <span class="hamburger-line"></span>
                    <span class="hamburger-line"></span>
                </button>
            </div>

            <div class="mobile-menu-overlay" id="menu-overlay"></div>

            <div class="mobile-menu" id="mobile-menu">
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
                    <div class="mobile-menu-item">
                        <a href="#supplier-info" class="mobile-menu-link">
                            <i class="fas fa-handshake"></i>Supplier Info
                        </a>
                    </div>
                    <div class="mobile-menu-item">
                        <a href="#" class="mobile-menu-link">
                            <i class="fas fa-globe"></i>language
                        </a>
                    </div>
                </nav>

                <div class="mobile-menu-footer">
                    <button class="mobile-login-btn" onclick="window.location.href='#'">
                        <i class="fas fa-sign-in-alt"></i>Buyers Login
                    </button>
                    <button class="mobile-login-btn mt-2" onclick="window.location.href='#'">
                        <i class="fas fa-sign-in-alt"></i>Supplier Login
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
                    <p class="text-sm md:text-base text-gray-600">Premium PKS charcoal with superior energy output
                        for
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
                    <p class="text-sm md:text-base text-gray-600">Meeting international standards for worldwide
                        biomass
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
                <strong>Our PKS Charcoal certified with top-tier specs by Scovindo Laboratory</strong> — ensuring
                the
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
        <div class="max-w-7xl">
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
                        Founded in 2025 with a vision to transform agricultural waste into a valuable energy
                        resource,
                        our company is a new but ambitious player committed to contributing solutions to the world's
                        pressing energy challenges. We are rapidly establishing ourselves as a trusted partner in
                        the
                        global biomass industry
                    </p>
                </div>
                <div>
                    <h3 class="text-lg font-bold mb-3">Our Philosophy</h3>
                    <p class="text-sm text-gray-600 mb-4">
                        We believe in creating a sustainable future through innovative biomass solutions that
                        benefit
                        both the environment and communities. Our core values include integrity, innovation, and
                        impact.
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
                </div>
            </div>

            <div>
                <h3 class="text-lg font-bold mb-6">Our Commitment to SDGs</h3>
                <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4 mb-6">
                    <div class="flex flex-col items-center text-center p-3 rounded-lg hover:bg-gray-50 transition cursor-pointer"
                        onclick="toggleSDG('sdg7')">
                        <img src="{{ asset('assets/logo-brand/SDG-7.png') }}"
                            alt="SDG 7 - Affordable and Clean Energy" class="w-16 h-16 mb-1 object-contain">
                        <p class="text-xs text-gray-700 font-semibold">Affordable & Clean Energy</p>
                        <p class="text-xs text-blue-600 mt-1">Click for details</p>
                    </div>
                    <div class="flex flex-col items-center text-center p-3 rounded-lg hover:bg-gray-50 transition cursor-pointer"
                        onclick="toggleSDG('sdg13')">
                        <img src="{{ asset('assets/logo-brand/SDG-13.png') }}" alt="SDG 13 - Climate Action"
                            class="w-16 h-16 mb-1 object-contain">
                        <p class="text-xs text-gray-700 font-semibold">Climate Action</p>
                        <p class="text-xs text-blue-600 mt-1">Click for details</p>
                    </div>
                    <div class="flex flex-col items-center text-center p-3 rounded-lg hover:bg-gray-50 transition cursor-pointer"
                        onclick="toggleSDG('sdg15')">
                        <img src="{{ asset('assets/logo-brand/SDG-15.png') }}" alt="SDG 15 - Life on Land"
                            class="w-16 h-16 mb-1 object-contain">
                        <p class="text-xs text-gray-700 font-semibold">Life on Land</p>
                        <p class="text-xs text-blue-600 mt-1">Click for details</p>
                    </div>
                    <div class="flex flex-col items-center text-center p-3 rounded-lg hover:bg-gray-50 transition cursor-pointer"
                        onclick="toggleSDG('sdg8')">
                        <img src="{{ asset('assets/logo-brand/SDG-8.png') }}"
                            alt="SDG 8 - Decent Work and Economic Growth" class="w-16 h-16 mb-1 object-contain">
                        <p class="text-xs text-gray-700 font-semibold">Decent Work & Economic Growth</p>
                        <p class="text-xs text-blue-600 mt-1">Click for details</p>
                    </div>
                </div>

                <div class="space-y-4 mb-6">
                    <div id="sdg7"
                        class="sdg-detail hidden bg-yellow-50 border-l-4 border-yellow-500 p-4 rounded-r-lg transition-all duration-300">
                        <h4 class="font-bold text-yellow-800 mb-2">SDG 7 – Affordable and Clean Energy</h4>
                        <p class="text-sm text-gray-700">
                            We aim to promote the use of renewable energy by offering high-efficiency,
                            cost-effective
                            PKS charcoal products, ensuring access to affordable and clean energy for all.
                        </p>
                    </div>

                    <div id="sdg13"
                        class="sdg-detail hidden bg-green-50 border-l-4 border-green-600 p-4 rounded-r-lg transition-all duration-300">
                        <h4 class="font-bold text-green-800 mb-2">SDG 13 – Climate Action</h4>
                        <p class="text-sm text-gray-700">
                            Through utilizing PKS to reduce CO₂ emissions and contribute to carbon neutrality, we
                            are
                            committed to urgent and effective measures to combat climate change.
                        </p>
                    </div>

                    <div id="sdg15"
                        class="sdg-detail hidden bg-green-50 border-l-4 border-green-500 p-4 rounded-r-lg transition-all duration-300">
                        <h4 class="font-bold text-green-800 mb-2">SDG 15 – Life on Land</h4>
                        <p class="text-sm text-gray-700">
                            By transforming agricultural waste into energy resources and promoting sustainable
                            resource
                            use, we help prevent deforestation and protect terrestrial ecosystems.
                        </p>
                    </div>

                    <div id="sdg8"
                        class="sdg-detail hidden bg-red-50 border-l-4 border-red-600 p-4 rounded-r-lg transition-all duration-300">
                        <h4 class="font-bold text-red-800 mb-2">SDG 8 – Decent Work and Economic Growth</h4>
                        <p class="text-sm text-gray-700">
                            We strive to create local employment opportunities, ensure safe and fulfilling work
                            environments, and pursue economic growth in harmony with environmental sustainability.
                        </p>
                    </div>
                </div>
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
                            with advanced carbonization technology for optimal energy output.
                        </p>
                        <h4 class="font-semibold text-md mb-3 text-gray-800">Key Specifications:</h4>
                        <div class="grid grid-cols-2 gap-4 mb-6">
                            <div class="text-center p-3 bg-green-50 rounded-lg">
                                <div class="text-2xl font-bold text-green-custom">7,710</div>
                                <div class="text-xs text-gray-600">kcal/kg (min)<br>Gross Calorific Value (as
                                    received)
                                </div>
                            </div>
                            <div class="text-center p-3 bg-green-50 rounded-lg">
                                <div class="text-2xl font-bold text-green-custom">
                                    1.74%
                                </div>
                                <div class="text-xs text-gray-600">Moisture(as received)
                                </div>
                            </div>
                            <div class="text-center p-3 bg-green-50 rounded-lg">
                                <div class="text-2xl font-bold text-green-custom">
                                    4.10%
                                </div>
                                <div class="text-xs text-gray-600">Ash Content(as received)
                                </div>
                            </div>
                            <div class="text-center p-3 bg-green-50 rounded-lg">
                                <div class="text-2xl font-bold text-green-custom">
                                    86.49%
                                </div>
                                <div class="text-xs text-gray-600">Fixed Carbon (as received)</div>
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
                                <img src="{{ asset('assets/Palm kernel shell charcoal.jpg') }}"
                                    alt="PKS Charcoal Spec 1"
                                    class="w-20 h-28 object-cover border border-gray-300 rounded-md shadow-sm group-hover:shadow-md transition">
                                <span
                                    class="absolute bottom-0 left-0 w-full bg-black bg-opacity-70 text-white text-xs text-center py-1 opacity-0 group-hover:opacity-100 transition-opacity">Page
                                    1</span>
                            </a>
                            <a href="{{ asset('assets/about.jpg') }}" target="_blank" class="block group relative">
                                <img src="{{ asset('assets/Palm-Oil-Good.jpg') }}" alt="PKS Charcoal Spec 2"
                                    class="w-20 h-28 object-cover border border-gray-300 rounded-md shadow-sm group-hover:shadow-md transition">
                                <span
                                    class="absolute bottom-0 left-0 w-full bg-black bg-opacity-70 text-white text-xs text-center py-1 opacity-0 group-hover:opacity-100 transition-opacity">Page
                                    2</span>
                            </a>
                        </div>

                        <a href="#contact"
                            class="w-full inline-block text-center bg-green-custom text-white py-3 rounded-lg font-semibold hover:bg-green-hover transition">
                            Request Quote
                        </a>
                    </div>
                </div>

                <div
                    class="bg-beige rounded-lg shadow-lg overflow-hidden transition-all hover:scale-105 hover:shadow-xl">
                    <img src="{{ asset('assets/kelapa-sawit.jpg') }}" alt="Raw PKS"
                        class="w-full h-64 md:h-72 object-cover">
                    <div class="p-6 md:p-8">
                        <h3 class="text-xl md:text-2xl font-bold text-green-custom mb-4">Raw PKS (Palm Kernel
                            Shell)
                        </h3>
                        <p class="text-gray-600 mb-6">Unprocessed palm kernel shells, a versatile biomass
                            feedstock
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
                            <a href="{{ asset('assets/tumpukan-kelapa-sawit.jpg') }}" target="_blank"
                                class="block group relative">
                                <img src="{{ asset('assets/tumpukan-kelapa-sawit.jpg') }}" alt="Raw PKS Spec 1"
                                    class="w-20 h-28 object-cover border border-gray-300 rounded-md shadow-sm group-hover:shadow-md transition">
                                <span
                                    class="absolute bottom-0 left-0 w-full bg-black bg-opacity-70 text-white text-xs text-center py-1 opacity-0 group-hover:opacity-100 transition-opacity">Page
                                    1</span>
                            </a>
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
            <h2 class="text-xl md:text-2xl font-extrabold text-center mb-8">Sustainability & Environmental Impact
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-start">
                <div class="space-y-6">
                    <div class="p-6 md:p-8 bg-white rounded-lg shadow-lg md:min-h-[756px] lg:min-h-[512px]">
                        <h3 class="text-lg md:text-xl font-bold mb-4 text-green-custom">Our Eco-Friendly Process
                        </h3>
                        <p class="text-gray-600 mb-6">
                            Our PKS charcoal production process is designed to minimize environmental impact while
                            maximizing energy efficiency. By utilizing agricultural waste, we contribute to a
                            circular
                            economy and a greener future.

                            We carefully select raw materials to ensure high-quality biomass fuel while preventing
                            unnecessary waste. Our advanced carbonization technology allows for low-emission
                            processing
                            and optimized energy conversion. Additionally, our operations support sustainable
                            agricultural practices by transforming palm kernel shells, which would otherwise be
                            discarded, into valuable renewable energy resources.

                            Through these efforts, we help reduce dependence on fossil fuels, lower greenhouse gas
                            emissions, and promote cleaner energy solutions for industries and communities alike.
                        </p>
                    </div>

                    <div class="p-6 md:p-8 bg-white md:min-h-[680px] lg:min-h-[456px]">
                        <div class="space-y-4 mb-8">
                            <div class="flex items-center gap-3">
                                <i class="fas fa-recycle text-green-custom text-lg"></i>
                                <span class="text-lg md:text-xl text-gray-700">100% Agricultural Waste
                                    Utilization</span>
                            </div>
                            <div class="flex items-center gap-3">
                                <i class="fas fa-leaf text-green-custom text-lg"></i>
                                <span class="text-lg md:text-xl text-gray-700">Significant Carbon Footprint
                                    Reduction</span>
                            </div>
                            <div class="flex items-center gap-3">
                                <i class="fas fa-solar-panel text-green-custom text-lg"></i>
                                <span class="text-lg md:text-xl text-gray-700">Renewable & Sustainable Energy
                                    Alternative</span>
                            </div>
                        </div>

                        {{-- Certified Sustainable - border, shadow, and rounded removed --}}
                        <div class="mt-8">
                            <h4 class="font-semibold text-xl mb-4 text-gray-800">Certified Sustainable:</h4>
                            <img src="{{ asset('assets/logo-brand/logo-ggl.png') }}" alt="GGL Certification Logo"
                                class="w-56 h-auto object-contain mb-4">
                            <p class="text-lg md:text-xl text-gray-600">Proudly certified with
                                Green Gold Label (GGL) for sustainable biomass practices.</p>
                        </div>
                    </div>
                </div>

                <div class="space-y-6">
                    <div class="p-6 md:p-8 bg-white rounded-lg shadow-lg md:min-h-[756px] lg:min-h-[512px]">
                        <h4 class="text-lg md:text-xl font-bold text-center mb-4 text-green-custom">CO₂
                            Emission Comparison</h4>
                        <img src="{{ asset('assets/diagram-co.png') }}" alt="CO2 Reduction Diagram"
                            class="w-full h-auto object-contain rounded-lg mb-4">
                        <p class="text-base md:text-l text-gray-700 text-center">Comparative CO₂
                            emissions for different
                            fuel types.</p>
                    </div>

                    <div class="p-6 md:p-8 bg-white md:min-h-[680px] lg:min-h-[456px]">
                        <h3 class="font-bold text-lg md:text-xl mb-5 text-green-custom">
                            Environmental Initiatives in Action
                        </h3>
                        <div class="grid grid-cols-2 gap-6">
                            <img src="{{ asset('assets/cangkang-sawit.jpg') }}" alt="Environmental Initiative 1"
                                class="w-full h-40 object-cover rounded-lg shadow-md hover:scale-105 transition-transform">
                            <img src="{{ asset('assets/produksi-cangkang.png') }}" alt="Environmental Initiative 2"
                                class="w-full h-40 object-cover rounded-lg shadow-md hover:scale-105 transition-transform">
                            <img src="{{ asset('assets/palm-trees-palm-oil.jpg') }}" alt="Environmental Initiative 3"
                                class="w-full h-40 object-cover rounded-lg shadow-md hover:scale-105 transition-transform">
                            <img src="{{ asset('assets/back-view-man-working-eco-friendly-wind-power-project.jpg') }}"
                                alt="Environmental Initiative 4"
                                class="w-full h-40 object-cover rounded-lg shadow-md hover:scale-105 transition-transform">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="supplier-info"
        class="py-16 md:py-24 bg-gradient-to-br from-green-50 to-beige-100 relative overflow-hidden">
        <div class="absolute inset-0 bg-pattern-subtle opacity-20 z-0"></div>
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <h2 class="text-2xl md:text-4xl font-extrabold text-center text-green-700 mb-12 leading-tight">
                Information for Suppliers
            </h2>

            <div class="grid md:grid-cols-2 gap-10 lg:gap-16 items-start">
                <div
                    class="bg-white p-6 md:p-8 rounded-lg shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                    <div class="flex items-center text-green-custom mb-4">
                        <i class="fas fa-building text-3xl md:text-4xl mr-4"></i>
                        <h3 class="text-xl md:text-2xl font-bold text-gray-800">Who We Are</h3>
                    </div>
                    <p class="text-gray-700 leading-relaxed border-l-4 border-green-300 pl-4 py-2">
                        We are PT Fujiyama Biomass Energy, a company specializing in the procurement and trading of
                        sustainable biomass products, including Palm Kernel Shell (PKS). Our mission is to forge
                        long-term partnerships with reliable suppliers and contribute to the global renewable energy
                        market.
                    </p>
                </div>

                <div
                    class="bg-white p-6 md:p-8 rounded-lg shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                    <div class="flex items-center text-green-custom mb-4">
                        <i class="fas fa-search-dollar text-3xl md:text-4xl mr-4"></i>
                        <h3 class="text-xl md:text-2xl font-bold text-gray-800">What We Are Looking For</h3>
                    </div>
                    <p class="text-gray-700 leading-relaxed mb-4 border-l-4 border-green-300 pl-4 py-2">
                        We are seeking mill partners who can consistently supply high-quality PKS that meets the
                        following specifications:
                    </p>
                    <ul class="text-gray-700 space-y-2 list-none pl-0">
                        <li class="flex items-center"><i
                                class="fas fa-check-circle text-green-custom mr-3 text-lg"></i>Moisture content:
                            15%
                        </li>
                        <li class="flex items-center"><i
                                class="fas fa-check-circle text-green-custom mr-3 text-lg"></i>Size: 5–20 mm</li>
                        <li class="flex items-center"><i
                                class="fas fa-check-circle text-green-custom mr-3 text-lg"></i>Ash content <5% </li>
                        <li class="flex items-center"><i
                                class="fas fa-check-circle text-green-custom mr-3 text-lg"></i>Calorific value:
                            4,000
                            kcal/kg and above</li>
                        <li class="flex items-center"><i
                                class="fas fa-check-circle text-green-custom mr-3 text-lg"></i>Free from foreign
                            materials (stones, soil, metal)</li>
                    </ul>
                    <p class="text-gray-700 leading-relaxed mt-4">
                        We welcome suppliers who can offer consistent supply volumes and stable quality.
                    </p>
                </div>

                <div
                    class="md:col-span-2 bg-green-700 text-white p-6 md:p-8 rounded-lg shadow-xl text-center
                                transform hover:scale-102 transition-all duration-300">
                    <div class="flex items-center justify-center text-white mb-4">
                        <i class="fas fa-handshake text-3xl md:text-4xl mr-4"></i>
                        <h3 class="text-xl md:text-2xl font-bold">Partnership Benefits</h3>
                    </div>
                    <p class="leading-relaxed mb-6 opacity-90">
                        Forge a sustainable future with us. As a valued supplier, you'll benefit from:
                    </p>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 text-left">
                        <div class="flex items-start text-white"><i
                                class="fas fa-award text-yellow-300 mr-3 mt-1 text-lg"></i>Long-term business
                            relationships</div>
                        <div class="flex items-start text-white"><i
                                class="fas fa-balance-scale text-yellow-300 mr-3 mt-1 text-lg"></i>Fair and
                            transparent
                            transactions</div>
                        <div class="flex items-start text-white"><i
                                class="fas fa-chart-line text-yellow-300 mr-3 mt-1 text-lg"></i>Opportunities to
                            expand
                            into new markets</div>
                        <div class="flex items-start text-white"><i
                                class="fas fa-file-alt text-yellow-300 mr-3 mt-1 text-lg"></i>Support in logistics
                            and
                            documentation</div>
                        <div class="flex items-start text-white"><i
                                class="fas fa-money-check-alt text-yellow-300 mr-3 mt-1 text-lg"></i>Prompt payment
                            terms</div>
                    </div>
                </div>

                <div class="md:col-span-2 bg-beige-200 p-6 md:p-8 rounded-lg shadow-lg text-center">
                    <div class="flex items-center justify-center text-green-custom mb-4">
                        <i class="fas fa-envelope-open-text text-3xl md:text-4xl mr-4"></i>
                        <h3 class="text-xl md:text-2xl font-bold text-gray-800">How to Apply / Contact Us</h3>
                    </div>
                    <p class="text-gray-700 leading-relaxed mb-6">
                        Interested in partnering with us? If you meet our criteria and are ready to contribute to
                        sustainable energy, please reach out to our team:
                    </p>
                    <ul class="list-none space-y-3 mb-8 text-lg font-medium">
                        <li><i class="fas fa-envelope text-green-custom mr-3"></i>Email: <a
                                href="mailto:info@fbe.co.id" class="text-blue-600 hover:underline">info@fbe.co.id</a>
                        </li>
                        <li><i class="fas fa-phone-alt text-green-custom mr-3"></i>Phone: <a href="tel:+6285124790253"
                                class="text-blue-600 hover:underline">+62 851 2479
                                0253</a></li>
                    </ul>
                    <p class="text-gray-700 leading-relaxed mb-8">
                        Or simply fill out the form on our <a href="#contact"
                            class="text-blue-600 hover:underline font-semibold">Contact Us</a> page.
                    </p>
                    <a href="#contact"
                        class="inline-flex items-center px-8 py-4 bg-green-custom text-white font-semibold rounded-lg shadow-md hover:bg-green-hover transition-all duration-300 transform hover:-translate-y-1">
                        <i class="fas fa-comment-dots mr-3"></i> Contact Our Team Now!
                    </a>
                    <p class="text-gray-700 leading-relaxed font-semibold mt-8">
                        We look forward to building a successful collaboration with you!
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- Articles Section --}}
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
                        <h4 class="font-semibold text-sm md:text-base leading-tight mt-2">{{ $featured->title }}
                        </h4>
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
                                        {{-- <p class="text-xs text-gray-600">Article —
                                                    {{ $article->created_at->format('F j, Y') }}</p> --}}
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
                                        {{-- <p class="text-xs text-gray-600">Article —
                                                    {{ $article->created_at->format('F j, Y') }}</p> --}}
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

    <section id="gallery" class="py-8 md:py-12 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-12 lg:px-20">
            <h2 class="text-xl md:text-2xl font-extrabold text-center mb-8">Our Visual Gallery</h2>

            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-6">
                <div
                    class="group relative overflow-hidden rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300 cursor-pointer">
                    <img src="{{ asset('assets/kumpulan-cangkang.png') }}" alt="Large Stockpile of PKS Charcoal"
                        class="w-full h-48 object-cover transform group-hover:scale-105 transition-transform duration-300">
                    <div
                        class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <p class="text-white text-sm font-bold">Large Stockpile</p>
                    </div>
                </div>
                <div
                    class="group relative overflow-hidden rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300 cursor-pointer">
                    <img src="{{ asset('assets/Raw PKS .png') }}" alt="Raw PKS Material Stock"
                        class="w-full h-48 object-cover transform group-hover:scale-105 transition-transform duration-300">
                    <div
                        class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <p class="text-white text-sm font-bold">Raw Material Stock</p>
                    </div>
                </div>

                <div
                    class="group relative overflow-hidden rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300 cursor-pointer">
                    <img src="{{ asset('assets/alat.png') }}" alt="PKS Charcoal Production Line"
                        class="w-full h-48 object-cover transform group-hover:scale-105 transition-transform duration-300">
                    <div
                        class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <p class="text-white text-sm font-bold">Production Line</p>
                    </div>
                </div>
                <div
                    class="group relative overflow-hidden rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300 cursor-pointer">
                    <img src="{{ asset('assets/quality-control.jpg') }}" alt="Quality Control Area"
                        class="w-full h-48 object-cover transform group-hover:scale-105 transition-transform duration-300">
                    <div
                        class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <p class="text-white text-sm font-bold">Quality Control</p>
                    </div>
                </div>

                <div
                    class="group relative overflow-hidden rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300 cursor-pointer">
                    <img src="{{ asset('assets/container.jpg') }}" alt="Container Loading for Export"
                        class="w-full h-48 object-cover transform group-hover:scale-105 transition-transform duration-300">
                    <div
                        class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <p class="text-white text-sm font-bold">Container Loading</p>
                    </div>
                </div>
                <div
                    class="group relative overflow-hidden rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300 cursor-pointer">
                    <img src="{{ asset('assets/PKS Charcoal Ready.png') }}" alt="PKS Charcoal Ready for Shipment"
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
                        <a href="{{ asset('assets/specs/pks_charcoal_full_spec1.pdf') }}" download
                            class="inline-flex items-center px-6 py-3 border-none rounded-md text-sm font-semibold cursor-pointer transition-all duration-300 bg-green-custom text-white shadow-green-custom hover:bg-green-hover hover:-translate-y-0.5 hover:shadow-green-hover">
                            <i class="fas fa-file-download mr-2"></i> PKS Charcoal Spec Sheet
                        </a>
                        <a href="{{ asset('assets/specs/raw_pks_full_spec1.pdf') }}" download
                            class="inline-flex items-center px-6 py-3 border-none rounded-md text-sm font-semibold cursor-pointer transition-all duration-300 bg-green-custom text-white shadow-green-custom hover:bg-green-hover hover:-translate-y-0.5 hover:shadow-green-hover">
                            <i class="fas fa-file-download mr-2"></i> Raw PKS Spec Sheet
                        </a>
                        {{-- Tambahkan tombol download untuk spec sheet lain jika ada --}}
                    </div>
                </div>

                <div class="bg-white p-6 md:p-8 rounded-lg shadow-lg">
                    <h3 class="text-xl font-bold mb-4 text-green-custom">Our Official Certifications</h3>
                    <p class="text-gray-700 text-sm mb-6">Transparency and quality assurance are paramount. View
                        our
                        official certification documents validating our product standards and sustainable practices.
                    </p>

                    <h4 class="font-semibold text-md mb-3 text-gray-800">Certification Documents:</h4>
                    <div class="grid grid-cols-2 gap-4">
                        <a href="{{ asset('assets/certifications/certificate_1_full_1.pdf') }}" target="_blank"
                            class="block group relative">
                            <img src="{{ asset('assets/certifications/certificate_thumb_1.jpg') }}"
                                alt="Certification Document 1 Thumbnail"
                                class="w-full h-48 object-cover rounded-lg shadow-md group-hover:scale-105 transition-transform">
                            <span
                                class="absolute bottom-0 left-0 w-full bg-black bg-opacity-70 text-white text-xs text-center py-1 opacity-0 group-hover:opacity-100 transition-opacity">View
                                Document</span>
                        </a>
                        <a href="{{ asset('assets/certifications/certificate_2_full_1.pdf') }}" target="_blank"
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
                <p class="text-gray-700 text-lg mb-6 max-w-2xl mx-auto">Request a sample of our premium PKS
                    charcoal
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
            <h2 class="text-2xl sm:text-3xl md:text-4xl font-extrabold text-center mb-8 sm:mb-12 text-gray-900">
                Contact Us
            </h2>

            <div class="grid lg:grid-cols-2 gap-8 lg:gap-12 max-w-6xl mx-auto">

                <div class="space-y-6">
                    <h3 class="text-lg sm:text-xl font-bold mb-6 text-green-custom">Direct Contact</h3>

                    <div class="space-y-6">
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

                        <div class="flex items-start gap-3 sm:gap-4">
                            <i class="fas fa-envelope text-green-custom text-lg sm:text-xl mt-1 flex-shrink-0"></i>
                            <div>
                                <p class="font-semibold text-gray-900 mb-1">Email Address</p>
                                <a href="mailto:info@fujiyamabiomass.com"
                                    class="text-gray-600 text-sm sm:text-base hover:text-green-custom transition-colors">
                                    info@fbe.co.id
                                </a>
                            </div>
                        </div>

                        <div class="flex items-start gap-3 sm:gap-4">
                            <i class="fas fa-clock text-green-custom text-lg sm:text-xl mt-1 flex-shrink-0"></i>
                            <div>
                                <p class="font-semibold text-gray-900 mb-1">Business Hours</p>
                                <p class="text-gray-600 text-sm sm:text-base">Monday - Friday: 08:00 - 17:00 WIB
                                </p>
                            </div>
                        </div>

                        <div class="flex items-start gap-3 sm:gap-4 p-4 bg-green-50 rounded-lg">
                            <i class="fab fa-whatsapp text-green-custom text-xl sm:text-2xl mt-1 flex-shrink-0"></i>
                            <div>
                                <p class="font-semibold text-gray-900 mb-1">Contact via WhatsApp</p>
                                <a href="https://wa.me/6285124790253" target="_blank"
                                    class="text-green-custom hover:text-green-hover transition-colors text-sm sm:text-base font-medium">
                                    +62 851 2479 0253
                                </a>
                                <p class="text-xs sm:text-sm text-gray-500 mt-1">Quick response during business
                                    hours
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="mt-8">
                        <p class="font-semibold text-gray-900 mb-3">Our Office</p>
                        <div class="w-full h-48 sm:h-64 md:h-80 bg-gray-200 rounded-lg overflow-hidden shadow-md">
                            <img src="{{ asset('assets/neo-soho.jpg') }}" alt="Our Office Building"
                                class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
                        </div>
                        <p class="text-xs sm:text-sm text-gray-500 mt-2">Modern office space at Neo Soho Apartment
                        </p>
                    </div>
                </div>

                <div class="space-y-8">
                    <div>
                        <h3 class="text-lg sm:text-xl font-bold mb-6 text-green-custom">Send a Message</h3>
                        <form class="space-y-4" onsubmit="handleSubmit(event)">
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <input type="text" placeholder="First Name" required
                                    class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-custom focus:border-transparent text-sm sm:text-base">
                                <input type="text" placeholder="Last Name"
                                    class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-custom focus:border-transparent text-sm sm:text-base">
                            </div>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <input type="email" placeholder="Email Address" required
                                    class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-custom focus:border-transparent text-sm sm:text-base">
                                <input type="phone" placeholder="Phone Number" required
                                    class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-custom focus:border-transparent text-sm sm:text-base">
                            </div>
                            <input type="text" placeholder="Company Name"
                                class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-custom focus:border-transparent text-sm sm:text-base">

                            <select required
                                class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-custom focus:border-transparent text-gray-700 text-sm sm:text-base">
                                <option value="">Select Inquiry Type</option>
                                <option value="product">Product Information</option>
                                <option value="quote">Request for Quotation</option>
                                <option value="partnership">Partnership Opportunity</option>
                                <option value="other">Other</option>
                            </select>

                            <textarea placeholder="Please enter your message" rows="4" required
                                class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-custom focus:border-transparent text-sm sm:text-base resize-none"></textarea>

                            <button type="submit"
                                class="w-full bg-green-custom text-white py-3 px-6 rounded-lg font-semibold hover:bg-green-hover transition-colors text-sm sm:text-base">
                                Send Message
                            </button>
                        </form>
                    </div>

                    <div>
                        <h3 class="text-lg sm:text-xl font-bold mb-11 text-green-custom">Office Location</h3>
                        <div class="w-full">
                            <div class="w-full h-64 sm:h-80 bg-transparent rounded-lg overflow-hidden shadow-lg">
                                <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.576887556943!2d106.78280637409252!3d-6.186064993800632!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f6bb7f1b745b%3A0xc3f1a0b0d0c3f1a!2sNeo%20Soho%20Apartment!5e0!3m2!1sen!2sid!4v1700000000000!5m2!1sen!2sid"
                                    width="600" height="450" style="border:0;" allowfullscreen=""
                                    loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mt-3 gap-2">
                                <p class="text-xs sm:text-sm text-gray-600">
                                    Click the map for directions to Neo Soho Central Park
                                </p>
                                <a href="https://www.google.com/maps/place/Neo+Soho+Apartment/@-6.186065,106.7828064,17z/data=!3m2!1e3!4b1!4m6!3m5!1s0x2e69f6bb7f1b745b:0xc3f1a0b0d0c3f1a!8m2!3d-6.1860649!4d106.7853813!16s%2Fg%2F1227s51p?entry=ttu"
                                    target="_blank"
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
                    <p class="text-sm opacity-80">Leading the future of sustainable energy through premium PKS
                        charcoal
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
                        <li><a href="#exports" class="opacity-80 hover:opacity-100 transition">Global Exports</a>
                        </li>
                        <li><a href="#technical" class="opacity-80 hover:opacity-100 transition">Technical
                                Data</a>
                        </li>
                        <li><a href="#contact" class="opacity-80 hover:opacity-100 transition">Consulting</a></li>
                        <li><a href="#gallery" class="opacity-80 hover:opacity-100 transition">Gallery</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="font-bold mb-4">Contact</h4>
                    <div class="space-y-2 text-sm">
                        <p class="opacity-80">Jakarta, Indonesia</p>
                        <p class="opacity-80">info@fbe.co.id</p>
                        <p class="opacity-80">+62 851 2479 02 53</p>
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
                <p class="text-sm opacity-80">© {{ date('Y') }} PT Fujiyama Biomass Energy. All rights
                    reserved.
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

        // Close menu when clicking on mobile menu links
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
        function handleSubmit(event) {
            event.preventDefault();
            alert('Terima kasih! Pesan Anda telah dikirim. Kami akan merespons dalam waktu 24 jam.');
            event.target.reset(); // Clear form fields
        }

        function toggleSDG(sdgId) {
            const element = document.getElementById(sdgId);
            const allSDGs = document.querySelectorAll('.sdg-detail');

            // Hide all other SDGs
            allSDGs.forEach(sdg => {
                if (sdg.id !== sdgId) {
                    sdg.classList.add('hidden');
                }
            });

            // Toggle the clicked SDG
            element.classList.toggle('hidden');

            // Smooth scroll to the detail if it's being shown
            if (!element.classList.contains('hidden')) {
                setTimeout(() => {
                    element.scrollIntoView({
                        behavior: 'smooth',
                        block: 'center'
                    });
                }, 100);
            }
        }

        // Slider Hero with Touch Swipe
        const heroImages = [
            '{{ asset('assets/bg-hero.png') }}',
            '{{ asset('assets/stock.JPG') }}', // Slide 2: hanya gambar
            '{{ asset('assets/tumpukan-kelapa-sawit.jpg') }}' // Slide 3: hanya gambar
        ];

        const homeHero = document.getElementById('home-hero');
        const heroDotsContainer = document.getElementById('hero-dots');
        const heroTitle = document.querySelector('.hero-title'); // Seleksi elemen title
        const heroButtons = document.querySelector('.hero-buttons'); // Seleksi elemen buttons

        let currentHeroImageIndex = 0;
        let autoSlideInterval;

        function createHeroDots() {
            heroDotsContainer.innerHTML = '';
            heroImages.forEach((_, index) => {
                const dot = document.createElement('span');
                dot.classList.add('w-2', 'h-2', 'bg-white', 'rounded-full', 'opacity-50', 'cursor-pointer',
                    'hover:opacity-100', 'transition');
                if (index === currentHeroImageIndex) {
                    dot.classList.remove('opacity-50');
                    dot.classList.add('opacity-100');
                }
                dot.addEventListener('click', () => {
                    currentHeroImageIndex = index;
                    updateHeroSlider();
                    resetAutoSlide(); // Reset timer when dot is clicked
                });
                heroDotsContainer.appendChild(dot);
            });
        }

        function updateHeroSlider() {
            // Check if the current slide is the first one (index 0)
            if (currentHeroImageIndex === 0) {
                homeHero.style.backgroundImage =
                    `url('${heroImages[currentHeroImageIndex]}')`;
                heroTitle.style.display = 'block';
                heroButtons.style.display = 'flex';
            } else {
                // For subsequent slides, show only the image without gradient, hide text/buttons
                homeHero.style.backgroundImage = `url('${heroImages[currentHeroImageIndex]}')`;
                heroTitle.style.display = 'none';
                heroButtons.style.display = 'none';
            }

            homeHero.style.backgroundSize = 'cover';
            homeHero.style.backgroundPosition = 'center';
            createHeroDots();
        }

        function nextHeroImage() {
            currentHeroImageIndex = (currentHeroImageIndex + 1) % heroImages.length;
            updateHeroSlider();
        }

        function prevHeroImage() {
            currentHeroImageIndex = (currentHeroImageIndex - 1 + heroImages.length) % heroImages.length;
            updateHeroSlider();
        }

        function resetAutoSlide() {
            clearInterval(autoSlideInterval);
            autoSlideInterval = setInterval(nextHeroImage, 20000);
        }

        // Touch Swipe for Hero Slider
        let touchStartX = 0;
        let touchEndX = 0;

        homeHero.addEventListener('touchstart', (e) => {
            touchStartX = e.touches[0].clientX;
            clearInterval(autoSlideInterval); // Pause auto-slide on touch start
        });

        homeHero.addEventListener('touchmove', (e) => {
            touchEndX = e.touches[0].clientX;
        });

        homeHero.addEventListener('touchend', () => {
            if (touchEndX < touchStartX - 50) { // Swiped left
                nextHeroImage();
            } else if (touchEndX > touchStartX + 50) { // Swiped right
                prevHeroImage();
            }
            // Reset touch coordinates
            touchStartX = 0;
            touchEndX = 0;
            resetAutoSlide(); // Resume auto-slide after touch ends
        });

        // Initialize slider and auto-advance
        updateHeroSlider();
        resetAutoSlide(); // Start auto-slide when page loads
    </script>
</body>

</html>
