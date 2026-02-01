<x-layout.head title="Edit Supplier" />

<fieldset class="relative rounded-2xl border border-gray-200 bg-white/70 p-6 shadow-sm backdrop-blur">
    <legend
        class="absolute -top-4 left-4 inline-flex items-center gap-2 rounded-full bg-white px-3 py-1.5 text-sm font-semibold text-gray-900 shadow ring-1 ring-gray-200">
        <i class="fas fa-industry text-green-600"></i>
        Supplier Details
    </legend>

    {{-- CONTACT INFORMATION --}}
    <div class="mt-4">
        <div class="rounded-2xl border border-gray-100 bg-white p-5 shadow-sm">
            <div class="flex items-center justify-between">
                <h4 class="text-sm font-semibold text-gray-800 flex items-center gap-2">
                    <i class="fas fa-user-circle text-gray-500"></i>
                    Contact Information
                </h4>
                <span
                    class="hidden sm:inline-flex items-center rounded-full border border-emerald-200 bg-emerald-50 px-2.5 py-0.5 text-xs font-medium text-emerald-700">
                    Required
                </span>
            </div>

            <div class="mt-4 grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="contact_name" class="block text-sm font-medium text-gray-700">Contact Name</label>
                    <input type="text" id="contact_name" name="contact_name"
                        value="{{ old('contact_name', optional($supplier)->contact_name) }}"
                        placeholder="e.g., Andi Wijaya"
                        class="mt-1 block w-full rounded-lg border border-gray-300 bg-white/80 px-3 py-2 shadow-sm placeholder:text-gray-400
                               focus:border-green-600 focus:ring-2 focus:ring-green-600">
                    @error('contact_name')
                        <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="contact_phone" class="block text-sm font-medium text-gray-700">Contact Phone</label>
                    <input type="text" id="contact_phone" name="contact_phone"
                        value="{{ old('contact_phone', optional($supplier)->contact_phone) }}"
                        placeholder="+62 8xx xxxx xxxx"
                        class="mt-1 block w-full rounded-lg border border-gray-300 bg-white/80 px-3 py-2 shadow-sm placeholder:text-gray-400
                               focus:border-green-600 focus:ring-2 focus:ring-green-600">
                    @error('contact_phone')
                        <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="md:col-span-2">
                    <label for="contact_email" class="block text-sm font-medium text-gray-700">Contact Email</label>
                    <input type="email" id="contact_email" name="contact_email"
                        value="{{ old('contact_email', optional($supplier)->contact_email) }}"
                        placeholder="email@company.com"
                        class="mt-1 block w-full rounded-lg border border-gray-300 bg-white/80 px-3 py-2 shadow-sm placeholder:text-gray-400
                               focus:border-green-600 focus:ring-2 focus:ring-green-600">
                    @error('contact_email')
                        <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>
    </div>

    {{-- OPERATIONAL DETAILS --}}
    <div class="mt-6">
        <div class="rounded-2xl border border-gray-100 bg-white p-5 shadow-sm">
            <h4 class="text-sm font-semibold text-gray-800 flex items-center gap-2">
                <i class="fas fa-cogs text-gray-500"></i>
                Operational Details
            </h4>

            <div class="mt-4 grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="region" class="block text-sm font-medium text-gray-700">Region</label>
                    <input type="text" id="region" name="region"
                        value="{{ old('region', optional($supplier)->region) }}"
                        placeholder="e.g., Sumatera Utara / Medan"
                        class="mt-1 block w-full rounded-lg border border-gray-300 bg-white/80 px-3 py-2 shadow-sm placeholder:text-gray-400
                               focus:border-green-600 focus:ring-2 focus:ring-green-600">
                    @error('region')
                        <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="years_operation" class="block text-sm font-medium text-gray-700">Years in
                        Operation</label>
                    <input type="number" id="years_operation" name="years_operation"
                        value="{{ old('years_operation', optional($supplier)->years_operation) }}" placeholder="e.g., 8"
                        class="mt-1 block w-full rounded-lg border border-gray-300 bg-white/80 px-3 py-2 shadow-sm placeholder:text-gray-400
                               focus:border-green-600 focus:ring-2 focus:ring-green-600">
                </div>

                <div>
                    <label for="monthly_capacity" class="block text-sm font-medium text-gray-700">
                        Monthly Capacity <span class="text-gray-400">(tons)</span>
                    </label>
                    <div class="mt-1 relative">
                        <input type="number" step="0.01" id="monthly_capacity" name="monthly_capacity"
                            value="{{ old('monthly_capacity', optional($supplier)->monthly_capacity) }}" placeholder="0"
                            class="block w-full rounded-lg border border-gray-300 bg-white/80 px-3 py-2 pr-16 shadow-sm placeholder:text-gray-400
                                   focus:border-green-600 focus:ring-2 focus:ring-green-600">
                        <span
                            class="absolute inset-y-0 right-0 grid place-items-center px-3 text-xs text-gray-500">ton</span>
                    </div>
                    @error('monthly_capacity')
                        <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="annual_sales" class="block text-sm font-medium text-gray-700">
                        Annual Sales <span class="text-gray-400">(tons)</span>
                    </label>
                    <div class="mt-1 relative">
                        <input type="number" step="0.01" id="annual_sales" name="annual_sales"
                            value="{{ old('annual_sales', optional($supplier)->annual_sales) }}" placeholder="0"
                            class="block w-full rounded-lg border border-gray-300 bg-white/80 px-3 py-2 pr-16 shadow-sm placeholder:text-gray-400
                                   focus:border-green-600 focus:ring-2 focus:ring-green-600">
                        <span
                            class="absolute inset-y-0 right-0 grid place-items-center px-3 text-xs text-gray-500">ton</span>
                    </div>
                    @error('annual_sales')
                        <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>
    </div>

    {{-- PRODUCT SPECIFICATIONS --}}
    <div class="mt-6">
        <div class="rounded-2xl border border-gray-100 bg-white p-5 shadow-sm">
            <div class="flex items-center justify-between">
                <h4 class="text-sm font-semibold text-gray-800 flex items-center gap-2">
                    <i class="fas fa-ruler-combined text-gray-500"></i>
                    Product Specifications
                </h4>
                <span
                    class="hidden sm:inline-flex items-center rounded-full border border-sky-200 bg-sky-50 px-2.5 py-0.5 text-xs font-medium text-sky-700">
                    PKS
                </span>
            </div>

            <div class="mt-4 grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="desired_price" class="block text-sm font-medium text-gray-700">
                        Desired Price <span class="text-gray-400">(USD/ton)</span>
                    </label>
                    <div class="mt-1 relative">
                        <span
                            class="absolute inset-y-0 left-0 grid place-items-center px-3 text-xs text-gray-500">$</span>
                        <input type="number" step="0.01" id="desired_price" name="desired_price"
                            value="{{ old('desired_price', optional($supplier)->desired_price) }}"
                            placeholder="e.g., 120.00"
                            class="pl-7 block w-full rounded-lg border border-gray-300 bg-white/80 px-3 py-2 pr-20 shadow-sm placeholder:text-gray-400
                                   focus:border-green-600 focus:ring-2 focus:ring-green-600">
                        <span
                            class="absolute inset-y-0 right-0 grid place-items-center px-3 text-xs text-gray-500">USD/ton</span>
                    </div>
                    @error('desired_price')
                        <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="md:col-span-2">
                    <p class="text-sm font-medium text-gray-700">PKS Composition <span
                            class="text-gray-400">(%)</span></p>
                    <div class="mt-2 grid grid-cols-1 sm:grid-cols-3 gap-4">
                        <div>
                            <label for="dura_composition" class="block text-xs text-gray-600">Dura</label>
                            <input type="number" step="0.01" id="dura_composition" name="dura_composition"
                                value="{{ old('dura_composition', optional($supplier)->dura_composition) }}"
                                placeholder="0"
                                class="mt-1 block w-full rounded-lg border border-gray-300 bg-white/80 px-3 py-2 shadow-sm
                                       focus:border-green-600 focus:ring-2 focus:ring-green-600">
                            @error('dura_composition')
                                <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="tenera_composition" class="block text-xs text-gray-600">Tenera</label>
                            <input type="number" step="0.01" id="tenera_composition" name="tenera_composition"
                                value="{{ old('tenera_composition', optional($supplier)->tenera_composition) }}"
                                placeholder="0"
                                class="mt-1 block w-full rounded-lg border border-gray-300 bg-white/80 px-3 py-2 shadow-sm
                                       focus:border-green-600 focus:ring-2 focus:ring-green-600">
                            @error('tenera_composition')
                                <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="pisifera_composition" class="block text-xs text-gray-600">Pisifera</label>
                            <input type="number" step="0.01" id="pisifera_composition"
                                name="pisifera_composition"
                                value="{{ old('pisifera_composition', optional($supplier)->pisifera_composition) }}"
                                placeholder="0"
                                class="mt-1 block w-full rounded-lg border border-gray-300 bg-white/80 px-3 py-2 shadow-sm
                                       focus:border-green-600 focus:ring-2 focus:ring-green-600">
                            @error('pisifera_composition')
                                <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <p class="mt-2 text-xs text-gray-500">Isi angka persentase; total sebaiknya mendekati 100%.</p>
                </div>
            </div>

            {{-- Callout tip kecil --}}
            <div class="mt-4 rounded-lg border border-amber-200 bg-amber-50 px-3 py-2 text-xs text-amber-800">
                <i class="fas fa-lightbulb mr-1"></i>
                Tips: pakai satuan konsisten (ton, USD/ton). Komposisi boleh toleransi ±2%.
            </div>
        </div>
    </div>

    {{-- ACTIONS (desktop + mobile) --}}
    <div class="mt-8">
        <div class="hidden md:flex items-center justify-end gap-3">
            <a href="{{ route('supplier.dashboard') }}"
                class="inline-flex items-center rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm font-medium text-gray-700 hover:bg-gray-50">
                Batal
            </a>
            <button type="submit"
                class="inline-flex items-center rounded-lg bg-green-700 px-4 py-2.5 text-sm font-semibold text-white hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-200">
                Simpan
            </button>
        </div>

        {{-- sticky di mobile --}}
        <div class="md:hidden sticky bottom-4">
            <div
                class="mx-auto flex max-w-md items-center justify-between gap-3 rounded-xl border border-gray-200 bg-white p-3 shadow-lg">
                <a href="{{ route('supplier.dashboard') }}"
                    class="flex-1 inline-flex items-center justify-center rounded-lg border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">
                    Batal
                </a>
                <button type="submit"
                    class="flex-1 inline-flex items-center justify-center rounded-lg bg-green-700 px-4 py-2 text-sm font-semibold text-white hover:bg-green-800">
                    Simpan
                </button>
            </div>
        </div>
    </div>
</fieldset>
