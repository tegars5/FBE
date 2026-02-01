<!DOCTYPE html>
<html lang="id">
<x-layout.head title="Products Catalog - Buyer" />

<body class="font-sans leading-relaxed antialiased bg-gray-100">
    <x-layout.navbar />

    <div class="container mx-auto px-4 py-8 mt-20">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Products Catalog</h1>
        <p class="text-lg text-gray-600 mb-8">Browse available biomass products from verified suppliers.</p>

        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4"
                role="alert">
                <strong class="font-bold">Success!</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        @if($suppliers->isEmpty())
            <div class="bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-3 rounded relative mb-4">
                <p>No suppliers available at the moment. Please check back later.</p>
            </div>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($suppliers as $supplier)
                    <div class="bg-white rounded-lg shadow-md p-6 hover:shadow-xl transition-shadow duration-300">
                        <div class="flex items-center mb-4">
                            <div class="w-12 h-12 bg-green-600 rounded-full flex items-center justify-center text-white font-bold text-xl mr-3">
                                {{ substr($supplier->company_name, 0, 1) }}
                            </div>
                            <div>
                                <h3 class="text-xl font-semibold text-gray-800">{{ $supplier->company_name }}</h3>
                                <span class="text-sm text-gray-500">{{ $supplier->supplier_type }}</span>
                            </div>
                        </div>

                        <div class="space-y-2 mb-4">
                            <div class="flex items-center text-gray-700">
                                <i class="fas fa-map-marker-alt w-5 text-gray-500"></i>
                                <span class="text-sm">{{ $supplier->region }}</span>
                            </div>
                            <div class="flex items-center text-gray-700">
                                <i class="fas fa-box w-5 text-gray-500"></i>
                                <span class="text-sm">{{ $supplier->monthly_available_volume }} MT/month</span>
                            </div>
                            <div class="flex items-center text-gray-700">
                                <i class="fas fa-dollar-sign w-5 text-gray-500"></i>
                                <span class="text-sm">${{ $supplier->desired_selling_price }}/MT</span>
                            </div>
                            <div class="flex items-center text-gray-700">
                                <i class="fas fa-shopping-cart w-5 text-gray-500"></i>
                                <span class="text-sm">Min. Order: {{ $supplier->minimum_order_quantity }}</span>
                            </div>
                        </div>

                        <div class="border-t pt-4 mt-4">
                            <p class="text-sm text-gray-600 mb-3">Composition:</p>
                            <div class="grid grid-cols-3 gap-2 text-center text-xs">
                                <div class="bg-gray-100 rounded p-2">
                                    <div class="font-semibold text-gray-800">{{ $supplier->dura_composition }}%</div>
                                    <div class="text-gray-500">Dura</div>
                                </div>
                                <div class="bg-gray-100 rounded p-2">
                                    <div class="font-semibold text-gray-800">{{ $supplier->tenera_composition }}%</div>
                                    <div class="text-gray-500">Tenera</div>
                                </div>
                                <div class="bg-gray-100 rounded p-2">
                                    <div class="font-semibold text-gray-800">{{ $supplier->pisifera_composition }}%</div>
                                    <div class="text-gray-500">Pisifera</div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-4 flex gap-2">
                            <a href="{{ route('buyer.request-quote') }}" 
                               class="flex-1 bg-green-600 hover:bg-green-700 text-white text-center font-bold py-2 px-4 rounded transition duration-300">
                                Request Quote
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

    <x-layout.footer />
</body>
</html>
