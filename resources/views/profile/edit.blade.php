    @extends('layouts.app') {{-- Memberitahu file ini untuk memakai bingkai dari layouts/app.blade.php --}}

    @section('title', 'Edit Profile') {{-- Mengisi judul halaman --}}

    @section('content') {{-- Semua di bawah ini akan masuk ke bagian @yield('content') di layout --}}

        <div class="pt-24 md:pt-32 pb-12">
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

                {{-- Menampilkan error validasi jika ada --}}
                @if ($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg relative mb-6" role="alert">
                        <strong class="font-bold">Oops!</strong>
                        <span class="block sm:inline">There were some problems with your input.</span>
                        <ul class="mt-2 list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('profile.update') }}" method="POST" autocomplete="off">
                    @csrf
                    @method('PUT')
                    {{-- BAGIAN FORM SPESIFIK BERDASARKAN PERAN --}}
                    @if (Auth::user()->role === 'supplier' && isset($supplier))
                        @include('profile.partials.edit-supplier-form', ['supplier' => $supplier])
                    @elseif(Auth::user()->role === 'buyer' && isset($buyer))
                        @include('profile.partials.edit-buyer-form', ['buyer' => $buyer])
                    @endif
            </div>
        </div>
        </form>
        </div>
        </div>

    @endsection
