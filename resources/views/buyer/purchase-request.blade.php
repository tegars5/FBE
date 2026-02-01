<!DOCTYPE html>
<html lang="en">

<x-layout.head title="Homes" />

<body>
    <x-layout.navbar />
    <section id="buyer-registration"
        class="py-16 md:py-24 bg-gradient-to-br from-blue-50 to-gray-100 relative overflow-hidden">
        <div class="absolute inset-0 bg-pattern-subtle opacity-20 z-0"></div>
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-extrabold text-gray-800 leading-tight">
                    Buyer 
                </h2>
                <p class="mt-4 text-base md:text-lg text-gray-700 max-w-3xl mx-auto">
                    Partner with FBE to secure a sustainable supply of high-quality PKS (Palm Kernel Shell). Please fill
                    out the registration form below.
                </p>
            </div>

            <div class="bg-white p-6 md:p-8 rounded-lg shadow-lg">
                {{-- Form action akan membutuhkan route baru, misal 'buyer.register.store' --}}
                {{-- enctype diperlukan untuk upload file --}}
                <form class="space-y-6" action="{{-- route('buyer.register.store') --}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    {{-- Company Information --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="company_name" class="block text-sm font-medium text-gray-700">Company
                                Name</label>
                            <input type="text" id="company_name" name="company_name"
                                placeholder="e.g. Green Energy Trading Ltd."
                                class="mt-1 w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-custom">
                        </div>
                        <div>
                            <label for="country" class="block text-sm font-medium text-gray-700">Country /
                                Region</label>
                            <select id="country" name="country"
                                class="mt-1 w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-custom">
                                <option>Japan</option>
                                <option>Korea</option>
                                <option>China</option>
                                <option>Germany</option>
                                <option>Denmark</option>
                                <option>Other</option>
                            </select>
                        </div>
                        <div>
                            <label for="city" class="block text-sm font-medium text-gray-700">City</label>
                            <input type="text" id="city" name="city" placeholder="e.g. Tokyo"
                                class="mt-1 w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-custom">
                        </div>
                        <div>
                            <label for="years_in_operation" class="block text-sm font-medium text-gray-700">Years in
                                Operation</label>
                            <input type="number" id="years_in_operation" name="years_in_operation"
                                placeholder="e.g. 10"
                                class="mt-1 w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-custom">
                        </div>
                    </div>

                    {{-- Purchase Details --}}
                    <div class="border-t pt-6 grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="annual_purchase_volume" class="block text-sm font-medium text-gray-700">Annual
                                PKS Purchase Volume (tons)</label>
                            <input type="number" id="annual_purchase_volume" name="annual_purchase_volume"
                                placeholder="e.g. 50,000"
                                class="mt-1 w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-custom">
                        </div>
                        <div>
                            <label for="monthly_purchase_volume" class="block text-sm font-medium text-gray-700">Monthly
                                Purchase Volume (tons)</label>
                            <input type="number" id="monthly_purchase_volume" name="monthly_purchase_volume"
                                placeholder="e.g. 4,000"
                                class="mt-1 w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-custom">
                        </div>
                        <div>
                            <label for="preferred_trade_terms" class="block text-sm font-medium text-gray-700">Preferred
                                Trade Terms</label>
                            <select id="preferred_trade_terms" name="preferred_trade_terms"
                                class="mt-1 w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-custom">
                                <option>FOB</option>
                                <option>CIF</option>
                                <option>EXW</option>
                            </select>
                        </div>
                        <div>
                            <label for="target_price" class="block text-sm font-medium text-gray-700">Target Price
                                (USD/ton)</label>
                            <input type="number" step="0.01" id="target_price" name="target_price"
                                placeholder="e.g. 120"
                                class="mt-1 w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-custom">
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700">Products of Interest</label>
                            <div class="mt-2 flex flex-wrap gap-4">
                                <label class="flex items-center"><input type="checkbox" name="products_of_interest[]"
                                        value="PKS (Raw)"
                                        class="h-4 w-4 rounded border-gray-300 text-green-custom focus:ring-green-custom mr-2">
                                    PKS (Raw)</label>
                                <label class="flex items-center"><input type="checkbox" name="products_of_interest[]"
                                        value="PKS Charcoal"
                                        class="h-4 w-4 rounded border-gray-300 text-green-custom focus:ring-green-custom mr-2">
                                    PKS Charcoal</label>
                                <label class="flex items-center"><input type="checkbox" name="products_of_interest[]"
                                        value="Biochar"
                                        class="h-4 w-4 rounded border-gray-300 text-green-custom focus:ring-green-custom mr-2">
                                    Biochar</label>
                            </div>
                        </div>
                    </div>

                    {{-- Contact Person --}}
                    <div class="border-t pt-6 grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="contact_person_name" class="block text-sm font-medium text-gray-700">Contact
                                Person Name</label>
                            <input type="text" id="contact_person_name" name="contact_person_name"
                                placeholder="e.g. Mr. Tanaka"
                                class="mt-1 w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-custom">
                        </div>
                        <div>
                            <label for="contact_person_phone" class="block text-sm font-medium text-gray-700">Contact
                                Person Phone</label>
                            <input type="tel" id="contact_person_phone" name="contact_person_phone"
                                placeholder="e.g. +81 90 1234 5678"
                                class="mt-1 w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-custom">
                        </div>
                        <div class="md:col-span-2">
                            <label for="contact_person_email" class="block text-sm font-medium text-gray-700">Contact
                                Person Email</label>
                            <input type="email" id="contact_person_email" name="contact_person_email"
                                placeholder="e.g. tanaka@greenenergy.co.jp"
                                class="mt-1 w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-custom">
                        </div>
                    </div>

                    {{-- File Uploads & Notes --}}
                    <div class="border-t pt-6 space-y-4">
                        <div>
                            <label for="business_license" class="block text-sm font-medium text-gray-700">Business
                                License (optional)</label>
                            <input type="file" id="business_license" name="business_license"
                                class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-green-50 file:text-green-custom hover:file:bg-green-100">
                            <p class="text-xs text-gray-500 mt-1">PDF or Image (Max 2MB)</p>
                        </div>
                        <div>
                            <label for="company_logo" class="block text-sm font-medium text-gray-700">Company Logo
                                (optional)</label>
                            <input type="file" id="company_logo" name="company_logo"
                                class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-green-50 file:text-green-custom hover:file:bg-green-100">
                            <p class="text-xs text-gray-500 mt-1">Max 2MB</p>
                        </div>
                        <div>
                            <label for="purchase_records" class="block text-sm font-medium text-gray-700">Previous
                                Purchase Records (optional)</label>
                            <input type="file" id="purchase_records" name="purchase_records"
                                class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-green-50 file:text-green-custom hover:file:bg-green-100">
                            <p class="text-xs text-gray-500 mt-1">Max 2MB</p>
                        </div>
                        <div>
                            <label for="additional_notes" class="block text-sm font-medium text-gray-700">Additional
                                Notes (optional)</label>
                            <textarea id="additional_notes" name="additional_notes" rows="4"
                                placeholder="e.g. We require GGL-certified PKS only"
                                class="mt-1 w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-custom"></textarea>
                        </div>
                    </div>

                    <div class="border-t pt-6">
                        <button type="submit"
                            class="w-full bg-green-custom text-white py-3 rounded-lg font-semibold hover:bg-green-hover transition">
                            Submit Registration
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <x-layout.footer />
</body>

</html>
