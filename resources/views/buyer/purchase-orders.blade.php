@extends('layouts.auth')

@section('content')
    <div class="min-vh-100 bg-light">
        <div class="bg-white border-bottom shadow-sm">
            <div class="container-fluid px-4 py-3">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h1 class="h3 mb-1 text-dark fw-bold">Purchase Orders</h1>
                        <p class="text-muted mb-0">Manage and track your biomass orders</p>
                    </div>
                    <button class="btn btn-success btn-lg" data-bs-toggle="modal" data-bs-target="#newOrderModal">
                        <i class="fas fa-plus me-2"></i>New Order
                    </button>
                </div>
            </div>
        </div>

        <div class="container-fluid px-4 py-4">
            <div class="row mb-4">
                <div class="col-md-3 mb-3">
                    <div class="card border-0 shadow-sm bg-primary text-white">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h6 class="card-title text-white-50">Total Orders</h6>
                                    <h3 class="mb-0">24</h3>
                                </div>
                                <div class="align-self-center">
                                    <i class="fas fa-shopping-cart fa-2x opacity-75"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="card border-0 shadow-sm bg-warning text-white">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h6 class="card-title text-white-50">Pending</h6>
                                    <h3 class="mb-0">8</h3>
                                </div>
                                <div class="align-self-center">
                                    <i class="fas fa-clock fa-2x opacity-75"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="card border-0 shadow-sm bg-success text-white">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h6 class="card-title text-white-50">Completed</h6>
                                    <h3 class="mb-0">14</h3>
                                </div>
                                <div class="align-self-center">
                                    <i class="fas fa-check-circle fa-2x opacity-75"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="card border-0 shadow-sm bg-info text-white">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h6 class="card-title text-white-50">In Transit</h6>
                                    <h3 class="mb-0">2</h3>
                                </div>
                                <div class="align-self-center">
                                    <i class="fas fa-truck fa-2x opacity-75"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card border-0 shadow-sm mb-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="searchOrders" class="form-label fw-semibold">Search Orders</label>
                            <div class="position-relative">
                                <i
                                    class="fas fa-search position-absolute top-50 start-0 translate-middle-y ms-3 text-muted"></i>
                                <input type="text" class="form-control ps-5" id="searchOrders"
                                    placeholder="Search by order ID, supplier...">
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="orderStatus" class="form-label fw-semibold">Status</label>
                            <select class="form-select" id="orderStatus">
                                <option value="">All Status</option>
                                <option value="pending">Pending</option>
                                <option value="confirmed">Confirmed</option>
                                <option value="in-transit">In Transit</option>
                                <option value="delivered">Delivered</option>
                                <option value="cancelled">Cancelled</option>
                            </select>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="dateRange" class="form-label fw-semibold">Date Range</label>
                            <input type="date" class="form-control" id="dateRange">
                        </div>
                        <div class="col-md-2 mb-3">
                            <label class="form-label fw-semibold">&nbsp;</label>
                            <button class="btn btn-outline-primary w-100">
                                <i class="fas fa-filter me-1"></i>Filter
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white border-bottom">
                    <h5 class="mb-0 fw-semibold">Recent Purchase Orders</h5>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead class="bg-light">
                                <tr>
                                    <th class="px-4 py-3 fw-semibold text-muted">Order ID</th>
                                    <th class="px-4 py-3 fw-semibold text-muted">Supplier</th>
                                    <th class="px-4 py-3 fw-semibold text-muted">Product</th>
                                    <th class="px-4 py-3 fw-semibold text-muted">Quantity</th>
                                    <th class="px-4 py-3 fw-semibold text-muted">Total Price</th>
                                    <th class="px-4 py-3 fw-semibold text-muted">Status</th>
                                    <th class="px-4 py-3 fw-semibold text-muted">Date</th>
                                    <th class="px-4 py-3 fw-semibold text-muted">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="px-4 py-3">
                                        <span class="fw-semibold text-primary">#PO-2024-001</span>
                                    </td>
                                    <td class="px-4 py-3">
                                        <div class="d-flex align-items-center">
                                            <div
                                                class="avatar-sm bg-success rounded-circle d-flex align-items-center justify-content-center me-2">
                                                <i class="fas fa-industry text-white"></i>
                                            </div>
                                            <div>
                                                <div class="fw-semibold">PT Sawit Makmur</div>
                                                <small class="text-muted">Verified Supplier</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-4 py-3">
                                        <div>
                                            <div class="fw-semibold">Premium PKS Charcoal</div>
                                            <small class="text-muted">High Grade</small>
                                        </div>
                                    </td>
                                    <td class="px-4 py-3">
                                        <span class="fw-semibold">500 MT</span>
                                    </td>
                                    <td class="px-4 py-3">
                                        <span class="fw-semibold text-success">$45,000</span>
                                    </td>
                                    <td class="px-4 py-3">
                                        <span class="badge bg-warning text-dark px-3 py-2">Pending</span>
                                    </td>
                                    <td class="px-4 py-3">
                                        <span class="text-muted">Jan 15, 2024</span>
                                    </td>
                                    <td class="px-4 py-3">
                                        <div class="dropdown">
                                            <button class="btn btn-sm btn-outline-secondary dropdown-toggle"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                Actions
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="#"><i
                                                            class="fas fa-eye me-2"></i>View Details</a></li>
                                                <li><a class="dropdown-item" href="#"><i
                                                            class="fas fa-edit me-2"></i>Edit Order</a></li>
                                                <li><a class="dropdown-item text-danger" href="#"><i
                                                            class="fas fa-times me-2"></i>Cancel Order</a></li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-4 py-3">
                                        <span class="fw-semibold text-primary">#PO-2024-002</span>
                                    </td>
                                    <td class="px-4 py-3">
                                        <div class="d-flex align-items-center">
                                            <div
                                                class="avatar-sm bg-primary rounded-circle d-flex align-items-center justify-content-center me-2">
                                                <i class="fas fa-leaf text-white"></i>
                                            </div>
                                            <div>
                                                <div class="fw-semibold">Green Energy Corp</div>
                                                <small class="text-muted">Premium Partner</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-4 py-3">
                                        <div>
                                            <div class="fw-semibold">Raw PKS</div>
                                            <small class="text-muted">Standard Grade</small>
                                        </div>
                                    </td>
                                    <td class="px-4 py-3">
                                        <span class="fw-semibold">1000 MT</span>
                                    </td>
                                    <td class="px-4 py-3">
                                        <span class="fw-semibold text-success">$75,000</span>
                                    </td>
                                    <td class="px-4 py-3">
                                        <span class="badge bg-info text-white px-3 py-2">In Transit</span>
                                    </td>
                                    <td class="px-4 py-3">
                                        <span class="text-muted">Jan 12, 2024</span>
                                    </td>
                                    <td class="px-4 py-3">
                                        <div class="dropdown">
                                            <button class="btn btn-sm btn-outline-secondary dropdown-toggle"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                Actions
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="#"><i
                                                            class="fas fa-eye me-2"></i>Track Shipment</a></li>
                                                <li><a class="dropdown-item" href="#"><i
                                                            class="fas fa-download me-2"></i>Download Invoice</a></li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-between align-items-center mt-4">
                <p class="text-muted mb-0">Showing 1-10 of 24 orders</p>
                <nav aria-label="Order pagination">
                    <ul class="pagination mb-0">
                        <li class="page-item disabled">
                            <span class="page-link">Previous</span>
                        </li>
                        <li class="page-item active">
                            <span class="page-link">1</span>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">2</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">3</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">Next</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>

    <div class="modal fade" id="newOrderModal" tabindex="-1" aria-labelledby="newOrderModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newOrderModalLabel">Create New Purchase Order</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="supplierSelect" class="form-label fw-semibold">Supplier</label>
                                <select class="form-select" id="supplierSelect" required>
                                    <option value="">Select Supplier</option>
                                    <option value="1">PT Sawit Makmur</option>
                                    <option value="2">Green Energy Corp</option>
                                    <option value="3">Bio Energy Solutions</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="productTypeSelect" class="form-label fw-semibold">Product Type</label>
                                <select class="form-select" id="productTypeSelect" required>
                                    <option value="">Select Product</option>
                                    <option value="pks-charcoal">Premium PKS Charcoal</option>
                                    <option value="raw-pks">Raw PKS</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="quantityInput" class="form-label fw-semibold">Quantity (MT)</label>
                                <input type="number" class="form-control" id="quantityInput"
                                    placeholder="Enter quantity" required>
                            </div>
                            <div class="col-md-6">
                                <label for="expectedPriceInput" class="form-label fw-semibold">Expected Price
                                    (USD)</label>
                                <input type="number" class="form-control" id="expectedPriceInput"
                                    placeholder="Enter expected price" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="deliveryAddressTextarea" class="form-label fw-semibold">Delivery Address</label>
                            <textarea class="form-control" id="deliveryAddressTextarea" rows="3" placeholder="Enter delivery address"
                                required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="additionalNotesTextarea" class="form-label fw-semibold">Additional Notes</label>
                            <textarea class="form-control" id="additionalNotesTextarea" rows="2"
                                placeholder="Any special requirements or notes"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-success">Create Order</button>
                </div>
            </div>
        </div>
    </div>
@endsection

{{-- Pushing custom styles to the 'styles' stack defined in layouts.auth --}}
@push('styles')
    <style>
        .avatar-sm {
            width: 40px;
            height: 40px;
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

        .table th {
            border-top: none;
            font-size: 0.875rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .table td {
            vertical-align: middle;
            border-color: #f0f0f0;
        }

        .table-hover tbody tr:hover {
            background-color: #f8f9fa;
        }
    </style>
@endpush
