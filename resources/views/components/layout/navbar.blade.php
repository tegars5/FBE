<!DOCTYPE html>
<html lang="id">

<x.layout.head :styles="true" title="Homes" />

<body class="font-sans leading-relaxed overflow-x-hidden">
    <nav class="bg-beige py-3 md:py-5 fixed top-0 w-full z-50 transition-all duration-300 ease-in-out shadow-md">
        <div class="navbar-inner-container flex justify-between items-center px-4 md:px-5">
            <div class="relative flex items-center gap-4 z-[100]">
                <div class="hidden md:block absolute top-24 -left-52 w-96 h-24 bg-beige logo-bg -z-10"></div>
                <div
                    class="logo-image-container w-16 h-16 md:w-24 md:h-24 flex items-center justify-center relative md:top-8 bg-transparent">
                    <img src="{{ asset('assets/fujiyama-logowebp') }}" alt="Fujiyama Biomass Energy Logo"
                        class="w-full h-full object-contain" />
                </div>
            </div>
            <ul class="hidden lg:flex list-none gap-6 xl:gap-8 items-center navbar-links-left">
                <li>
                    <a href="{{ url('/') }}"
                        class="nav-link text-gray-800 font-medium text-base py-2.5 relative hover:text-green-light transition duration-300">
                        Home
                    </a>
                </li>
                <li>
                    <a href="{{ url('/') }}#about"
                        class="nav-link text-gray-800 font-medium text-base py-2.5 relative hover:text-green-light transition duration-300">
                        About Us
                    </a>
                </li>
                <li>
                    <a href="{{ url('/') }}#sustainability"
                        class="nav-link text-gray-800 font-medium text-base py-2.5 relative hover:text-green-light transition duration-300">
                        Sustainability
                    </a>
                </li>
                <li>
                    <a href="{{ url('/') }}#company"
                        class="nav-link text-gray-800 font-medium text-base py-2.5 relative hover:text-green-light transition duration-300">
                        Company
                    </a>
                </li>
                <li>
                    <a href="{{ url('/') }}#supplier-info"
                        class="nav-link text-gray-800 font-medium text-base py-2.5 relative hover:text-green-light transition duration-300">
                        Exports & Partnerships
                    </a>
                </li>

                {{-- Dropdown "More" --}}
                <li class="relative dropdown">
                    <button
                        class="nav-link flex items-center gap-1 text-gray-800 font-medium text-base py-2.5 relative hover:text-green-light transition duration-300 focus:outline-none">
                        More
                        <svg class="w-3 h-3 ml-1 transition-transform duration-200" fill="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <ul
                        class="dropdown-menu absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg border border-gray-100 z-50">
                        <li>
                            <a href="{{ url('/') }}#products"
                                class="block px-6 py-3 text-gray-800 hover:bg-green-50 hover:text-green-custom transition">
                                Products
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/') }}#gallery"
                                class="block px-6 py-3 text-gray-800 hover:bg-green-50 hover:text-green-custom transition">
                                Gallery
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/') }}#technical"
                                class="block px-6 py-3 text-gray-800 hover:bg-green-50 hover:text-green-custom transition">
                                Technical Data
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- START: Link Kondisional Berdasarkan Role & Status Login --}}
                @auth
                    {{-- Link spesifik untuk role 'supplier' --}}
                    @if (Auth::user()->role === 'supplier')
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
                    @endif

                    {{-- Dropdown Profil Pengguna (Struktur sudah konsisten) --}}
                    <li class="relative dropdown">
                        <button
                            class="nav-link flex items-center gap-1 text-gray-800 font-medium text-base py-2.5 relative hover:text-green-light transition duration-300 focus:outline-none">
                            <i class="fas fa-user-circle mr-1"></i> {{ Auth::user()->name }}
                            <svg class="w-3 h-3 ml-1 transition-transform duration-200" fill="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <ul
                            class="dropdown-menu absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg border border-gray-100 z-50">
                            <li>
                                @php
                                    $dashboardRoute = 'dashboard'; // Default
                                    if (Auth::user()->role === 'admin') {
                                        $dashboardRoute = 'admin.dashboard';
                                    } elseif (Auth::user()->role === 'supplier') {
                                        $dashboardRoute = 'supplier.dashboard';
                                    } elseif (Auth::user()->role === 'buyer') {
                                        $dashboardRoute = 'buyer.dashboard';
                                    }
                                @endphp
                                <a href="{{ route('profile.show') }}"
                                    class="block px-6 py-3 text-gray-800 hover:bg-green-50 hover:text-green-custom transition">
                                    My Profile
                                </a>
                                <a href="{{ route($dashboardRoute) }}"
                                    class="block px-6 py-3 text-gray-800 hover:bg-green-50 hover:text-green-custom transition">
                                    Dashboard
                                </a>
                            </li>
                            <li>
                                <form action="{{ route('logout') }}" method="POST" class="w-full">
                                    @csrf
                                    <button type="submit"
                                        class="block w-full text-left px-6 py-3 text-red-600 hover:bg-red-50 hover:text-red-800 transition">
                                        Logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @else
                    {{-- Tombol untuk Pengguna yang Belum Login --}}
                    <li>
                        <a href="{{ route('login') }}"
                            class="min-w-[100px] text-center px-4 xl:px-6 py-2.5 rounded-md text-sm xl:text-base font-semibold bg-green-custom text-white shadow-green-custom hover:bg-green-hover transition-all duration-300">
                            Sign&nbsp;In
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('register') }}"
                            class="min-w-[100px] text-center px-4 xl:px-6 py-2.5 rounded-md text-sm xl:text-base font-semibold bg-green-custom text-white shadow-green-custom hover:bg-green-hover transition-all duration-300">
                            Sign&nbsp;Up
                        </a>
                    </li>
                    <li class="desktop-language">
                        <a href="#"
                            class="text-sm xl:text-base font-semibold text-green-custom hover:text-green-light transition duration-300">
                            <i class="fas fa-globe mr-1"></i> Language
                        </a>
                    </li>
                @endauth
                {{-- END: Link Kondisional --}}
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
                    <img src="{{ asset('assets/fujiyama-logowebp') }}" alt="Fujiyama logo"
                        class="w-10 h-10 object-contain rounded-full" />
                    <div>
                        <h3 class="font-bold text-lg text-green-custom">Fujiyama</h3>
                        <p class="text-xs text-gray-600">Biomass Energy</p>
                    </div>
                </div>
            </div>

            <nav class="mobile-menu-nav">
                <div class="mobile-menu-item">
                    <a href="{{ url('/') }}" class="mobile-menu-link">
                        <i class="fas fa-home"></i>Home
                    </a>
                </div>
                <div class="mobile-menu-item">
                    <a href="{{ url('/') }}#about" class="mobile-menu-link">
                        <i class="fas fa-info-circle"></i>About Us
                    </a>
                </div>
                <div class="mobile-menu-item">
                    <a href="{{ url('/') }}#sustainability" class="mobile-menu-link">
                        <i class="fas fa-leaf"></i>Sustainability
                    </a>
                </div>
                <div class="mobile-menu-item">
                    <a href="{{ url('/') }}#company" class="mobile-menu-link">
                        <i class="fas fa-leaf"></i>Company Name
                    </a>
                </div>
                <div class="mobile-menu-item">
                    <a href="{{ url('/') }}#exports" class="mobile-menu-link">
                        <i class="fas fa-globe"></i>Exports & Partnerships
                    </a>
                </div>
                <div class="mobile-menu-item">
                    <a href="{{ url('/') }}#products" class="mobile-menu-link">
                        <i class="fas fa-boxes"></i>Products
                    </a>
                </div>
                <div class="mobile-menu-item">
                    <a href="{{ url('/') }}#gallery" class="mobile-menu-link">
                        <i class="fas fa-images"></i>Gallery
                    </a>
                </div>
                <div class="mobile-menu-item">
                    <a href="{{ url('/') }}#technical" class="mobile-menu-link">
                        <i class="fas fa-chart-bar"></i>Technical Data
                    </a>
                </div>
                <div class="mobile-menu-item">
                    <a href="{{ url('/') }}#contact" class="mobile-menu-link">
                        <i class="fas fa-envelope"></i>Contact
                    </a>
                </div>


                {{-- START: Conditional Links based on User Role (Mobile Navbar) --}}
                @auth
                    {{-- If user is logged in, show personalized dashboard link --}}
                    @if (Auth::user()->role === 'supplier')
                        <div class="mobile-menu-item">
                            <a href="{{ route('supplier.formFactory') }}" class="mobile-menu-link mill-factory-link">
                                <i class="fas fa-industry"></i>Mill Factory Form
                            </a>
                        </div>
                        <div class="mobile-menu-item">
                            <a href="{{ route('supplier.formCollector') }}" class="mobile-menu-link collector-link">
                                <i class="fas fa-hard-hat"></i>Collector Form
                            </a>
                        </div>
                    @elseif(Auth::user()->role === 'buyer')
                        {{-- Add specific buyer links here for mobile menu --}}
                        <div class="mobile-menu-item">
                            <a href="{{ route('buyer.dashboard') }}" class="mobile-menu-link mill-factory-link">
                                <i class="fas fa-industry"></i>Buyer Form
                            </a>
                        </div>
                        <div class="mobile-menu-item">
                            <a href="{{ route('buyer.dashboard') }}" class="mobile-menu-link collector-link">
                                <i class="fas fa-hard-hat"></i>Buyer Collector Form
                            </a>
                        </div>
                    @elseif(Auth::user()->role === 'admin')
                        {{-- Add specific admin links here for mobile menu --}}
                        <div class="mobile-menu-item">
                            <a href="{{ route('admin.dashboard') }}" class="mobile-menu-link">
                                <i class="fas fa-user-shield"></i>Admin Panel
                            </a>
                        </div>
                    @endif
                @endauth

                <div class="mobile-menu-item">
                    @auth
                        {{-- User profile and logout for mobile menu --}}
                        @php
                            $dashboardRoute = 'dashboard'; // Default general dashboard
                            if (Auth::user()->role === 'admin') {
                                $dashboardRoute = 'admin.dashboard';
                            } elseif (Auth::user()->role === 'supplier') {
                                $dashboardRoute = 'supplier.dashboard';
                            } elseif (Auth::user()->role === 'buyer') {
                                $dashboardRoute = 'buyer.dashboard';
                            }
                        @endphp
                        <a href="{{ route($dashboardRoute) }}" class="mobile-menu-link">
                            <i class="fas fa-user-circle"></i>{{ Auth::user()->name }}
                        </a>
                        <a href="#"
                            onclick="event.preventDefault(); document.getElementById('logout-form-mobile').submit();"
                            class="mobile-menu-link text-red-600 hover:text-red-800">
                            <i class="fas fa-sign-out-alt"></i>Logout
                        </a>
                        <form id="logout-form-mobile" action="{{ route('logout') }}" method="POST" class="hidden">
                            @csrf
                        </form>
                    @else
                        {{-- If not logged in, show language option (mobile menu) --}}
                        <div class="w-full">
                            {{-- Tombol untuk membuka/menutup dropdown --}}
                            <button id="mobile-lang-toggle"
                                class="mobile-menu-link w-full text-left flex justify-between items-center">
                                <span>
                                    <i class="fas fa-globe"></i> Language
                                </span>
                                <i class="fas fa-chevron-down text-xs transition-transform duration-300"></i>
                            </button>
                            {{-- Wadah untuk pilihan bahasa, tersembunyi secara default --}}
                            <div id="mobile-lang-options" class="hidden pl-10 pr-4 pt-2 pb-1 space-y-2 bg-gray-50">
                                <a href="?lang=en"
                                    class="block text-sm text-gray-700 hover:text-green-custom font-medium">
                                    English
                                </a>
                                <a href="?lang=id"
                                    class="block text-sm text-gray-700 hover:text-green-custom font-medium">
                                    Indonesia
                                </a>
                            </div>
                        </div>
                    @endauth
                </div>
            </nav>

            {{-- Auth buttons for mobile menu when user is NOT logged in --}}
            @guest
                <div class="mobile-menu-footer">
                    <button class="mobile-login-btn w-full min-w-[120px]"
                        onclick="window.location.href='{{ route('login') }}'">
                        <i class="fas fa-sign-in-alt"></i>Sign In
                    </button>
                    <button class="mobile-login-btn w-full min-w-[120px] mt-2 bg-blue-600 hover:bg-blue-700"
                        onclick="window.location.href='{{ route('register') }}'">
                        <i class="fas fa-user-plus"></i>Sign Up
                    </button>
                </div>
            @endguest
        </div>
    </nav>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // ===============================================================
            // BAGIAN 1: FUNGSI DROPDOWN NAVIGASI DESKTOP (DIPERBAIKI)
            // ===============================================================
            const dropdowns = document.querySelectorAll('nav .dropdown');
            let leaveTimeout;

            dropdowns.forEach(dropdown => {
                const handleMouseEnter = () => {
                    clearTimeout(leaveTimeout);
                    dropdowns.forEach(d => d.classList.remove('active'));
                    dropdown.classList.add('active');
                };

                const handleMouseLeave = () => {
                    leaveTimeout = setTimeout(() => {
                        dropdown.classList.remove('active');
                    }, 300);
                };

                dropdown.addEventListener('mouseenter', handleMouseEnter);
                dropdown.addEventListener('mouseleave', handleMouseLeave);
            });
            const heroImages = [
                '{{ asset('assets/foto-bg/bg-1webp') }}',
                '{{ asset('assets/foto-bg/bg-2webp') }}',
                '{{ asset('assets/foto-bg/bg-3webp') }}'
            ];
            const homeHero = document.getElementById('home-hero');
            const heroDotsContainer = document.getElementById('hero-dots');
            const heroTitle = document.querySelector('.hero-title');
            const heroButtons = document.querySelector('.hero-buttons');

            if (homeHero && heroDotsContainer && heroTitle && heroButtons) {
                let currentHeroImageIndex = 0;
                let autoSlideInterval;

                function createHeroDots() {
                    heroDotsContainer.innerHTML = '';
                    heroImages.forEach((_, index) => {
                        const dot = document.createElement('span');
                        dot.className =
                            'w-2 h-2 bg-white rounded-full opacity-50 cursor-pointer hover:opacity-100 transition';
                        if (index === currentHeroImageIndex) dot.classList.replace('opacity-50',
                            'opacity-100');
                        dot.addEventListener('click', () => {
                            currentHeroImageIndex = index;
                            updateHeroSlider();
                            resetAutoSlide();
                        });
                        heroDotsContainer.appendChild(dot);
                    });
                }

                function updateHeroSlider() {
                    homeHero.style.backgroundImage = `url('${heroImages[currentHeroImageIndex]}')`;
                    const isFirstSlide = currentHeroImageIndex === 0;
                    heroTitle.style.display = isFirstSlide ? 'block' : 'none';
                    heroButtons.style.display = isFirstSlide ? 'flex' : 'none';
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

                updateHeroSlider();
                resetAutoSlide();

                let touchStartX = 0;
                homeHero.addEventListener('touchstart', e => {
                    touchStartX = e.touches[0].clientX;
                    clearInterval(autoSlideInterval);
                });
                homeHero.addEventListener('touchend', e => {
                    const touchEndX = e.changedTouches[0].clientX;
                    if (touchEndX < touchStartX - 50) nextHeroImage();
                    if (touchEndX > touchStartX + 50) prevHeroImage();
                    resetAutoSlide();
                });
            }

            // ===============================================================
            // BAGIAN 3: FUNGSI MENU MOBILE DAN LAINNYA
            // ===============================================================
            const menuBtn = document.getElementById('menu-btn');
            const mobileMenu = document.getElementById('mobile-menu');
            const menuOverlay = document.getElementById('menu-overlay');

            if (menuBtn && mobileMenu && menuOverlay) {
                const toggleMobileMenu = () => {
                    menuBtn.classList.toggle('active');
                    mobileMenu.classList.toggle('active');
                    menuOverlay.classList.toggle('active');
                    document.body.classList.toggle('overflow-hidden');
                };
                menuBtn.addEventListener('click', toggleMobileMenu);
                menuOverlay.addEventListener('click', toggleMobileMenu);
                document.querySelectorAll('.mobile-menu-link').forEach(link => link.addEventListener('click', () =>
                    mobileMenu.classList.contains('active') && toggleMobileMenu()));
                document.addEventListener('keydown', e => e.key === 'Escape' && mobileMenu.classList.contains(
                    'active') && toggleMobileMenu());
                window.addEventListener('resize', () => window.innerWidth >= 1024 && mobileMenu.classList.contains(
                    'active') && toggleMobileMenu());
            }

            // Navbar scroll effect
            window.addEventListener('scroll', function() {
                const nav = document.querySelector('nav');
                if (window.scrollY > 100) {
                    nav.classList.add('scrolled');
                } else {
                    nav.classList.remove('scrolled');
                }
            });

            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function(e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        const offset = target.offsetTop - document.querySelector('nav')
                            .offsetHeight;
                        window.scrollTo({
                            top: offset,
                            behavior: 'smooth'
                        });
                    }
                });
            });
        });

        function handleSubmit(event) {
            event.preventDefault();
            alert('Thank you! Your message has been sent. We will respond within 24 hours.');
            event.target.reset();
        }

        function toggleSDG(sdgId) {
            const element = document.getElementById(sdgId);
            if (!element) return;
            document.querySelectorAll('.sdg-detail').forEach(sdg => sdg.id !== sdgId && sdg.classList.add('hidden'));
            element.classList.toggle('hidden');
            if (!element.classList.contains('hidden')) {
                setTimeout(() => element.scrollIntoView({
                    behavior: 'smooth',
                    block: 'center'
                }), 100);
            }
        }
        document.addEventListener('DOMContentLoaded', function() {
            const menuBtn = document.getElementById('menu-btn');
            const mobileMenu = document.getElementById('mobile-menu');
            const menuOverlay = document.getElementById('menu-overlay');

            // Toggle mobile menu
            function toggleMobileMenu() {
                menuBtn.classList.toggle('active');
                mobileMenu.classList.toggle('active');
                menuOverlay.classList.toggle('active');
                document.body.classList.toggle('overflow-hidden'); // Prevent body scroll
            }

            // Add event listeners
            menuBtn.addEventListener('click', toggleMobileMenu);
            menuOverlay.addEventListener('click', toggleMobileMenu);

            // Close mobile menu when a link is clicked
            document.querySelectorAll('.mobile-menu-link').forEach(link => {
                link.addEventListener('click', function() {
                    if (mobileMenu.classList.contains('active')) {
                        toggleMobileMenu();
                    }
                });
            });

            // Close mobile menu when the escape key is pressed
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape' && mobileMenu.classList.contains('active')) {
                    toggleMobileMenu();
                }
            });

            // Close mobile menu on window resize
            window.addEventListener('resize', function() {
                if (window.innerWidth >= 1024 && mobileMenu.classList.contains('active')) {
                    toggleMobileMenu();
                }
            });
        });
    </script>
</body>

</html>
