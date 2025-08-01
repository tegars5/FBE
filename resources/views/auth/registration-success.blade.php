@extends('layouts.auth') {{-- Atau layout utama Anda --}}

@section('content')
    <div class="registration-success-container d-flex align-items-center justify-content-center min-vh-100">
        <div class="card p-5 shadow-lg text-center">
            <div class="checkmark-circle mb-4">
                <i class="fas fa-check-circle text-success" style="font-size: 80px;"></i>
            </div>
            <h2 class="mb-3">Pendaftaran Berhasil!</h2>
            <p class="lead mb-4">Terima kasih telah mendaftar di Fujiyama Biomass Energy.</p>
            <p>Akun Anda sedang dalam proses verifikasi oleh admin kami. Anda akan menerima email konfirmasi setelah akun
                Anda disetujui, dan baru setelah itu Anda dapat login ke dashboard Anda.</p>
            <p class="mt-4">
                <a href="{{ route('login') }}" class="btn btn-primary">Kembali ke Halaman Login</a>
            </p>
        </div>
    </div>
@endsection
