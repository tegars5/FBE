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
                {{-- END: Conditional Links based on User Role (Mobile Navbar) --}}

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
        // Menjalankan semua skrip setelah seluruh konten halaman (HTML) selesai dimuat
        document.addEventListener('DOMContentLoaded', function() {

            // ===============================================================
            // BAGIAN 1: FUNGSI DROPDOWN NAVIGASI DESKTOP (DIPERBAIKI)
            // ===============================================================
            const dropdowns = document.querySelectorAll('.dropdown');
            let leaveTimeout;

            dropdowns.forEach(dropdown => {
                const trigger = dropdown.querySelector('button');
                const menu = dropdown.querySelector('.dropdown-menu');

                // Pastikan elemen pemicu dan menu ada sebelum menambahkan event
                if (trigger && menu) {
                    // Fungsi untuk menampilkan dropdown
                    const handleMouseEnter = () => {
                        // Hapus timer penutup jika mouse kembali masuk ke area dropdown
                        clearTimeout(leaveTimeout);
                        // Tutup dulu semua dropdown lain yang mungkin terbuka
                        dropdowns.forEach(d => {
                            if (d !== dropdown) {
                                d.classList.remove('active');
                            }
                        });
                        // Tampilkan dropdown yang sedang di-hover
                        dropdown.classList.add('active');
                    };

                    // Fungsi untuk menyembunyikan dropdown dengan jeda
                    const handleMouseLeave = () => {
                        // Setel timer untuk menutup dropdown setelah jeda waktu
                        leaveTimeout = setTimeout(() => {
                            dropdown.classList.remove('active');
                        }, 300); // Jeda 0.3 detik, bisa diubah jika perlu (misal: 400)
                    };

                    // Terapkan event listener ke seluruh area dropdown (<li>)
                    // Ini membuat perpindahan mouse dari tombol ke menu lebih mulus
                    dropdown.addEventListener('mouseenter', handleMouseEnter);
                    dropdown.addEventListener('mouseleave', handleMouseLeave);
                }
            });

            // ===============================================================
            // BAGIAN 2: FUNGSI MENU MOBILE (TETAP SAMA, HANYA DIRAPIKAN)
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

                // Menutup menu mobile saat link di dalamnya diklik
                document.querySelectorAll('.mobile-menu-link').forEach(link => {
                    link.addEventListener('click', () => {
                        if (mobileMenu.classList.contains('active')) {
                            toggleMobileMenu();
                        }
                    });
                });

                // Menutup menu mobile dengan tombol 'Escape'
                document.addEventListener('keydown', e => {
                    if (e.key === 'Escape' && mobileMenu.classList.contains('active')) {
                        toggleMobileMenu();
                    }
                });

                // Menutup menu mobile jika ukuran layar menjadi desktop
                window.addEventListener('resize', () => {
                    if (window.innerWidth >= 1024 && mobileMenu.classList.contains('active')) {
                        toggleMobileMenu();
                    }
                });
            }

            const langToggleBtn = document.getElementById('mobile-lang-toggle');
            const langOptionsMenu = document.getElementById('mobile-lang-options');

            if (langToggleBtn && langOptionsMenu) {
                langToggleBtn.addEventListener('click', () => {
                    langOptionsMenu.classList.toggle('active');
                    langToggleBtn.classList.toggle('active');
                });
            }

            // ===============================================================
            // BAGIAN 3: FUNGSI-FUNGSI LAINNYA (TETAP SAMA)
            // ===============================================================

            // Efek scroll pada Navbar
            window.addEventListener('scroll', function() {
                const nav = document.querySelector('nav');
                if (nav) {
                    if (window.scrollY > 100) {
                        nav.classList.add('scrolled');
                    } else {
                        nav.classList.remove('scrolled');
                    }
                }
            });

            // Smooth scrolling untuk link anchor (#)
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function(e) {
                    e.preventDefault();
                    const targetId = this.getAttribute('href');
                    const target = document.querySelector(targetId);
                    if (target) {
                        const navbarHeight = document.querySelector('nav').offsetHeight;
                        const offset = target.offsetTop - navbarHeight;
                        window.scrollTo({
                            top: offset,
                            behavior: 'smooth'
                        });
                    }
                });
            });

        }); // Akhir dari event listener DOMContentLoaded

        // Fungsi-fungsi global yang mungkin dipanggil dari HTML (seperti onclick)
        // Sebaiknya tetap di luar DOMContentLoaded
        function handleSubmit(event) {
            event.preventDefault();
            alert('Thank you! Your message has been sent. We will respond within 24 hours.');
            event.target.reset();
        }

        function toggleSDG(sdgId) {
            const element = document.getElementById(sdgId);
            if (!element) return;

            const allSDGs = document.querySelectorAll('.sdg-detail');
            allSDGs.forEach(sdg => {
                if (sdg.id !== sdgId) {
                    sdg.classList.add('hidden');
                }
            });

            element.classList.toggle('hidden');

            if (!element.classList.contains('hidden')) {
                setTimeout(() => {
                    element.scrollIntoView({
                        behavior: 'smooth',
                        block: 'center'
                    });
                }, 100);
            }
        }
    </script>
</body>

</html>
