<div class="max-w-5xl mx-auto p-6 bg-gradient-to-br from-slate-50 to-gray-100 min-h-screen">
    <div class="bg-white rounded-2xl shadow-xl border border-gray-200/50 overflow-hidden">
        <!-- Header Section -->
        <div class="bg-gradient-to-r from-green-700 via-green-600 to-green-800 px-8 py-8 text-white">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center backdrop-blur-sm">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3z" />
                    </svg>
                </div>
                <div>
                    <h1 class="text-2xl font-bold">Buyer Profile</h1>
                    <p class="text-green-100">Palm Kernel Shell Trading Information</p>
                </div>
            </div>
        </div>

        <!-- Form Content -->
        <div class="p-8 space-y-12">
            {{-- Company Information Section --}}
            <div class="space-y-6">
                <div class="flex items-center gap-3 pb-4 border-b border-gray-200">
                    <div
                        class="w-8 h-8 bg-gradient-to-r from-blue-500 to-indigo-600 rounded-lg flex items-center justify-center">
                        <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M4 4a2 2 0 012-2h8a2 2 0 012 2v12a1 1 0 110 2h-3a1 1 0 01-1-1v-1a1 1 0 00-1-1H9a1 1 0 00-1 1v1a1 1 0 01-1 1H4a1 1 0 110-2V4zm3 1h2v2H7V5zm2 4H7v2h2V9zm2-4h2v2h-2V5zm2 4h-2v2h2V9z" />
                        </svg>
                    </div>
                    <h2 class="text-xl font-semibold text-gray-900">Company Information</h2>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                    <div class="space-y-2">
                        <label for="company_name" class="block text-sm font-semibold text-gray-800">Company Name</label>
                        <input type="text" name="company_name" id="company_name"
                            value="{{ old('company_name', $buyer->company_name) }}"
                            placeholder="e.g. Green Energy Trading Ltd."
                            class="w-full px-4 py-3 bg-gray-50 border-2 border-transparent rounded-xl focus:bg-white focus:border-green-600 focus:ring-4 focus:ring-green-600/10 transition-all duration-200 placeholder:text-gray-400">
                    </div>

                    <div class="space-y-2">
                        <label for="country" class="block text-sm font-semibold text-gray-800">Country / Region</label>
                        <div class="relative">
                            <select name="country" id="country"
                                class="w-full px-4 py-3 bg-gray-50 border-2 border-transparent rounded-xl focus:bg-white focus:border-green-600 focus:ring-4 focus:ring-green-600/10 transition-all duration-200 appearance-none">
                                <option value="">Select Country</option>
                                @foreach (['Japan', 'Korea', 'China', 'Germany', 'Denmark', 'Other'] as $country)
                                    <option value="{{ $country }}"
                                        {{ old('country', $buyer->country) == $country ? 'selected' : '' }}>
                                        {{ $country }}
                                    </option>
                                @endforeach
                            </select>
                            <div class="absolute inset-y-0 right-0 flex items-center pr-4 pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                            </div>
                        </div>
                    </div>

                    <div class="space-y-2">
                        <label for="city" class="block text-sm font-semibold text-gray-800">City</label>
                        <input type="text" name="city" id="city" value="{{ old('city', $buyer->city) }}"
                            placeholder="e.g. Tokyo"
                            class="w-full px-4 py-3 bg-gray-50 border-2 border-transparent rounded-xl focus:bg-white focus:border-green-600 focus:ring-4 focus:ring-green-600/10 transition-all duration-200 placeholder:text-gray-400">
                    </div>

                    <div class="space-y-2">
                        <label for="years_in_operation" class="block text-sm font-semibold text-gray-800">Years in
                            Operation</label>
                        <input type="number" name="years_in_operation" id="years_in_operation"
                            value="{{ old('years_in_operation', $buyer->years_in_operation) }}" placeholder="e.g. 10"
                            class="w-full px-4 py-3 bg-gray-50 border-2 border-transparent rounded-xl focus:bg-white focus:border-green-600 focus:ring-4 focus:ring-green-600/10 transition-all duration-200 placeholder:text-gray-400">
                    </div>
                </div>
            </div>

            {{-- Purchase Details Section --}}
            <div class="space-y-6">
                <div class="flex items-center gap-3 pb-4 border-b border-gray-200">
                    <div
                        class="w-8 h-8 bg-gradient-to-r from-purple-500 to-pink-600 rounded-lg flex items-center justify-center">
                        <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z" />
                        </svg>
                    </div>
                    <h2 class="text-xl font-semibold text-gray-900">Purchase Requirements</h2>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                    <div class="space-y-2">
                        <label for="annual_purchase_volume" class="block text-sm font-semibold text-gray-800">
                            Annual PKS Purchase Volume
                            <span class="text-xs font-normal text-gray-500">(tons)</span>
                        </label>
                        <input type="number" name="annual_purchase_volume" id="annual_purchase_volume"
                            value="{{ old('annual_purchase_volume', $buyer->annual_purchase_volume) }}"
                            placeholder="e.g. 50,000"
                            class="w-full px-4 py-3 bg-gray-50 border-2 border-transparent rounded-xl focus:bg-white focus:border-green-600 focus:ring-4 focus:ring-green-600/10 transition-all duration-200 placeholder:text-gray-400">
                    </div>

                    <div class="space-y-2">
                        <label for="monthly_purchase_volume" class="block text-sm font-semibold text-gray-800">
                            Monthly Purchase Volume
                            <span class="text-xs font-normal text-gray-500">(tons)</span>
                        </label>
                        <input type="number" name="monthly_purchase_volume" id="monthly_purchase_volume"
                            value="{{ old('monthly_purchase_volume', $buyer->monthly_purchase_volume) }}"
                            placeholder="e.g. 4,000"
                            class="w-full px-4 py-3 bg-gray-50 border-2 border-transparent rounded-xl focus:bg-white focus:border-green-600 focus:ring-4 focus:ring-green-600/10 transition-all duration-200 placeholder:text-gray-400">
                    </div>

                    <div class="space-y-2">
                        <label for="preferred_trade_terms" class="block text-sm font-semibold text-gray-800">Preferred
                            Trade Terms</label>
                        <div class="relative">
                            <select name="preferred_trade_terms" id="preferred_trade_terms"
                                class="w-full px-4 py-3 bg-gray-50 border-2 border-transparent rounded-xl focus:bg-white focus:border-green-600 focus:ring-4 focus:ring-green-600/10 transition-all duration-200 appearance-none">
                                <option value="">Select Terms</option>
                                @foreach (['FOB', 'CIF', 'EXW'] as $term)
                                    <option value="{{ $term }}"
                                        {{ old('preferred_trade_terms', $buyer->preferred_trade_terms) == $term ? 'selected' : '' }}>
                                        {{ $term }}
                                    </option>
                                @endforeach
                            </select>
                            <div class="absolute inset-y-0 right-0 flex items-center pr-4 pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                            </div>
                        </div>
                    </div>

                    <div class="space-y-2">
                        <label for="target_price" class="block text-sm font-semibold text-gray-800">
                            Target Price
                            <span class="text-xs font-normal text-gray-500">(USD/ton)</span>
                        </label>
                        <input type="number" step="0.01" name="target_price" id="target_price"
                            value="{{ old('target_price', $buyer->target_price) }}" placeholder="e.g. 120"
                            class="w-full px-4 py-3 bg-gray-50 border-2 border-transparent rounded-xl focus:bg-white focus:border-green-600 focus:ring-4 focus:ring-green-600/10 transition-all duration-200 placeholder:text-gray-400">
                    </div>

                    {{-- Products of Interest --}}
                    <div class="lg:col-span-2 space-y-4">
                        <label class="block text-sm font-semibold text-gray-800">Products of Interest</label>
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                            @php
                                $selectedProducts = is_array($buyer->products_of_interest)
                                    ? $buyer->products_of_interest
                                    : (is_string($buyer->products_of_interest)
                                        ? explode(',', $buyer->products_of_interest)
                                        : []);
                                $selectedProducts = array_map('trim', $selectedProducts);
                            @endphp
                            @foreach (['PKS (Raw)', 'PKS Charcoal', 'Biochar'] as $product)
                                <label
                                    class="group relative flex items-center p-4 bg-gray-50 rounded-xl border-2 border-transparent hover:border-green-200 hover:bg-green-50/50 cursor-pointer transition-all duration-200">
                                    <input type="checkbox" name="products_of_interest[]" value="{{ $product }}"
                                        {{ in_array($product, old('products_of_interest', $selectedProducts)) ? 'checked' : '' }}
                                        class="sr-only peer">
                                    <div
                                        class="w-5 h-5 rounded-full border-2 border-gray-300 peer-checked:border-green-600 peer-checked:bg-green-600 flex items-center justify-center transition-colors mr-3">
                                        <svg class="w-3 h-3 text-white opacity-0 peer-checked:opacity-100"
                                            fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" />
                                        </svg>
                                    </div>
                                    <span
                                        class="text-gray-700 font-medium group-hover:text-green-700 peer-checked:text-green-700">{{ $product }}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            {{-- Contact Details Section --}}
            <div class="space-y-6">
                <div class="flex items-center gap-3 pb-4 border-b border-gray-200">
                    <div
                        class="w-8 h-8 bg-gradient-to-r from-green-500 to-emerald-600 rounded-lg flex items-center justify-center">
                        <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                            <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                        </svg>
                    </div>
                    <h2 class="text-xl font-semibold text-gray-900">Contact Information</h2>
                </div>

                <div class="max-w-lg">
                    <div class="space-y-2">
                        <label for="contact_person_name" class="block text-sm font-semibold text-gray-800">Contact
                            Name</label>
                        <input type="text" name="contact_person_name" id="contact_person_name"
                            value="{{ old('contact_person_name', $buyer->contact_person_name) }}"
                            placeholder="e.g. Mr. Tanaka"
                            class="w-full px-4 py-3 bg-gray-50 border-2 border-transparent rounded-xl focus:bg-white focus:border-green-600 focus:ring-4 focus:ring-green-600/10 transition-all duration-200 placeholder:text-gray-400">
                    </div>
                </div>
            </div>

            {{-- Additional Notes Section --}}
            <div class="space-y-6">
                <div class="flex items-center gap-3 pb-4 border-b border-gray-200">
                    <div
                        class="w-8 h-8 bg-gradient-to-r from-orange-500 to-red-600 rounded-lg flex items-center justify-center">
                        <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" />
                        </svg>
                    </div>
                    <h2 class="text-xl font-semibold text-gray-900">Additional Requirements</h2>
                </div>

                <div class="space-y-2">
                    <label for="additional_notes" class="block text-sm font-semibold text-gray-800">Special Notes &
                        Requirements</label>
                    <textarea name="additional_notes" id="additional_notes" rows="4"
                        placeholder="e.g. We only accept GGL-certified PKS with specific moisture content requirements..."
                        class="w-full px-4 py-3 bg-gray-50 border-2 border-transparent rounded-xl focus:bg-white focus:border-green-600 focus:ring-4 focus:ring-green-600/10 transition-all duration-200 placeholder:text-gray-400 resize-none">{{ old('additional_notes', $buyer->additional_notes) }}</textarea>
                </div>
            </div>

            {{-- Action Buttons --}}
            <div class="flex flex-col sm:flex-row gap-4 pt-8 border-t border-gray-200">
                <button type="submit"
                    class="flex-1 bg-gradient-to-r from-green-700 to-green-600 hover:from-green-800 hover:to-green-700 text-white font-semibold py-4 px-8 rounded-xl shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200">
                    <span class="flex items-center justify-center gap-2">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" />
                        </svg>
                        Save Changes
                    </span>
                </button>
                <button type="button"
                    class="flex-1 bg-gray-100 hover:bg-gray-200 text-gray-700 font-semibold py-4 px-8 rounded-xl transition-all duration-200">
                    Cancel
                </button>
            </div>
        </div>
    </div>
</div>

<style>
    /* Custom checkbox styling */
    input[type="checkbox"]:checked+div {
        background-color: #1b5e20;
        border-color: #1b5e20;
    }

    /* Focus ring for accessibility */
    input[type="checkbox"]:focus+div {
        box-shadow: 0 0 0 3px rgba(27, 94, 32, 0.1);
    }

    /* Smooth transitions for all interactive elements */
    * {
        transition-property: color, background-color, border-color, transform, box-shadow;
        transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
        transition-duration: 150ms;
    }
</style>
