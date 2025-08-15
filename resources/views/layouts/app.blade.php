<!DOCTYPE html>
<html lang="id">
<x-layout.head title="Edit Profile" />

{{-- ================================================= --}}
{{--                 AWAL BAGIAN NAVBAR                 --}}
{{-- ================================================= --}}

<body class="bg-gray-50 font-sans">
    <x-layout.navbar />
    {{-- ================================================= --}}
    {{--                 AKHIR BAGIAN NAVBAR                 --}}
    {{-- ================================================= --}}

    <main>
        {{-- Di sinilah konten dari edit.blade.php akan ditampilkan --}}
        @yield('content')
    </main>

</body>

</html>
