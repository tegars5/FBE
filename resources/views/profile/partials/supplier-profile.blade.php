<div class="bg-white overflow-hidden shadow-lg rounded-lg">
    <div class="px-6 py-5 border-b border-gray-200">
        <h3 class="text-2xl leading-6 font-bold text-gray-900">
            <i class="fas fa-industry text-green-custom mr-3"></i>
            Supplier Profile
        </h3>
        <p class="mt-1 max-w-2xl text-sm text-gray-500">Your detailed information as a Mill Factory / Collector.</p>
    </div>
    <div class="px-6 py-6">
        <dl class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-2 md:grid-cols-3">
            <div class="sm:col-span-1">
                <dt class="text-sm font-medium text-gray-600">Supplier Type</dt>
                <dd class="mt-1 text-lg font-semibold text-gray-900 capitalize">{{ $supplier->type ?? 'N/A' }}</dd>
            </div>
            <div class="sm:col-span-1">
                <dt class="text-sm font-medium text-gray-600">Region</dt>
                <dd class="mt-1 text-lg font-semibold text-gray-900">{{ $supplier->region ?? 'N/A' }}</dd>
            </div>
            <div class="sm:col-span-1">
                <dt class="text-sm font-medium text-gray-600">Years in Operation</dt>
                <dd class="mt-1 text-lg font-semibold text-gray-900">{{ $supplier->years_operation ?? '0' }} years</dd>
            </div>

            <div class="sm:col-span-1">
                <dt class="text-sm font-medium text-gray-600">Monthly Capacity</dt>
                <dd class="mt-1 text-lg font-semibold text-gray-900">
                    {{ number_format($supplier->monthly_capacity ?? 0, 2) }} tons</dd>
            </div>
            <div class="sm:col-span-1">
                <dt class="text-sm font-medium text-gray-600">Annual Sales (past year)</dt>
                <dd class="mt-1 text-lg font-semibold text-gray-900">
                    {{ number_format($supplier->annual_sales ?? 0, 2) }} tons</dd>
            </div>
            <div class="sm:col-span-1">
                <dt class="text-sm font-medium text-gray-600">Desired Selling Price</dt>
                <dd class="mt-1 text-lg font-semibold text-gray-900">$
                    {{ number_format($supplier->desired_price ?? 0, 2) }} / ton</dd>
            </div>
            <div class="sm:col-span-1">
                <dt class="text-sm font-medium text-gray-600">Minimum Order Quantity</dt>
                <dd class="mt-1 text-lg font-semibold text-gray-900">
                    {{ number_format($supplier->desired_price ?? 0, 2) }} tons</dd>
            </div>
            <div class="sm:col-span-1">
                <dt class="text-sm font-medium text-gray-600">Years in Operation</dt>
                <dd class="mt-1 text-lg font-semibold text-gray-900">
                    {{ number_format($supplier->years_operation ?? 0, 2) }} years</dd>
            </div>

            <div class="sm:col-span-3 pt-4 mt-4 border-t border-gray-200">
                <dt class="text-md font-semibold text-gray-800 mb-2">PKS Composition</dt>
                <div class="grid grid-cols-3 gap-4">
                    <div>
                        <p class="text-sm font-medium text-gray-600">Dura</p>
                        <p class="mt-1 text-lg font-semibold text-gray-900">{{ $supplier->dura_composition ?? 0 }}%</p>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-600">Tenera</p>
                        <p class="mt-1 text-lg font-semibold text-gray-900">{{ $supplier->tenera_composition ?? 0 }}%
                        </p>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-600">Pisifera</p>
                        <p class="mt-1 text-lg font-semibold text-gray-900">{{ $supplier->pisifera_composition ?? 0 }}%
                        </p>
                    </div>
                </div>
            </div>

            <div class="sm:col-span-3 pt-4 mt-4 border-t border-gray-200">
                <dt class="text-md font-semibold text-gray-800 mb-2">Contact Information</dt>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <p class="text-sm font-medium text-gray-600">Contact Person</p>
                        <p class="mt-1 text-lg font-semibold text-gray-900">{{ $supplier->contact_name ?? 'N/A' }}</p>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-600">Contact Email</p>
                        <p class="mt-1 text-lg font-semibold text-gray-900">{{ $supplier->contact_email ?? 'N/A' }}</p>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-600">Contact Phone</p>
                        <p class="mt-1 text-lg font-semibold text-gray-900">{{ $supplier->contact_phone ?? 'N/A' }}</p>
                    </div>
                </div>
            </div>
        </dl>
    </div>
</div>
