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
                            <h3 class="welcome-title">Partner with FBE to secure a sustainable supply of high-quality PKS
                                (Palm Kernel Shell).</h3>
                            <p class="welcome-subtitle">Please fill out the registration form below. After submitting, your
                                information will be processed by FBE to grant you access to your buyer dashboard.</p>
                            {{-- Teks diubah sedikit agar tidak menyiratkan verifikasi tertunda --}}
                        </div>

                        {{-- === PENTING: TAMBAHKAN enctype="multipart/form-data" KARENA ADA UPLOAD FILE === --}}
                        <form method="POST" action="{{ route('register') }}" class="registration-form"
                            enctype="multipart/form-data">
                            @csrf

                            {{-- General User Registration Fields --}}
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

                            {{-- ---------------------------------------------- --}}
                            {{-- START: Perubahan untuk Pilihan Role --}}
                            {{-- ---------------------------------------------- --}}
                            <div class="mb-4 position-relative form-group-custom">
                                <label for="role" class="form-label visually-hidden">{{ __('Daftar Sebagai') }}</label>
                                <i class="fas fa-user-tag icon-left"></i>
                                <select id="role" name="role" required
                                    class="form-control form-control-lg @error('role') is-invalid @enderror">
                                    <option value="">{{ __('Select Account Type') }}</option>
                                    <option value="buyer" {{ old('role') == 'buyer' ? 'selected' : '' }}>
                                        {{ __('Buyer') }}
                                    </option>
                                    <option value="supplier" {{ old('role') == 'supplier' ? 'selected' : '' }}>
                                        {{ __('Supplier') }}
                                    </option>
                                </select>
                                @error('role')
                                    <div class="invalid-feedback d-block">
                                        <i class="fas fa-exclamation-circle me-1"></i>
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>

                            {{-- BUYER SPECIFIC FIELDS --}}
                            <div id="buyer-fields" style="display: {{ old('role') == 'buyer' ? 'block' : 'none' }};">
                                <hr class="my-4">
                                <h5 class="mb-3">Buyer Registration Form</h5>

                                <div class="mb-3">
                                    <label for="company_name" class="form-label">Company Name <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('company_name') is-invalid @enderror"
                                        id="company_name" name="company_name" value="{{ old('company_name') }}"
                                        placeholder="e.g. Green Energy Trading Ltd.">
                                    @error('company_name')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="country_region" class="form-label">Country / Region <span
                                            class="text-danger">*</span></label>
                                    <select class="form-control @error('country_region') is-invalid @enderror"
                                        id="country_region" name="country_region">
                                        <option value="">Select from list</option>
                                        <option value="Japan" {{ old('country_region') == 'Japan' ? 'selected' : '' }}>
                                            Japan</option>
                                        <option value="Korea" {{ old('country_region') == 'Korea' ? 'selected' : '' }}>
                                            Korea</option>
                                        <option value="China" {{ old('country_region') == 'China' ? 'selected' : '' }}>
                                            China</option>
                                        <option value="Germany"
                                            {{ old('country_region') == 'Germany' ? 'selected' : '' }}>Germany</option>
                                        <option value="Denmark"
                                            {{ old('country_region') == 'Denmark' ? 'selected' : '' }}>Denmark</option>
                                        {{-- Tambahkan negara lain sesuai kebutuhan --}}
                                    </select>
                                    @error('country_region')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="city" class="form-label">City <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('city') is-invalid @enderror"
                                        id="city" name="city" value="{{ old('city') }}"
                                        placeholder="e.g. Tokyo">
                                    @error('city')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="annual_pks_purchase_volume" class="form-label">Annual PKS Purchase Volume
                                        (tons)</label>
                                    <input type="number"
                                        class="form-control @error('annual_pks_purchase_volume') is-invalid @enderror"
                                        id="annual_pks_purchase_volume" name="annual_pks_purchase_volume"
                                        value="{{ old('annual_pks_purchase_volume') }}" placeholder="e.g. 50,000">
                                    @error('annual_pks_purchase_volume')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="monthly_purchase_volume" class="form-label">Monthly Purchase Volume
                                        (tons)</label>
                                    <input type="number"
                                        class="form-control @error('monthly_purchase_volume') is-invalid @enderror"
                                        id="monthly_purchase_volume" name="monthly_purchase_volume"
                                        value="{{ old('monthly_purchase_volume') }}" placeholder="e.g. 4,000">
                                    @error('monthly_purchase_volume')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="preferred_trade_terms" class="form-label">Preferred Trade Terms</label>
                                    <select class="form-control @error('preferred_trade_terms') is-invalid @enderror"
                                        id="preferred_trade_terms" name="preferred_trade_terms">
                                        <option value="">Select Trade Terms</option>
                                        <option value="FOB"
                                            {{ old('preferred_trade_terms') == 'FOB' ? 'selected' : '' }}>FOB</option>
                                        <option value="CIF"
                                            {{ old('preferred_trade_terms') == 'CIF' ? 'selected' : '' }}>CIF</option>
                                        <option value="EXW"
                                            {{ old('preferred_trade_terms') == 'EXW' ? 'selected' : '' }}>EXW</option>
                                    </select>
                                    @error('preferred_trade_terms')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="target_price" class="form-label">Target Price (USD/ton)</label>
                                    <input type="text"
                                        class="form-control @error('target_price') is-invalid @enderror"
                                        id="target_price" name="target_price" value="{{ old('target_price') }}"
                                        placeholder="e.g. 120">
                                    @error('target_price')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Products of Interest</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="products_of_interest[]"
                                            value="PKS (Raw)" id="pksRaw"
                                            {{ is_array(old('products_of_interest')) && in_array('PKS (Raw)', old('products_of_interest')) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="pksRaw">PKS (Raw)</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="products_of_interest[]"
                                            value="PKS Charcoal" id="pksCharcoal"
                                            {{ is_array(old('products_of_interest')) && in_array('PKS Charcoal', old('products_of_interest')) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="pksCharcoal">PKS Charcoal</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="products_of_interest[]"
                                            value="Biochar" id="biochar"
                                            {{ is_array(old('products_of_interest')) && in_array('Biochar', old('products_of_interest')) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="biochar">Biochar</label>
                                    </div>
                                    @error('products_of_interest')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="years_in_operation" class="form-label">Years in Operation</label>
                                    <input type="number"
                                        class="form-control @error('years_in_operation') is-invalid @enderror"
                                        id="years_in_operation" name="years_in_operation"
                                        value="{{ old('years_in_operation') }}" placeholder="e.g. 10">
                                    @error('years_in_operation')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="business_license" class="form-label">Business License (optional)</label>
                                    <input type="file"
                                        class="form-control @error('business_license') is-invalid @enderror"
                                        id="business_license" name="business_license" accept=".pdf, .jpg, .jpeg, .png">
                                    <small class="form-text text-muted">PDF or Image (Max 2MB)</small>
                                    @error('business_license')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>

                                <h5 class="mb-3 mt-4">Contact Person Information</h5>

                                <div class="mb-3">
                                    <label for="contact_person_name" class="form-label">Contact Person Name <span
                                            class="text-danger">*</span></label>
                                    <input type="text"
                                        class="form-control @error('contact_person_name') is-invalid @enderror"
                                        id="contact_person_name" name="contact_person_name"
                                        value="{{ old('contact_person_name') }}" placeholder="e.g. Mr. Tanaka">
                                    @error('contact_person_name')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="contact_person_email" class="form-label">Contact Person Email <span
                                            class="text-danger">*</span></label>
                                    <input type="email"
                                        class="form-control @error('contact_person_email') is-invalid @enderror"
                                        id="contact_person_email" name="contact_person_email"
                                        value="{{ old('contact_person_email') }}"
                                        placeholder="e.g. tanaka@greenenergy.co.jp">
                                    @error('contact_person_email')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="contact_person_phone_number" class="form-label">Contact Person Phone
                                        Number</label>
                                    <input type="text"
                                        class="form-control @error('contact_person_phone_number') is-invalid @enderror"
                                        id="contact_person_phone_number" name="contact_person_phone_number"
                                        value="{{ old('contact_person_phone_number') }}"
                                        placeholder="e.g. +81 90 1234 5678">
                                    @error('contact_person_phone_number')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="additional_notes" class="form-label">Additional Notes (optional)</label>
                                    <textarea class="form-control @error('additional_notes') is-invalid @enderror" id="additional_notes"
                                        name="additional_notes" rows="3" placeholder="e.g. We require GGL-certified PKS only">{{ old('additional_notes') }}</textarea>
                                    @error('additional_notes')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>

                                <hr class="my-4">
                                <h5 class="mb-3">Upload Section</h5>

                                <div class="mb-3">
                                    <label for="company_logo" class="form-label">Upload Company Logo (optional)</label>
                                    <input type="file"
                                        class="form-control @error('company_logo') is-invalid @enderror"
                                        id="company_logo" name="company_logo" accept=".jpg, .jpeg, .png">
                                    <small class="form-text text-muted">Max 2MB</small>
                                    @error('company_logo')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="previous_purchase_records" class="form-label">Upload Previous Purchase
                                        Records (optional)</label>
                                    <input type="file"
                                        class="form-control @error('previous_purchase_records') is-invalid @enderror"
                                        id="previous_purchase_records" name="previous_purchase_records"
                                        accept=".pdf, .jpg, .jpeg, .png">
                                    <small class="form-text text-muted">Max 2MB</small>
                                    @error('previous_purchase_records')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div> {{-- End Buyer Specific Fields --}}


                            <div class="d-grid gap-2 mb-4">
                                <button type="submit" class="btn btn-primary btn-lg fw-semibold login-button">
                                    {{ __('Register Account') }}
                                </button>
                            </div>

                            <div class="text-center mt-3 login-link-wrapper">
                                <p class="text-muted mb-0 already-have-account-text">
                                    Already have an account?
                                    <a href="{{ route('login') }}"
                                        class="fw-semibold text-decoration-none login-now-link">
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

                        <h3 class="decorative-register-title mb-2">Build a Sustainable Future With
                            Us!</h3>

                        <p class="decorative-register-subtitle mb-4">
                            By joining our platform, you contribute to a greener planet and
                            sustainable energy solutions.
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

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.classList.remove('fa-eye');
                toggleIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                toggleIcon.classList.remove('fa-eye-slash');
                toggleIcon.classList.add('fa-eye');
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            // Form input effects
            // Memilih semua input dan select dengan kelas .form-control atau .form-select
            const inputs = document.querySelectorAll('.form-control, .form-select');
            inputs.forEach(input => {
                input.addEventListener('focus', function() {
                    this.style.borderColor = 'var(--input-focus-border)';
                    this.style.boxShadow = '0 0 0 3px rgba(var(--primary-green-rgb), 0.15)';
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
                alert("{{ Session::get('message') }}"); 
            @endif
        });
    </script>
@endsection
