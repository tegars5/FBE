@extends('layouts.app') {{-- Gunakan layout utama aplikasi Anda --}}

@section('content')
    <div class="container py-5">
        <h1 class="mb-4">Buyer Dashboard</h1>
        <hr>

        {{-- Welcome Section --}}
        <div class="card mb-4">
            <div class="card-body">
                <h2 class="card-title">Welcome, {{ Auth::user()->name }}!</h2>
                <p class="card-text">You can browse suppliers, submit purchase inquiries, and manage your orders.</p>
            </div>
        </div>

        {{-- Buyer Profile --}}
        @if ($buyer)
            <div class="card mb-4">
                <div class="card-header">
                    <h3>Your Profile</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th>Company Name</th>
                                <td>{{ $buyer->company_name }}</td>
                                <td><a href="#" class="btn btn-sm btn-info">[Edit]</a></td>
                            </tr>
                            <tr>
                                <th>Country</th>
                                <td>{{ $buyer->country_region }}</td>
                                <td><a href="#" class="btn btn-sm btn-info">[Edit]</a></td>
                            </tr>
                            <tr>
                                <th>Monthly Purchase Volume</th>
                                <td>{{ $buyer->monthly_purchase_volume ?? 'N/A' }} tons</td>
                                <td><a href="#" class="btn btn-sm btn-info">[Edit]</a></td>
                            </tr>
                            <tr>
                                <th>Preferred Price</th>
                                <td>{{ $buyer->target_price ? $buyer->target_price . ' USD/ton' : 'N/A' }}</td>
                                <td><a href="#" class="btn btn-sm btn-info">[Edit]</a></td>
                            </tr>
                            <tr>
                                <th>Products of Interest</th>
                                <td>{{ $buyer->products_of_interest ? implode(', ', $buyer->products_of_interest) : 'N/A' }}
                                </td>
                                <td><a href="#" class="btn btn-sm btn-info">[Edit]</a></td>
                            </tr>
                            <tr>
                                <th>Years in Operation</th>
                                <td>{{ $buyer->years_in_operation ?? 'N/A' }}</td>
                                <td><a href="#" class="btn btn-sm btn-info">[Edit]</a></td>
                            </tr>
                            <tr>
                                <th>Contact Person Name</th>
                                <td>{{ $buyer->contact_person_name }}</td>
                                <td><a href="#" class="btn btn-sm btn-info">[Edit]</a></td>
                            </tr>
                            <tr>
                                <th>Contact Person Email</th>
                                <td>{{ $buyer->contact_person_email }}</td>
                                <td><a href="#" class="btn btn-sm btn-info">[Edit]</a></td>
                            </tr>
                            <tr>
                                <th>Contact Person Phone</th>
                                <td>{{ $buyer->contact_person_phone_number ?? 'N/A' }}</td>
                                <td><a href="#" class="btn btn-sm btn-info">[Edit]</a></td>
                            </tr>
                            <tr>
                                <th>Additional Notes</th>
                                <td>{{ $buyer->additional_notes ?? 'N/A' }}</td>
                                <td><a href="#" class="btn btn-sm btn-info">[Edit]</a></td>
                            </tr>
                            @if ($buyer->business_license)
                                <tr>
                                    <th>Business License</th>
                                    <td><a href="{{ asset('storage/' . $buyer->business_license) }}" target="_blank">View
                                            Document</a></td>
                                    <td><a href="#" class="btn btn-sm btn-info">[Change]</a></td>
                                </tr>
                            @endif
                            @if ($buyer->company_logo)
                                <tr>
                                    <th>Company Logo</th>
                                    <td><img src="{{ asset('storage/' . $buyer->company_logo) }}" alt="Company Logo"
                                            style="max-height: 50px;"></td>
                                    <td><a href="#" class="btn btn-sm btn-info">[Change]</a></td>
                                </tr>
                            @endif
                            @if ($buyer->previous_purchase_records)
                                <tr>
                                    <th>Previous Purchase Records</th>
                                    <td><a href="{{ asset('storage/' . $buyer->previous_purchase_records) }}"
                                            target="_blank">View Document</a></td>
                                    <td><a href="#" class="btn btn-sm btn-info">[Change]</a></td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                    <div class="text-end">
                        <button class="btn btn-primary">[ Update Profile ]</button>
                    </div>
                </div>
            </div>
        @else
            <div class="alert alert-warning">
                Data profil buyer Anda belum lengkap atau belum terhubung. Silakan hubungi admin.
            </div>
        @endif

        {{-- ... (Bagian dashboard lainnya sesuai revisi bos) ... --}}
        <div class="row">
            <div class="col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-header">
                        <h3>Available Suppliers</h3>
                    </div>
                    <div class="card-body">
                        <p>Temukan pemasok PKS terkemuka.</p>
                        <div class="d-grid gap-2">
                            <a href="#" class="btn btn-outline-success">[View Mill Factories]</a>
                            <a href="#" class="btn btn-outline-success">[View Collectors]</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-header">
                        <h3>Purchase Requests</h3>
                    </div>
                    <div class="card-body">
                        <p>Kelola permintaan pembelian Anda.</p>
                        <ul class="list-group list-group-flush mb-3">
                            <li class="list-group-item"><a href="#" class="text-decoration-none">Create Purchase
                                    Request (e.g. 500 tons PKS FOB Dumai)</a></li>
                            <li class="list-group-item"><a href="#" class="text-decoration-none">View Pending
                                    Requests</a></li>
                            <li class="list-group-item"><a href="#" class="text-decoration-none">Track Order
                                    Status</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-header">
                        <h3>Messages</h3>
                    </div>
                    <div class="card-body">
                        <p>Komunikasi langsung dengan tim penjualan FBE.</p>
                        <a href="#" class="btn btn-outline-secondary">[Direct messaging with FBE Sales Team]</a>
                    </div>
                </div>
            </div>

            <div class="col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-header">
                        <h3>Quick Actions</h3>
                    </div>
                    <div class="card-body">
                        <div class="d-grid gap-2">
                            <a href="#" class="btn btn-primary">[Post Purchase Request]</a>
                            <a href="mailto:sales@fujiyama-biomass.com" class="btn btn-info">[Contact FBE]</a>
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                class="btn btn-danger">[Log Out]</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
