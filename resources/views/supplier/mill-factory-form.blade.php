<!DOCTYPE html>
<html lang="en">

<x-layout.head title="Mill Factory Form" />

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
                Mill Factory Registration Form
            </h2>
            <p class="text-base md:text-lg text-gray-700 text-center mb-10 max-w-3xl mx-auto">
                Please fill out the form below to submit your Palm Kernel Shell (PKS) production information. This data
                will be used to match you with potential buyers.
            </p>
            <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
                <div
                    class="bg-white p-6 md:p-8 rounded-lg shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                    <h3 class="text-xl md:text-2xl font-bold text-green-custom mb-6 text-center">Mill Factory Details
                    </h3>
                    <form class="space-y-4" action="{{ route('supplier.formFactory') }}" method="POST"
                        enctype="multipart/form-data" id="supplierForm">
                        @csrf
                        <!-- Supplier Type -->
                        <div class="mb-4">
                            <label for="supplier_type" class="block text-sm font-medium text-gray-700 mb-1">Supplier
                                Type</label>
                            <select id="supplier_type" name="supplier_type"
                                class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-custom focus:border-transparent">
                                <option value="mill_factory"
                                    {{ old('supplier_type', $supplier->supplier_type) == 'mill_factory' ? 'selected' : '' }}>
                                    Mill Factory</option>
                                <option value="collector"
                                    {{ old('supplier_type', $supplier->supplier_type) == 'collector' ? 'selected' : '' }}>
                                    Collector</option>
                            </select>
                            @error('supplier_type')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Region -->
                        <div class="mb-4">
                            <label for="region_input"
                                class="block text-sm font-medium text-gray-700 mb-1">Region</label>
                            <input type="text" id="region_input" name="region"
                                placeholder="Province, City (e.g., North Sumatra / Medan)"
                                class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-custom focus:border-transparent"
                                value="{{ old('region', $supplier->region) }}">
                            @error('region')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Monthly Available Volume -->
                        <div class="mb-4">
                            <label for="monthly_available_volume"
                                class="block text-sm font-medium text-gray-700 mb-1">Monthly Available Volume
                                (Tons)</label>
                            <input type="number" id="monthly_available_volume" name="monthly_available_volume"
                                placeholder="e.g., 500"
                                class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-custom focus:border-transparent"
                                value="{{ old('monthly_available_volume', $supplier->monthly_available_volume) }}">
                            @error('monthly_available_volume')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Palm Kernel Type Composition (%) -->
                        <div class="grid grid-cols-3 gap-4">
                            <div class="mb-4">
                                <label for="dura_composition" class="block text-xs font-medium text-gray-600 mb-1">Dura
                                    (%)</label>
                                <input type="number" id="dura_composition" name="dura_composition" placeholder="30"
                                    class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-custom focus:border-transparent"
                                    value="{{ old('dura_composition', $supplier->dura_composition) }}">
                                @error('dura_composition')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="tenera_composition"
                                    class="block text-xs font-medium text-gray-600 mb-1">Tenera (%)</label>
                                <input type="number" id="tenera_composition" name="tenera_composition" placeholder="60"
                                    class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-custom focus:border-transparent"
                                    value="{{ old('tenera_composition', $supplier->tenera_composition) }}">
                                @error('tenera_composition')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="pisifera_composition"
                                    class="block text-xs font-medium text-gray-600 mb-1">Pisifera (%)</label>
                                <input type="number" id="pisifera_composition" name="pisifera_composition"
                                    placeholder="10"
                                    class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-custom focus:border-transparent"
                                    value="{{ old('pisifera_composition', $supplier->pisifera_composition) }}">
                                @error('pisifera_composition')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <p class="col-span-3 text-xs text-gray-500 mt-1">Enter as percentages (e.g., Dura: 30,
                                Tenera: 60, Pisifera: 10)</p>
                        </div>

                        <!-- Sales Record -->
                        <div class="mb-4">
                            <label for="sales_record" class="block text-sm font-medium text-gray-700 mb-1">Sales Record
                                (past 1 year, tons)</label>
                            <input type="text" id="sales_record" name="sales_record"
                                placeholder="e.g., 20000 (total annual PKS sales in tons)"
                                class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-custom focus:border-transparent"
                                value="{{ old('sales_record', $supplier->sales_record) }}">
                            @error('sales_record')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Submit Button -->
                        <button type="submit"
                            class="w-full bg-green-600 text-white py-3 rounded-lg hover:bg-green-700">
                            Submit Information
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <x-layout.footer />
</body>

</html>
