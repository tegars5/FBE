@extends('layouts.app') {{-- Sesuaikan dengan layout utama Anda, pastikan ini benar --}}

@section('content')
    <div class="min-h-screen bg-gray-100 flex justify-center py-10"> {{-- Ubah latar belakang body/container utama --}}
        <div class="container max-w-5xl mx-auto px-4"> {{-- Maksimumkan lebar untuk tampilan desktop --}}
            <h1 class="text-4xl font-extrabold text-primary-green mb-8 text-center">My Profile</h1> {{-- Warna H1 lebih menonjol --}}

            {{-- Alert Success --}}
            @if (session('success'))
                <div class="bg-green-50 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded shadow" role="alert">
                    <p class="font-bold">Success!</p>
                    <p>{{ session('success') }}</p>
                </div>
            @endif

            {{-- Alert Errors --}}
            @if ($errors->any())
                <div class="bg-red-50 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded shadow">
                    <p class="font-bold">Whoops!</p>
                    <p>There were some problems with your input:</p>
                    <ul class="mt-3 list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
                {{-- Tambah jarak antar bagian form --}}
                @csrf
                @method('PUT')

                {{-- Bagian Profil Umum (untuk semua user role) --}}
                <div class="bg-white shadow-xl rounded-lg p-8"> {{-- Shadow lebih menonjol --}}
                    <h2 class="text-2xl font-bold text-gray-800 mb-6 border-b pb-4 border-gray-200">Account Information</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6"> {{-- Tambah gap-y --}}
                        <div>
                            <label for="name" class="block text-gray-700 text-sm font-semibold mb-2">Full Name:</label>
                            <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}"
                                class="form-input w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-green focus:border-transparent transition ease-in-out duration-150 @error('name') border-red-500 @enderror">
                            @error('name')
                                <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="email" class="block text-gray-700 text-sm font-semibold mb-2">Email
                                Address:</label>
                            <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}"
                                class="form-input w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-green focus:border-transparent transition ease-in-out duration-150 @error('email') border-red-500 @enderror">
                            @error('email')
                                <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    {{-- Opsi untuk ubah password --}}
                    <div class="mt-8 pt-8 border-t border-gray-200">
                        <h3 class="text-xl font-bold text-gray-800 mb-6">Change Password (Optional)</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6">
                            <div>
                                <label for="current_password" class="block text-gray-700 text-sm font-semibold mb-2">Current
                                    Password:</label>
                                <input type="password" name="current_password" id="current_password"
                                    class="form-input w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-green focus:border-transparent transition ease-in-out duration-150 @error('current_password') border-red-500 @enderror">
                                @error('current_password')
                                    <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div></div> {{-- Spacer for grid layout --}}
                            <div>
                                <label for="password" class="block text-gray-700 text-sm font-semibold mb-2">New
                                    Password:</label>
                                <input type="password" name="password" id="password"
                                    class="form-input w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-green focus:border-transparent transition ease-in-out duration-150 @error('password') border-red-500 @enderror">
                                @error('password')
                                    <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="password_confirmation"
                                    class="block text-gray-700 text-sm font-semibold mb-2">Confirm New Password:</label>
                                <input type="password" name="password_confirmation" id="password_confirmation"
                                    class="form-input w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-green focus:border-transparent transition ease-in-out duration-150">
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Bagian Spesifik Supplier --}}
                @if ($user->role === 'supplier' && $profileData)
                    <div class="bg-white shadow-xl rounded-lg p-8">
                        <h2 class="text-2xl font-bold text-gray-800 mb-6 border-b pb-4 border-gray-200">Supplier Profile
                            Details</h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6">
                            <div>
                                <label class="block text-gray-700 text-sm font-semibold mb-2">Supplier Type:</label>
                                <p class="text-gray-800 px-4 py-2 border border-gray-300 rounded-lg bg-gray-50">
                                    {{ $profileData->supplier_type ?? 'N/A' }}</p>
                                <input type="hidden" name="supplier_type" value="{{ $profileData->supplier_type ?? '' }}">
                            </div>

                            <div>
                                <label for="region" class="block text-gray-700 text-sm font-semibold mb-2">Region:</label>
                                <input type="text" name="region" id="region"
                                    value="{{ old('region', $profileData->region ?? '') }}"
                                    class="form-input w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-green focus:border-transparent transition ease-in-out duration-150 @error('region') border-red-500 @enderror">
                                @error('region')
                                    <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="annual_production_volume"
                                    class="block text-gray-700 text-sm font-semibold mb-2">Annual Production Volume
                                    (tons):</label>
                                <input type="number" name="annual_production_volume" id="annual_production_volume"
                                    value="{{ old('annual_production_volume', $profileData->annual_production_volume ?? '') }}"
                                    class="form-input w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-green focus:border-transparent transition ease-in-out duration-150 @error('annual_production_volume') border-red-500 @enderror">
                                @error('annual_production_volume')
                                    <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="monthly_available_volume"
                                    class="block text-gray-700 text-sm font-semibold mb-2">Monthly Available Volume
                                    (tons):</label>
                                <input type="number" name="monthly_available_volume" id="monthly_available_volume"
                                    value="{{ old('monthly_available_volume', $profileData->monthly_available_volume ?? '') }}"
                                    class="form-input w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-green focus:border-transparent transition ease-in-out duration-150 @error('monthly_available_volume') border-red-500 @enderror">
                                @error('monthly_available_volume')
                                    <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            @if (($profileData->supplier_type ?? '') === 'mill_factory')
                                <div class="md:col-span-2 grid grid-cols-1 md:grid-cols-3 gap-x-8 gap-y-6">
                                    <div>
                                        <label for="dura_composition"
                                            class="block text-gray-700 text-sm font-semibold mb-2">Dura (%):</label>
                                        <input type="number" name="dura_composition" id="dura_composition"
                                            value="{{ old('dura_composition', $profileData->dura_composition ?? '') }}"
                                            class="form-input w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-green focus:border-transparent transition ease-in-out duration-150 @error('dura_composition') border-red-500 @enderror">
                                        @error('dura_composition')
                                            <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div>
                                        <label for="tenera_composition"
                                            class="block text-gray-700 text-sm font-semibold mb-2">Tenera (%):</label>
                                        <input type="number" name="tenera_composition" id="tenera_composition"
                                            value="{{ old('tenera_composition', $profileData->tenera_composition ?? '') }}"
                                            class="form-input w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-green focus:border-transparent transition ease-in-out duration-150 @error('tenera_composition') border-red-500 @enderror">
                                        @error('tenera_composition')
                                            <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div>
                                        <label for="pisifera_composition"
                                            class="block text-gray-700 text-sm font-semibold mb-2">Pisifera (%):</label>
                                        <input type="number" name="pisifera_composition" id="pisifera_composition"
                                            value="{{ old('pisifera_composition', $profileData->pisifera_composition ?? '') }}"
                                            class="form-input w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-green focus:border-transparent transition ease-in-out duration-150 @error('pisifera_composition') border-red-500 @enderror">
                                        @error('pisifera_composition')
                                            <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            @endif

                            <div>
                                <label for="sales_record" class="block text-gray-700 text-sm font-semibold mb-2">Sales
                                    Record (past 1 year, tons):</label>
                                <input type="number" name="sales_record" id="sales_record"
                                    value="{{ old('sales_record', $profileData->sales_record ?? '') }}"
                                    class="form-input w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-green focus:border-transparent transition ease-in-out duration-150 @error('sales_record') border-red-500 @enderror">
                                @error('sales_record')
                                    <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="desired_selling_price"
                                    class="block text-gray-700 text-sm font-semibold mb-2">Desired Selling Price
                                    (USD/ton):</label>
                                <input type="text" name="desired_selling_price" id="desired_selling_price"
                                    value="{{ old('desired_selling_price', $profileData->desired_selling_price ?? '') }}"
                                    placeholder="e.g., 120 FOB"
                                    class="form-input w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-green focus:border-transparent transition ease-in-out duration-150 @error('desired_selling_price') border-red-500 @enderror">
                                @error('desired_selling_price')
                                    <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="minimum_order_quantity"
                                    class="block text-gray-700 text-sm font-semibold mb-2">Minimum Order Quantity
                                    (tons):</label>
                                <input type="number" name="minimum_order_quantity" id="minimum_order_quantity"
                                    value="{{ old('minimum_order_quantity', $profileData->minimum_order_quantity ?? '') }}"
                                    class="form-input w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-green focus:border-transparent transition ease-in-out duration-150 @error('minimum_order_quantity') border-red-500 @enderror">
                                @error('minimum_order_quantity')
                                    <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="years_in_operation"
                                    class="block text-gray-700 text-sm font-semibold mb-2">Years in Operation:</label>
                                <input type="number" name="years_in_operation" id="years_in_operation"
                                    value="{{ old('years_in_operation', $profileData->years_in_operation ?? '') }}"
                                    class="form-input w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-green focus:border-transparent transition ease-in-out duration-150 @error('years_in_operation') border-red-500 @enderror">
                                @error('years_in_operation')
                                    <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="contact_person_name"
                                    class="block text-gray-700 text-sm font-semibold mb-2">Contact Person Name:</label>
                                <input type="text" name="contact_person_name" id="contact_person_name"
                                    value="{{ old('contact_person_name', $profileData->contact_person_name ?? '') }}"
                                    class="form-input w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-green focus:border-transparent transition ease-in-out duration-150 @error('contact_person_name') border-red-500 @enderror">
                                @error('contact_person_name')
                                    <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="contact_person_email"
                                    class="block text-gray-700 text-sm font-semibold mb-2">Contact Person Email:</label>
                                <input type="email" name="contact_person_email" id="contact_person_email"
                                    value="{{ old('contact_person_email', $profileData->contact_person_email ?? '') }}"
                                    class="form-input w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-green focus:border-transparent transition ease-in-out duration-150 @error('contact_person_email') border-red-500 @enderror">
                                @error('contact_person_email')
                                    <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="contact_person_phone_number"
                                    class="block text-gray-700 text-sm font-semibold mb-2">Contact Person Phone
                                    Number:</label>
                                <input type="tel" name="contact_person_phone_number" id="contact_person_phone_number"
                                    value="{{ old('contact_person_phone_number', $profileData->contact_person_phone_number ?? '') }}"
                                    class="form-input w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-green focus:border-transparent transition ease-in-out duration-150 @error('contact_person_phone_number') border-red-500 @enderror">
                                @error('contact_person_phone_number')
                                    <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="md:col-span-2">
                                <label for="notes" class="block text-gray-700 text-sm font-semibold mb-2">Additional
                                    Notes:</label>
                                <textarea name="notes" id="notes" rows="3"
                                    class="form-textarea w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-green focus:border-transparent transition ease-in-out duration-150 @error('notes') border-red-500 @enderror">{{ old('notes', $profileData->notes ?? '') }}</textarea>
                                @error('notes')
                                    <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="md:col-span-2">
                                <label class="inline-flex items-center text-gray-700 font-semibold">
                                    <input type="checkbox" name="urgent_sale_available"
                                        class="form-checkbox h-5 w-5 text-green-600 focus:ring-primary-green transition ease-in-out duration-150"
                                        value="1"
                                        {{ old('urgent_sale_available', $profileData->urgent_sale_available ?? false) ? 'checked' : '' }}>
                                    <span class="ml-2">Urgent Sale Available</span>
                                </label>
                            </div>
                        </div>
                    </div>

                    {{-- Product Management - Upload/Update Files for Supplier --}}
                    <div class="bg-white shadow-xl rounded-lg p-8 mt-8">
                        <h2 class="text-2xl font-bold text-gray-800 mb-6 border-b pb-4 border-gray-200">Product Management
                            - Upload / Update Files (Supplier)</h2>
                        <div class="space-y-6">
                            <div>
                                <label for="factory_photos" class="block text-gray-700 text-sm font-semibold mb-2">Factory
                                    & Warehouse Photos (up to 5 images):</label>
                                <input type="file" name="factory_photos[]" id="factory_photos" multiple
                                    accept="image/*"
                                    class="form-file w-full text-gray-700 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-green-100 file:text-primary-green hover:file:bg-green-200 transition ease-in-out duration-150 @error('factory_photos') border-red-500 @enderror @error('factory_photos.*') border-red-500 @enderror">
                                <p class="text-xs text-gray-600 mt-1">Max 5 images. Each image up to 2MB.</p>
                                <div class="flex flex-wrap mt-4 gap-4">
                                    @if ($profileData && !empty($profileData->factory_photos))
                                        @foreach ($profileData->factory_photos as $photoPath)
                                            <div class="relative w-28 h-28"> {{-- Ukuran gambar preview --}}
                                                <img src="{{ Storage::disk('s3')->url($photoPath) }}" alt="Factory Photo"
                                                    class="w-full h-full object-cover rounded-lg border border-gray-300 shadow-sm">
                                                {{-- Tombol hapus (memerlukan JavaScript dan logic backend tambahan) --}}
                                                {{-- <button type="button" class="absolute top-1 right-1 bg-red-600 text-white rounded-full p-1 text-xs hover:bg-red-700 flex items-center justify-center w-5 h-5">
                                                    <i class="fas fa-times"></i>
                                                </button> --}}
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                                @error('factory_photos')
                                    <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                                @enderror
                                @error('factory_photos.*')
                                    <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="sample_pks_photos" class="block text-gray-700 text-sm font-semibold mb-2">PKS
                                    Sample Photos (up to 5 images):</label>
                                <input type="file" name="sample_pks_photos[]" id="sample_pks_photos" multiple
                                    accept="image/*"
                                    class="form-file w-full text-gray-700 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-green-100 file:text-primary-green hover:file:bg-green-200 transition ease-in-out duration-150 @error('sample_pks_photos') border-red-500 @enderror @error('sample_pks_photos.*') border-red-500 @enderror">
                                <p class="text-xs text-gray-600 mt-1">Max 5 images. Each image up to 2MB.</p>
                                <div class="flex flex-wrap mt-4 gap-4">
                                    @if ($profileData && !empty($profileData->sample_pks_photos))
                                        @foreach ($profileData->sample_pks_photos as $photoPath)
                                            <div class="relative w-28 h-28">
                                                <img src="{{ Storage::disk('s3')->url($photoPath) }}"
                                                    alt="PKS Sample Photo"
                                                    class="w-full h-full object-cover rounded-lg border border-gray-300 shadow-sm">
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                                @error('sample_pks_photos')
                                    <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                                @enderror
                                @error('sample_pks_photos.*')
                                    <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="lab_test_report" class="block text-gray-700 text-sm font-semibold mb-2">Lab
                                    Test Report (PDF):</label>
                                <input type="file" name="lab_test_report" id="lab_test_report" accept=".pdf"
                                    class="form-file w-full text-gray-700 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-green-100 file:text-primary-green hover:file:bg-green-200 transition ease-in-out duration-150 @error('lab_test_report') border-red-500 @enderror">
                                <p class="text-xs text-gray-600 mt-1">PDF only, up to 2MB.</p>
                                @if ($profileData && $profileData->lab_test_report)
                                    <p class="text-sm mt-2 text-gray-600">Current: <a
                                            href="{{ Storage::disk('s3')->url($profileData->lab_test_report) }}"
                                            target="_blank" class="text-blue-600 hover:underline">View Current Report</a>
                                    </p>
                                @endif
                                @error('lab_test_report')
                                    <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                @endif

                {{-- Bagian Spesifik Buyer --}}
                @if ($user->role === 'buyer' && $profileData)
                    <div class="bg-white shadow-xl rounded-lg p-8">
                        <h2 class="text-2xl font-bold text-gray-800 mb-6 border-b pb-4 border-gray-200">Buyer Profile
                            Details</h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6">
                            <div>
                                <label for="company_name" class="block text-gray-700 text-sm font-semibold mb-2">Company
                                    Name:</label>
                                <input type="text" name="company_name" id="company_name"
                                    value="{{ old('company_name', $profileData->company_name ?? '') }}"
                                    class="form-input w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-green focus:border-transparent transition ease-in-out duration-150 @error('company_name') border-red-500 @enderror">
                                @error('company_name')
                                    <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="country_region" class="block text-gray-700 text-sm font-semibold mb-2">Country
                                    / Region:</label>
                                <select name="country_region" id="country_region"
                                    class="form-select w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-green focus:border-transparent transition ease-in-out duration-150 @error('country_region') border-red-500 @enderror">
                                    <option value="">Select from list</option>
                                    <option value="Japan"
                                        {{ old('country_region', $profileData->country_region ?? '') == 'Japan' ? 'selected' : '' }}>
                                        Japan</option>
                                    <option value="Korea"
                                        {{ old('country_region', $profileData->country_region ?? '') == 'Korea' ? 'selected' : '' }}>
                                        Korea</option>
                                    <option value="China"
                                        {{ old('country_region', $profileData->country_region ?? '') == 'China' ? 'selected' : '' }}>
                                        China</option>
                                    <option value="Germany"
                                        {{ old('country_region', $profileData->country_region ?? '') == 'Germany' ? 'selected' : '' }}>
                                        Germany</option>
                                    <option value="Denmark"
                                        {{ old('country_region', $profileData->country_region ?? '') == 'Denmark' ? 'selected' : '' }}>
                                        Denmark</option>
                                    {{-- Tambahkan negara lain sesuai kebutuhan --}}
                                </select>
                                @error('country_region')
                                    <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="city" class="block text-gray-700 text-sm font-semibold mb-2">City:</label>
                                <input type="text" name="city" id="city"
                                    value="{{ old('city', $profileData->city ?? '') }}"
                                    class="form-input w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-green focus:border-transparent transition ease-in-out duration-150 @error('city') border-red-500 @enderror">
                                @error('city')
                                    <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="annual_pks_purchase_volume"
                                    class="block text-gray-700 text-sm font-semibold mb-2">Annual PKS Purchase Volume
                                    (tons):</label>
                                <input type="number" name="annual_pks_purchase_volume" id="annual_pks_purchase_volume"
                                    value="{{ old('annual_pks_purchase_volume', $profileData->annual_pks_purchase_volume ?? '') }}"
                                    class="form-input w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-green focus:border-transparent transition ease-in-out duration-150 @error('annual_pks_purchase_volume') border-red-500 @enderror">
                                @error('annual_pks_purchase_volume')
                                    <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="monthly_purchase_volume"
                                    class="block text-gray-700 text-sm font-semibold mb-2">Monthly Purchase Volume
                                    (tons):</label>
                                <input type="number" name="monthly_purchase_volume" id="monthly_purchase_volume"
                                    value="{{ old('monthly_purchase_volume', $profileData->monthly_purchase_volume ?? '') }}"
                                    class="form-input w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-green focus:border-transparent transition ease-in-out duration-150 @error('monthly_purchase_volume') border-red-500 @enderror">
                                @error('monthly_purchase_volume')
                                    <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="preferred_trade_terms"
                                    class="block text-gray-700 text-sm font-semibold mb-2">Preferred Trade Terms:</label>
                                <select name="preferred_trade_terms" id="preferred_trade_terms"
                                    class="form-select w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-green focus:border-transparent transition ease-in-out duration-150 @error('preferred_trade_terms') border-red-500 @enderror">
                                    <option value="">Select Trade Terms</option>
                                    <option value="FOB"
                                        {{ old('preferred_trade_terms', $profileData->preferred_trade_terms ?? '') == 'FOB' ? 'selected' : '' }}>
                                        FOB</option>
                                    <option value="CIF"
                                        {{ old('preferred_trade_terms', $profileData->preferred_trade_terms ?? '') == 'CIF' ? 'selected' : '' }}>
                                        CIF</option>
                                    <option value="EXW"
                                        {{ old('preferred_trade_terms', $profileData->preferred_trade_terms ?? '') == 'EXW' ? 'selected' : '' }}>
                                        EXW</option>
                                </select>
                                @error('preferred_trade_terms')
                                    <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="target_price" class="block text-gray-700 text-sm font-semibold mb-2">Target
                                    Price (USD/ton):</label>
                                <input type="text" name="target_price" id="target_price"
                                    value="{{ old('target_price', $profileData->target_price ?? '') }}"
                                    placeholder="e.g. 120"
                                    class="form-input w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-green focus:border-transparent transition ease-in-out duration-150 @error('target_price') border-red-500 @enderror">
                                @error('target_price')
                                    <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="md:col-span-2">
                                <label class="block text-gray-700 text-sm font-semibold mb-2">Products of Interest:</label>
                                <div class="flex flex-wrap gap-x-4">
                                    @php
                                        $productsOfInterest = old(
                                            'products_of_interest',
                                            $profileData->products_of_interest ?? [],
                                        );
                                    @endphp
                                    <label class="inline-flex items-center text-gray-700">
                                        <input type="checkbox" name="products_of_interest[]" value="PKS (Raw)"
                                            class="form-checkbox h-5 w-5 text-green-600 focus:ring-primary-green transition ease-in-out duration-150"
                                            {{ in_array('PKS (Raw)', $productsOfInterest) ? 'checked' : '' }}>
                                        <span class="ml-2">PKS (Raw)</span>
                                    </label>
                                    <label class="inline-flex items-center text-gray-700">
                                        <input type="checkbox" name="products_of_interest[]" value="PKS Charcoal"
                                            class="form-checkbox h-5 w-5 text-green-600 focus:ring-primary-green transition ease-in-out duration-150"
                                            {{ in_array('PKS Charcoal', $productsOfInterest) ? 'checked' : '' }}>
                                        <span class="ml-2">PKS Charcoal</span>
                                    </label>
                                    <label class="inline-flex items-center text-gray-700">
                                        <input type="checkbox" name="products_of_interest[]" value="Biochar"
                                            class="form-checkbox h-5 w-5 text-green-600 focus:ring-primary-green transition ease-in-out duration-150"
                                            {{ in_array('Biochar', $productsOfInterest) ? 'checked' : '' }}>
                                        <span class="ml-2">Biochar</span>
                                    </label>
                                </div>
                                @error('products_of_interest')
                                    <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="years_in_operation_buyer"
                                    class="block text-gray-700 text-sm font-semibold mb-2">Years in Operation:</label>
                                <input type="number" name="years_in_operation" id="years_in_operation_buyer"
                                    value="{{ old('years_in_operation', $profileData->years_in_operation ?? '') }}"
                                    class="form-input w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-green focus:border-transparent transition ease-in-out duration-150 @error('years_in_operation') border-red-500 @enderror">
                                @error('years_in_operation')
                                    <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="business_license"
                                    class="block text-gray-700 text-sm font-semibold mb-2">Business License
                                    (optional):</label>
                                <input type="file" name="business_license" id="business_license"
                                    accept=".pdf, .jpg, .jpeg, .png"
                                    class="form-file w-full text-gray-700 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-green-100 file:text-primary-green hover:file:bg-green-200 transition ease-in-out duration-150 @error('business_license') border-red-500 @enderror">
                                <p class="text-xs text-gray-600 mt-1">PDF or Image (Max 2MB)</p>
                                @if ($profileData->business_license)
                                    <p class="text-sm mt-2 text-gray-600">Current: <a
                                            href="{{ Storage::disk('s3')->url($profileData->business_license) }}"
                                            target="_blank" class="text-blue-600 hover:underline">View Document</a></p>
                                @endif
                                @error('business_license')
                                    <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="contact_person_name_buyer"
                                    class="block text-gray-700 text-sm font-semibold mb-2">Contact Person Name:</label>
                                <input type="text" name="contact_person_name" id="contact_person_name_buyer"
                                    value="{{ old('contact_person_name', $profileData->contact_person_name ?? '') }}"
                                    class="form-input w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-green focus:border-transparent transition ease-in-out duration-150 @error('contact_person_name') border-red-500 @enderror">
                                @error('contact_person_name')
                                    <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="contact_person_email_buyer"
                                    class="block text-gray-700 text-sm font-semibold mb-2">Contact Person Email:</label>
                                <input type="email" name="contact_person_email" id="contact_person_email_buyer"
                                    value="{{ old('contact_person_email', $profileData->contact_person_email ?? '') }}"
                                    class="form-input w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-green focus:border-transparent transition ease-in-out duration-150 @error('contact_person_email') border-red-500 @enderror">
                                @error('contact_person_email')
                                    <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="contact_person_phone_number_buyer"
                                    class="block text-gray-700 text-sm font-semibold mb-2">Contact Person Phone
                                    Number:</label>
                                <input type="tel" name="contact_person_phone_number"
                                    id="contact_person_phone_number_buyer"
                                    value="{{ old('contact_person_phone_number', $profileData->contact_person_phone_number ?? '') }}"
                                    class="form-input w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-green focus:border-transparent transition ease-in-out duration-150 @error('contact_person_phone_number') border-red-500 @enderror">
                                @error('contact_person_phone_number')
                                    <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="md:col-span-2">
                                <label for="additional_notes"
                                    class="block text-gray-700 text-sm font-semibold mb-2">Additional Notes
                                    (optional):</label>
                                <textarea name="additional_notes" id="additional_notes" rows="3"
                                    class="form-textarea w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-green focus:border-transparent transition ease-in-out duration-150 @error('additional_notes') border-red-500 @enderror">{{ old('additional_notes', $profileData->additional_notes ?? '') }}</textarea>
                                @error('additional_notes')
                                    <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="company_logo" class="block text-gray-700 text-sm font-semibold mb-2">Upload
                                    Company Logo (optional):</label>
                                <input type="file" name="company_logo" id="company_logo" accept=".jpg, .jpeg, .png"
                                    class="form-file w-full text-gray-700 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-green-100 file:text-primary-green hover:file:bg-green-200 transition ease-in-out duration-150 @error('company_logo') border-red-500 @enderror">
                                <p class="text-xs text-gray-600 mt-1">Max 2MB</p>
                                @if ($profileData->company_logo)
                                    <p class="text-sm mt-2 text-gray-600">Current: <a
                                            href="{{ Storage::disk('s3')->url($profileData->company_logo) }}"
                                            target="_blank" class="text-blue-600 hover:underline">View Logo</a></p>
                                @endif
                                @error('company_logo')
                                    <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="previous_purchase_records"
                                    class="block text-gray-700 text-sm font-semibold mb-2">Upload Previous Purchase Records
                                    (optional):</label>
                                <input type="file" name="previous_purchase_records" id="previous_purchase_records"
                                    accept=".pdf, .jpg, .jpeg, .png"
                                    class="form-file w-full text-gray-700 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-green-100 file:text-primary-green hover:file:bg-green-200 transition ease-in-out duration-150 @error('previous_purchase_records') border-red-500 @enderror">
                                <p class="text-xs text-gray-600 mt-1">Max 2MB</p>
                                @if ($profileData->previous_purchase_records)
                                    <p class="text-sm mt-2 text-gray-600">Current: <a
                                            href="{{ Storage::disk('s3')->url($profileData->previous_purchase_records) }}"
                                            target="_blank" class="text-blue-600 hover:underline">View Document</a></p>
                                @endif
                                @error('previous_purchase_records')
                                    <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                @endif

                <div class="flex items-center justify-end">
                    <button type="submit"
                        class="bg-green-600 hover:bg-green-700 text-white font-bold py-3 px-6 rounded-lg focus:outline-none focus:shadow-outline transition duration-300 ease-in-out transform hover:scale-105">
                        Update Profile
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
