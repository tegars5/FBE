<!DOCTYPE html>
<html lang="id">
<x-layout.head title="Supplier Dashboard" />

<body class="font-sans leading-relaxed antialiased bg-gray-100">
    <x-layout.navbar />

    <div class="container mx-auto px-4 py-8 mt-20"> {{-- Margin top untuk navbar fixed --}}

        {{-- START: Indikator Sukses dengan Centang --}}
        @if (session('success'))
            <div
                class="bg-green-100 border border-green-400 text-green-700 px-6 py-4 rounded-lg relative mb-6 flex items-center shadow-md">
                <div class="flex-shrink-0 mr-4">
                    <i class="fas fa-check-circle text-2xl text-green-500"></i> {{-- Ikon centang --}}
                </div>
                <div>
                    <strong class="font-bold">Sukses!</strong>
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
                <button type="button" class="absolute top-0 bottom-0 right-0 px-4 py-3 text-green-700"
                    onclick="this.parentElement.style.display='none';">
                    <i class="fas fa-times"></i> {{-- Tombol close --}}
                </button>
            </div>
        @endif
        {{-- END: Indikator Sukses dengan Centang --}}

        @if (session('warning'))
            <div class="bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-3 rounded relative mb-4"
                role="alert">
                <strong class="font-bold">Perhatian!</strong>
                <span class="block sm:inline">{{ session('warning') }}</span>
            </div>
        @endif

        <h1 class="text-3xl font-bold text-gray-800 mb-6">Dashboard Supplier</h1>
        <p class="text-lg text-gray-600 mb-8">Halo, <span class="font-semibold">{{ Auth::user()->name }}</span>! Kelola
            informasi supplier Anda di sini.</p>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="bg-white rounded-lg shadow-md p-6 flex flex-col items-center justify-center text-center">
                <i class="fas fa-file-alt text-green-600 text-4xl mb-4"></i>
                <h2 class="text-xl font-semibold mb-2">Informasi Supplier Anda</h2>
                <p class="text-gray-600 mb-4">Lihat dan perbarui detail informasi perusahaan Anda.</p>
                <a href="{{ route('supplier.mySubmissions') }}"
                    class="bg-green-custom hover:bg-green-700 text-white font-bold py-2 px-4 rounded transition duration-300">
                    Lihat Detail
                </a>
            </div>
            <div class="bg-white rounded-lg shadow-md p-6 flex flex-col items-center justify-center text-center">
                <i class="fas fa-chart-line text-blue-600 text-4xl mb-4"></i>
                <h2 class="text-xl font-semibold mb-2">Status Penawaran</h2>
                <p class="text-gray-600 mb-4">Pantau status penawaran PKS Anda.</p>
                <a href="#"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition duration-300">
                    Cek Status
                </a>
            </div>
            <div class="bg-white rounded-lg shadow-md p-6 flex flex-col items-center justify-center text-center">
                <i class="fas fa-upload text-purple-600 text-4xl mb-4"></i>
                <h2 class="text-xl font-semibold mb-2">Kirim Informasi Baru</h2>
                <p class="text-gray-600 mb-4">Kirim informasi suplai atau update terbaru.</p>
                <a href="{{ route('supplier.formFactory') }}"
                    class="bg-purple-600 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded transition duration-300">
                    Kirim Form
                </a>
            </div>
        </div>
    </div>

    <x-layout.footer />
</body>

</html>
