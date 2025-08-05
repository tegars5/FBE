<!DOCTYPE html>
<html lang="id">

{{-- Memanggil komponen untuk bagian <head> --}}
<x-layout.head title="Profile" />

<body class="font-sans leading-relaxed overflow-x-hidden bg-gray-50">

    {{-- Memanggil komponen untuk Navbar (kesalahan sudah diperbaiki) --}}
    <x-layout.navbar />

    <main>
        <div class="pt-24 md:pt-32 pb-12"> {{-- Padding top disesuaikan agar tidak tertutup navbar --}}
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                    {{-- KOLOM KIRI --}}
                    <div class="lg:col-span-1">
                        @include('profile.partials.user-card')
                    </div>

                    {{-- KOLOM KANAN --}}
                    <div class="lg:col-span-2">
                        @auth
                            @if (Auth::user()->role === 'supplier' && isset($supplier))
                                @include('profile.partials.supplier-profile', ['supplier' => $supplier])
                            @elseif (Auth::user()->role === 'buyer' && isset($buyer))
                                @include('profile.partials.buyer-profile', ['buyer' => $buyer])
                            @else
                                <div class="bg-white overflow-hidden shadow-lg rounded-lg p-6">
                                    <h3 class="text-xl font-semibold text-gray-800">Welcome, {{ Auth::user()->name }}</h3>
                                    <p class="mt-2 text-gray-600">Your specific profile details will be displayed here once
                                        completed.</p>
                                </div>
                            @endif
                        @endauth
                    </div>

                </div>
            </div>
        </div>
    </main>

</body>

</html>
