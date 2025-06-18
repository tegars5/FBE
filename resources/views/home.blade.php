<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Fujiyama Biomass Energy</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto&family=Roboto+Slab&display=swap" rel="stylesheet" />
    <style>
        body {
            font-family: 'Roboto', sans-serif;
        }

        .font-logo {
            font-family: 'Roboto Slab', cursive;
        }
    </style>
</head>

<body class="bg-[#f9f6e6] text-[#0f3a2f]">
    <!-- Header -->
    <header class="relative bg-[#f9f6e6] overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <nav class="flex items-center justify-between py-6">
                <div class="relative flex flex-col items-center">
                    <!-- Logo -->
                    <img src="{{ asset('assets/logo.png') }}" alt="Fujiyama Biomass Energy logo"
                        class="w-28 h-28 object-contain relative z-20" />
                    <svg width="120" height="32" viewBox="0 0 120 32"
                        class="absolute top-full left-1/2 -translate-x-1/2 z-10">
                        <path d="M0,32 Q60,0 120,32" fill="#f9f6e6" />
                    </svg>
                </div>
                <!-- Navigasi -->
                <ul class="hidden md:flex space-x-8 text-base font-normal">
                    <li><a href="#" class="hover:underline">Home</a></li>
                    <li><a href="#" class="hover:underline">About Us</a></li>
                    <li><a href="#" class="hover:underline">Products</a></li>
                    <li><a href="#" class="hover:underline">Exports &amp; Partnerships</a></li>
                </ul>
                <div class="auth-buttons ml-8">
                    <a href="{{ route('admin.login') }}"
                        class="bg-[#008000] text-white px-5 py-2 rounded-md text-base font-medium hover:bg-[#355E3B] transition">
                        Login
                    </a>
                </div>
            </nav>
        </div>
        <!-- Hero Section -->
        <div class="relative">
            <img src="{{ asset('assets/content2.jpg') }}"
                alt="Biomass energy facility with piles of biomass material and blue sky"
                class="w-full h-[400px] object-cover rounded-tl-[60px]" />
            <div
                class="absolute inset-0 bg-gradient-to-r from-black/60 to-black/20 rounded-tl-[60px] flex flex-col justify-center px-6 sm:px-12 md:px-20">
                <h1 class="text-white font-extrabold text-3xl sm:text-4xl md:text-5xl max-w-3xl leading-tight ml-10">
                    Sustainable Biomass Energy from Indonesia to the World
                </h1>
                <div class="mt-6 flex space-x-4 ml-10">
                    <button
                        class="bg-[#008000] text-white px-5 py-2 rounded-md text-base font-medium hover:bg-[#355E3B] transition">
                        View Products
                    </button>
                    <button
                        class="bg-[#e4d3a7] text-[#1f3f1a] px-5 py-2 rounded-md text-base font-medium hover:bg-[#d4c28a] transition">
                        Contact Us
                    </button>
                </div>
            </div>
        </div>
    </header>

    <!-- About Us, Products, Exports & Partnerships Section -->
    <section class="max-w-7xl mx-auto px-6 sm:px-12 md:px-20 py-12 space-y-12">
        <div class="max-w-4xl">
            <h2 class="text-2xl font-extrabold mb-2">About Us</h2>
            <p class="text-base font-normal max-w-xl"> PT Fujiyama Biomass Energy supports renewable energy through
                PKS
                charcoal products. </p>
        </div>
        <div class="flex flex-col md:flex-row md:items-center md:space-x-12 space-y-8 md:space-y-0 max-w-4xl"> <img
                src="{{ asset('assets/about.jpg') }}"
                alt="Close-up image of PKS charcoal pellets and a white block product on a wooden pallet"
                class="w-48 h-36 object-cover rounded-md flex-shrink-0" />
            <div>
                <h3 class="text-xl font-extrabold mb-3">Products</h3>
                <ul class="list-disc list-inside space-y-1 text-base font-normal max-w-md">
                    <li>High calorific value</li>
                    <li>Low ash and moisture-content</li>
                    <li>Export quality specifications</li>
                </ul>
            </div>
        </div>
        <div class="flex flex-col md:flex-row md:items-center md:space-x-12 space-y-8 md:space-y-0 max-w-4xl">
            <div class="flex flex-col space-y-4 md:flex-1">
                <h3 class="text-xl font-extrabold">Exports &amp; Partnerships</h3>
                <div class="flex space-x-6 items-center">
                    <div class="flex items-center space-x-2">
                        <div class="w-5 h-5 rounded-full bg-[#1f3f1a]"></div> <span
                            class="font-bold text-sm">LOGO</span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <div class="w-5 h-5 rounded-full bg-[#1f3f1a]"></div> <span
                            class="font-bold text-sm">LOGO</span>
                    </div>
                </div> <button
                    class="bg-[#1f3f1a] text-white px-5 py-2 rounded-md w-max text-sm font-medium hover:bg-[#1a3315] transition">
                    Contact Us </button>
            </div> <img src="{{ asset('assets/map-indonesia.png') }}"
                alt="Green colored map of Indonesia showing islands"
                class="w-full max-w-md rounded-md object-contain md:flex-1" />
        </div>
    </section> <!-- Brown info bar -->
    <div class="bg-[#6f4e1e] text-[#d9b87a] text-center py-3 text-sm font-normal"> PKS charcoal products that
        benefit
        both the planet and its people </div>
    <!-- Why choose us section -->
    <section class="max-w-7xl mx-auto px-6 sm:px-12 md:px-20 py-12">
        <h2 class="text-2xl font-extrabold text-center mb-10">Why choose us?</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-6xl mx-auto">
            <!-- Card 1 -->
            <div
                class="space-y-3 text-center md:text-left transition-all transform hover:scale-105 hover:shadow-lg hover:bg-gray-200 rounded-md p-4">
                <div class="flex justify-center md:justify-start">
                    <i class="fas fa-award text-[#1f3f1a] text-xl"></i>
                </div>
                <h3 class="font-extrabold text-sm md:text-base ">Certified PKS
                    Charcoal</h3>
                <p class="text-xs md:text-sm max-w-md mx-auto md:mx-0 text-gray-600">We supply GGL-certified PKS
                    charcoal, ensuring sustainability and compliance.</p>
                <a href="#"
                    class="text-xs md:text-sm font-semibold text-[#1f3f1a] hover:text-blue-700 hover:underline flex items-center justify-center md:justify-start mx-auto md:mx-0">
                    See Certification <i class="fas fa-arrow-right ml-1"></i>
                </a>
                <img src="{{ asset('assets/certification.jpg') }}"
                    alt="Biomass energy facility with piles of biomass material and blue sky"
                    class="rounded-md mt-3 mx-auto md:mx-0 transition-all transform hover:scale-105" />
            </div>
            <!-- Card 2 -->
            <div
                class="space-y-3 text-center md:text-left transition-all transform hover:scale-105 hover:shadow-lg hover:bg-gray-200 rounded-md p-4">
                <div class="flex justify-center md:justify-start">
                    <i class="fas fa-shield-alt text-[#1f3f1a] text-xl"></i>
                </div>
                <h3 class="font-extrabold text-sm md:text-base ">High-Quality PKS
                    Material</h3>
                <p class="text-xs md:text-sm max-w-md mx-auto md:mx-0 text-gray-600">Sourced from selected
                    plantations, our PKS ensures high calorific value and low ash content.</p>
                <div class="text-xs md:text-sm font-semibold text-[#1f3f1a] flex justify-center md:justify-start">
                    &nbsp;
                </div>
                <img src="{{ asset('assets/certification.jpg') }}"
                    alt="Biomass energy facility with piles of biomass material and blue sky"
                    class="rounded-md mt-3 mx-auto md:mx-0 transition-all transform hover:scale-105" />
            </div>
            <!-- Card 3 -->
            <div
                class="space-y-3 text-center md:text-left transition-all transform hover:scale-105 hover:shadow-lg hover:bg-gray-200 rounded-md p-4">
                <div class="flex justify-center md:justify-start">
                    <i class="fas fa-globe text-[#1f3f1a] text-xl"></i>
                </div>
                <h3 class="font-extrabold text-sm md:text-base ">Reliable Logistics
                    & Support</h3>
                <p class="text-xs md:text-sm max-w-md mx-auto md:mx-0 text-gray-600">We provide export-ready
                    packaging with global shipping solutions.</p>
                <div class="text-xs md:text-sm font-semibold text-[#1f3f1a] flex justify-center md:justify-start">
                    &nbsp;
                </div>
                <img src="{{ asset('assets/certification.jpg') }}"
                    alt="Biomass energy facility with piles of biomass material and blue sky"
                    class="rounded-md mt-3 mx-auto md:mx-0 transition-all transform hover:scale-105" />
            </div>
        </div>
    </section>

    <!-- Latest articles and industry insights -->
    <section class="max-w-7xl mx-auto px-6 sm:px-12 md:px-20 pb-12">
        <div class="flex justify-between items-center mb-4">
            <h3 class="font-extrabold text-base md:text-lg max-w-xs leading-tight">The latest articles and industry
                insights</h3>
            <a href="{{ route('articles.index') }}"
                class="text-[10px] md:text-xs text-blue-700 font-semibold hover:underline">View All →</a>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <!-- Large article (Featured) -->
            @if ($articles->isNotEmpty())
                @php $featured = $articles->first(); @endphp
                <article class="space-y-1 transition-all hover:scale-105 hover:shadow-lg hover:text-blue-700">
                    <a href="{{ route('articles.show', $featured->id) }}" class="block">
                        @if ($featured->photo)
                            <img src="{{ Storage::disk('s3')->url($featured->photo) }}" alt="{{ $featured->title }}"
                                class="rounded-md w-full object-cover h-40 md:h-48 transition-all hover:scale-105" />
                        @else
                            <img src="{{ asset('images/no-image.png') }}" alt="No Image"
                                class="rounded-md w-full object-cover h-40 md:h-48 transition-all hover:scale-105" />
                        @endif
                        <h4 class="font-semibold text-xs md:text-sm leading-tight mt-2">{{ $featured->title }}
                        </h4>
                        <p class="text-[8px] md:text-xs text-gray-600">Article —
                            {{ $featured->created_at->format('F j, Y') }}</p>
                    </a>
                </article>
            @endif
            <!-- Two smaller articles stacked vertically -->
            <div class="space-y-8">
                @foreach ($articles->skip(1)->take(2) as $article)
                    <article class="flex space-x-2 transition-all hover:scale-105 hover:shadow-lg hover:text-blue-700">
                        <a href="{{ route('articles.show', $article->id) }}" class="flex space-x-2">
                            @if ($article->photo)
                                <img src="{{ Storage::disk('s3')->url($article->photo) }}"
                                    alt="{{ $article->title }}"
                                    class="rounded-md w-24 h-16 object-cover flex-shrink-0 transition-all hover:scale-105" />
                            @else
                                <img src="{{ asset('images/no-image.png') }}" alt="No Image"
                                    class="rounded-md w-24 h-16 object-cover flex-shrink-0 transition-all hover:scale-105" />
                            @endif
                            <div class="flex flex-col justify-between">
                                <h4 class="font-semibold text-[9px] md:text-xs leading-tight">
                                    {{ $article->title }}</h4>
                                <p class="text-[7px] md:text-[9px] text-gray-600">Article —
                                    {{ $article->created_at->format('F j, Y') }}</p>
                            </div>
                        </a>
                    </article>
                @endforeach
            </div>
            <!-- Two smaller articles stacked vertically -->
            <div class="space-y-8">
                @foreach ($articles->skip(3)->take(2) as $article)
                    <article class="flex space-x-2 transition-all hover:scale-105 hover:shadow-lg hover:text-blue-700">
                        <a href="{{ route('articles.show', $article->id) }}" class="flex space-x-2">
                            @if ($article->photo)
                                <img src="{{ Storage::disk('s3')->url($article->photo) }}"
                                    alt="{{ $article->title }}"
                                    class="rounded-md w-24 h-16 object-cover flex-shrink-0 transition-all hover:scale-105" />
                            @else
                                <img src="{{ asset('images/no-image.png') }}" alt="No Image"
                                    class="rounded-md w-24 h-16 object-cover flex-shrink-0 transition-all hover:scale-105" />
                            @endif
                            <div class="flex flex-col justify-between">
                                <h4 class="font-semibold text-[9px] md:text-xs leading-tight">
                                    {{ $article->title }}</h4>
                                <p class="text-[7px] md:text-[9px] text-gray-600">Article —
                                    {{ $article->created_at->format('F j, Y') }}</p>
                            </div>
                        </a>
                    </article>
                @endforeach
            </div>
        </div>
    </section>
    <section
        class="max-w-7xl mx-auto px-6 sm:px-12 md:px-20 py-6 flex flex-col md:flex-row items-center justify-between border-t border-gray-300">
        <h3 class="font-extrabold text-sm md:text-base max-w-xs leading-tight mb-4 md:mb-0"> Make sure you choose
            the
            right expedition services for your delivery </h3> <button
            class="bg-[#008000] text-white px-5 py-2 rounded-md text-sm sm:text-base font-medium hover:bg-[#355E3B] transition">
            Contact Us → </button>
    </section> <!-- Footer -->
    <footer class="max-w-7xl mx-auto px-6 sm:px-12 md:px-20 py-12 text-gray-700 text-xs md:text-sm">
        <div class="flex flex-col md:flex-row md:justify-between md:space-x-12">
            <div class="flex flex-col space-y-3 md:flex-1">
                <div class="flex items-center space-x-2"> <img src="{{ asset('assets/logo.png') }}"
                        alt="Fujiyama logo icon with mountain and leaf" class="w-6 h-6 object-contain" /> <span
                        class="font-bold text-xs md:text-sm">fujiyama</span> </div>
                <p class="text-[9px] md:text-xs max-w-xs"> Ceramics Express provides customized services for
                    customers
                    around the world from 50+ leading industries. For more information please </p>
                <p class="text-[8px] md:text-[10px] text-gray-400">© 2018 All rights reserved – fujiyama</p>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 md:flex-1">
                <div class="space-y-1">
                    <h4 class="font-semibold text-xs md:text-sm">Products</h4>
                    <ul class="space-y-1 text-[9px] md:text-xs text-gray-600">
                        <li><a href="#" class="hover:underline">Features</a></li>
                        <li><a href="#" class="hover:underline">Furnitures</a></li>
                        <li><a href="#" class="hover:underline">Security</a></li>
                        <li><a href="#" class="hover:underline">Customer Stories</a></li>
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
                    <p class="text-[9px] md:text-xs text-gray-600 max-w-xs"> 123 Anywhere St., Any City, ST 12345
                    </p>
                    <h4 class="font-semibold text-xs md:text-sm mt-3">Contact us -</h4>
                    <p class="text-[9px] md:text-xs text-gray-600 max-w-xs">support@FujiyamaBiomasEnergy</p>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>
