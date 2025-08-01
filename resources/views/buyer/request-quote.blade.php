@extends('layouts.auth')

@section('content')
    <div class="min-vh-100 bg-light">
        <div class="bg-white border-bottom shadow-sm">
            <div class="container-fluid px-4 py-3">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h1 class="h3 mb-1 text-dark fw-bold">Request Quote</h1>
                        <p class="text-muted mb-0">Get competitive prices from verified suppliers</p>
                    </div>
                    <div>
                        <button class="btn btn-outline-primary me-2">
                            <i class="fas fa-history me-2"></i>Quote History
                        </button>
                        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#newQuoteModal">
                            <i class="fas fa-plus me-2"></i>New Quote Request
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid px-4 py-4">
            <div class="row mb-4">
                <div class="col-md-3 mb-3">
                    <div class="card border-0 shadow-sm"
                        style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                        <div class="card-body text-white">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h6 class="card-title text-white-50">Total Requests</h6>
                                    <h3 class="mb-0">18</h3>
                                </div>
                                <div class="align-self-center">
                                    <i class="fas fa-quote-right fa-2x opacity-75"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="card border-0 shadow-sm"
                        style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);">
                        <div class="card-body text-white">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h6 class="card-title text-white-50">Pending Quotes</h6>
                                    <h3 class="mb-0">5</h3>
                                </div>
                                <div class="align-self-center">
                                    <i class="fas fa-clock fa-2x opacity-75"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="card border-0 shadow-sm"
                        style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);">
                        <div class="card-body text-white">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h6 class="card-title text-white-50">Received Quotes</h6>
                                    <h3 class="mb-0">12</h3>
                                </div>
                                <div class="align-self-center">
                                    <i class="fas fa-file-invoice-dollar fa-2x opacity-75"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="card border-0 shadow-sm"
                        style="background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);">
                        <div class="card-body text-white">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h6 class="card-title text-white-50">Avg. Response Time</h6>
                                    <h3 class="mb-0">24h</h3>
                                </div>
                                <div class="align-self-center">
                                    <i class="fas fa-tachometer-alt fa-2x opacity-75"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-8 mb-4">
                    <div class="card border-0 shadow-sm">
                        <div class="card-header bg-white border-bottom d-flex justify-content-between align-items-center">
                            <h5 class="mb-0 fw-semibold">Active Quote Requests</h5>
                            <div class="d-flex gap-2">
                                <button class="btn btn-sm btn-outline-secondary">
                                    <i class="fas fa-filter me-1"></i>Filter
                                </button>
                                <button class="btn btn-sm btn-outline-secondary">
                                    <i class="fas fa-download me-1"></i>Export
                                </button>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="border-bottom p-4 hover-bg-light">
                                <div class="d-flex justify-content-between align-items-start mb-3">
                                    <div class="d-flex align-items-center">
                                        <div class="bg-primary bg-opacity-10 rounded-circle p-3 me-3">
                                            <i class="fas fa-fire text-primary fa-lg"></i>
                                        </div>
                                        <div>
                                            <h6 class="mb-1 fw-semibold">Premium PKS Charcoal - High Calorific Value</h6>
                                            <p class="text-muted mb-1 small">Request ID: #RFQ-2024-001</p>
                                            <div class="d-flex align-items-center gap-3 text-sm">
                                                <span class="text-muted"><i class="fas fa-weight-hanging me-1"></i>500
                                                    MT</span>
                                                <span class="text-muted"><i class="fas fa-map-marker-alt me-1"></i>Jakarta
                                                    Port</span>
                                                <span class="text-muted"><i class="fas fa-calendar me-1"></i>Jan 20,
                                                    2024</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-end">
                                        <span class="badge bg-warning text-dark px-3 py-2 mb-2">3 Quotes Pending</span>
                                        <div class="text-muted small">Expires in 5 days</div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex gap-2">
                                        <span class="badge bg-success bg-opacity-10 text-success px-3 py-2">
                                            <i class="fas fa-certificate me-1"></i>Verified Suppliers Only
                                        </span>
                                        <span class="badge bg-info bg-opacity-10 text-info px-3 py-2">
                                            <i class="fas fa-shipping-fast me-1"></i>Urgent Delivery
                                        </span>
                                    </div>
                                    <div class="d-flex gap-2">
                                        <button class="btn btn-sm btn-outline-primary">
                                            <i class="fas fa-eye me-1"></i>View Details
                                        </button>
                                        <button class="btn btn-sm btn-primary">
                                            <i class="fas fa-chart-bar me-1"></i>Compare Quotes (3)
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="border-bottom p-4 hover-bg-light">
                                <div class="d-flex justify-content-between align-items-start mb-3">
                                    <div class="d-flex align-items-center">
                                        <div class="bg-success bg-opacity-10 rounded-circle p-3 me-3">
                                            <i class="fas fa-leaf text-success fa-lg"></i>
                                        </div>
                                        <div>
                                            <h6 class="mb-1 fw-semibold">Raw PKS - Bulk Order</h6>
                                            <p class="text-muted mb-1 small">Request ID: #RFQ-2024-002</p>
                                            <div class="d-flex align-items-center gap-3 text-sm">
                                                <span class="text-muted"><i class="fas fa-weight-hanging me-1"></i>1000
                                                    MT</span>
                                                <span class="text-muted"><i class="fas fa-map-marker-alt me-1"></i>Surabaya
                                                    Port</span>
                                                <span class="text-muted"><i class="fas fa-calendar me-1"></i>Jan 18,
                                                    2024</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-end">
                                        <span class="badge bg-success text-white px-3 py-2 mb-2">5 Quotes Received</span>
                                        <div class="text-muted small">Expires in 2 days</div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex gap-2">
                                        <span class="badge bg-primary bg-opacity-10 text-primary px-3 py-2">
                                            <i class="fas fa-star me-1"></i>Premium Quality
                                        </span>
                                        <span class="badge bg-warning bg-opacity-10 text-warning px-3 py-2">
                                            <i class="fas fa-flask me-1"></i>Lab Testing Required
                                        </span>
                                    </div>
                                    <div class="d-flex gap-2">
                                        <button class="btn btn-sm btn-outline-primary">
                                            <i class="fas fa-eye me-1"></i>View Details
                                        </button>
                                        <button class="btn btn-sm btn-success">
                                            <i class="fas fa-check-circle me-1"></i>Select Winner
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="p-4 hover-bg-light">
                                <div class="d-flex justify-content-between align-items-start mb-3">
                                    <div class="d-flex align-items-center">
                                        <div class="bg-warning bg-opacity-10 rounded-circle p-3 me-3">
                                            <i class="fas fa-industry text-warning fa-lg"></i>
                                        </div>
                                        <div>
                                            <h6 class="mb-1 fw-semibold">Industrial Grade PKS Charcoal</h6>
                                            <p class="text-muted mb-1 small">Request ID: #RFQ-2024-003</p>
                                            <div class="d-flex align-items-center gap-3 text-sm">
                                                <span class="text-muted"><i class="fas fa-weight-hanging me-1"></i>250
                                                    MT</span>
                                                <span class="text-muted"><i class="fas fa-map-marker-alt me-1"></i>Medan
                                                    Port</span>
                                                <span class="text-muted"><i class="fas fa-calendar me-1"></i>Jan 22,
                                                    2024</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-end">
                                        <span class="badge bg-secondary text-white px-3 py-2 mb-2">No Quotes Yet</span>
                                        <div class="text-muted small">Expires in 7 days</div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex gap-2">
                                        <span class="badge bg-info bg-opacity-10 text-info px-3 py-2">
                                            <i class="fas fa-clock me-1"></i>Long Term Contract
                                        </span>
                                    </div>
                                    <div class="d-flex gap-2">
                                        <button class="btn btn-sm btn-outline-primary">
                                            <i class="fas fa-edit me-1"></i>Edit Request
                                        </button>
                                        <button class="btn btn-sm btn-outline-warning">
                                            <i class="fas fa-bullhorn me-1"></i>Promote Request
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="card border-0 shadow-sm mb-4">
                        <div class="card-header bg-white border-bottom">
                            <h6 class="mb-0 fw-semibold">Quick Actions</h6>
                        </div>
                        <div class="card-body">
                            <div class="d-grid gap-2">
                                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#newQuoteModal">
                                    <i class="fas fa-plus me-2"></i>New Quote Request
                                </button>
                                <button class="btn btn-outline-primary">
                                    <i class="fas fa-search me-2"></i>Browse Suppliers
                                </button>
                                <button class="btn btn-outline-info">
                                    <i class="fas fa-calculator me-2"></i>Price Calculator
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="card border-0 shadow-sm mb-4">
                        <div class="card-header bg-white border-bottom">
                            <h6 class="mb-0 fw-semibold">Recent Activity</h6>
                        </div>
                        <div class="card-body p-0">
                            <div class="list-group list-group-flush">
                                <div class="list-group-item border-0 px-3 py-3">
                                    <div class="d-flex align-items-start">
                                        <div class="bg-success bg-opacity-10 rounded-circle p-2 me-3">
                                            <i class="fas fa-quote-right text-success"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <p class="mb-1 fw-semibold small">New quote received</p>
                                            <p class="mb-1 text-muted small">PT Sawit Makmur submitted quote for PKS
                                                Charcoal</p>
                                            <span class="text-muted small">2 hours ago</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="list-group-item border-0 px-3 py-3">
                                    <div class="d-flex align-items-start">
                                        <div class="bg-warning bg-opacity-10 rounded-circle p-2 me-3">
                                            <i class="fas fa-clock text-warning"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <p class="mb-1 fw-semibold small">Quote request expiring</p>
                                            <p class="mb-1 text-muted small">RFQ-2024-002 expires in 2 days</p>
                                            <span class="text-muted small">1 day ago</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="list-group-item border-0 px-3 py-3">
                                    <div class="d-flex align-items-start">
                                        <div class="bg-info bg-opacity-10 rounded-circle p-2 me-3">
                                            <i class="fas fa-user-plus text-info"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <p class="mb-1 fw-semibold small">New supplier joined</p>
                                            <p class="mb-1 text-muted small">Green Energy Corp is now available</p>
                                            <span class="text-muted small">3 days ago</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card border-0 shadow-sm">
                        <div class="card-header bg-white border-bottom">
                            <h6 class="mb-0 fw-semibold">💡 Tips for Better Quotes</h6>
                        </div>
                        <div class="card-body">
                            <div class="d-flex align-items-start mb-3">
                                <div class="bg-primary bg-opacity-10 rounded-circle p-2 me-3 flex-shrink-0">
                                    <i class="fas fa-lightbulb text-primary small"></i>
                                </div>
                                <div>
                                    <p class="mb-1 fw-semibold small">Be Specific</p>
                                    <p class="text-muted small mb-0">Include detailed specifications and quality
                                        requirements</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-start mb-3">
                                <div class="bg-success bg-opacity-10 rounded-circle p-2 me-3 flex-shrink-0">
                                    <i class="fas fa-calendar-alt text-success small"></i>
                                </div>
                                <div>
                                    <p class="mb-1 fw-semibold small">Allow Time</p>
                                    <p class="text-muted small mb-0">Give suppliers at least 7-10 days to prepare
                                        quotes</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-start">
                                <div class="bg-warning bg-opacity-10 rounded-circle p-2 me-3 flex-shrink-0">
                                    <i class="fas fa-certificate text-warning small"></i>
                                </div>
                                <div>
                                    <p class="mb-1 fw-semibold small">Verify Suppliers</p>
                                    <p class="text-muted small mb-0">Choose verified suppliers for better
                                        reliability</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="newQuoteModal" tabindex="-1" aria-labelledby="newQuoteModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="newQuoteModalLabel">Create New Quote Request</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="row mb-4">
                                <div class="col-12">
                                    <h6 class="fw-semibold text-primary mb-3">
                                        <i class="fas fa-info-circle me-2"></i>Basic Information
                                    </h6>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="productType" class="form-label fw-semibold">Product Type <span
                                            class="text-danger">*</span></label>
                                    <select class="form-select" id="productType" required>
                                        <option value="">Select Product Type</option>
                                        <option value="pks-charcoal">Premium PKS Charcoal</option>
                                        <option value="raw-pks">Raw PKS (Palm Kernel Shell)</option>
                                        <option value="industrial-pks">Industrial Grade PKS</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="quantityRequired" class="form-label fw-semibold">Quantity Required <span
                                            class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <input type="number" class="form-control" id="quantityRequired"
                                            placeholder="Enter quantity" required>
                                        <span class="input-group-text">MT</span>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-semibold">Target Price Range</label>
                                    <div class="row">
                                        <div class="col-6">
                                            <input type="number" class="form-control" placeholder="Min price (USD)">
                                        </div>
                                        <div class="col-6">
                                            <input type="number" class="form-control" placeholder="Max price (USD)">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="deliveryTimeline" class="form-label fw-semibold">Delivery Timeline <span
                                            class="text-danger">*</span></label>
                                    <select class="form-select" id="deliveryTimeline" required>
                                        <option value="">Select Timeline</option>
                                        <option value="immediate">Immediate (1-2 weeks)</option>
                                        <option value="standard">Standard (3-4 weeks)</option>
                                        <option value="flexible">Flexible (1-2 months)</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-12">
                                    <h6 class="fw-semibold text-primary mb-3">
                                        <i class="fas fa-cogs me-2"></i>Technical Specifications
                                    </h6>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label fw-semibold">Calorific Value (kcal/kg)</label>
                                    <input type="number" class="form-control" placeholder="Minimum required">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label fw-semibold">Moisture Content (%)</label>
                                    <input type="number" class="form-control" placeholder="Maximum allowed">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label fw-semibold">Ash Content (%)</label>
                                    <input type="number" class="form-control" placeholder="Maximum allowed">
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-12">
                                    <h6 class="fw-semibold text-primary mb-3">
                                        <i class="fas fa-shipping-fast me-2"></i>Delivery Information
                                    </h6>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="deliveryPort" class="form-label fw-semibold">Delivery Port/Location
                                        <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="deliveryPort"
                                        placeholder="Enter port or delivery location" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="incoterms" class="form-label fw-semibold">Incoterms</label>
                                    <select class="form-select" id="incoterms">
                                        <option value="">Select Incoterms</option>
                                        <option value="fob">FOB (Free on Board)</option>
                                        <option value="cif">CIF (Cost, Insurance & Freight)</option>
                                        <option value="cfr">CFR (Cost & Freight)</option>
                                        <option value="exw">EXW (Ex Works)</option>
                                    </select>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="deliveryAddress" class="form-label fw-semibold">Complete Delivery
                                        Address</label>
                                    <textarea class="form-control" id="deliveryAddress" rows="3"
                                        placeholder="Enter complete delivery address with contact details"></textarea>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-12">
                                    <h6 class="fw-semibold text-primary mb-3">
                                        <i class="fas fa-clipboard-list me-2"></i>Additional Requirements
                                    </h6>
                                </div>
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="checkbox" id="certifiedSuppliers">
                                                <label class="form-check-label" for="certifiedSuppliers">
                                                    Verified/Certified Suppliers Only
                                                </label>
                                            </div>
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="checkbox" id="labTesting">
                                                <label class="form-check-label" for="labTesting">
                                                    Laboratory Testing Required
                                                </label>
                                            </div>
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="checkbox" id="sampleRequired">
                                                <label class="form-check-label" for="sampleRequired">
                                                    Physical Sample Required
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="checkbox" id="sustainableSourcing">
                                                <label class="form-check-label" for="sustainableSourcing">
                                                    Sustainable Sourcing Certificate
                                                </label>
                                            </div>
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="checkbox" id="longTermContract">
                                                <label class="form-check-label" for="longTermContract">
                                                    Open to Long-term Contract
                                                </label>
                                            </div>
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="checkbox" id="bulkDiscount">
                                                <label class="form-check-label" for="bulkDiscount">
                                                    Bulk Quantity Discount
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 mt-3">
                                    <label for="specialInstructions" class="form-label fw-semibold">Special Instructions
                                        or Notes</label>
                                    <textarea class="form-control" id="specialInstructions" rows="3"
                                        placeholder="Any additional requirements, special handling instructions, or notes for suppliers"></textarea>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <h6 class="fw-semibold text-primary mb-3">
                                        <i class="fas fa-clock me-2"></i>Quote Settings
                                    </h6>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="quoteValidity" class="form-label fw-semibold">Quote Validity
                                        Period</label>
                                    <select class="form-select" id="quoteValidity">
                                        <option value="7">7 days</option>
                                        <option value="14" selected>14 days</option>
                                        <option value="21">21 days</option>
                                        <option value="30">30 days</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="maxQuotes" class="form-label fw-semibold">Maximum Number of
                                        Quotes</label>
                                    <select class="form-select" id="maxQuotes">
                                        <option value="5">5 quotes</option>
                                        <option value="10" selected>10 quotes</option>
                                        <option value="15">15 quotes</option>
                                        <option value="unlimited">Unlimited</option>
                                    </select>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-outline-primary">Save as Draft</button>
                        <button type="button" class="btn btn-success">Publish Quote Request</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <style>
        .hover-bg-light:hover {
            background-color: #f8f9fa !important;
            transition: background-color 0.2s ease;
        }

        .card {
            border-radius: 12px;
        }

        .btn {
            border-radius: 8px;
        }

        .badge {
            border-radius: 20px;
            font-weight: 500;
        }

        /* Use Bootstrap's built-in variables for gradients if defined, otherwise keep custom */
        .bg-gradient {
            background: linear-gradient(135deg, var(--bs-primary, #007bff) 0%, var(--bs-info, #17a2b8) 100%);
            /* Default if --bs-primary/--bs-info not set */
        }

        /* Specific gradients from your original code, applying directly for the cards */
        .card:nth-child(1) .bg-gradient {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%) !important;
        }

        .card:nth-child(2) .bg-gradient {
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%) !important;
        }

        .card:nth-child(3) .bg-gradient {
            background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%) !important;
        }

        .card:nth-child(4) .bg-gradient {
            background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%) !important;
        }


        .list-group-item {
            transition: background-color 0.2s ease;
        }

        .list-group-item:hover {
            background-color: #f8f9fa;
        }

        .modal-xl {
            max-width: 1200px;
        }

        .form-check-input:checked {
            background-color: var(--bs-success);
            border-color: var(--bs-success);
        }
    </style>
@endpush
