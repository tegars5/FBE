<!DOCTYPE html>
<html lang="en">
<x-layout.head title="Edit Supplier" :styles="false" />

<body>
    <x-dashboard.sidebar />

    <div class="main-content">
        <header class="header">
            <button class="menu-toggle" id="dashboard-toggle"><i class="fas fa-bars"></i></button>
            <h1 class="page-title">Edit Supplier</h1>
            <div class="header-actions">
                <a href="{{ route('admin.suppliers.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Back to All Suppliers
                </a>
            </div>
        </header>

        <div class="content">
            <div class="form-card">
                <div class="form-header">
                    <h2>Edit Supplier: {{ $supplier->user->name ?? '' }}</h2>
                </div>
                <div class="form-body">
                    <form action="{{ route('admin.suppliers.update', $supplier->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        {{-- Form Group for Company/User Name --}}
                        <div class="form-group">
                            <label for="name" class="form-label">Company / User Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                id="name" name="name" value="{{ old('name', $supplier->user->name) }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Form Group for Contact Person --}}
                        <div class="form-group">
                            <label for="contact_name" class="form-label">Contact Person</label>
                            <input type="text" class="form-control @error('contact_name') is-invalid @enderror"
                                id="contact_name" name="contact_name"
                                value="{{ old('contact_name', $supplier->contact_name) }}" required>
                            @error('contact_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Form Group for Region --}}
                        <div class="form-group">
                            <label for="region" class="form-label">Region</label>
                            <input type="text" class="form-control @error('region') is-invalid @enderror"
                                id="region" name="region" value="{{ old('region', $supplier->region) }}" required>
                            @error('region')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Form Group for Monthly Capacity --}}
                        <div class="form-group">
                            <label for="monthly_capacity" class="form-label">Monthly Capacity (tons)</label>
                            <input type="number" step="0.01"
                                class="form-control @error('monthly_capacity') is-invalid @enderror"
                                id="monthly_capacity" name="monthly_capacity"
                                value="{{ old('monthly_capacity', $supplier->monthly_capacity) }}" required>
                            @error('monthly_capacity')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Add other fields from the supplier model here if you want them to be editable --}}

                        <div class="form-buttons">
                            <a href="{{ route('admin.suppliers.index') }}" class="btn btn-secondary">Cancel</a>
                            <button type="submit" class="btn btn-primary">Update Supplier</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <footer class="footer">
            <p>&copy; {{ date('Y') }} FujiyamaBiomassEnergy. All rights reserved.</p>
        </footer>
    </div>
</body>

</html>
