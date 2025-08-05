@extends('layouts.auth')

@section('content')
    <div class="registration-page-container d-flex align-items-center justify-content-center min-vh-100">
        <div class="registration-content-card-wrapper container-fluid">
            <div class="row g-0 registration-main-row shadow-lg">
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

                        <form method="POST" action="{{ route('register') }}" class="registration-form"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3 position-relative form-group-custom">
                                <label for="name" class="form-label visually-hidden">{{ __('Full Name') }}</label>
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

                            <div class="mb-4 position-relative form-group-custom">
                                <label for="role" class="form-label visually-hidden">{{ __('Register As') }}</label>
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

                            {{-- ---
                            | START: Additional Fields Based on Role
                            | This section will be shown/hidden by JavaScript
                            --- --}}
                            <div id="buyer-fields" style="display: none;">
                                <h5 class="mt-4 mb-3">Buyer Details</h5>
                                <div class="mb-3 position-relative form-group-custom">
                                    <label for="company_name_buyer" class="form-label visually-hidden">Company
                                        Name</label>
                                    <i class="fas fa-building icon-left"></i>
                                    <input id="company_name_buyer" type="text"
                                        class="form-control form-control-lg @error('company_name_buyer') is-invalid @enderror"
                                        name="company_name_buyer" value="{{ old('company_name_buyer') }}"
                                        placeholder="Your Company Name (Buyer)">
                                    @error('company_name_buyer')
                                        <div class="invalid-feedback d-block">
                                            <i class="fas fa-exclamation-circle me-1"></i>
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3 position-relative form-group-custom">
                                    <label for="country_region_buyer" class="form-label visually-hidden">Country /
                                        Region</label>
                                    <i class="fas fa-globe icon-left"></i>
                                    <select id="country_region_buyer" name="country_region_buyer"
                                        class="form-control form-control-lg @error('country_region_buyer') is-invalid @enderror">
                                        <option value="">Select Country / Region</option>
                                        <option value="Japan"
                                            {{ old('country_region_buyer') == 'Japan' ? 'selected' : '' }}>Japan</option>
                                        <option value="Korea"
                                            {{ old('country_region_buyer') == 'Korea' ? 'selected' : '' }}>Korea</option>
                                        <option value="China"
                                            {{ old('country_region_buyer') == 'China' ? 'selected' : '' }}>China</option>
                                        <option value="Germany"
                                            {{ old('country_region_buyer') == 'Germany' ? 'selected' : '' }}>Germany
                                        </option>
                                        <option value="Denmark"
                                            {{ old('country_region_buyer') == 'Denmark' ? 'selected' : '' }}>Denmark
                                        </option>
                                        {{-- Add other countries as needed --}}
                                    </select>
                                    @error('country_region_buyer')
                                        <div class="invalid-feedback d-block">
                                            <i class="fas fa-exclamation-circle me-1"></i>
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3 position-relative form-group-custom">
                                    <label for="city_buyer" class="form-label visually-hidden">City</label>
                                    <i class="fas fa-city icon-left"></i>
                                    <input id="city_buyer" type="text"
                                        class="form-control form-control-lg @error('city_buyer') is-invalid @enderror"
                                        name="city_buyer" value="{{ old('city_buyer') }}" placeholder="e.g. Tokyo">
                                    @error('city_buyer')
                                        <div class="invalid-feedback d-block">
                                            <i class="fas fa-exclamation-circle me-1"></i>
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3 position-relative form-group-custom">
                                    <label for="annual_pks_purchase_volume" class="form-label visually-hidden">Annual
                                        PKS Purchase Volume (tons)</label>
                                    <i class="fas fa-industry icon-left"></i>
                                    <input id="annual_pks_purchase_volume" type="number" min="0"
                                        class="form-control form-control-lg @error('annual_pks_purchase_volume') is-invalid @enderror"
                                        name="annual_pks_purchase_volume" value="{{ old('annual_pks_purchase_volume') }}"
                                        placeholder="e.g. 50000">
                                    @error('annual_pks_purchase_volume')
                                        <div class="invalid-feedback d-block">
                                            <i class="fas fa-exclamation-circle me-1"></i>
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3 position-relative form-group-custom">
                                    <label for="monthly_purchase_volume" class="form-label visually-hidden">Monthly
                                        Purchase Volume (tons)</label>
                                    <i class="fas fa-truck-loading icon-left"></i>
                                    <input id="monthly_purchase_volume" type="number" min="0"
                                        class="form-control form-control-lg @error('monthly_purchase_volume') is-invalid @enderror"
                                        name="monthly_purchase_volume" value="{{ old('monthly_purchase_volume') }}"
                                        placeholder="e.g. 4000">
                                    @error('monthly_purchase_volume')
                                        <div class="invalid-feedback d-block">
                                            <i class="fas fa-exclamation-circle me-1"></i>
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3 position-relative form-group-custom">
                                    <label for="preferred_trade_terms" class="form-label visually-hidden">Preferred
                                        Trade Terms</label>
                                    <i class="fas fa-handshake icon-left"></i>
                                    <select id="preferred_trade_terms" name="preferred_trade_terms"
                                        class="form-control form-control-lg @error('preferred_trade_terms') is-invalid @enderror">
                                        <option value="">Select Trade Terms</option>
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
                                    <label for="target_price" class="form-label visually-hidden">Target Price
                                        (USD/ton)</label>
                                    <i class="fas fa-dollar-sign icon-left"></i>
                                    <input id="target_price" type="number" step="0.01" min="0"
                                        class="form-control form-control-lg @error('target_price') is-invalid @enderror"
                                        name="target_price" value="{{ old('target_price') }}" placeholder="e.g. 120">
                                    @error('target_price')
                                        <div class="invalid-feedback d-block">
                                            <i class="fas fa-exclamation-circle me-1"></i>
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3 form-group-custom">
                                    <label class="form-label d-block mb-2">{{ __('Products of Interest') }}</label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="pks_raw"
                                            name="products_of_interest[]" value="PKS (Raw)"
                                            {{ is_array(old('products_of_interest')) && in_array('PKS (Raw)', old('products_of_interest')) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="pks_raw">PKS (Raw)</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="pks_charcoal"
                                            name="products_of_interest[]" value="PKS Charcoal"
                                            {{ is_array(old('products_of_interest')) && in_array('PKS Charcoal', old('products_of_interest')) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="pks_charcoal">PKS Charcoal</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="biochar"
                                            name="products_of_interest[]" value="Biochar"
                                            {{ is_array(old('products_of_interest')) && in_array('Biochar', old('products_of_interest')) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="biochar">Biochar</label>
                                    </div>
                                    @error('products_of_interest')
                                        <div class="invalid-feedback d-block">
                                            <i class="fas fa-exclamation-circle me-1"></i>
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3 position-relative form-group-custom">
                                    <label for="years_in_operation_buyer" class="form-label visually-hidden">Years in
                                        Operation</label>
                                    <i class="fas fa-calendar-alt icon-left"></i>
                                    <input id="years_in_operation_buyer" type="number" min="0"
                                        class="form-control form-control-lg @error('years_in_operation_buyer') is-invalid @enderror"
                                        name="years_in_operation_buyer" value="{{ old('years_in_operation_buyer') }}"
                                        placeholder="e.g. 10">
                                    @error('years_in_operation_buyer')
                                        <div class="invalid-feedback d-block">
                                            <i class="fas fa-exclamation-circle me-1"></i>
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3 form-group-custom">
                                    <label for="business_license"
                                        class="form-label">{{ __('Business License (optional)') }}</label>
                                    <input type="file"
                                        class="form-control @error('business_license') is-invalid @enderror"
                                        id="business_license" name="business_license" accept="application/pdf,image/*">
                                    <small class="form-text text-muted">PDF or Image (Max 2MB)</small>
                                    @error('business_license')
                                        <div class="invalid-feedback d-block">
                                            <i class="fas fa-exclamation-circle me-1"></i>
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3 position-relative form-group-custom">
                                    <label for="contact_person_name_buyer" class="form-label visually-hidden">Contact
                                        Person Name</label>
                                    <i class="fas fa-user-tie icon-left"></i>
                                    <input id="contact_person_name_buyer" type="text"
                                        class="form-control form-control-lg @error('contact_person_name_buyer') is-invalid @enderror"
                                        name="contact_person_name_buyer" value="{{ old('contact_person_name_buyer') }}"
                                        placeholder="e.g. Mr. Tanaka">
                                    @error('contact_person_name_buyer')
                                        <div class="invalid-feedback d-block">
                                            <i class="fas fa-exclamation-circle me-1"></i>
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3 position-relative form-group-custom">
                                    <label for="contact_person_email_buyer" class="form-label visually-hidden">Contact
                                        Person Email</label>
                                    <i class="fas fa-at icon-left"></i>
                                    <input id="contact_person_email_buyer" type="email"
                                        class="form-control form-control-lg @error('contact_person_email_buyer') is-invalid @enderror"
                                        name="contact_person_email_buyer" value="{{ old('contact_person_email_buyer') }}"
                                        placeholder="e.g. tanaka@greenenergy.co.jp">
                                    @error('contact_person_email_buyer')
                                        <div class="invalid-feedback d-block">
                                            <i class="fas fa-exclamation-circle me-1"></i>
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3 position-relative form-group-custom">
                                    <label for="contact_person_phone_buyer" class="form-label visually-hidden">Contact
                                        Person Phone Number</label>
                                    <i class="fas fa-phone icon-left"></i>
                                    <input id="contact_person_phone_buyer" type="text"
                                        class="form-control form-control-lg @error('contact_person_phone_buyer') is-invalid @enderror"
                                        name="contact_person_phone_buyer" value="{{ old('contact_person_phone_buyer') }}"
                                        placeholder="e.g. +81 90 1234 5678">
                                    @error('contact_person_phone_buyer')
                                        <div class="invalid-feedback d-block">
                                            <i class="fas fa-exclamation-circle me-1"></i>
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3 form-group-custom">
                                    <label for="additional_notes_buyer"
                                        class="form-label">{{ __('Additional Notes (optional)') }}</label>
                                    <textarea class="form-control @error('additional_notes_buyer') is-invalid @enderror" id="additional_notes_buyer"
                                        name="additional_notes_buyer" rows="3" placeholder="e.g. We require GGL-certified PKS only">{{ old('additional_notes_buyer') }}</textarea>
                                    @error('additional_notes_buyer')
                                        <div class="invalid-feedback d-block">
                                            <i class="fas fa-exclamation-circle me-1"></i>
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3 form-group-custom">
                                    <label for="company_logo"
                                        class="form-label">{{ __('Upload Company Logo (optional)') }}</label>
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
                                        class="form-label">{{ __('Upload Previous Purchase Records (optional)') }}</label>
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

                            <div id="supplier-fields" style="display: none;">
                                <h5 class="mt-4 mb-3">Supplier Details</h5>
                                {{--
                                    | SUPPLIER FIELD: Factory Name
                                    | This field is for the name of the supplier's mill factory.
                                    | Corresponds to 'Factory Name' in the provided supplier profile.
                                --}}
                                <div class="mb-3 position-relative form-group-custom">
                                    <label for="factory_name_supplier" class="form-label visually-hidden">Factory
                                        Name</label>
                                    <i class="fas fa-industry icon-left"></i>
                                    <input id="factory_name_supplier" type="text"
                                        class="form-control form-control-lg @error('factory_name_supplier') is-invalid @enderror"
                                        name="factory_name_supplier" value="{{ old('factory_name_supplier') }}"
                                        placeholder="Your Factory Name (Supplier)">
                                    @error('factory_name_supplier')
                                        <div class="invalid-feedback d-block">
                                            <i class="fas fa-exclamation-circle me-1"></i>
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>

                                {{--
                                    | SUPPLIER FIELD: Region
                                    | Specifies the geographical region of the supplier's factory.
                                    | Corresponds to 'Region' in the provided supplier profile.
                                --}}
                                <div class="mb-3 position-relative form-group-custom">
                                    <label for="region_supplier" class="form-label visually-hidden">Region</label>
                                    <i class="fas fa-map-marker-alt icon-left"></i>
                                    <input id="region_supplier" type="text"
                                        class="form-control form-control-lg @error('region_supplier') is-invalid @enderror"
                                        name="region_supplier" value="{{ old('region_supplier') }}"
                                        placeholder="e.g. North Sumatra / Medan">
                                    @error('region_supplier')
                                        <div class="invalid-feedback d-block">
                                            <i class="fas fa-exclamation-circle me-1"></i>
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>

                                {{--
                                    | SUPPLIER FIELD: Annual Production Volume (tons)
                                    | The total annual production capacity of PKS in tons.
                                    | Corresponds to 'Annual Production Volume (tons)' in the provided supplier profile.
                                --}}
                                <div class="mb-3 position-relative form-group-custom">
                                    <label for="annual_production_volume" class="form-label visually-hidden">Annual
                                        Production Volume (tons)</label>
                                    <i class="fas fa-boxes icon-left"></i>
                                    <input id="annual_production_volume" type="number" min="0"
                                        class="form-control form-control-lg @error('annual_production_volume') is-invalid @enderror"
                                        name="annual_production_volume" value="{{ old('annual_production_volume') }}"
                                        placeholder="e.g. 6000">
                                    @error('annual_production_volume')
                                        <div class="invalid-feedback d-block">
                                            <i class="fas fa-exclamation-circle me-1"></i>
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>

                                {{--
                                    | SUPPLIER FIELD: Monthly Available Volume (tons)
                                    | The amount of PKS the supplier can provide monthly.
                                    | Corresponds to 'Monthly Available Volume (tons)' in the provided supplier profile.
                                --}}
                                <div class="mb-3 position-relative form-group-custom">
                                    <label for="monthly_available_volume" class="form-label visually-hidden">Monthly
                                        Available Volume (tons)</label>
                                    <i class="fas fa-box-open icon-left"></i>
                                    <input id="monthly_available_volume" type="number" min="0"
                                        class="form-control form-control-lg @error('monthly_available_volume') is-invalid @enderror"
                                        name="monthly_available_volume" value="{{ old('monthly_available_volume') }}"
                                        placeholder="e.g. 500">
                                    @error('monthly_available_volume')
                                        <div class="invalid-feedback d-block">
                                            <i class="fas fa-exclamation-circle me-1"></i>
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>

                                {{--
                                    | SUPPLIER FIELD: Dura (%)
                                    | Percentage of Dura palm kernel shells in their supply.
                                    | Corresponds to 'Dura (%)' in the provided supplier profile.
                                --}}
                                <div class="mb-3 position-relative form-group-custom">
                                    <label for="dura_percentage" class="form-label visually-hidden">Dura (%)</label>
                                    <i class="fas fa-percentage icon-left"></i>
                                    <input id="dura_percentage" type="number" step="0.01" min="0"
                                        max="100"
                                        class="form-control form-control-lg @error('dura_percentage') is-invalid @enderror"
                                        name="dura_percentage" value="{{ old('dura_percentage') }}"
                                        placeholder="Dura (%) e.g. 30">
                                    @error('dura_percentage')
                                        <div class="invalid-feedback d-block">
                                            <i class="fas fa-exclamation-circle me-1"></i>
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>

                                {{--
                                    | SUPPLIER FIELD: Tenera (%)
                                    | Percentage of Tenera palm kernel shells in their supply.
                                    | Corresponds to 'Tenera (%)' in the provided supplier profile.
                                --}}
                                <div class="mb-3 position-relative form-group-custom">
                                    <label for="tenera_percentage" class="form-label visually-hidden">Tenera (%)</label>
                                    <i class="fas fa-percentage icon-left"></i>
                                    <input id="tenera_percentage" type="number" step="0.01" min="0"
                                        max="100"
                                        class="form-control form-control-lg @error('tenera_percentage') is-invalid @enderror"
                                        name="tenera_percentage" value="{{ old('tenera_percentage') }}"
                                        placeholder="Tenera (%) e.g. 60">
                                    @error('tenera_percentage')
                                        <div class="invalid-feedback d-block">
                                            <i class="fas fa-exclamation-circle me-1"></i>
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>

                                {{--
                                    | SUPPLIER FIELD: Pisifera (%)
                                    | Percentage of Pisifera palm kernel shells in their supply.
                                    | Corresponds to 'Pisifera (%)' in the provided supplier profile.
                                --}}
                                <div class="mb-3 position-relative form-group-custom">
                                    <label for="pisifera_percentage" class="form-label visually-hidden">Pisifera
                                        (%)</label>
                                    <i class="fas fa-percentage icon-left"></i>
                                    <input id="pisifera_percentage" type="number" step="0.01" min="0"
                                        max="100"
                                        class="form-control form-control-lg @error('pisifera_percentage') is-invalid @enderror"
                                        name="pisifera_percentage" value="{{ old('pisifera_percentage') }}"
                                        placeholder="Pisifera (%) e.g. 10">
                                    @error('pisifera_percentage')
                                        <div class="invalid-feedback d-block">
                                            <i class="fas fa-exclamation-circle me-1"></i>
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>

                                {{--
                                    | SUPPLIER FIELD: Sales Record (past 1 year, tons)
                                    | The total sales volume of PKS in the past year.
                                    | Corresponds to 'Sales Record (past 1 year, tons)' in the provided supplier profile.
                                --}}
                                <div class="mb-3 position-relative form-group-custom">
                                    <label for="sales_record_past_1_year" class="form-label visually-hidden">Sales
                                        Record (past 1 year, tons)</label>
                                    <i class="fas fa-chart-line icon-left"></i>
                                    <input id="sales_record_past_1_year" type="number" min="0"
                                        class="form-control form-control-lg @error('sales_record_past_1_year') is-invalid @enderror"
                                        name="sales_record_past_1_year" value="{{ old('sales_record_past_1_year') }}"
                                        placeholder="e.g. 20000">
                                    @error('sales_record_past_1_year')
                                        <div class="invalid-feedback d-block">
                                            <i class="fas fa-exclamation-circle me-1"></i>
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>

                                {{--
                                    | SUPPLIER FIELD: Desired Selling Price (USD/ton)
                                    | The preferred selling price per ton of PKS.
                                    | Corresponds to 'Desired Selling Price (USD/ton)' in the provided supplier profile.
                                --}}
                                <div class="mb-3 position-relative form-group-custom">
                                    <label for="desired_selling_price" class="form-label visually-hidden">Desired
                                        Selling Price (USD/ton)</label>
                                    <i class="fas fa-dollar-sign icon-left"></i>
                                    <input id="desired_selling_price" type="number" step="0.01" min="0"
                                        class="form-control form-control-lg @error('desired_selling_price') is-invalid @enderror"
                                        name="desired_selling_price" value="{{ old('desired_selling_price') }}"
                                        placeholder="e.g. 120 FOB">
                                    @error('desired_selling_price')
                                        <div class="invalid-feedback d-block">
                                            <i class="fas fa-exclamation-circle me-1"></i>
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>

                                {{--
                                    | SUPPLIER FIELD: Minimum Order Quantity (tons)
                                    | The smallest volume of PKS the supplier is willing to sell in a single order.
                                    | Corresponds to 'Minimum Order Quantity (tons)' in the provided supplier profile.
                                --}}
                                <div class="mb-3 position-relative form-group-custom">
                                    <label for="minimum_order_quantity" class="form-label visually-hidden">Minimum
                                        Order Quantity (tons)</label>
                                    <i class="fas fa-sort-amount-down-alt icon-left"></i>
                                    <input id="minimum_order_quantity" type="number" min="0"
                                        class="form-control form-control-lg @error('minimum_order_quantity') is-invalid @enderror"
                                        name="minimum_order_quantity" value="{{ old('minimum_order_quantity') }}"
                                        placeholder="e.g. 100">
                                    @error('minimum_order_quantity')
                                        <div class="invalid-feedback d-block">
                                            <i class="fas fa-exclamation-circle me-1"></i>
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>

                                {{--
                                    | SUPPLIER FIELD: Years in Operation
                                    | The number of years the supplier's factory has been operating.
                                    | Corresponds to 'Years in Operation' in the provided supplier profile.
                                --}}
                                <div class="mb-3 position-relative form-group-custom">
                                    <label for="years_in_operation_supplier" class="form-label visually-hidden">Years in
                                        Operation</label>
                                    <i class="fas fa-calendar-alt icon-left"></i>
                                    <input id="years_in_operation_supplier" type="number" min="0"
                                        class="form-control form-control-lg @error('years_in_operation_supplier') is-invalid @enderror"
                                        name="years_in_operation_supplier"
                                        value="{{ old('years_in_operation_supplier') }}" placeholder="e.g. 8">
                                    @error('years_in_operation_supplier')
                                        <div class="invalid-feedback d-block">
                                            <i class="fas fa-exclamation-circle me-1"></i>
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>

                                {{--
                                    | SUPPLIER FIELD: Contact Person Name
                                    | The name of the primary contact person for the supplier.
                                    | Corresponds to 'Contact Person' in the provided supplier profile.
                                --}}
                                <div class="mb-3 position-relative form-group-custom">
                                    <label for="contact_person_supplier" class="form-label visually-hidden">Contact
                                        Person</label>
                                    <i class="fas fa-user-tie icon-left"></i>
                                    <input id="contact_person_supplier" type="text"
                                        class="form-control form-control-lg @error('contact_person_supplier') is-invalid @enderror"
                                        name="contact_person_supplier" value="{{ old('contact_person_supplier') }}"
                                        placeholder="e.g. Mr. Andi">
                                    @error('contact_person_supplier')
                                        <div class="invalid-feedback d-block">
                                            <i class="fas fa-exclamation-circle me-1"></i>
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3 position-relative form-group-custom">
                                    <label for="email_supplier" class="form-label visually-hidden">Contact Person
                                        Email</label>
                                    <i class="fas fa-at icon-left"></i>
                                    <input id="email_supplier" type="email"
                                        class="form-control form-control-lg @error('email_supplier') is-invalid @enderror"
                                        name="email_supplier" value="{{ old('email_supplier') }}"
                                        placeholder="e.g. andi@millfactory.com">
                                    @error('email_supplier')
                                        <div class="invalid-feedback d-block">
                                            <i class="fas fa-exclamation-circle me-1"></i>
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3 position-relative form-group-custom">
                                    <label for="phone_supplier" class="form-label visually-hidden">Contact Person
                                        Phone</label>
                                    <i class="fas fa-phone icon-left"></i>
                                    <input id="phone_supplier" type="text"
                                        class="form-control form-control-lg @error('phone_supplier') is-invalid @enderror"
                                        name="phone_supplier" value="{{ old('phone_supplier') }}"
                                        placeholder="e.g. +62 812 3456 789">
                                    @error('phone_supplier')
                                        <div class="invalid-feedback d-block">
                                            <i class="fas fa-exclamation-circle me-1"></i>
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3 form-group-custom">
                                    <label for="factory_warehouse_photos"
                                        class="form-label">{{ __('Factory & Warehouse Photos (up to 5)') }}</label>
                                    <input type="file"
                                        class="form-control @error('factory_warehouse_photos') is-invalid @enderror"
                                        id="factory_warehouse_photos" name="factory_warehouse_photos[]" accept="image/*"
                                        multiple>
                                    <small class="form-text text-muted">Max 5 photos</small>
                                    @error('factory_warehouse_photos')
                                        <div class="invalid-feedback d-block">
                                            <i class="fas fa-exclamation-circle me-1"></i>
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>

                                {{--
                                    | SUPPLIER FIELD: PKS Sample Photos (up to 5)
                                    | Allows the supplier to upload images of their PKS product samples.
                                    | Corresponds to 'PKS Sample Photos' in the provided supplier profile.
                                --}}
                                <div class="mb-3 form-group-custom">
                                    <label for="pks_sample_photos"
                                        class="form-label">{{ __('PKS Sample Photos (up to 5)') }}</label>
                                    <input type="file"
                                        class="form-control @error('pks_sample_photos') is-invalid @enderror"
                                        id="pks_sample_photos" name="pks_sample_photos[]" accept="image/*" multiple>
                                    <small class="form-text text-muted">Max 5 photos</small>
                                    @error('pks_sample_photos')
                                        <div class="invalid-feedback d-block">
                                            <i class="fas fa-exclamation-circle me-1"></i>
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>

                                {{--
                                    | SUPPLIER FIELD: Lab Test Report (PDF)
                                    | Allows the supplier to upload a PDF of their PKS lab test report.
                                    | Corresponds to 'Lab Test Report (PDF)' in the provided supplier profile.
                                --}}
                                <div class="mb-3 form-group-custom">
                                    <label for="lab_test_report"
                                        class="form-label">{{ __('Lab Test Report (PDF)') }}</label>
                                    <input type="file"
                                        class="form-control @error('lab_test_report') is-invalid @enderror"
                                        id="lab_test_report" name="lab_test_report" accept="application/pdf">
                                    <small class="form-text text-muted">PDF files only</small>
                                    @error('lab_test_report')
                                        <div class="invalid-feedback d-block">
                                            <i class="fas fa-exclamation-circle me-1"></i>
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>

                                {{--
                                    | SUPPLIER FIELD: Notes (optional)
                                    | An optional text area for any additional notes or information from the supplier.
                                    | Corresponds to 'Notes' in the provided supplier profile.
                                --}}
                                <div class="mb-3 form-group-custom">
                                    <label for="notes_supplier" class="form-label">{{ __('Notes (optional)') }}</label>
                                    <textarea class="form-control @error('notes_supplier') is-invalid @enderror" id="notes_supplier"
                                        name="notes_supplier" rows="3" placeholder="e.g. Supply may decrease during rainy season"></textarea>
                                    @error('notes_supplier')
                                        <div class="invalid-feedback d-block">
                                            <i class="fas fa-exclamation-circle me-1"></i>
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            {{-- ---
                            | END: Additional Fields Based on Role
                            --- --}}

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

            // --- START: Logic to show/hide fields based on role ---
            const roleSelect = document.getElementById('role');
            const buyerFields = document.getElementById('buyer-fields');
            const supplierFields = document.getElementById('supplier-fields');

            function toggleRoleFields() {
                if (roleSelect.value === 'buyer') {
                    buyerFields.style.display = 'block';
                    supplierFields.style.display = 'none';
                    // Set required attribute for buyer fields
                    buyerFields.querySelectorAll('input, select, textarea').forEach(field => {
                        // Exclude optional file inputs and notes from 'required'
                        if (field.id !== 'business_license' && field.id !== 'company_logo' && field.id !==
                            'previous_purchase_records' && field.id !== 'additional_notes_buyer') {
                            field.setAttribute('required', 'required');
                        }
                    });
                    supplierFields.querySelectorAll('input, select, textarea').forEach(field => field
                        .removeAttribute('required'));

                } else if (roleSelect.value === 'supplier') {
                    buyerFields.style.display = 'none';
                    supplierFields.style.display = 'block';
                    // Set required attribute for supplier fields
                    supplierFields.querySelectorAll('input, select, textarea').forEach(field => {
                        // Exclude optional file inputs and notes from 'required'
                        if (field.id !== 'factory_warehouse_photos' && field.id !== 'pks_sample_photos' &&
                            field.id !== 'lab_test_report' && field.id !== 'notes_supplier') {
                            field.setAttribute('required', 'required');
                        }
                    });
                    buyerFields.querySelectorAll('input, select, textarea').forEach(field => field.removeAttribute(
                        'required'));

                } else {
                    buyerFields.style.display = 'none';
                    supplierFields.style.display = 'none';
                    // Remove required attribute from all fields if no role is selected
                    buyerFields.querySelectorAll('input, select, textarea').forEach(field => field.removeAttribute(
                        'required'));
                    supplierFields.querySelectorAll('input, select, textarea').forEach(field => field
                        .removeAttribute('required'));
                }
            }

            // Call the function on page load to handle `old()` values (if form submission failed)
            toggleRoleFields();

            // Call the function every time the role selection changes
            roleSelect.addEventListener('change', toggleRoleFields);
        });
    </script>
@endsection
