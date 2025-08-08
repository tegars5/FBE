<div class="bg-white overflow-hidden shadow-lg rounded-lg">
    <div class="px-6 py-5 border-b border-gray-200">
        <h3 class="text-2xl leading-6 font-bold text-gray-900">
            <i class="fas fa-shopping-cart text-green-custom mr-3"></i>
            Buyer Profile
        </h3>
        <p class="mt-1 max-w-2xl text-sm text-gray-500">Your company information and purchasing requirements.</p>
    </div>
    <div class="px-6 py-6">
        <dl class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-2 md:grid-cols-3">
            {{-- Bagian Informasi Perusahaan --}}
            <div class="md:col-span-2">
                <dt class="text-sm font-medium text-gray-600">Company Name</dt>
                <dd class="mt-1 text-lg font-semibold text-gray-900">{{ $buyer->company_name ?? 'N/A' }}</dd>
            </div>
            <div class="sm:col-span-1">
                <dt class="text-sm font-medium text-gray-600">Years in Operation</dt>
                <dd class="mt-1 text-lg font-semibold text-gray-900">{{ $buyer->years_in_operation ?? '0' }} years</dd>
            </div>
            <div class="sm:col-span-1">
                <dt class="text-sm font-medium text-gray-600">Country</dt>
                <dd class="mt-1 text-lg font-semibold text-gray-900">{{ $buyer->country ?? 'N/A' }}</dd>
            </div>
            <div class="sm:col-span-1">
                <dt class="text-sm font-medium text-gray-600">City</dt>
                <dd class="mt-1 text-lg font-semibold text-gray-900">{{ $buyer->city ?? 'N/A' }}</dd>
            </div>

            {{-- Bagian Kebutuhan Pembelian --}}
            <div class="sm:col-span-3 mt-4 pt-4 border-t border-gray-200">
                <dt class="text-md font-semibold text-gray-800 mb-2">Purchase Requirements</dt>
            </div>
            <div class="sm:col-span-1">
                <dt class="text-sm font-medium text-gray-600">Monthly Purchase Volume</dt>
                <dd class="mt-1 text-lg font-semibold text-gray-900">
                    {{ number_format($buyer->monthly_purchase_volume ?? 0, 2) }} tons</dd>
            </div>
            <div class="sm:col-span-1">
                <dt class="text-sm font-medium text-gray-600">Annual Purchase Volume</dt>
                <dd class="mt-1 text-lg font-semibold text-gray-900">
                    {{ number_format($buyer->annual_purchase_volume ?? 0, 2) }} tons</dd>
            </div>
            <div class="sm:col-span-1">
                <dt class="text-sm font-medium text-gray-600">Preferred Trade Terms</dt>
                <dd class="mt-1 text-lg font-semibold text-gray-900">{{ $buyer->preferred_trade_terms ?? 'N/A' }}</dd>
            </div>
            <div class="sm:col-span-1">
                <dt class="text-sm font-medium text-gray-600">Target Price</dt>
                <dd class="mt-1 text-lg font-semibold text-gray-900">$ {{ number_format($buyer->target_price ?? 0, 2) }}
                    / ton</dd>
            </div>
            <div class="sm:col-span-2">
                <dt class="text-sm font-medium text-gray-600">Products of Interest</dt>
                <dd class="mt-1 text-lg font-semibold text-gray-900">
                    {{-- Mengubah data array menjadi string yang dipisahkan koma --}}
                    {{ is_array($buyer->products_of_interest) ? implode(', ', $buyer->products_of_interest) : $buyer->products_of_interest ?? 'N/A' }}
                </dd>
            </div>

            {{-- Bagian Informasi Kontak --}}
            <div class="sm:col-span-3 pt-4 mt-4 border-t border-gray-200">
                <dt class="text-md font-semibold text-gray-800 mb-2">Contact Information</dt>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <p class="text-sm font-medium text-gray-600">Contact Person</p>
                        <p class="mt-1 text-lg font-semibold text-gray-900">{{ $buyer->contact_person_name ?? 'N/A' }}
                        </p>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-600">Contact Email</p>
                        <p class="mt-1 text-lg font-semibold text-gray-900">{{ $buyer->contact_person_email ?? 'N/A' }}
                        </p>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-600">Contact Phone</p>
                        <p class="mt-1 text-lg font-semibold text-gray-900">{{ $buyer->contact_person_phone ?? 'N/A' }}
                        </p>
                    </div>
                </div>
            </div>

            {{-- Bagian Catatan Tambahan --}}
            <div class="sm:col-span-3 pt-4 mt-4 border-t border-gray-200">
                <dt class="text-sm font-medium text-gray-600">Additional Notes</dt>
                <dd class="mt-1 text-md text-gray-800 bg-gray-50 p-4 rounded-md">
                    {{ $buyer->additional_notes ?? 'No additional notes provided.' }}</dd>
            </div>

        </dl>
    </div>
</div>
