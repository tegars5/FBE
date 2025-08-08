<!DOCTYPE html>
<html lang="en">
<x-layout.head title="Edit Buyer" :styles="false" />

<body>
    <x-dashboard.sidebar />

    <div class="main-content">
        <header class="header">
            <button class="menu-toggle" id="dashboard-toggle"><i class="fas fa-bars"></i></button>
            <h1 class="page-title">Edit Buyer</h1>
            <div class="header-actions">
                <a href="{{ route('admin.buyers.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Back to All Buyers
                </a>
            </div>
        </header>

        <div class="content">
            <div class="form-card">
                <div class="form-header">
                    <h2>Edit Buyer: {{ $buyer->company_name ?? '' }}</h2>
                </div>
                <div class="form-body">
                    <form action="{{ route('admin.buyers.update', $buyer->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="name" class="form-label">User Name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ old('name', $buyer->user->name) }}" required>
                        </div>

                        <div class="form-group">
                            <label for="company_name" class="form-label">Company Name</label>
                            <input type="text" class="form-control" id="company_name" name="company_name"
                                value="{{ old('company_name', $buyer->company_name) }}" required>
                        </div>

                        <div class="form-group">
                            <label for="country" class="form-label">Country</label>
                            <input type="text" class="form-control" id="country" name="country"
                                value="{{ old('country', $buyer->country) }}" required>
                        </div>

                        <div class="form-group">
                            <label for="city" class="form-label">City</label>
                            <input type="text" class="form-control" id="city" name="city"
                                value="{{ old('city', $buyer->city) }}" required>
                        </div>

                        <div class="form-group">
                            <label for="contact_person_name" class="form-label">Contact Person</label>
                            <input type="text" class="form-control" id="contact_person_name"
                                name="contact_person_name"
                                value="{{ old('contact_person_name', $buyer->contact_person_name) }}" required>
                        </div>

                        <div class="form-buttons">
                            <a href="{{ route('admin.buyers.index') }}" class="btn btn-secondary">Cancel</a>
                            <button type="submit" class="btn btn-primary">Update Buyer</button>
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
