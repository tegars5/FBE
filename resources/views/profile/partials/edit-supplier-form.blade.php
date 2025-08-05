<fieldset class="border-t pt-8">
    <legend class="text-lg font-semibold text-gray-700">Supplier Details</legend>

    <!-- Contact Information Section -->
    <div class="mt-6">
        <h4 class="text-md font-semibold text-gray-800 flex items-center">
            <i class="fas fa-user-circle mr-2 text-gray-500"></i>
            Contact Information
        </h4>
        <div class="mt-4 grid grid-cols-1 md:grid-cols-2 gap-6 p-4 border rounded-md bg-gray-50/50">
            <div>
                <label for="contact_name" class="block text-sm font-medium text-gray-700">Contact Name</label>
                <input type="text" name="contact_name" id="contact_name"
                    value="{{ old('contact_name', $supplier->contact_name) }}"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500">
            </div>
            <div>
                <label for="contact_phone" class="block text-sm font-medium text-gray-700">Contact Phone</label>
                <input type="text" name="contact_phone" id="contact_phone"
                    value="{{ old('contact_phone', $supplier->contact_phone) }}"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500">
            </div>
            <div class="md:col-span-2">
                <label for="contact_email" class="block text-sm font-medium text-gray-700">Contact Email</label>
                <input type="email" name="contact_email" id="contact_email"
                    value="{{ old('contact_email', $supplier->contact_email) }}"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500">
            </div>
        </div>
    </div>

    <!-- Operational Details Section -->
    <div class="mt-8">
        <h4 class="text-md font-semibold text-gray-800 flex items-center">
            <i class="fas fa-cogs mr-2 text-gray-500"></i>
            Operational Details
        </h4>
        <div class="mt-4 grid grid-cols-1 md:grid-cols-2 gap-6 p-4 border rounded-md bg-gray-50/50">
            <div>
                <label for="region" class="block text-sm font-medium text-gray-700">Region</label>
                <input type="text" name="region" id="region" value="{{ old('region', $supplier->region) }}"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500">
            </div>
            <div>
                <label for="years_operation" class="block text-sm font-medium text-gray-700">Years in Operation</label>
                <input type="number" name="years_operation" id="years_operation"
                    value="{{ old('years_operation', $supplier->years_operation) }}"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500">
            </div>
            <div>
                <label for="monthly_capacity" class="block text-sm font-medium text-gray-700">Monthly Capacity
                    (tons)</label>
                <input type="number" step="0.01" name="monthly_capacity" id="monthly_capacity"
                    value="{{ old('monthly_capacity', $supplier->monthly_capacity) }}"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500">
            </div>
            <div>
                <label for="annual_sales" class="block text-sm font-medium text-gray-700">Annual Sales (tons)</label>
                <input type="number" step="0.01" name="annual_sales" id="annual_sales"
                    value="{{ old('annual_sales', $supplier->annual_sales) }}"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500">
            </div>
        </div>
    </div>

    <!-- Product Specifications Section -->
    <div class="mt-8">
        <h4 class="text-md font-semibold text-gray-800 flex items-center">
            <i class="fas fa-ruler-combined mr-2 text-gray-500"></i>
            Product Specifications
        </h4>
        <div class="mt-4 grid grid-cols-1 md:grid-cols-2 gap-6 p-4 border rounded-md bg-gray-50/50">
            <div>
                <label for="desired_price" class="block text-sm font-medium text-gray-700">Desired Price
                    (USD/ton)</label>
                <input type="number" step="0.01" name="desired_price" id="desired_price"
                    value="{{ old('desired_price', $supplier->desired_price) }}"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500">
            </div>
            <div class="md:col-span-2">
                <p class="text-sm font-medium text-gray-700">PKS Composition (%)</p>
                <div class="mt-2 grid grid-cols-3 gap-4">
                    <div>
                        <label for="dura_composition" class="block text-xs text-gray-600">Dura</label>
                        <input type="number" step="0.01" name="dura_composition" id="dura_composition"
                            value="{{ old('dura_composition', $supplier->dura_composition) }}"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    </div>
                    <div>
                        <label for="tenera_composition" class="block text-xs text-gray-600">Tenera</label>
                        <input type="number" step="0.01" name="tenera_composition" id="tenera_composition"
                            value="{{ old('tenera_composition', $supplier->tenera_composition) }}"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    </div>
                    <div>
                        <label for="pisifera_composition" class="block text-xs text-gray-600">Pisifera</label>
                        <input type="number" step="0.01" name="pisifera_composition" id="pisifera_composition"
                            value="{{ old('pisifera_composition', $supplier->pisifera_composition) }}"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    </div>
                </div>
            </div>
        </div>
    </div>
</fieldset>
