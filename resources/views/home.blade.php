<!DOCTYPE html>
<html lang="id">
<x-layout.head title="Homes" />

<body class="font-sans leading-relaxed overflow-x-hidden">
    <div class="relative min-h-[80vh]">
        <header class="absolute top-0 left-0 w-full h-screen hero-bg flex items-center justify-center max-h-[80vh]"
            id="home-hero">
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
        <x-layout.navbar />
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
            <a href="#"
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
            <section id="company">
                <div class="mb-8 px-4 sm:px-6 md:px-8">
                    <h3 class="text-lg font-bold text-center mb-8">Management Team</h3>
                    <div class="space-y-10">

                        <!-- Left Item -->
                        <div class="flex flex-col md:flex-row items-center md:items-start gap-6">
                            <img src="{{ asset('assets/fotowebp') }}" alt="Yoshihiro Nakagawa - CEO"
                                class="w-36 h-24 object-cover shadow-md hover:scale-105 transition-transform">
                            <div class="text-left md:max-w-xl leading-relaxed text-gray-700">
                                <p class="text-lg font-semibold mb-1 text-gray-800">Yoshihiro Nakagawa</p>
                                <p class="text-sm font-medium">CEO</p>
                                <p class="text-sm mt-2">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor
                                    incididunt ut labore
                                    et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                                    laboris nisi ut
                                    aliquip ex ea commodo consequat.
                                </p>
                            </div>
                        </div>

                        <!-- Right Item -->
                        <div class="flex flex-col md:flex-row-reverse items-center md:items-start gap-6">
                            <img src="{{ asset('assets/fotowebp') }}" alt="Azmi Roza - COO"
                                class="w-36 h-24 object-cover shadow-md hover:scale-105 transition-transform">
                            <div class="text-right md:text-right md:max-w-xl leading-relaxed text-gray-700">
                                <p class="text-lg font-semibold mb-1 text-gray-800">Azmi Roza</p>
                                <p class="text-sm font-medium">COO</p>
                                <p class="text-sm mt-2">
                                    Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                                    fugiat
                                    nulla pariatur.
                                    Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                                    mollit anim id est laborum.
                                </p>
                            </div>
                        </div>

                        <!-- Left Item -->
                        <div class="flex flex-col md:flex-row items-center md:items-start gap-6">
                            <img src="{{ asset('assets/fotowebp') }}" alt="Naoki Yoshida - Direktur"
                                class="w-36 h-24 object-cover shadow-md hover:scale-105 transition-transform">
                            <div class="text-left md:max-w-xl leading-relaxed text-gray-700">
                                <p class="text-lg font-semibold mb-1 text-gray-800">Naoki Yoshida</p>
                                <p class="text-sm font-medium">Direktur</p>
                                <p class="text-sm mt-2">
                                    Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                                    ex ea
                                    commodo
                                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum
                                    dolore
                                    eu fugiat nulla pariatur.
                                </p>
                            </div>
                        </div>

                        <!-- Right Item -->
                        <div class="flex flex-col md:flex-row-reverse items-center md:items-start gap-6">
                            <img src="{{ asset('assets/fotowebp') }}" alt="Takaki Morita - Director"
                                class="w-36 h-24 object-cover shadow-md hover:scale-105 transition-transform">
                            <div class="text-right md:text-right md:max-w-xl leading-relaxed text-gray-700">
                                <p class="text-lg font-semibold mb-1 text-gray-800">Takaki Morita</p>
                                <p class="text-sm font-medium">Director</p>
                                <p class="text-sm mt-2">
                                    Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                                    mollit anim id est laborum.
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent
                                    libero. Sed cursus ante dapibus diam.
                                </p>
                            </div>
                        </div>

                    </div>
                </div>
            </section>
            <div>
                <h3 class="text-lg font-bold mb-6">Our Commitment to SDGs</h3>
                <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4 mb-6">
                    <div class="flex flex-col items-center text-center p-3 rounded-lg hover:bg-gray-50 transition cursor-pointer"
                        onclick="toggleSDG('sdg7')">
                        <img src="{{ asset('assets/logo-brand/SDG-7webp') }}" alt="SDG 7 - Affordable and Clean Energy"
                            class="w-16 h-16 mb-1 object-contain">
                        <p class="text-xs text-gray-700 font-semibold">Affordable & Clean Energy</p>
                        <p class="text-xs text-blue-600 mt-1">Click for details</p>
                    </div>
                    <div class="flex flex-col items-center text-center p-3 rounded-lg hover:bg-gray-50 transition cursor-pointer"
                        onclick="toggleSDG('sdg13')">
                        <img src="{{ asset('assets/logo-brand/SDG-13webp') }}" alt="SDG 13 - Climate Action"
                            class="w-16 h-16 mb-1 object-contain">
                        <p class="text-xs text-gray-700 font-semibold">Climate Action</p>
                        <p class="text-xs text-blue-600 mt-1">Click for details</p>
                    </div>
                    <div class="flex flex-col items-center text-center p-3 rounded-lg hover:bg-gray-50 transition cursor-pointer"
                        onclick="toggleSDG('sdg15')">
                        <img src="{{ asset('assets/logo-brand/SDG-15webp') }}" alt="SDG 15 - Life on Land"
                            class="w-16 h-16 mb-1 object-contain">
                        <p class="text-xs text-gray-700 font-semibold">Life on Land</p>
                        <p class="text-xs text-blue-600 mt-1">Click for details</p>
                    </div>
                    <div class="flex flex-col items-center text-center p-3 rounded-lg hover:bg-gray-50 transition cursor-pointer"
                        onclick="toggleSDG('sdg8')">
                        <img src="{{ asset('assets/logo-brand/SDG-8webp') }}"
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
                    <img src="{{ asset('assets/pks-materialwebp') }}" alt="PKS Charcoal"
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
                            <a href="{{ asset('assets/aboutwebp') }}" target="_blank" class="block group relative">
                                <img src="{{ asset('assets/Palm kernel shell charcoalwebp') }}"
                                    alt="PKS Charcoal Spec 1"
                                    class="w-20 h-28 object-cover border border-gray-300 rounded-md shadow-sm group-hover:shadow-md transition">
                                <span
                                    class="absolute bottom-0 left-0 w-full bg-black bg-opacity-70 text-white text-xs text-center py-1 opacity-0 group-hover:opacity-100 transition-opacity">Page
                                    1</span>
                            </a>
                            <a href="{{ asset('assets/aboutwebp') }}" target="_blank" class="block group relative">
                                <img src="{{ asset('assets/Palm-Oil-Goodwebp') }}" alt="PKS Charcoal Spec 2"
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
                    <img src="{{ asset('assets/kelapa-sawitwebp') }}" alt="Raw PKS"
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
                            <a href="{{ asset('assets/tumpukan-kelapa-sawitwebp') }}" target="_blank"
                                class="block group relative">
                                <img src="{{ asset('assets/tumpukan-kelapa-sawitwebp') }}" alt="Raw PKS Spec 1"
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

                        <div class="mt-8">
                            <h4 class="font-semibold text-xl mb-4 text-gray-800">Certified Sustainable:</h4>
                            <img src="{{ asset('assets/logo-brand/logo-gglwebp') }}" alt="GGL Certification Logo"
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
                        <img src="{{ asset('assets/diagram-cowebp') }}" alt="CO2 Reduction Diagram"
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
                            <img src="{{ asset('assets/cangkang-sawitwebp') }}" alt="Environmental Initiative 1"
                                class="w-full h-40 object-cover rounded-lg shadow-md hover:scale-105 transition-transform">
                            <img src="{{ asset('assets/produksi-cangkangwebp') }}" alt="Environmental Initiative 2"
                                class="w-full h-40 object-cover rounded-lg shadow-md hover:scale-105 transition-transform">
                            <img src="{{ asset('assets/palm-trees-palm-oilwebp') }}" alt="Environmental Initiative 3"
                                class="w-full h-40 object-cover rounded-lg shadow-md hover:scale-105 transition-transform">
                            <img src="{{ asset('assets/back-view-man-working-eco-friendly-wind-power-projectwebp') }}"
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

                <div class="md:col-span-2 bg-green-700 text-white p-6 md:p-8 rounded-lg shadow-xl text-center
                                transform hover:scale-102 transition-all duration-300"
                    id="exports">
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
    {{-- <section class="max-w-7xl mx-auto px-4 sm:px-6 md:px-12 lg:px-20 pb-8 md:pb-12" id="articles">
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
                            <img src="{{ asset('images/no-imagewebp') }}" alt="No Image Available"
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
                                        <img src="{{ asset('images/no-imagewebp') }}" alt="No Image Available"
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
                                        <img src="{{ asset('images/no-imagewebp') }}" alt="No Image Available"
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
    </section> --}}

    <section id="gallery" class="py-8 md:py-12 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-12 lg:px-20">
            <h2 class="text-xl md:text-2xl font-extrabold text-center mb-8">Our Visual Gallery</h2>

            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-6">
                <div
                    class="group relative overflow-hidden rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300 cursor-pointer">
                    <img src="{{ asset('assets/kumpulan-cangkangwebp') }}" alt="Large Stockpile of PKS Charcoal"
                        class="w-full h-48 object-cover transform group-hover:scale-105 transition-transform duration-300">
                    <div
                        class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <p class="text-white text-sm font-bold">Large Stockpile</p>
                    </div>
                </div>
                <div
                    class="group relative overflow-hidden rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300 cursor-pointer">
                    <img src="{{ asset('assets/Raw PKS webp') }}" alt="Raw PKS Material Stock"
                        class="w-full h-48 object-cover transform group-hover:scale-105 transition-transform duration-300">
                    <div
                        class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <p class="text-white text-sm font-bold">Raw Material Stock</p>
                    </div>
                </div>

                <div
                    class="group relative overflow-hidden rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300 cursor-pointer">
                    <img src="{{ asset('assets/alatwebp') }}" alt="PKS Charcoal Production Line"
                        class="w-full h-48 object-cover transform group-hover:scale-105 transition-transform duration-300">
                    <div
                        class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <p class="text-white text-sm font-bold">Production Line</p>
                    </div>
                </div>
                <div
                    class="group relative overflow-hidden rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300 cursor-pointer">
                    <img src="{{ asset('assets/quality-controlwebp') }}" alt="Quality Control Area"
                        class="w-full h-48 object-cover transform group-hover:scale-105 transition-transform duration-300">
                    <div
                        class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <p class="text-white text-sm font-bold">Quality Control</p>
                    </div>
                </div>

                <div
                    class="group relative overflow-hidden rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300 cursor-pointer">
                    <img src="{{ asset('assets/containerwebp') }}" alt="Container Loading for Export"
                        class="w-full h-48 object-cover transform group-hover:scale-105 transition-transform duration-300">
                    <div
                        class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <p class="text-white text-sm font-bold">Container Loading</p>
                    </div>
                </div>
                <div
                    class="group relative overflow-hidden rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300 cursor-pointer">
                    <img src="{{ asset('assets/PKS Charcoal Readywebp') }}" alt="PKS Charcoal Ready for Shipment"
                        class="w-full h-48 object-cover transform group-hover:scale-105 transition-transform duration-300">
                    <div
                        class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <p class="text-white text-sm font-bold">Ready for Shipment</p>
                    </div>
                </div>
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
                            <img src="{{ asset('assets/certifications/certificate_thumb_1webp') }}"
                                alt="Certification Document 1 Thumbnail"
                                class="w-full h-48 object-cover rounded-lg shadow-md group-hover:scale-105 transition-transform">
                            <span
                                class="absolute bottom-0 left-0 w-full bg-black bg-opacity-70 text-white text-xs text-center py-1 opacity-0 group-hover:opacity-100 transition-opacity">View
                                Document</span>
                        </a>
                        <a href="{{ asset('assets/certifications/certificate_2_full_1.pdf') }}" target="_blank"
                            class="block group relative">
                            <img src="{{ asset('assets/certifications/certificate_thumb_2webp') }}"
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
                <!-- Left Column - Direct Contact -->
                <div class="space-y-6">
                    <h3 class="text-lg sm:text-xl font-bold mb-6 text-green-custom">Direct Contact</h3>

                    <div class="space-y-6">
                        <div class="flex items-start gap-3 sm:gap-4">
                            <i
                                class="fas fa-map-marker-alt text-green-custom text-lg sm:text-xl mt-1 flex-shrink-0"></i>
                            <div class="min-w-0">
                                <p class="font-semibold text-gray-900 mb-1">Head Office</p>
                                <p class="text-gray-600 text-sm sm:text-base leading-relaxed">
                                    Neo Soho, Jalan Let. Jend. S. Parman Kav. 28 Unit 2011<br>
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
                                <a href="mailto:info@fbe.co.id"
                                    class="text-gray-600 text-sm sm:text-base hover:text-green-custom transition-colors">
                                    info@fbe.co.id
                                </a>
                            </div>
                        </div>

                        <div class="flex items-start gap-3 sm:gap-4">
                            <i class="fas fa-clock text-green-custom text-lg sm:text-xl mt-1 flex-shrink-0"></i>
                            <div>
                                <p class="font-semibold text-gray-900 mb-1">Business Hours</p>
                                <p class="text-gray-600 text-sm sm:text-base">Monday - Friday: 08:00 - 17:00 WIB</p>
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
                                <p class="text-xs sm:text-sm text-gray-500 mt-1">Quick response during business hours
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Our Office Section - Moved and Improved -->
                    <div class="mt-8">
                        <h3 class="text-lg sm:text-xl font-bold mb-6 text-green-custom">Our Office</h3>
                        <div class="w-full h-48 sm:h-64 md:h-72 bg-gray-200 rounded-lg overflow-hidden shadow-lg">
                            <img src="{{ asset('assets/neo-sohowebp') }}" alt="Neo Soho Office Building"
                                class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
                        </div>
                        <p class="text-xs sm:text-sm text-gray-500 mt-3 text-center">Modern office space at Neo Soho
                        </p>
                    </div>
                </div>

                <!-- Right Column - Contact Form and Map -->
                <div class="space-y-8">
                    <!-- Contact Form -->
                    <div>
                        <h3 class="text-lg sm:text-xl font-bold mb-6 text-green-custom">Send a Message</h3>
                        <form class="space-y-4" onsubmit="handleSubmit(event)">
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <input type="text" name="first_name" placeholder="First Name" required
                                    class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-custom focus:border-transparent text-sm sm:text-base">
                                <input type="text" name="last_name" placeholder="Last Name"
                                    class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-custom focus:border-transparent text-sm sm:text-base">
                            </div>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <input type="email" name="email_address" placeholder="Email Address" required
                                    class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-custom focus:border-transparent text-sm sm:text-base">
                                <input type="tel" name="phone_number" placeholder="Phone Number" required
                                    class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-custom focus:border-transparent text-sm sm:text-base">
                            </div>
                            <input type="text" name="company_name" placeholder="Company Name"
                                class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-custom focus:border-transparent text-sm sm:text-base">

                            <select name="inquiry_type" required
                                class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-custom focus:border-transparent text-gray-700 text-sm sm:text-base">
                                <option value="">Select Inquiry Type</option>
                                <option value="product">Product Information</option>
                                <option value="quote">Request for Quotation</option>
                                <option value="partnership">Partnership Opportunity</option>
                                <option value="other">Other</option>
                            </select>

                            <textarea name="message" placeholder="Please enter your message" rows="4" required
                                class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-custom focus:border-transparent text-sm sm:text-base resize-none"></textarea>

                            <button type="submit" id="submitButton"
                                class="w-full bg-green-custom text-white py-3 px-6 rounded-lg font-semibold hover:bg-green-hover transition-colors text-sm sm:text-base">
                                Send Message
                            </button>
                            <div id="formMessage" class="mt-4 text-center text-sm"></div>
                        </form>
                    </div>

                    <!-- Office Location Map -->
                    <div>
                        <h3 class="text-lg sm:text-xl font-bold mb-6 text-green-custom">Office Location</h3>
                        <div class="w-full">
                            <div class="w-full h-64 sm:h-72 bg-transparent rounded-lg overflow-hidden shadow-lg">
                                <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.671136651886!2d106.78509397610306!3d-6.174763644527437!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f7002212556b%3A0xd553386b470af88!2sNEO%20SOHO%20APARTEMENT!5e0!3m2!1sid!2sid!4v1753431520442!5m2!1sid!2sid"
                                    width="100%" height="100%" style="border:0;" allowfullscreen=""
                                    loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="rounded-lg">
                                </iframe>
                            </div>
                            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mt-4 gap-2">
                                <p class="text-xs sm:text-sm text-gray-600">
                                    Click the map for directions to Neo Soho Central Park
                                </p>
                                <a href="https://www.google.com/maps/search/Neo+Soho" target="_blank"
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
                        <img src="{{ asset('assets/fujiyama-logowebp') }}" alt="Fujiyama logo"
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

        // Smooth Scroll for Anchor Links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault(); // Mencegah default scroll

                const targetId = this.getAttribute('href'); // Ambil target id
                const targetElement = document.querySelector(targetId); // Cari elemen target

                if (targetElement) {
                    // Tambahkan offset untuk memastikan konten tidak tertutup oleh navbar
                    const navbarHeight = document.querySelector('nav').offsetHeight;
                    const offsetTop = targetElement.offsetTop - navbarHeight;

                    window.scrollTo({
                        top: offsetTop, // Scroll ke posisi target
                        behavior: 'smooth' // Smooth scroll
                    });
                }
            });
        });


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
        const heroImages = [];

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

        // Handle clicks on supplier form links
        document.querySelectorAll('.mill-factory-link, .collector-link').forEach(link => {
            link.addEventListener('click', function(e) {
                    @guest
                    e.preventDefault(); // Mencegah navigasi langsung
                    alert('Please login first to fill out the form.'); // Tampilkan pop-up
                    window.location.href = "{{ route('login') }}"; // Opsional: redirect ke halaman login
                @endguest
            });

        function handleSubmit(event) {
            event.preventDefault();

            const form = event.target;
            const submitButton = document.getElementById('submitButton');
            const messageDiv = document.getElementById('formMessage');

            // Disable button dan ubah teks
            submitButton.disabled = true;
            submitButton.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Mengirim...';
            messageDiv.innerHTML = '';

            // Ambil data form TANPA token
            const formData = new FormData(form);

            // Konversi ke object dan hapus token
            const formObject = {};
            formData.forEach((value, key) => {
                if (key !== '_token') { // Skip token CSRF
                    formObject[key] = value;
                }
            });

            console.log('Sending form data:', formObject);

            // Validasi client-side tambahan
            if (!validateForm(formObject)) {
                resetSubmitButton(submitButton);
                return;
            }

            // Buat FormData baru tanpa token untuk dikirim
            const cleanFormData = new FormData();
            Object.keys(formObject).forEach(key => {
                cleanFormData.append(key, formObject[key]);
            });

            // Kirim AJAX request dengan timeout
            const controller = new AbortController();
            const timeoutId = setTimeout(() => controller.abort(), 30000);

            fetch('/contact/send', {
                    method: 'POST',
                    body: cleanFormData, // FormData tanpa token
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                            'content'), // Token di header
                    },
                    signal: controller.signal
                })
                .then(response => {
                    clearTimeout(timeoutId);
                    console.log('Response status:', response.status);

                    if (!response.ok) {
                        throw new Error(`HTTP error! status: ${response.status}`);
                    }

                    return response.json();
                })
                .then(data => {
                    console.log('Response data:', data);

                    if (data.success) {
                        showSuccessMessage(messageDiv, data.message);
                        form.reset();
                        messageDiv.scrollIntoView({
                            behavior: 'smooth'
                        });

                        // Auto-hide success message setelah 10 detik
                        setTimeout(() => {
                            fadeOutMessage(messageDiv);
                        }, 10000);

                    } else {
                        showErrorMessage(messageDiv, data.message, data.errors);

                        if (data.errors) {
                            console.log('Validation errors:', data.errors);
                            highlightErrorFields(form, data.errors);
                        }
                    }
                })
                .catch(error => {
                    clearTimeout(timeoutId);
                    console.error('Error:', error);

                    let errorMessage = 'Terjadi kesalahan saat mengirim pesan. ';

                    if (error.name === 'AbortError') {
                        errorMessage += 'Permintaan terlalu lama. Silakan coba lagi.';
                    } else if (error.message.includes('Failed to fetch')) {
                        errorMessage += 'Masalah koneksi internet. Periksa koneksi Anda dan coba lagi.';
                    } else {
                        errorMessage += 'Silakan coba lagi atau hubungi kami langsung via WhatsApp.';
                    }

                    showErrorMessage(messageDiv, errorMessage);
                })
                .finally(() => {
                    resetSubmitButton(submitButton);
                });
        }

        // Fungsi validasi form (tidak berubah)
        function validateForm(formData) {
            const errors = [];

            // Validasi email format
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(formData.email_address)) {
                errors.push('Format email tidak valid');
            }

            // Validasi nomor telepon Indonesia
            const phoneRegex = /^(\+62|62|0)[0-9]{9,13}$/;
            if (!phoneRegex.test(formData.phone_number.replace(/[\s-]/g, ''))) {
                errors.push('Format nomor telepon tidak valid');
            }

            // Validasi panjang pesan
            if (formData.message.length < 10) {
                errors.push('Pesan terlalu pendek (minimal 10 karakter)');
            }

            if (errors.length > 0) {
                showErrorMessage(document.getElementById('formMessage'),
                    'Silakan perbaiki kesalahan berikut:\n• ' + errors.join('\n• '));
                return false;
            }

            return true;
        }

        // Fungsi helper lainnya tetap sama...
        function showSuccessMessage(messageDiv, message) {
            messageDiv.innerHTML = `
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg shadow-md">
            <div class="flex items-center">
                <i class="fas fa-check-circle text-xl mr-3"></i>
                <div>
                    <strong class="font-semibold">Berhasil!</strong>
                    <p class="mt-1">${message}</p>
                </div>
            </div>
        </div>
    `;
        }

        function showErrorMessage(messageDiv, message, errors = null) {
            let errorDetails = '';
            if (errors) {
                errorDetails = '<ul class="mt-2 text-sm list-disc list-inside">';
                Object.keys(errors).forEach(field => {
                    errors[field].forEach(error => {
                        errorDetails += `<li>${error}</li>`;
                    });
                });
                errorDetails += '</ul>';
            }

            messageDiv.innerHTML = `
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg shadow-md">
            <div class="flex items-start">
                <i class="fas fa-exclamation-circle text-xl mr-3 mt-1 flex-shrink-0"></i>
                <div class="flex-grow">
                    <strong class="font-semibold">Terjadi Kesalahan!</strong>
                    <p class="mt-1">${message}</p>
                    ${errorDetails}
                </div>
            </div>
        </div>
    `;
        }

        function resetSubmitButton(submitButton) {
            submitButton.disabled = false;
            submitButton.innerHTML = 'Send Message';
        }

        function highlightErrorFields(form, errors) {
            // Reset semua field
            form.querySelectorAll('input, select, textarea').forEach(field => {
                field.classList.remove('border-red-500', 'focus:ring-red-500');
                field.classList.add('border-gray-300', 'focus:ring-green-custom');
            });

            // Highlight field yang error
            Object.keys(errors).forEach(fieldName => {
                const field = form.querySelector(`[name="${fieldName}"]`);
                if (field) {
                    field.classList.remove('border-gray-300', 'focus:ring-green-custom');
                    field.classList.add('border-red-500', 'focus:ring-red-500');
                }
            });
        }

        function fadeOutMessage(messageDiv) {
            messageDiv.style.transition = 'opacity 0.5s';
            messageDiv.style.opacity = '0';
            setTimeout(() => {
                messageDiv.innerHTML = '';
                messageDiv.style.opacity = '1';
            }, 500);
        }

        // Event listener untuk reset error highlight saat user mengetik
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.querySelector('form[onsubmit="handleSubmit(event)"]');
            if (form) {
                form.querySelectorAll('input, select, textarea').forEach(field => {
                    field.addEventListener('input', function() {
                        if (this.classList.contains('border-red-500')) {
                            this.classList.remove('border-red-500', 'focus:ring-red-500');
                            this.classList.add('border-gray-300', 'focus:ring-green-custom');
                        }
                    });
                });
            }
        });
        });
    </script>
</body>

</html>
