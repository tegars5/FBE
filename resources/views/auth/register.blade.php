@extends('layouts.auth')

@section('content')
    <div class="registration-page-container d-flex align-items-center justify-content-center min-vh-100">
        <div class="registration-content-card-wrapper container-fluid">
            <div class="row g-0 registration-main-row shadow-lg">
                {{-- Left Column: Registration Form --}}
                <div
                    class="col-12 col-lg-6 registration-form-column d-flex align-items-center justify-content-center px-4 py-5 p-md-5 p-lg-5">
                    <div class="registration-form-inner-content w-100">
                        <div class="logo-and-title mb-4 text-center text-md-start">
                            <div class="d-flex align-items-center justify-content-center justify-content-md-start mb-3">
                                <img src="{{ asset('assets/fujiyama-logo.png') }}" alt="Fujiyama Logo" class="app-logo me-2">
                                <h2 class="app-title fw-bold text-dark mb-0">Fujiyama Biomass Energy</h2>
                            </div>
                        </div>

                        <div class="welcome-section mb-4">
                            <h3 class="welcome-title">Join Our Community!</h3>
                            <p class="welcome-subtitle">Create your account to get started.</p>
                        </div>

                        <form method="POST" action="{{ route('register') }}" class="registration-form">
                            @csrf

                            <div class="mb-3 position-relative form-group-custom">
                                <label for="name" class="form-label visually-hidden">{{ __('Name') }}</label>
                                <i class="fas fa-user icon-left"></i>
                                <input id="name" type="text"
                                    class="form-control form-control-lg @error('name') is-invalid @enderror" name="name"
                                    value="{{ old('name') ?? Session::get('name') }}" required autocomplete="name" autofocus
                                    placeholder="Your Full Name">

                                @error('name')
                                    <div class="invalid-feedback d-block">
                                        <i class="fas fa-exclamation-circle me-1"></i>
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3 position-relative form-group-custom">
                                <label for="email" class="form-label visually-hidden">{{ __('Email Address') }}</label>
                                <i class="fas fa-envelope icon-left"></i>
                                <input id="email" type="email"
                                    class="form-control form-control-lg @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') ?? Session::get('email') }}" required autocomplete="email"
                                    placeholder="Your Email Address">

                                @error('email')
                                    <div class="invalid-feedback d-block">
                                        <i class="fas fa-exclamation-circle me-1"></i>
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3 position-relative form-group-custom">
                                <label for="password" class="form-label visually-hidden">{{ __('Password') }}</label>
                                <i class="fas fa-lock icon-left"></i>
                                <div class="position-relative">
                                    <input id="password" type="password"
                                        class="form-control form-control-lg @error('password') is-invalid @enderror"
                                        name="password" required autocomplete="new-password" placeholder="Create Password">

                                    <button type="button"
                                        class="btn position-absolute end-0 top-50 translate-middle-y pe-3 toggle-password"
                                        onclick="togglePassword()">
                                        <i class="fas fa-eye text-muted" id="togglePasswordIcon"></i>
                                    </button>
                                </div>

                                @error('password')
                                    <div class="invalid-feedback d-block">
                                        <i class="fas fa-exclamation-circle me-1"></i>
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-4 position-relative form-group-custom">
                                <label for="password-confirm"
                                    class="form-label visually-hidden">{{ __('Confirm Password') }}</label>
                                <i class="fas fa-lock icon-left"></i>
                                <input id="password-confirm" type="password" class="form-control form-control-lg"
                                    name="password_confirmation" required autocomplete="new-password"
                                    placeholder="Confirm Password">
                            </div>

                            <div class="d-grid gap-2 mb-4">
                                <button type="submit" class="btn btn-primary btn-lg fw-semibold login-button">
                                    {{ __('Register Account') }}
                                </button>
                            </div>

                            <div class="text-center mt-3 login-link-wrapper">
                                <p class="text-muted mb-0 already-have-account-text">
                                    Already have an account?
                                    <a href="{{ route('login') }}" class="fw-semibold text-decoration-none login-now-link">
                                        Login here
                                    </a>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>

                {{-- Right Column: Decorative (Simpler Visual for Register Page) --}}
                <div
                    class="col-12 col-lg-6 decorative-register-column d-none d-lg-flex align-items-center justify-content-center p-0">
                    <div
                        class="decorative-register-content w-100 h-100 d-flex flex-column align-items-center justify-content-center text-white text-center">
                        <img src="{{ asset('assets/fujiyama-logo.png') }}" alt="Join Us"
                            class="register-decorative-image mb-4">

                        <h3 class="decorative-register-title mb-2">Build a Sustainable Future With Us!</h3>

                        <p class="decorative-register-subtitle mb-4">
                            By joining our platform, you contribute to a greener planet and sustainable energy solutions.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Toggle Password Visibility
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const toggleIcon = document.getElementById('togglePasswordIcon');

            // Jika tipe input saat ini adalah 'password' (sedang tersembunyi)
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text'; // Ubah menjadi 'text' (sehingga password terlihat)
                toggleIcon.classList.remove('fa-eye'); // Hapus ikon mata terbuka
                toggleIcon.classList.add('fa-eye-slash'); // Tambahkan ikon mata tercoret (menandakan bisa disembunyikan)
            } else { // Jika tipe input saat ini adalah 'text' (sedang terlihat)
                passwordInput.type = 'password'; // Ubah menjadi 'password' (sehingga password tersembunyi)
                toggleIcon.classList.remove('fa-eye-slash'); // Hapus ikon mata tercoret
                toggleIcon.classList.add('fa-eye'); // Tambahkan ikon mata terbuka (menandakan bisa dilihat)
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            // Form input effects
            const inputs = document.querySelectorAll('.form-control');
            inputs.forEach(input => {
                input.addEventListener('focus', function() {
                    this.style.borderColor = 'var(--input-focus-border)';
                    this.style.boxShadow =
                        '0 0 0 3px rgba(var(--primary-green-rgb), 0.15)';
                    this.style.backgroundColor = 'var(--white)';
                });

                input.addEventListener('blur', function() {
                    this.style.borderColor = 'var(--gray-200)';
                    this.style.boxShadow = 'none';
                    this.style.backgroundColor = 'var(--gray-100)';
                });
            });

            // Pre-fill email/name if session has data from supplier form (SupplierController)
            const nameInput = document.getElementById('name');
            const emailInput = document.getElementById('email');

            @if (Session::has('name'))
                if (nameInput) {
                    nameInput.value = "{{ Session::get('name') }}";
                }
            @endif

            @if (Session::has('email'))
                if (emailInput) {
                    emailInput.value = "{{ Session::get('email') }}";
                }
            @endif

            @if (Session::has('message'))
                alert("{{ Session::get('message') }}"); // Pop-up message if needed
            @endif
        });
    </script>
    {{-- Tidak perlu tag <style> di sini lagi karena semua CSS sudah di layout utama --}}
@endsection
