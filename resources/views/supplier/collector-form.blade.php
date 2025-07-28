<!DOCTYPE html>
<html lang="en">

<x-layout.head title="Collector Form" />

<body>
    <x-layout.navbar />
    <section id="supplier-info"
        class="py-16 md:py-24 bg-gradient-to-br from-green-50 to-beige-100 relative overflow-hidden">
        <div class="absolute inset-0 bg-pattern-subtle opacity-20 z-0"></div>
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <h2 class="text-2xl md:text-4xl font-extrabold text-center text-green-700 mb-12 leading-tight">
                Supplier Partnership Opportunities - Collector
            </h2>
            <p class="text-base md:text-lg text-gray-700 text-center mb-10 max-w-3xl mx-auto">
                At FBE, we believe that strong partnerships with local suppliers are key to building a sustainable
                biomass industry. We are actively seeking collaborations with mill factories and collectors across
                Indonesia to expand our sustainable PKS supply chains. Join us in creating a greener future.
            </p>

            <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
                <div
                    class="bg-white p-6 md:p-8 rounded-lg shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                    <h3 class="text-xl md:text-2xl font-bold text-green-custom mb-6 text-center">For Collectors
                    </h3>
                    <p class="text-gray-700 leading-relaxed mb-6">
                        FBE also partners with collectors who aggregate PKS from multiple mills. If you are an
                        experienced PKS collector looking for new business opportunities, please fill out the form
                        below. We would love to learn more about your operations and discuss how we can collaborate.
                    </p>
                    <form id="collectorForm" class="space-y-4" action="{{ route('supplier.register.initial') }}"
                        method="POST">
                        @csrf
                        <div>
                            <label for="collector_region"
                                class="block text-sm font-medium text-gray-700 mb-1">Region</label>
                            <input type="text" id="collector_region" name="collector_region"
                                class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-custom focus:border-transparent">
                        </div>
                        <div>
                            <label for="collector_monthly_capacity"
                                class="block text-sm font-medium text-gray-700 mb-1">Monthly Collected Volume
                                (ton/month)</label>
                            <input type="text" id="collector_monthly_capacity" name="collector_monthly_capacity"
                                class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-custom focus:border-transparent">
                        </div>
                        <p class="block text-sm font-medium text-gray-700 pt-2">Palm Variety Composition (%)</p>
                        <div class="grid grid-cols-3 gap-4">
                            <div>
                                <label for="collector_dura"
                                    class="block text-xs font-medium text-gray-600 mb-1">Dura</label>
                                <input type="text" id="collector_dura" name="collector_dura"
                                    class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-custom focus:border-transparent">
                            </div>
                            <div>
                                <label for="collector_tenera"
                                    class="block text-xs font-medium text-gray-600 mb-1">Tenera</label>
                                <input type="text" id="collector_tenera" name="collector_tenera"
                                    class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-custom focus:border-transparent">
                            </div>
                            <div>
                                <label for="collector_pisifera"
                                    class="block text-xs font-medium text-gray-600 mb-1">Pisifera</label>
                                <input type="text" id="collector_pisifera" name="collector_pisifera"
                                    class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-custom focus:border-transparent">
                            </div>
                        </div>
                        <div>
                            <label for="collector_annual_sales"
                                class="block text-sm font-medium text-gray-700 mb-1">Annual
                                Sales Record (ton/year)</label>
                            <input type="text" id="collector_annual_sales" name="collector_annual_sales"
                                class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-custom focus:border-transparent">
                        </div>
                        <div>
                            <label for="collector_desired_price"
                                class="block text-sm font-medium text-gray-700 mb-1">Desired
                                Sales Price
                                (USD/ton)</label>
                            <input type="text" id="collector_desired_price" name="collector_desired_price"
                                class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-custom focus:border-transparent">
                        </div>
                        <div>
                            <label for="collector_years_operation"
                                class="block text-sm font-medium text-gray-700 mb-1">Years
                                in Operation</label>
                            <input type="text" id="collector_years_operation" name="collector_years_operation"
                                class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-custom focus:border-transparent">
                        </div>
                        <div>
                            <label for="collector_contact_name"
                                class="block text-sm font-medium text-gray-700 mb-1">Contact
                                Person Name</label>
                            <input type="text" id="collector_contact_name" name="collector_contact_name"
                                class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-custom focus:border-transparent">
                        </div>
                        <div>
                            <label for="collector_contact_email"
                                class="block text-sm font-medium text-gray-700 mb-1">Contact
                                Person Email</label>
                            <input type="email" id="collector_contact_email" name="collector_contact_email"
                                class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-custom focus:border-transparent">
                        </div>
                        <div>
                            <label for="collector_contact_phone"
                                class="block text-sm font-medium text-gray-700 mb-1">Contact
                                Person Phone
                                Number</label>
                            <input type="tel" id="collector_contact_phone" name="collector_contact_phone"
                                class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-custom focus:border-transparent">
                        </div>
                        <button type="submit"
                            class="w-full bg-green-custom text-white py-3 rounded-lg font-semibold hover:bg-green-hover transition">
                            Submit Information
                        </button>
                    </form>
                </div>
            </div>
            <div
                class="md:col-span-2 bg-green-700 text-white p-6 md:p-8 rounded-lg shadow-xl text-center
                                transform hover:scale-102 transition-all duration-300 mt-12">
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
                    <h3 class="text-xl md:text-2xl font-bold text-gray-800">Global CTA Section</h3>
                </div>
                <p class="text-gray-700 leading-relaxed mb-6">
                    Partner with FBE and become a part of the sustainable biomass supply chain. Together, we can build a
                    greener, more sustainable future.
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
        // Memastikan script ini hanya berjalan jika user belum login
        @guest
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('collectorForm'); // Select the form by its new ID
            if (form) {
                form.addEventListener('submit', function(e) {
                    e.preventDefault(); // Mencegah submit form
                    alert('Please login first to fill out the form.'); // Tampilkan pop-up
                    window.location.href = "{{ route('login') }}"; // Redirect ke halaman login
                });
            }
        });
        @endguest
    </script>
</body>

</html>
