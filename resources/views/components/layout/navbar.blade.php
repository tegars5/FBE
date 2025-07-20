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
                    <img src="{{ asset('assets/fujiyama-logo.png') }}" alt="Fujiyama Biomass Energy Logo"
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
                    <a href="{{ url('/') }}#exports"
                        class="nav-link text-gray-800 font-medium text-base py-2.5
                    relative hover:text-green-light transition duration-300">
                        Exports & Partnerships
                    </a>
                </li>
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
                <li class="relative dropdown">
                    <button
                        class="nav-link flex items-center gap-1 text-gray-800 font-medium text-base py-2.5 relative hover:text-green-light transition duration-300 focus:outline-none">
                        Supplier
                        <svg class="w-3 h-3 ml-1 transition-transform duration-200" fill="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <ul
                        class="dropdown-menu absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg border border-gray-100 z-50">
                        <li>
                            {{-- PENTING: Hapus @guest dari sini. Link ini sekarang bisa diakses guest. --}}
                            <a href="{{ route('supplier.formFactory') }}"
                                class="block px-6 py-3 text-gray-800 hover:bg-green-50 hover:text-green-custom transition mill-factory-link">
                                Mill Factory
                            </a>
                        </li>
                        <li>
                            {{-- PENTING: Hapus @guest dari sini. Link ini sekarang bisa diakses guest. --}}
                            <a href="{{ route('supplier.formCollector') }}"
                                class="block px-6 py-3 text-gray-800 hover:bg-green-50 hover:text-green-custom transition collector-link">
                                Collector
                            </a>
                        </li>
                    </ul>
                </li>
                {{-- Bagian ini akan disembunyikan jika user sudah login --}}
                @guest
                    <li>
                        <a href="{{ route('login') }}"
                            class="min-w-[100px] text-center px-4 xl:px-6 py-2.5 rounded-md text-sm xl:text-base font-semibold bg-green-custom text-white shadow-green-custom hover:bg-green-hover transition-all duration-300">
                            Sign In
                        </a>
                    </li>
                    {{-- Link registrasi hanya muncul jika belum login --}}
                    <li>
                        <a href="{{ route('register') }}"
                            class="min-w-[100px] text-center px-4 xl:px-6 py-2.5 rounded-md text-sm xl:text-base font-semibold bg-green-custom text-white shadow-green-custom hover:bg-green-hover transition-all duration-300">
                            Sign Up
                        </a>
                    </li>
                @endguest
                {{-- Dynamic User/Language Section --}}
                <li class="relative flex items-center">
                    {{-- Check if the user is logged in --}}
                    @auth
                        {{-- If logged in, show user's name and person icon, and logout link --}}
                        <a href="{{ route('home') }}"
                            class="text-sm xl:text-base font-semibold text-green-custom hover:text-green-light transition duration-300">
                            <i class="fas fa-user-circle mr-1"></i> {{ Auth::user()->name }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="inline ml-4">
                            @csrf
                            <button type="submit"
                                class="text-sm xl:text-base font-semibold text-red-600 hover:text-red-800 transition duration-300">
                                Logout
                            </button>
                        </form>
                    @else
                        {{-- If not logged in, show language option --}}
                        <a href="#"
                            class="text-sm xl:text-base font-semibold text-green-custom hover:text-green-light transition duration-300">
                            <i class="fas fa-globe mr-1"></i>
                            Language
                        </a>
                    @endauth
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
                <div class="mobile-menu-item">
                    <a href="{{ url('/') }}#supplier-info" class="mobile-menu-link">
                        <i class="fas fa-handshake"></i>Supplier Info
                    </a>
                </div>
                {{-- Tambahkan link Mill Factory dan Collector di mobile menu --}}
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
                <div class="mobile-menu-item">
                    {{-- Check if the user is logged in for mobile menu --}}
                    @auth
                        <a href="{{ route('home') }}" class="mobile-menu-link">
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
                        <a href="#"
                            class="text-sm xl:text-base font-semibold text-green-custom hover:text-green-light transition duration-300">
                            <i class="fas fa-globe mr-1"></i>
                            Language
                        </a>
                    @endauth
                </div>
            </nav>

            {{-- Bagian ini akan disembunyikan jika user sudah login di mobile menu --}}
            @guest
                <div class="mobile-menu-footer">
                    <button class="mobile-login-btn w-full min-w-[120px]"
                        onclick="window.location.href='{{ route('login') }}'">
                        <i class="fas fa-sign-in-alt"></i>Login
                    </button>
                    <button class="mobile-login-btn w-full min-w-[120px] mt-2 bg-blue-600 hover:bg-blue-700"
                        onclick="window.location.href='{{ route('register') }}'">
                        <i class="fas fa-user-plus"></i>Register
                    </button>
                </div>
            @endguest
        </div>
    </nav>
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
            '{{ asset('assets/foto-bg/bg-1.png') }}',
            '{{ asset('assets/foto-bg/bg-2.JPG') }}', // Slide 2: hanya gambar
            '{{ asset('assets/foto-bg/bg-3.jpg') }}' // Slide 3: hanya gambar
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
