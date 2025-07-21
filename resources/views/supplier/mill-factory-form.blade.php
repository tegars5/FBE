<!DOCTYPE html>
<html lang="en">

<x-layout.head title="Homes" />

<body>
    <x-layout.navbar />
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
                    <form class="space-y-4" action="{{ route('supplier.register.initial') }}" method="POST">
                        @csrf
                        <div>
                            <label for="mill_region" class="block text-sm font-medium text-gray-700 mb-1">Region</label>
                            <input type="text" id="mill_region" name="mill_region"
                                placeholder="Kalimantan Tengah, Riau"
                                class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-custom focus:border-transparent">
                            <p class="text-xs text-gray-500 mt-1">Contoh: Kalimantan Tengah, Riau</p>
                        </div>
                        <div>
                            <label for="mill_monthly_capacity"
                                class="block text-sm font-medium text-gray-700 mb-1">Monthly Production Capacity
                                (ton/month)</label>
                            <input type="text" id="mill_monthly_capacity" name="mill_monthly_capacity"
                                placeholder="2000"
                                class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-custom focus:border-transparent">
                            <p class="text-xs text-gray-500 mt-1">Contoh: 2000 (kapasitas produksi bulanan PKS dalam
                                ton)</p>
                        </div>
                        <p class="block text-sm font-medium text-gray-700 pt-2">Palm Variety Composition (%)</p>
                        <div class="grid grid-cols-3 gap-4">
                            <div>
                                <label for="mill_dura" class="block text-xs font-medium text-gray-600 mb-1">Dura</label>
                                <input type="text" id="mill_dura" name="mill_dura" placeholder="30"
                                    class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-custom focus:border-transparent">
                                <p class="text-xs text-gray-500 mt-1">Contoh: 30 (persentase varietas Dura)</p>
                            </div>
                            <div>
                                <label for="mill_tenera"
                                    class="block text-xs font-medium text-gray-600 mb-1">Tenera</label>
                                <input type="text" id="mill_tenera" name="mill_tenera" placeholder="60"
                                    class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-custom focus:border-transparent">
                                <p class="text-xs text-gray-500 mt-1">Contoh: 60 (persentase varietas Tenera)</p>
                            </div>
                            <div>
                                <label for="mill_pisifera"
                                    class="block text-xs font-medium text-gray-600 mb-1">Pisifera</label>
                                <input type="text" id="mill_pisifera" name="mill_pisifera" placeholder="10"
                                    class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-custom focus:border-transparent">
                                <p class="text-xs text-gray-500 mt-1">Contoh: 10 (persentase varietas Pisifera)</p>
                            </div>
                        </div>
                        <div>
                            <label for="mill_annual_sales" class="block text-sm font-medium text-gray-700 mb-1">Annual
                                Sales Record (ton/year)</label>
                            <input type="text" id="mill_annual_sales" name="mill_annual_sales" placeholder="20000"
                                class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-custom focus:border-transparent">
                            <p class="text-xs text-gray-500 mt-1">Contoh: 20000 (total penjualan PKS tahunan dalam ton)
                            </p>
                        </div>
                        <div>
                            <label for="mill_desired_price" class="block text-sm font-medium text-gray-700 mb-1">Desired
                                Sales Price
                                (USD/ton)</label>
                            <input type="text" id="mill_desired_price" name="mill_desired_price" placeholder="120"
                                class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-custom focus:border-transparent">
                            <p class="text-xs text-gray-500 mt-1">Contoh: 120 (harga yang diharapkan per ton PKS)</p>
                        </div>
                        <div>
                            <label for="mill_years_operation" class="block text-sm font-medium text-gray-700 mb-1">Years
                                in Operation</label>
                            <input type="text" id="mill_years_operation" name="mill_years_operation" placeholder="5"
                                class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-custom focus:border-transparent">
                            <p class="text-xs text-gray-500 mt-1">Contoh: 5 (jumlah tahun pabrik beroperasi)</p>
                        </div>
                        <div>
                            <label for="mill_contact_name" class="block text-sm font-medium text-gray-700 mb-1">Contact
                                Person Name</label>
                            <input type="text" id="mill_contact_name" name="mill_contact_name"
                                placeholder="Budi Santoso"
                                class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-custom focus:border-transparent">
                            <p class="text-xs text-gray-500 mt-1">Contoh: Budi Santoso</p>
                        </div>
                        <div>
                            <label for="mill_contact_email" class="block text-sm font-medium text-gray-700 mb-1">Contact
                                Person Email</label>
                            <input type="email" id="mill_contact_email" name="mill_contact_email"
                                placeholder="budi.santoso@example.com"
                                class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-custom focus:border-transparent">
                            <p class="text-xs text-gray-500 mt-1">Contoh: budi.santoso@example.com</p>
                        </div>
                        <div>
                            <label for="mill_contact_phone" class="block text-sm font-medium text-gray-700 mb-1">Contact
                                Person Phone
                                Number</label>
                            <input type="tel" id="mill_contact_phone" name="mill_contact_phone"
                                placeholder="+6281234567890"
                                class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-custom focus:border-transparent">
                            <p class="text-xs text-gray-500 mt-1">Contoh: +6281234567890</p>
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
                        <p class="text-xs sm:text-sm text-gray-500 mt-2">Modern office space at Neo Soho
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
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.671136532199!2d106.78738997458905!3d-6.174763660506777!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f7002212556b%3A0xd553386b470af88!2sNEO%20SOHO%20APARTEMENT!5e0!3m2!1sid!2sid!4v1752225709101!5m2!1sid!2sid"
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
    <x-layout.footer />

    <script>
        // Memastikan script ini hanya berjalan jika user belum login
        @guest
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.querySelector(
                '#supplier-info form'); // Select the form by its parent section's ID and then form
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
