<!DOCTYPE html>
<html lang="en">
<x-layout.head title="Order Management - {{ $supplier->company_name ?? 'Supplier' }}" />

<body class="font-sans leading-relaxed antialiased bg-gray-100">
    <x-layout.navbar />

    <div class="container mx-auto px-4 py-8 mt-20">
        <div class="mb-8 flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold text-gray-800">Order Management</h1>
                <p class="text-lg text-gray-600 mt-1">Informasi pesanan Anda berdasarkan data profil Supplier</p>
            </div>
            <a href="{{ route('supplier.dashboard') }}"
                class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded-lg">
                ← Kembali ke Dashboard
            </a>
        </div>

        @if (session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded-md shadow-sm">
                <p class="font-bold">Berhasil!</p>
                <p>{{ session('success') }}</p>
            </div>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-6 mb-8">
            <div class="bg-white rounded-lg shadow-md p-5">
                <dl>
                    <dt class="text-sm text-gray-500">Current Month Available</dt>
                    <dd class="mt-1 text-2xl font-semibold text-gray-900">
                        {{ number_format($viewStats['current_month_available'], 2) }} ton</dd>
                </dl>
            </div>
            <div class="bg-white rounded-lg shadow-md p-5">
                <dl>
                    <dt class="text-sm text-gray-500">Confirmed Orders</dt>
                    <dd class="mt-1 text-2xl font-semibold text-gray-900">
                        {{ number_format($viewStats['confirmed_orders'], 2) }} ton</dd>
                </dl>
            </div>
            <div class="bg-white rounded-lg shadow-md p-5">
                <dl>
                    <dt class="text-sm text-gray-500">Dura / Tenera / Pisifera</dt>
                    <dd class="mt-1 text-lg font-semibold text-gray-900">
                        {{ number_format($viewStats['dura'], 0) }}% /
                        {{ number_format($viewStats['tenera'], 0) }}% /
                        {{ number_format($viewStats['pisifera'], 0) }}%
                    </dd>
                </dl>
            </div>
            <div class="bg-white rounded-lg shadow-md p-5">
                <dl>
                    <dt class="text-sm text-gray-500">Supplier Type</dt>
                    <dd class="mt-1 text-xl font-semibold text-gray-900">{{ $viewStats['type'] }}</dd>
                </dl>
            </div>
            <div class="bg-white rounded-lg shadow-md p-5">
                <dl>
                    <dt class="text-sm text-gray-500">Region</dt>
                    <dd class="mt-1 text-xl font-semibold text-gray-900">{{ $viewStats['region'] }}</dd>
                </dl>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-md p-6">
            <p class="text-sm text-gray-600">
                * <strong>Confirmed Orders</strong> berasal dari kolom <code>accepted_volume</code> di profil supplier
                yang diperbarui saat admin melakukan accept.
            </p>
        </div>
    </div>

    <x-layout.footer />
</body>

</html>
