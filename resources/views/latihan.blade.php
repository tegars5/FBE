<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

        /* Improved Hamburger Menu Styles */
        .hamburger {
            cursor: pointer;
            width: 28px;
            height: 28px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            position: relative;
            z-index: 1001;
            padding: 4px;
            border-radius: 6px;
            transition: all 0.3s ease;
            background: transparent;
        }

        .hamburger:hover {
            background: rgba(27, 94, 32, 0.1);
        }

        .hamburger-line {
            width: 20px;
            height: 2.5px;
            background: #1B5E20;
            border-radius: 2px;
            transition: all 0.35s cubic-bezier(0.68, -0.55, 0.265, 1.55);
            transform-origin: center;
            margin: 1.5px 0;
        }

        .hamburger.open .hamburger-line:nth-child(1) {
            transform: rotate(45deg) translate(0, 7px);
            background: #1B5E20;
        }

        .hamburger.open .hamburger-line:nth-child(2) {
            opacity: 0;
            transform: scale(0);
        }

        .hamburger.open .hamburger-line:nth-child(3) {
            transform: rotate(-45deg) translate(0, -7px);
            background: #1B5E20;
        }

        /* Mobile Menu Overlay */
        .mobile-menu-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0);
            z-index: 999;
            visibility: hidden;
            opacity: 0;
            transition: all 0.3s ease;
        }

        .mobile-menu-overlay.active {
            background: rgba(0, 0, 0, 0.5);
            visibility: visible;
            opacity: 1;
        }

        /* Mobile Menu Slide */
        .mobile-menu {
            position: fixed;
            top: 0;
            right: 0;
            width: 280px;
            height: 100vh;
            background: #F5F5DC;
            box-shadow: -10px 0 30px rgba(0, 0, 0, 0.2);
            transform: translateX(100%);
            transition: transform 0.3s ease-in-out;
            z-index: 1000;
            overflow-y: auto;
            visibility: hidden;
        }

        .mobile-menu.active {
            transform: translateX(0);
            visibility: visible;
        }

        /* Close Button */
        .close-btn {
            width: 28px;
            height: 28px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 4px;
            background: rgba(255, 255, 255, 0.1);
            transition: all 0.2s ease;
            border: none;
            position: relative;
        }

        .close-btn:hover {
            background: rgba(255, 255, 255, 0.2);
        }

        .close-btn::before,
        .close-btn::after {
            content: '';
            position: absolute;
            width: 14px;
            height: 1.5px;
            background: white;
            border-radius: 1px;
        }

        .close-btn::before {
            transform: rotate(45deg);
        }

        .close-btn::after {
            transform: rotate(-45deg);
        }

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

        {{-- Navigation Bar --}}
        <nav class="bg-beige py-3 md:py-5 relative z-[1000]">
            <div class="max-w-6xl mx-auto flex justify-between items-center px-4 md:px-5">
                <div class="relative flex items-center gap-4 z-[100]">
                    <div class="hidden md:block absolute top-24 -left-52 w-96 h-24 bg-beige logo-bg -z-10"></div>
                    <div
                        class="w-16 h-16 md:w-24 md:h-24 flex items-center justify-center relative md:top-12 bg-transparent">
                        <img src="{{ asset('assets/logo.png') }}" alt="Fujiyama Biomass Energy Logo"
                            class="w-full h-full object-contain" />
                    </div>
                </div>

                <ul class="hidden lg:flex list-none gap-6 xl:gap-10">
                    <li><a href="#home"
                            class="nav-link no-underline text-gray-800 font-medium text-base py-2.5 relative transition-colors duration-300 hover:text-green-light">Home</a>
                    </li>
                    <li><a href="#about"
                            class="nav-link no-underline text-gray-800 font-medium text-base py-2.5 relative transition-colors duration-300 hover:text-green-light">About
                            Us</a></li>
                    <li><a href="#products"
                            class="nav-link no-underline text-gray-800 font-medium text-base py-2.5 relative transition-colors duration-300 hover:text-green-light">Products</a>
                    </li>
                    <li><a href="#exports"
                            class="nav-link no-underline text-gray-800 font-medium text-base py-2.5 relative transition-colors duration-300 hover:text-green-light">Exports
                            & Partnerships</a></li>
                    <li>
                        <a href="#login"
                            class="px-4 xl:px-6 py-4 xl:py-3 border-none rounded-md text-sm xl:text-base font-semibold cursor-pointer transition-all duration-300 text-center bg-green-custom text-white shadow-green-custom hover:bg-green-hover hover:-translate-y-0.5 hover:shadow-green-hover">
                            Login
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
                <div class="flex justify-between items-center p-6 border-b border-gray-100 bg-gray-50">
                    <div class="flex items-center gap-3">
                        <img src="https://images.unsplash.com/photo-1599305445671-ac291c95aaa9?ixlib=rb-4.0.3&auto=format&fit=crop&w=40&q=80"
                            alt="Fujiyama logo small icon" class="w-8 h-8 object-contain rounded-full" />
                        <span class="font-bold text-lg text-gray-800">Fujiyama</span>
                    </div>
                    <button class="hamburger open" id="close-btn" aria-label="Close mobile menu">
                        <span class="hamburger-line"></span>
                        <span class="hamburger-line"></span>
                        <span class="hamburger-line"></span>
                    </button>
                </div>

                <nav class="px-4 py-6">
                    <ul class="space-y-2">
                        <li class="mobile-menu-item">
                            <a href="#home"
                                class="mobile-menu-link flex items-center py-4 px-4 text-gray-800 font-medium text-base hover:bg-green-50 hover:text-green-custom rounded-xl transition-all duration-200 active:scale-95">
                                <i class="fas fa-home w-6 mr-4 text-green-custom"></i>
                                <span>Home</span>
                                <i class="fas fa-chevron-right ml-auto text-xs text-gray-400"></i>
                            </a>
                        </li>
                        <li class="mobile-menu-item">
                            <a href="#about"
                                class="mobile-menu-link flex items-center py-4 px-4 text-gray-800 font-medium text-base hover:bg-green-50 hover:text-green-custom rounded-xl transition-all duration-200 active:scale-95">
                                <i class="fas fa-info-circle w-6 mr-4 text-green-custom"></i>
                                <span>About Us</span>
                                <i class="fas fa-chevron-right ml-auto text-xs text-gray-400"></i>
                            </a>
                        </li>
                        <li class="mobile-menu-item">
                            <a href="#products"
                                class="mobile-menu-link flex items-center py-4 px-4 text-gray-800 font-medium text-base hover:bg-green-50 hover:text-green-custom rounded-xl transition-all duration-200 active:scale-95">
                                <i class="fas fa-leaf w-6 mr-4 text-green-custom"></i>
                                <span>Products</span>
                                <i class="fas fa-chevron-right ml-auto text-xs text-gray-400"></i>
                            </a>
                        </li>
                        <li class="mobile-menu-item">
                            <a href="#exports"
                                class="mobile-menu-link flex items-center py-4 px-4 text-gray-800 font-medium text-base hover:bg-green-50 hover:text-green-custom rounded-xl transition-all duration-200 active:scale-95">
                                <i class="fas fa-globe w-6 mr-4 text-green-custom"></i>
                                <span>Exports & Partnerships</span>
                                <i class="fas fa-chevron-right ml-auto text-xs text-gray-400"></i>
                            </a>
                        </li>
                    </ul>
                </nav>

                <div class="p-6 border-t border-gray-100 bg-gray-50 mt-auto">
                    <div class="mobile-menu-item">
                        <a href="#login"
                            class="mobile-menu-link flex items-center justify-center w-full px-6 py-4 bg-green-custom text-white font-semibold rounded-xl hover:bg-green-hover transition-all duration-200 active:scale-95 shadow-lg">
                            <i class="fas fa-sign-in-alt mr-3"></i>
                            <span>Login</span>
                        </a>
                    </div>

                    <div class="mt-6 pt-4 border-t border-gray-200">
                        <div class="text-center">
                            <p class="text-sm text-gray-600 mb-2">Butuh bantuan?</p>
                            <div class="flex items-center justify-center space-x-4">
                                <a href="tel:+621234567890"
                                    class="flex items-center text-green-custom hover:text-green-hover transition-colors">
                                    <i class="fas fa-phone text-sm mr-2"></i>
                                    <span class="text-sm font-medium">Call Us</span>
                                </a>
                                <a href="mailto:info@fujiyama.com"
                                    class="flex items-center text-green-custom hover:text-green-hover transition-colors">
                                    <i class="fas fa-envelope text-sm mr-2"></i>
                                    <span class="text-sm font-medium">Email</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </div>

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
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8 max-w-6xl mx-auto">
                <div
                    class="space-y-3 text-center md:text-left transition-all transform hover:scale-105 hover:shadow-lg hover:bg-gray-50 rounded-lg p-4 md:p-6">
                    <div class="flex justify-center md:justify-start">
                        <i class="fas fa-award text-green-custom text-2xl"></i>
                    </div>
                    <h3 class="font-extrabold text-sm md:text-base">Certified PKS Charcoal</h3>
                    <p class="text-xs md:text-sm max-w-md mx-auto md:mx-0 text-gray-600">We supply GGL-certified PKS
                        charcoal, ensuring sustainability and compliance.</p>
                    <a href="#"
                        class="text-xs md:text-sm font-semibold text-green-custom hover:text-green-hover hover:underline flex items-center justify-center md:justify-start mx-auto md:mx-0">
                        See Certification <i class="fas fa-arrow-right ml-1"></i>
                    </a>
                    <img src="https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80"
                        alt="Biomass energy facility certification"
                        class="rounded-md mt-3 mx-auto md:mx-0 transition-all transform hover:scale-105 w-full h-32 md:h-40 object-cover" />
                </div>

                <div
                    class="space-y-3 text-center md:text-left transition-all transform hover:scale-105 hover:shadow-lg hover:bg-gray-50 rounded-lg p-4 md:p-6">
                    <div class="flex justify-center md:justify-start">
                        <i class="fas fa-shield-alt text-green-custom text-2xl"></i>
                    </div>
                    <h3 class="font-extrabold text-sm md:text-base">High-Quality PKS Material</h3>
                    <p class="text-xs md:text-sm max-w-md mx-auto md:mx-0 text-gray-600">Sourced from selected
                        plantations,
                        our PKS ensures high calorific value and low ash content.</p>
                    <div class="h-5"></div>
                    <img src="https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80"
                        alt="High quality PKS material"
                        class="rounded-md mt-3 mx-auto md:mx-0 transition-all transform hover:scale-105 w-full h-32 md:h-40 object-cover" />
                </div>

                <div
                    class="space-y-3 text-center md:text-left transition-all transform hover:scale-105 hover:shadow-lg hover:bg-gray-50 rounded-lg p-4 md:p-6 md:col-span-2 lg:col-span-1">
                    <div class="flex justify-center md:justify-start">
                        <i class="fas fa-globe text-green-custom text-2xl"></i>
                    </div>
                    <h3 class="font-extrabold text-sm md:text-base">Reliable Logistics & Support</h3>
                    <p class="text-xs md:text-sm max-w-md mx-auto md:mx-0 text-gray-600">We provide export-ready
                        packaging
                        with global shipping solutions.</p>
                    <div class="h-5"></div>
                    <img src="https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80"
                        alt="Logistics and shipping"
                        class="rounded-md mt-3 mx-auto md:mx-0 transition-all transform hover:scale-105 w-full h-32 md:h-40 object-cover" />
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
                        <img src="https://images.unsplash.com/photo-1572021335469-31706a17aaef?ixlib=rb-4.0.3&auto=format&fit=crop&w=100&q=80"
                            alt="Fujiyama logo icon with mountain and leaf"
                            class="w-6 h-6 object-contain rounded-full" />
                        <span class="font-bold text-xs md:text-sm">fujiyama</span>
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
                        <p class="text-[9px] md:text-xs text-gray-600 max-w-xs">Jakarta, Indonesia</p>
                        <h4 class="font-semibold text-xs md:text-sm mt-3">Contact us -</h4>
                        <p class="text-[9px] md:text-xs text-gray-600 max-w-xs">support@fujiyamabiomass.com</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script>
        class MobileMenuController {
            constructor() {
                this.menuBtn = document.getElementById('menu-btn');
                this.closeBtn = document.getElementById('close-btn');
                this.mobileMenu = document.getElementById('mobile-menu');
                this.menuOverlay = document.getElementById('menu-overlay');
                this.mobileLinks = document.querySelectorAll('.mobile-menu-link');
                this.isMenuOpen = false;

                this.init();
            }

            init() {
                // Event listeners
                this.menuBtn.addEventListener('click', () => this.toggleMenu());
                this.closeBtn.addEventListener('click', () => this.closeMenu());
                this.menuOverlay.addEventListener('click', () => this.closeMenu());

                // Close menu when clicking on navigation links
                this.mobileLinks.forEach(link => {
                    link.addEventListener('click', () => this.closeMenu());
                });

                // Close menu with escape key
                document.addEventListener('keydown', (e) => {
                    if (e.key === 'Escape' && this.isMenuOpen) {
                        this.closeMenu();
                    }
                });

                // Handle resize - close menu if screen becomes larger
                window.addEventListener('resize', () => {
                    if (window.innerWidth >= 1024 && this.isMenuOpen) {
                        this.closeMenu();
                    }
                });
            }

            toggleMenu() {
                if (this.isMenuOpen) {
                    this.closeMenu();
                } else {
                    this.openMenu();
                }
            }

            openMenu() {
                this.isMenuOpen = true;
                this.menuBtn.classList.add('open');
                this.mobileMenu.classList.add('active');
                this.menuOverlay.classList.add('active');
                document.body.style.overflow = 'hidden'; // Prevent scrolling body when menu is open
            }

            closeMenu() {
                this.isMenuOpen = false;
                this.menuBtn.classList.remove('open');
                this.mobileMenu.classList.remove('active');
                this.menuOverlay.classList.remove('active');
                document.body.style.overflow = ''; // Restore body scrolling
            }
        }

        // Initialize the mobile menu when DOM is loaded
        document.addEventListener('DOMContentLoaded', () => {
            new MobileMenuController();
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
