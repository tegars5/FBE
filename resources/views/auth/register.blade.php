@extends('layouts.auth')

@section('head')
    {{-- FontAwesome CDN --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
@endsection

@section('content')
    <div class="registration-page-container d-flex align-items-center justify-content-center min-vh-100">
        <div class="registration-content-card-wrapper container-fluid">
            <div class="row g-0 registration-main-row shadow-lg">
                <div
                    class="col-12 col-lg-6 registration-form-column d-flex align-items-center justify-content-center px-4 py-5 p-md-5 p-lg-5">
                    <div class="registration-form-inner-content w-100" style="max-height: 80vh; overflow-y: auto;">
                        <div class="logo-and-title mb-4 text-center text-md-start">
                            <div class="d-flex align-items-center justify-content-center justify-content-md-start mb-3">
                                <img src="{{ asset('assets/fujiyama-logo.png') }}" alt="Fujiyama Logo"
                                    class="app-logo me-2">
                                <h2 class="app-title fw-bold text-dark mb-0">Fujiyama Biomass Energy</h2>
                            </div>
                        </div>

                        <div class="welcome-section mb-4">
                            <h3 class="welcome-title">Join Our Community!</h3>
                            <p class="welcome-subtitle">Create your account to get started.</p>
                        </div>

                        <form method="POST" action="{{ route('register') }}" class="registration-form"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3 position-relative form-group-custom">
                                <label for="name" class="form-label fw-semibold mb-2">{{ __('Full Name') }}</label>
                                <i class="fas fa-user icon-left"></i>
                                <input id="name" type="text"
                                    class="form-control form-control-lg @error('name') is-invalid @enderror" name="name"
                                    value="{{ old('name') ?? Session::get('name') }}" required autocomplete="name" autofocus
                                    placeholder="Enter your full name">

                                @error('name')
                                    <div class="invalid-feedback d-block">
                                        <i class="fas fa-exclamation-circle me-1"></i>
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3 position-relative form-group-custom">
                                <label for="email" class="form-label fw-semibold mb-2">{{ __('Email Address') }}</label>
                                <i class="fas fa-envelope icon-left"></i>
                                <input id="email" type="email"
                                    class="form-control form-control-lg @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') ?? Session::get('email') }}" required autocomplete="email"
                                    placeholder="Enter your email address">

                                @error('email')
                                    <div class="invalid-feedback d-block">
                                        <i class="fas fa-exclamation-circle me-1"></i>
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3 position-relative form-group-custom">
                                <label for="password" class="form-label fw-semibold mb-2">{{ __('Password') }}</label>
                                <i class="fas fa-lock icon-left"></i>
                                <div class="position-relative">
                                    <input id="password" type="password"
                                        class="form-control form-control-lg @error('password') is-invalid @enderror"
                                        name="password" required autocomplete="new-password" placeholder="Password">

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
                                    class="form-label fw-semibold mb-2">{{ __('Confirm Password') }}</label>
                                <i class="fas fa-lock icon-left"></i>
                                <input id="password-confirm" type="password" class="form-control form-control-lg"
                                    name="password_confirmation" required autocomplete="new-password"
                                    placeholder="Confirm password">
                            </div>

                            <div class="mb-4 position-relative form-group-custom">
                                <label for="role" class="form-label fw-semibold mb-2">{{ __('Register As') }}</label>
                                <i class="fas fa-tag icon-left"></i>
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

                            {{-- Buyer Fields --}}
                            <div id="buyer-fields" style="display: none;">
                                <div class="bg-light p-4 rounded mb-4">
                                    <h5 class="mb-3 text-primary border-bottom pb-2">Detail Buyer</h5>

                                    <div class="mb-3 position-relative form-group-custom">
                                        <label for="company_name" class="form-label fw-semibold mb-2">Company
                                            Name</label>
                                        <i class="fas fa-building icon-left"></i>
                                        <input id="company_name" type="text"
                                            class="form-control form-control-lg @error('company_name') is-invalid @enderror"
                                            name="company_name" value="{{ old('company_name') }}"
                                            placeholder="Enter your company name">
                                        @error('company_name')
                                            <div class="invalid-feedback d-block">
                                                <i class="fas fa-exclamation-circle me-1"></i>
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3 position-relative form-group-custom">
                                        <label for="country_region" class="form-label fw-semibold mb-2">Country /
                                            Region</label>
                                        <i class="fas fa-globe icon-left"></i>
                                        <select id="country_region" name="country_region"
                                            class="form-control form-control-lg @error('country_region') is-invalid @enderror">
                                            <option value="">Select Country / Region</option>
                                            <option value="Japan"
                                                {{ old('country_region') == 'Japan' ? 'selected' : '' }}>Japan
                                            </option>
                                            <option value="Korea"
                                                {{ old('country_region') == 'Korea' ? 'selected' : '' }}>Korea
                                            </option>
                                            <option value="China"
                                                {{ old('country_region') == 'China' ? 'selected' : '' }}>China
                                            </option>
                                            <option value="Germany"
                                                {{ old('country_region') == 'Germany' ? 'selected' : '' }}>Germany
                                            </option>
                                            <option value="Denmark"
                                                {{ old('country_region') == 'Denmark' ? 'selected' : '' }}>Denmark
                                            </option>
                                            <option value="Indonesia"
                                                {{ old('country_region') == 'Indonesia' ? 'selected' : '' }}>
                                                Indonesia</option>
                                        </select>
                                        @error('country_region')
                                            <div class="invalid-feedback d-block">
                                                <i class="fas fa-exclamation-circle me-1"></i>
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3 position-relative form-group-custom">
                                        <label for="city" class="form-label fw-semibold mb-2">City</label>
                                        <i class="fas fa-city icon-left"></i>
                                        <input id="city" type="text"
                                            class="form-control form-control-lg @error('city') is-invalid @enderror"
                                            name="city" value="{{ old('city') }}" placeholder="e.g. Tokyo">
                                        @error('city')
                                            <div class="invalid-feedback d-block">
                                                <i class="fas fa-exclamation-circle me-1"></i>
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3 position-relative form-group-custom">
                                        <label for="annual_pks_purchase_volume" class="form-label fw-semibold mb-2">Annual
                                            PKS Purchase Volume (tons)</label>
                                        <i class="fas fa-industry icon-left"></i>
                                        <input id="annual_pks_purchase_volume" type="number" min="0"
                                            class="form-control form-control-lg @error('annual_pks_purchase_volume') is-invalid @enderror"
                                            name="annual_pks_purchase_volume"
                                            value="{{ old('annual_pks_purchase_volume') }}" placeholder="e.g. 50,000
">
                                        @error('annual_pks_purchase_volume')
                                            <div class="invalid-feedback d-block">
                                                <i class="fas fa-exclamation-circle me-1"></i>
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3 position-relative form-group-custom">
                                        <label for="monthly_purchase_volume" class="form-label fw-semibold mb-2">Monthly
                                            Purchase Volume (tons)</label>
                                        <i class="fas fa-truck-loading icon-left"></i>
                                        <input id="monthly_purchase_volume" type="number" min="0"
                                            class="form-control form-control-lg @error('monthly_purchase_volume') is-invalid @enderror"
                                            name="monthly_purchase_volume" value="{{ old('monthly_purchase_volume') }}"
                                            placeholder="e.g. 4,000
">
                                        @error('monthly_purchase_volume')
                                            <div class="invalid-feedback d-block">
                                                <i class="fas fa-exclamation-circle me-1"></i>
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3 position-relative form-group-custom">
                                        <label for="preferred_trade_terms" class="form-label fw-semibold mb-2">Preferred
                                            Trade Terms</label>
                                        <i class="fas fa-handshake icon-left"></i>
                                        <select id="preferred_trade_terms" name="preferred_trade_terms"
                                            class="form-control form-control-lg @error('preferred_trade_terms') is-invalid @enderror">
                                            <option value="">Select Terms of Trade</option>
                                            <option value="FOB"
                                                {{ old('preferred_trade_terms') == 'FOB' ? 'selected' : '' }}>FOB</option>
                                            <option value="CIF"
                                                {{ old('preferred_trade_terms') == 'CIF' ? 'selected' : '' }}>CIF</option>
                                            <option value="EXW"
                                                {{ old('preferred_trade_terms') == 'EXW' ? 'selected' : '' }}>EXW</option>
                                        </select>
                                        @error('preferred_trade_terms')
                                            <div class="invalid-feedback d-block">
                                                <i class="fas fa-exclamation-circle me-1"></i>
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3 position-relative form-group-custom">
                                        <label for="target_price" class="form-label fw-semibold mb-2">Target Price
                                            (USD/ton)</label>
                                        <i class="fas fa-dollar-sign icon-left"></i>
                                        <input id="target_price" type="number" step="0.01" min="0"
                                            class="form-control form-control-lg @error('target_price') is-invalid @enderror"
                                            name="target_price" value="{{ old('target_price') }}"
                                            placeholder="e.g. 120">
                                        @error('target_price')
                                            <div class="invalid-feedback d-block">
                                                <i class="fas fa-exclamation-circle me-1"></i>
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3 form-group-custom">
                                        <label
                                            class="form-label fw-semibold d-block mb-2">{{ __('Products of Interest') }}</label>
                                        <div class="d-flex flex-wrap gap-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="pks_raw"
                                                    name="products_of_interest[]" value="PKS (Raw)"
                                                    {{ is_array(old('products_of_interest')) && in_array('PKS (Raw)', old('products_of_interest')) ? 'checked' : '' }}>
                                                <label class="form-check-label" for="pks_raw">PKS (Raw)</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="pks_charcoal"
                                                    name="products_of_interest[]" value="PKS Charcoal"
                                                    {{ is_array(old('products_of_interest')) && in_array('PKS Charcoal', old('products_of_interest')) ? 'checked' : '' }}>
                                                <label class="form-check-label" for="pks_charcoal">PKS Charcoal</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="biochar"
                                                    name="products_of_interest[]" value="Biochar"
                                                    {{ is_array(old('products_of_interest')) && in_array('Biochar', old('products_of_interest')) ? 'checked' : '' }}>
                                                <label class="form-check-label" for="biochar">Biochar</label>
                                            </div>
                                        </div>
                                        @error('products_of_interest')
                                            <div class="invalid-feedback d-block">
                                                <i class="fas fa-exclamation-circle me-1"></i>
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3 position-relative form-group-custom">
                                        <label for="years_in_operation" class="form-label fw-semibold mb-2">Years in
                                            Operation</label>
                                        <i class="fas fa-calendar-alt icon-left"></i>
                                        <input id="years_in_operation" type="number" min="0"
                                            class="form-control form-control-lg @error('years_in_operation') is-invalid @enderror"
                                            name="years_in_operation" value="{{ old('years_in_operation') }}"
                                            placeholder="e.g. 10">
                                        @error('years_in_operation')
                                            <div class="invalid-feedback d-block">
                                                <i class="fas fa-exclamation-circle me-1"></i>
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3 form-group-custom">
                                        <label for="business_license"
                                            class="form-label fw-semibold mb-2">{{ __('Business License (optional)') }}</label>
                                        <input type="file"
                                            class="form-control @error('business_license') is-invalid @enderror"
                                            id="business_license" name="business_license"
                                            accept="application/pdf,image/*">
                                        <small class="form-text text-muted">PDF or Image (Maximum 2MB)</small>
                                        @error('business_license')
                                            <div class="invalid-feedback d-block">
                                                <i class="fas fa-exclamation-circle me-1"></i>
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3 position-relative form-group-custom">
                                        <label for="contact_person_name" class="form-label fw-semibold mb-2">Contact
                                            Person Name</label>
                                        <i class="fas fa-user-tie icon-left"></i>
                                        <input id="contact_person_name" type="text"
                                            class="form-control form-control-lg @error('contact_person_name') is-invalid @enderror"
                                            name="contact_person_name" value="{{ old('contact_person_name') }}"
                                            placeholder="e.g. Mr. Tanaka">
                                        @error('contact_person_name')
                                            <div class="invalid-feedback d-block">
                                                <i class="fas fa-exclamation-circle me-1"></i>
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3 position-relative form-group-custom">
                                        <label for="contact_person_email" class="form-label fw-semibold mb-2">Contact
                                            Person Email</label>
                                        <i class="fas fa-at icon-left"></i>
                                        <input id="contact_person_email" type="email"
                                            class="form-control form-control-lg @error('contact_person_email') is-invalid @enderror"
                                            name="contact_person_email" value="{{ old('contact_person_email') }}"
                                            placeholder="e.g. tanaka@greenenergy.co.jp">
                                        @error('contact_person_email')
                                            <div class="invalid-feedback d-block">
                                                <i class="fas fa-exclamation-circle me-1"></i>
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3 position-relative form-group-custom">
                                        <label for="contact_person_phone" class="form-label fw-semibold mb-2">Contact
                                            Person Phone Number</label>
                                        <i class="fas fa-phone icon-left"></i>
                                        <input id="contact_person_phone" type="text"
                                            class="form-control form-control-lg @error('contact_person_phone') is-invalid @enderror"
                                            name="contact_person_phone" value="{{ old('contact_person_phone') }}"
                                            placeholder="e.g. +81 90 1234 5678">
                                        @error('contact_person_phone')
                                            <div class="invalid-feedback d-block">
                                                <i class="fas fa-exclamation-circle me-1"></i>
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3 form-group-custom">
                                        <label for="additional_notes"
                                            class="form-label fw-semibold mb-2">{{ __('Additional Notes (optional)') }}</label>
                                        <textarea class="form-control @error('additional_notes') is-invalid @enderror" id="additional_notes"
                                            name="additional_notes" rows="3" placeholder="e.g. We require GGL-certified PKS only">{{ old('additional_notes') }}</textarea>
                                        @error('additional_notes')
                                            <div class="invalid-feedback d-block">
                                                <i class="fas fa-exclamation-circle me-1"></i>
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                    <h1 class="mb-3 text-primary border-bottom pb-2">Document Uploads (Optional)</h1>
                                    <div class="mb-3 form-group-custom">
                                        <label for="company_logo"
                                            class="form-label fw-semibold mb-2">{{ __('Upload Company Logo (optional)') }}</label>
                                        <input type="file"
                                            class="form-control @error('company_logo') is-invalid @enderror"
                                            id="company_logo" name="company_logo" accept="image/*">
                                        <small class="form-text text-muted">Max 2MB</small>
                                        @error('company_logo')
                                            <div class="invalid-feedback d-block">
                                                <i class="fas fa-exclamation-circle me-1"></i>
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3 form-group-custom">
                                        <label for="previous_purchase_records"
                                            class="form-label fw-semibold mb-2">{{ __('Upload Previous Purchase Records (optional)') }}</label>
                                        <input type="file"
                                            class="form-control @error('previous_purchase_records') is-invalid @enderror"
                                            id="previous_purchase_records" name="previous_purchase_records"
                                            accept="application/pdf,image/*">
                                        <small class="form-text text-muted">Max 2MB</small>
                                        @error('previous_purchase_records')
                                            <div class="invalid-feedback d-block">
                                                <i class="fas fa-exclamation-circle me-1"></i>
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            {{-- Supplier Fields --}}
                            <div id="supplier-fields" style="display: none;">
                                <div class="bg-light p-4 rounded mb-4">
                                    <h5 class="mb-3 text-primary border-bottom pb-2">Supplier
                                        Details</h5>

                                    <div class="mb-3 position-relative form-group-custom">
                                        <label for="factory_name_supplier" class="form-label fw-semibold mb-2">Factory
                                            Name</label>
                                        <i class="fas fa-industry icon-left"></i>
                                        <input id="factory_name_supplier" type="text"
                                            class="form-control form-control-lg @error('factory_name_supplier') is-invalid @enderror"
                                            name="factory_name_supplier" value="{{ old('factory_name_supplier') }}"
                                            placeholder="Enter your factory name">
                                        @error('factory_name_supplier')
                                            <div class="invalid-feedback d-block">
                                                <i class="fas fa-exclamation-circle me-1"></i>
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror

                                    </div>
                                    <div class="mb-3 position-relative form-group-custom">
                                        <label for="region_supplier" class="form-label fw-semibold mb-2">Region</label>
                                        <i class="fas fa-map-marker-alt icon-left"></i>
                                        <input id="region_supplier" type="text"
                                            class="form-control form-control-lg @error('region_supplier') is-invalid @enderror"
                                            name="region_supplier" value="{{ old('region_supplier') }}"
                                            placeholder="e.g., North Sumatra / Medan">
                                        @error('region_supplier')
                                            <div class="invalid-feedback d-block">
                                                <i class="fas fa-exclamation-circle me-1"></i>
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror

                                    </div>

                                    <div class="mb-3 position-relative form-group-custom">
                                        <label for="annual_production_volume" class="form-label fw-semibold mb-2">Annual
                                            Production
                                            Volume (ton)</label>
                                        <i class="fas fa-industry icon-left"></i>
                                        <input id="annual_production_volume" type="number" min="0"
                                            class="form-control form-control-lg @error('annual_production_volume') is-invalid @enderror"
                                            name="annual_production_volume" value="{{ old('annual_production_volume') }}"
                                            placeholder="e.g., 6000">
                                        @error('annual_production_volume')
                                            <div class="invalid-feedback d-block">
                                                <i class="fas fa-exclamation-circle me-1"></i>
                                                _message }}</strong>
                                            </div>
                                        @enderror

                                    </div>
                                    <div class="mb-3 position-relative form-group-custom">
                                        <label for="monthly_available_volume" class="form-label fw-semibold mb-2">Monthly
                                            Available
                                            Volume (ton)</label>
                                        <i class="fas fa-truck-loading icon-left"></i>
                                        <input id="monthly_available_volume" type="number" min="0"
                                            class="form-control form-control-lg @error('monthly_available_volume') is-invalid @enderror"
                                            name="monthly_available_volume" value="{{ old('monthly_available_volume') }}"
                                            placeholder="e.g., 500">
                                        @error('monthly_available_volume')
                                            <div class="invalid-feedback d-block">
                                                <i class="fas fa-exclamation-circle me-1"></i>
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror

                                    </div>
                                    <div class="mb-3 position-relative form-group-custom">
                                        <label for="dura_percentage" class="form-label fw-semibold mb-2">Dura Percentage
                                            (%)</label>
                                        <i class="fas fa-percentage icon-left"></i>
                                        <input id="dura_percentage" type="number" step="0.01" min="0"
                                            max="100"
                                            class="form-control form-control-lg @error('dura_percentage') is-invalid @enderror"
                                            name="dura_percentage" value="{{ old('dura_percentage') }}"
                                            _placeholder="e.g., 30">
                                        @error('dura_percentage')
                                            <div class="invalid-feedback d-block">
                                                <i class="fas fa-exclamation-circle me-1"></i>
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror

                                    </div>
                                    <div class="mb-3 position-relative form-group-custom">
                                        <label for="tenera_percentage" class="form-label fw-semibold mb-2">Tenera
                                            Percentage (%)</label>
                                        <i class="fas fa-percentage icon-left"></i>
                                        <input id="tenera_percentage" type="number" step="0.01" min="0"
                                            max="100"
                                            class="form-control form-control-lg @error('tenera_percentage') is-invalid @enderror"
                                            name="tenera_percentage" value="{{ old('tenera_percentage') }}"
                                            placeholder="e.g., 60">
                                        @error('tenera_percentage')
                                            <div class="invalid-feedback d-block">
                                                <i class="fas fa-exclamation-circle me-1"></i>
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3 position-relative form-group-custom">
                                        <label for="pisifera_percentage" class="form-label fw-semibold mb-2">Pisifera
                                            Percentage (%)</label>
                                        <i class="fas fa-percentage icon-left"></i>
                                        <input id="pisifera_percentage" type="number" step="0.01" min="0"
                                            max="100"
                                            class="form-control form-control-lg @error('pisifera_percentage') is-invalid @enderror"
                                            name="pisifera_percentage" value="{{ old('pisifera_percentage') }}"
                                            placeholder="e.g., 10">
                                        @error('pisifera_percentage')
                                            <div class="invalid-feedback d-block">
                                                <i class="fas fa-exclamation-circle me-1"></i>
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror

                                    </div>
                                    <div class="mb-3 position-relative form-group-custom">
                                        <label for="sales_record_past_1_year" class="form-label fw-semibold mb-2">Sales
                                            Record (past 1
                                            year, ton)</label>
                                        <i class="fas fa-chart-line icon-left"></i>
                                        <input id="sales_record_past_1_year" type="number" min="0"
                                            class="form-control form-control-lg @error('sales_record_past_1_year') is-invalid @enderror"
                                            name="sales_record_past_1_year" value="{{ old('sales_record_past_1_year') }}"
                                            placeholder="e.g., 20000">
                                        @error('sales_record_past_1_year')
                                            <div class="invalid-feedback d-block">
                                                <i class="fas fa-exclamation-circle me-1"></i>
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror

                                    </div>
                                    <div class="mb-3 position-relative form-group-custom">
                                        <label for="desired_selling_price" class="form-label fw-semibold mb-2">Desired
                                            Selling
                                            Price (USD/ton)</label>
                                        <i class="fas fa-dollar-sign icon-left"></i>
                                        <input id="desired_selling_price" type="number" step="0.01" min="0"
                                            class="form-control form-control-lg @error('desired_selling_price') is-invalid @enderror"
                                            name="desired_selling_price" value="{{ old('desired_selling_price') }}"
                                            placeholder="e.g., 120 FOB">
                                        @error('desired_selling_price')
                                            <div class="invalid-feedback d-block">
                                                <i class="fas fa-exclamation-circle me-1"></i>
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror

                                    </div>
                                    <div class="mb-3 position-relative form-group-custom">
                                        <label for="minimum_order_quantity" class="form-label fw-semibold mb-2">Minimum
                                            Order Quantity
                                            (ton)</label>
                                        <i class="fas fa-sort-amount-down-alt icon-left"></i>
                                        <input id="minimum_order_quantity" type="number" min="0"
                                            class="form-control form-control-lg @error('minimum_order_quantity') is-invalid @enderror"
                                            name="minimum_order_quantity" value="{{ old('minimum_order_quantity') }}"
                                            placeholder="e.g., 100">
                                        @error('minimum_order_quantity')
                                            <div class="invalid-feedback d-block">
                                                <i class="fas fa-exclamation-circle me-1"></i>
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror

                                    </div>
                                    <div class="mb-3 position-relative form-group-custom">
                                        <label for="years_in_operation_supplier" class="form-label fw-semibold mb-2">Years
                                            in
                                            Operation</label>
                                        _                           <i class="fas fa-calendar-alt icon-left"></i>
                                        <input id="years_in_operation_supplier" type="number" min="0"
                                            class="form-control form-control-lg @error('years_in_operation_supplier') is-invalid @enderror"
                                            name="years_in_operation_supplier"
                                            value="{{ old('years_in_operation_supplier') }}" placeholder="e.g., 8">
                                        @error('years_in_operation_supplier')
                                            <div class="invalid-feedback d-block">
                                                <i class="fas fa-exclamation-circle me-1"></i>
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror

                                    </div>

                                    <div class="mb-3 position-relative form-group-custom">
                                        <label for="contact_person_supplier" class="form-label fw-semibold mb-2">Contact
                                            Person Name</label>
                                        <i class="fas fa-user-tie icon-left"></i>
                                        <input id="contact_person_supplier" type="text"
                                            class="form-control form-control-lg @error('contact_person_supplier') is-invalid @enderror"
                                            name="contact_person_supplier" value="{{ old('contact_person_supplier') }}"
                                            placeholder="e.g., Mr. John Doe">
                                        @error('contact_person_supplier')
                                            <div class="invalid-feedback d-block">
                                                <i class="fas fa-exclamation-circle me-1"></i>
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror

                                    </div>

                                    <div class="mb-3 position-relative form-group-custom">
                                        <label for="email_supplier" class="form-label fw-semibold mb-2">Contact Person
                                            Email</label>
                                        <i class="fas fa-at icon-left"></i>
                                        <input id="email_supplier" type="email"
                                            class="form-control form-control-lg @error('email_supplier') is-invalid @enderror"
                                            name="email_supplier" value="{{ old('email_supplier') }}"
                                            placeholder="e.g., john.doe@millfactory.com">
                                        @error('email_supplier')
                                            <div class="invalid-feedback d-block">
                                                <i class="fas fa-exclamation-circle me-1"></i>
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror

                                    </div>

                                    <div class="mb-3 position-relative form-group-custom">
                                        <label for="phone_supplier" class="form-label fw-semibold mb-2">Contact Person
                                            Phone
                                            Number</label>
                                        <i class="fas fa-phone icon-left"></i>
                                        <input id="phone_supplier" type="text"
                                            class="form-control form-control-lg @error('phone_supplier') is-invalid @enderror"
                                            name="phone_supplier" value="{{ old('phone_supplier') }}"
                                            placeholder="e.g., +1 555 123 4567">
                                        @error('phone_supplier')
                                            <div class="invalid-feedback d-block">
                                                <i class="fas fa-exclamation-circle me-1"></i>
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror

                                    </div>

                                    <div class="mb-3 form-group-custom">
                                        <label for="factory_warehouse_photos"
                                            class="form-label fw-semibold mb-2">{{ __('Factory & Warehouse Photos') }}</label>
                                        <input type="file"
                                            class="form-control @error('factory_warehouse_photos') is-invalid @enderror"
                                            id="factory_warehouse_photos" name="factory_warehouse_photos[]"
                                            accept="image/*" multiple>
                                        <small class="form-text text-muted">Maximum 5
                                            photos</small>
                                        @error('factory_warehouse_photos')
                                            <div class="invalid-feedback d-block">
                                                <i class="fas fa-exclamation-circle me-1"></i>
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror

                                    </div>

                                    <div class="mb-3 form-group-custom">
                                        <label for="pks_sample_photos"
                                            class="form-label fw-semibold mb-2">{{ __('PKS Sample Photos') }}</label>
                                        <input type="file"
                                            class="form-control @error('pks_sample_photos') is-invalid @enderror"
                                            id="pks_sample_photos" name="pks_sample_photos[]" accept="image/*" multiple>
                                        <small class="form-text text-muted">Maximum 5
                                            photos</small>
                                        @error('pks_sample_photos')
                                            _                   <div class="invalid-feedback d-block">
                                                <i class="fas fa-exclamation-circle me-1"></i>
                                                <strong>{{ $message }}</strong>
                                                _
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3 form-group-custom">
                                        <label for="lab_test_report"
                                            class="form-label fw-semibold mb-2">{{ __('Lab Test Report (PDF)') }}</label>
                                        <input type="file"
                                            class="form-control @error('lab_test_report') is-invalid @enderror"
                                            id="lab_test_report" name="lab_test_report" accept="application/pdf">
                                        <small class="form-text text-muted">PDF file
                                            only</small>
                                        @error('lab_test_report')
                                            <div class="invalid-feedback d-block">
                                                <i class="fas fa-exclamation-circle me-1"></i>
                                                <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror

                                    </div>

                                    <div class="mb-3 form-group-custom">
                                        <label for="notes_supplier"
                                            class="form-label fw-semibold mb-2">{{ __('Notes (optional)') }}</label>

                                        <textarea class="form-control @error('notes_supplier') is-invalid @enderror"                                    
                                            id="notes_supplier" name="notes_supplier" rows="3"                                    
                                            placeholder="e.g., Supply might decrease during the rainy season">{{ old('notes_supplier') }}</textarea>
                                        @error('notes_supplier')
                                            <div class="invalid-feedback d-block">
                                                <i class="fas fa-exclamation-circle me-1"></i>
                                                <strong>{{ $message }}</strong>
                                            </div>
                                            _
                                        @enderror

                                    </div>
                                </div>
                            </div>
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

                {{-- Right Column: Decorative --}}
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

    {{-- Custom Scroll Styles & Form Styles --}}
    <style>
        /* Custom scrollbar hanya untuk area form utama */
        .registration-form-inner-content::-webkit-scrollbar {
            width: 8px;
        }

        .registration-form-inner-content::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 4px;
        }

        .registration-form-inner-content::-webkit-scrollbar-thumb {
            background: #c1c1c1;
            border-radius: 4px;
        }

        .registration-form-inner-content::-webkit-scrollbar-thumb:hover {
            background: #a8a8a8;
        }

        /* Styling untuk form dan ikon */
        .form-group-custom {
            position: relative;
        }

        .icon-left {
            position: absolute;
            left: 1rem;
            /* Disesuaikan agar lebih tengah vertikal dengan input field */
            top: calc(50% + 12px);
            transform: translateY(-50%);
            font-size: 1rem;
            color: #6c757d;
            z-index: 2;
        }

        .form-control-lg {
            padding-left: 3rem;
            /* Memberi ruang untuk ikon di kiri */
        }

        .form-select.form-control-lg {
            padding-left: 3rem;
        }

        .form-label {
            color: #495057;
            margin-bottom: 8px;
        }

        .toggle-password {
            border: none;
            background: transparent;
        }

        /* Responsif untuk mobile */
        @media (max-width: 768px) {
            .registration-form-inner-content {
                max-height: 85vh;
            }
        }
    </style>

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

            // Pre-fill email/name if session has data
            @if (Session::has('name'))
                document.getElementById('name').value = "{{ Session::get('name') }}";
            @endif

            @if (Session::has('email'))
                document.getElementById('email').value = "{{ Session::get('email') }}";
            @endif

            @if (Session::has('message'))
                alert("{{ Session::get('message') }}");
            @endif

            // --- Logic to show/hide fields based on role ---
            const roleSelect = document.getElementById('role');
            const buyerFields = document.getElementById('buyer-fields');
            const supplierFields = document.getElementById('supplier-fields');

            function toggleRoleFields() {
                const selectedRole = roleSelect.value;

                buyerFields.style.display = selectedRole === 'buyer' ? 'block' : 'none';
                supplierFields.style.display = selectedRole === 'supplier' ? 'block' : 'none';

                // Set/remove 'required' attribute dynamically for BUYER
                buyerFields.querySelectorAll('input, select, textarea').forEach(field => {
                    const isOptional = [
                        'business_license', 'company_logo', 'previous_purchase_records',
                        'additional_notes'
                    ].includes(field.id);

                    if (selectedRole === 'buyer' && !isOptional) {
                        field.setAttribute('required', 'required');
                    } else {
                        field.removeAttribute('required');
                    }
                });

                // Set/remove 'required' attribute dynamically for SUPPLIER
                supplierFields.querySelectorAll('input, select, textarea').forEach(field => {
                    const isOptional = [
                        'factory_warehouse_photos', 'pks_sample_photos', 'lab_test_report',
                        'notes_supplier'
                    ].includes(field.id);

                    if (selectedRole === 'supplier' && !isOptional) {
                        field.setAttribute('required', 'required');
                    } else {
                        field.removeAttribute('required');
                    }
                });
            }

            // Initial call for page load (to handle old values if form validation fails)
            toggleRoleFields();

            // Event listener for role changes
            roleSelect.addEventListener('change', toggleRoleFields);
        });
    </script>
@endsection
