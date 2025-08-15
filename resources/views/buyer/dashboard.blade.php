<!DOCTYPE html>
<html lang="en">
<x-layout.head title="Buyer Dashboard" />

<body class="font-sans leading-relaxed antialiased bg-gray-100">
    <x-layout.navbar />

    <div class="container mx-auto px-4 py-8 mt-20"> {{-- Margin top for fixed navbar --}}
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Buyer Dashboard</h1>
        <p class="text-lg text-gray-600 mb-8">Hello, <span class="font-semibold">{{ Auth::user()->name }}</span>! Explore
            products and manage your orders here.</p>

        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4"
                role="alert">
                <strong class="font-bold">Success!</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        @if (session('warning'))
            <div class="bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-3 rounded relative mb-4"
                role="alert">
                <strong class="font-bold">Warning!</strong>
                <span class="block sm:inline">{{ session('warning') }}</span>
            </div>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="bg-white rounded-lg shadow-md p-6 flex flex-col items-center justify-center text-center">
                <i class="fas fa-boxes text-green-600 text-4xl mb-4"></i>
                <h2 class="text-xl font-semibold mb-2">Product Catalog</h2>
                <p class="text-gray-600 mb-4">Explore our various biomass products.</p>
                <a href="#"
                    class="bg-green-custom hover:bg-green-700 text-white font-bold py-2 px-4 rounded transition duration-300">
                    View Catalog
                </a>
            </div>
            <div class="bg-white rounded-lg shadow-md p-6 flex flex-col items-center justify-center text-center">
                <i class="fas fa-truck-loading text-blue-600 text-4xl mb-4"></i>
                <h2 class="text-xl font-semibold mb-2">Order Status</h2>
                <p class="text-gray-600 mb-4">Track your ongoing orders.</p>
                <a href="#"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition duration-300">
                    Track Orders
                </a>
            </div>
            <div class="bg-white rounded-lg shadow-md p-6 flex flex-col items-center justify-center text-center">
                <i class="fas fa-quote-right text-purple-600 text-4xl mb-4"></i>
                <h2 class="text-xl font-semibold mb-2">Request a Quote</h2>
                <p class="text-gray-600 mb-4">Submit a request for a special price quote.</p>
                <a href="{{ route('buyer.purchaserequest') }}"
                    class="bg-purple-600 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded transition duration-300">
                    Request Quote
                </a>
            </div>
        </div>
    </div>

    <x-layout.footer />
</body>

</html>
