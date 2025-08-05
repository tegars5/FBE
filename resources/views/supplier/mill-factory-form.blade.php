<!DOCTYPE html>
<html lang="en">

<x-layout.head title="Homes" />

<body>
    <x-layout.navbar />
    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-4 rounded-lg mb-6">
            <strong>Error:</strong> Please fix the errors below.
        </div>
        <div class="bg-white p-6 rounded-lg shadow-md">
            <ul class="list-disc pl-5 space-y-2">
                @foreach ($errors->all() as $error)
                    <li class="text-red-600">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <section id="supplier-info"
        class="py-16 md:py-24 bg-gradient-to-br from-green-50 to-beige-100 relative overflow-hidden">
        <div class="absolute inset-0 bg-pattern-subtle opacity-20 z-0"></div>
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <h2 class="text-2xl md:text-4xl font-extrabold text-center text-green-700 mb-12 leading-tight">
                Supplier Partnership Opportunities
            </h2>
            <p class="text-base md:text-lg text-gray-700 text-center mb-10 max-w-3xl mx-auto">
                At FBE, we believe that strong partnerships with local suppliers are key to building a sustainable
                biomass industry. We are actively seeking collaborations with mill factories and collectors across
                Indonesia to expand our sustainable PKS supply chains. Join us in creating a greener future.
            </p>
            <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
                <div
                    class="bg-white p-6 md:p-8 rounded-lg shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                    <h3 class="text-xl md:text-2xl font-bold text-green-custom mb-6 text-center">For Mill Factories</h3>
                    <p class="text-gray-700 leading-relaxed mb-6">
                        FBE is looking to partner directly with palm oil mill factories to secure a stable and
                        high-quality supply of PKS (Palm Kernel Shell). If you operate a mill and are interested in
                        expanding your market reach and contributing to sustainability, please fill out the form below.
                        We look forward to exploring potential cooperation.
                    </p>
                    <form class="space-y-4" action="{{ route('supplier.register.initial') }}" method="POST"
                        enctype="multipart/form-data" id="supplierForm">
                        @csrf

                        <div class="mb-4">
                            <label for="supplier_type" class="block text-sm font-medium text-gray-700 mb-1">Supplier
                                Type</label>
                            <select id="supplier_type" name="supplier_type"
                                class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-custom focus:border-transparent">
                                <option value="">Select Supplier Type</option>
                                <option value="mill_factory"
                                    {{ old('supplier_type') == 'mill_factory' ? 'selected' : '' }}>Mill Factory
                                </option>
                                <option value="collector" {{ old('supplier_type') == 'collector' ? 'selected' : '' }}>
                                    Collector</option>
                            </select>
                            @error('supplier_type')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        {{-- Region (Province, City) --}}
                        <div>
                            <label for="region_input"
                                class="block text-sm font-medium text-gray-700 mb-1">Region</label>
                            <input type="text" id="region_input" name="region"
                                placeholder="Province, City (e.g., North Sumatra / Medan)"
                                class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-custom focus:border-transparent"
                                value="{{ old('region') }}">
                            <p class="text-xs text-gray-500 mt-1">e.g., North Sumatra / Medan</p>
                            @error('region')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Annual Production Volume (tons) --}}
                        <div>
                            <label for="annual_production_volume"
                                class="block text-sm font-medium text-gray-700 mb-1">Annual Production Volume
                                (tons)</label>
                            <input type="number" id="annual_production_volume" name="annual_production_volume"
                                placeholder="e.g., 6000"
                                class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-custom focus:border-transparent"
                                value="{{ old('annual_production_volume') }}">
                            <p class="text-xs text-gray-500 mt-1">Annual PKS production volume (e.g., 6,000 tons)</p>
                            @error('annual_production_volume')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Monthly Available Volume (tons) --}}
                        <div>
                            <label for="monthly_available_volume"
                                class="block text-sm font-medium text-gray-700 mb-1">Monthly Available Volume
                                (tons)</label>
                            <input type="number" id="monthly_available_volume" name="monthly_available_volume"
                                placeholder="e.g., 500"
                                class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-custom focus:border-transparent"
                                value="{{ old('monthly_available_volume') }}">
                            <p class="text-xs text-gray-500 mt-1">Estimated sellable quantity for the current month
                                (e.g., 500 tons)</p>
                            @error('monthly_available_volume')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Palm Kernel Type Composition (%) --}}
                        <div class="grid grid-cols-3 gap-4">
                            <div>
                                <label for="dura_composition" class="block text-xs font-medium text-gray-600 mb-1">Dura
                                    (%)</label>
                                <input type="number" id="dura_composition" name="dura_composition" placeholder="30"
                                    class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-custom focus:border-transparent"
                                    value="{{ old('dura_composition') }}">
                                @error('dura_composition')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="tenera_composition"
                                    class="block text-xs font-medium text-gray-600 mb-1">Tenera (%)</label>
                                <input type="number" id="tenera_composition" name="tenera_composition" placeholder="60"
                                    class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-custom focus:border-transparent"
                                    value="{{ old('tenera_composition') }}">
                                @error('tenera_composition')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="pisifera_composition"
                                    class="block text-xs font-medium text-gray-600 mb-1">Pisifera (%)</label>
                                <input type="number" id="pisifera_composition" name="pisifera_composition"
                                    placeholder="10"
                                    class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-custom focus:border-transparent"
                                    value="{{ old('pisifera_composition') }}">
                                @error('pisifera_composition')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <p class="col-span-3 text-xs text-gray-500 mt-1">Enter as percentages (e.g., Dura: 30,
                                Tenera: 60, Pisifera: 10)</p>
                        </div>

                        {{-- Sales Record (past 1 year, tons) --}}
                        <div>
                            <label for="sales_record" class="block text-sm font-medium text-gray-700 mb-1">Sales Record
                                (past 1 year, tons)</label>
                            <input type="text" id="sales_record" name="sales_record"
                                placeholder="e.g., 20000 (total annual PKS sales in tons)"
                                class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-custom focus:border-transparent"
                                value="{{ old('sales_record') }}">
                            <p class="text-xs text-gray-500 mt-1">Sales performance including domestic and export</p>
                            @error('sales_record')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Desired Selling Price (USD/ton) --}}
                        <div>
                            <label for="desired_selling_price"
                                class="block text-sm font-medium text-gray-700 mb-1">Desired Selling Price
                                (USD/ton)</label>
                            <input type="text" id="desired_selling_price" name="desired_selling_price"
                                placeholder="e.g., 120 FOB or 115 EXW"
                                class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-custom focus:border-transparent"
                                value="{{ old('desired_selling_price') }}">
                            <p class="text-xs text-gray-500 mt-1">Indicate FOB or EXW price (e.g., 120 FOB)</p>
                            @error('desired_selling_price')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Minimum Order Quantity (tons) --}}
                        <div>
                            <label for="minimum_order_quantity"
                                class="block text-sm font-medium text-gray-700 mb-1">Minimum Order Quantity
                                (tons)</label>
                            <input type="number" id="minimum_order_quantity" name="minimum_order_quantity"
                                placeholder="e.g., 100"
                                class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-custom focus:border-transparent"
                                value="{{ old('minimum_order_quantity') }}">
                            <p class="text-xs text-gray-500 mt-1">e.g., 100 tons</p>
                            @error('minimum_order_quantity')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Product Photos (optional) --}}
                        <div>
                            <label for="product_photos" class="block text-sm font-medium text-gray-700 mb-1">Product
                                Photos (optional)</label>
                            <input type="file" id="product_photos" name="product_photos[]" multiple
                                class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-custom focus:border-transparent">
                            <p class="text-xs text-gray-500 mt-1">Photos of PKS, storage facilities, packaging, etc.
                                <strong class="text-red-500">Maksimal 2MB per foto.</strong>
                            </p>
                            @error('product_photos.*')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Notes (optional) --}}
                        <div>
                            <label for="notes" class="block text-sm font-medium text-gray-700 mb-1">Notes
                                (optional)</label>
                            <textarea id="notes" name="notes" rows="3" placeholder="e.g., Supply may decrease during rainy season"
                                class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-custom focus:border-transparent resize-none">{{ old('notes') }}</textarea>
                            <p class="text-xs text-gray-500 mt-1">e.g., “Supply may decrease during rainy season”</p>
                            @error('notes')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Urgent Sale Available Checkbox --}}
                        <div class="mb-6">
                            <label class="inline-flex items-center text-sm font-medium text-gray-700">
                                <input type="checkbox" name="urgent_sale_available"
                                    class="mr-2 h-4 w-4 text-green-custom rounded focus:ring-green-custom"
                                    {{ old('urgent_sale_available') ? 'checked' : '' }}>
                                Urgent Sale Available
                            </label>
                            @error('urgent_sale_available')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Upload Section --}}
                        <h3 class="text-xl md:text-2xl font-bold text-green-custom mb-6 text-center">Upload Section
                        </h3>

                        <div class="mb-4">
                            <label for="factory_photos" class="block text-sm font-medium text-gray-700 mb-1">Photos of
                                factory / warehouse (up to 5 images)</label>
                            <input type="file" id="factory_photos" name="factory_photos[]" multiple
                                class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-custom focus:border-transparent">
                            <p class="text-xs text-gray-500 mt-1">Maksimal 2MB per foto.</p>
                            @error('factory_photos.*')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="sample_pks_photos" class="block text-sm font-medium text-gray-700 mb-1">Sample
                                PKS photos</label>
                            <input type="file" id="sample_pks_photos" name="sample_pks_photos[]" multiple
                                class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-custom focus:border-transparent">
                            <p class="text-xs text-gray-500 mt-1">Maksimal 2MB per foto.</p>
                            @error('sample_pks_photos.*')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="lab_test_report" class="block text-sm font-medium text-gray-700 mb-1">Lab test
                                report (if available)</label>
                            <input type="file" id="lab_test_report" name="lab_test_report"
                                class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-custom focus:border-transparent">
                            <p class="text-xs text-gray-500 mt-1">Maksimal 2MB.</p>
                            @error('lab_test_report')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <button type="submit"
                            class="w-full bg-green-custom text-white py-3 rounded-lg font-semibold hover:bg-green-hover transition">
                            Submit Information
                        </button>
                    </form>
                </div>
            </div>

            <div
                class="md:col-span-2 bg-green-700 text-white p-6 md:p-8 rounded-lg shadow-xl text-center transform hover:scale-102 transition-all duration-300 mt-12">
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

            <div class="md:col-span-2 bg-beige-200 p-6 md:p-8 rounded-lg shadow-lg text-center mt-12">
                <div class="flex items-center justify-center text-green-custom mb-4">
                    <i class="fas fa-envelope-open-text text-3xl md:text-4xl mr-4"></i>
                    <h3 class="text-xl md:text-2xl font-bold text-gray-800">How to Apply / Contact Us</h3>
                </div>
                <p class="text-gray-700 leading-relaxed mb-6">
                    Interested in partnering with us? If you meet our criteria and are ready to contribute to
                    sustainable energy, please reach out to our team:
                </p>
                <ul class="list-none space-y-3 mb-8 text-lg font-medium">
                    <li><i class="fas fa-envelope text-green-custom mr-3"></i>Email: <a href="mailto:info@fbe.co.id"
                            class="text-blue-600 hover:underline">info@fbe.co.id</a>
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
                            <img src="{{ asset('assets/neo-soho.jpg') }}" alt="Neo Soho Office Building"
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
    <x-layout.footer />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/lottie-web/5.10.0/lottie.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        // Memastikan script ini hanya berjalan jika user belum login
        @guest
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('supplierForm'); // Pastikan ID form sudah benar
            if (form) {
                form.addEventListener('submit', function(e) {
                    e.preventDefault(); // Mencegah submit form
                    Swal.fire({
                        title: 'Harap Login Terlebih Dahulu',
                        text: 'Anda harus login untuk mengisi formulir ini.',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Login Sekarang!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = "{{ route('login') }}";
                        }
                    });
                });
            }
        });
        @endguest

        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('supplierForm');
            const fileInputs = ['product_photos', 'factory_photos', 'sample_pks_photos'];
            const maxFileSize = 2 * 1024 * 1024; // 2MB in bytes

            // Fungsi untuk menampilkan SweetAlert dengan Lottie untuk sukses
            function showSuccessAlert(message) {
                Swal.fire({
                    title: 'Sukses!',
                    html: `<div id="lottie-success-modal" style="width: 100px; height: 100px; margin: auto;"></div><p>${message}</p>`,
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 4000, // Otomatis tutup setelah 4 detik
                    didOpen: () => {
                        const lottieContainer = document.getElementById('lottie-success-modal');
                        lottie.loadAnimation({
                            container: lottieContainer,
                            renderer: 'svg',
                            loop: false,
                            autoplay: true,
                            path: 'https://assets5.lottiefiles.com/packages/lf20_gapl3t.json' // Ganti dengan URL Lottie animasi sukses Anda
                        });
                    }
                });
            }

            // Fungsi untuk menampilkan SweetAlert untuk error
            function showDangerAlert(message) {
                Swal.fire({
                    title: 'Error!',
                    text: message,
                    icon: 'error',
                    confirmButtonColor: '#d33',
                    confirmButtonText: 'Oke'
                });
            }

            if (form) {
                form.addEventListener('submit', function(event) {
                    let hasFileError = false;

                    fileInputs.forEach(inputId => {
                        const inputElement = document.getElementById(inputId);
                        if (inputElement && inputElement.files.length > 0) {
                            for (const file of inputElement.files) {
                                if (file.size > maxFileSize) {
                                    showDangerAlert(
                                        `Ukuran foto "${file.name}" melebihi 2MB. Harap upload foto di bawah 2MB.`
                                    );
                                    hasFileError = true;
                                    break; // Stop checking further files for this input
                                }
                            }
                        }
                        if (hasFileError) {
                            event.preventDefault(); // Hentikan submit form
                            return;
                        }
                    });

                    // For single file upload (lab_test_report)
                    const labTestReportInput = document.getElementById('lab_test_report');
                    if (!hasFileError && labTestReportInput && labTestReportInput.files.length > 0) {
                        const file = labTestReportInput.files[0];
                        if (file.size > maxFileSize) {
                            showDangerAlert(
                                `Ukuran file laporan lab "${file.name}" melebihi 2MB. Harap upload file di bawah 2MB.`
                            );
                            hasFileError = true;
                        }
                    }

                    if (hasFileError) {
                        event.preventDefault(); // Hentikan submit form jika ada error file
                    }
                });

                // Cek pesan sukses dari session (setelah submit dari backend)
                @if (session('success'))
                    showSuccessAlert("{{ session('success') }}");
                @endif

                // Cek pesan error validasi dari Laravel (jika ada field yang wajib diisi dan belum terisi)
                @if ($errors->any())
                    showDangerAlert("Harap lengkapi semua bidang yang diperlukan dan perbaiki kesalahan input.");
                @endif
            }
        });

        // Function to handle contact form submission (unchanged, but renamed to avoid conflict)
        function handleContactSubmit(event) {
            event.preventDefault();
            Swal.fire({
                title: 'Pesan Terkirim!',
                text: 'Terima kasih atas pesan Anda. Kami akan segera menghubungi Anda.',
                icon: 'success',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Oke'
            });
            // Anda bisa menambahkan logika pengiriman form sebenarnya di sini jika diperlukan
            event.target.reset(); // Kosongkan form setelah submit
        }
    </script>
</body>

</html>
