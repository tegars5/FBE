<!DOCTYPE html>
<html lang="en">
<x-layout.head title="Supplier Details" :styles="false" />

<body>
    <x-dashboard.sidebar />

    <div class="main-content">
        <header class="header">
            <button class="menu-toggle" id="dashboard-toggle"><i class="fas fa-bars"></i></button>
            <h1 class="page-title">Supplier Details</h1>
            <div class="header-actions">
                <a href="{{ route('admin.suppliers.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Back to All Suppliers
                </a>
            </div>
        </header>

        <div class="content">
            <div class="content-card">
                <div class="card-header">
                    <h2>{{ $supplier->user->name ?? 'Supplier Information' }}</h2>
                </div>
                <div class="card-body">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        {{-- User Account Details --}}
                        <div>
                            <h3 class="text-lg font-semibold border-b pb-2 mb-3">Account Details</h3>
                            <dl class="space-y-2">
                                <div class="flex justify-between">
                                    <dt class="text-gray-500">User Name:</dt>
                                    <dd class="font-medium">{{ $supplier->user->name ?? 'N/A' }}</dd>
                                </div>
                                <div class="flex justify-between">
                                    <dt class="text-gray-500">User Email:</dt>
                                    <dd class="font-medium">{{ $supplier->user->email ?? 'N/A' }}</dd>
                                </div>
                                <div class="flex justify-between">
                                    <dt class="text-gray-500">Registered On:</dt>
                                    <dd class="font-medium">{{ $supplier->user->created_at->format('d M Y') }}</dd>
                                </div>
                            </dl>
                        </div>
                        {{-- Contact Details --}}
                        <div>
                            <h3 class="text-lg font-semibold border-b pb-2 mb-3">Contact Information</h3>
                            <dl class="space-y-2">
                                <div class="flex justify-between">
                                    <dt class="text-gray-500">Contact Name:</dt>
                                    <dd class="font-medium">{{ $supplier->contact_name ?? 'N/A' }}</dd>
                                </div>
                                <div class="flex justify-between">
                                    <dt class="text-gray-500">Contact Email:</dt>
                                    <dd class="font-medium">{{ $supplier->contact_email ?? 'N/A' }}</dd>
                                </div>
                                <div class="flex justify-between">
                                    <dt class="text-gray-500">Contact Phone:</dt>
                                    <dd class="font-medium">{{ $supplier->contact_phone ?? 'N/A' }}</dd>
                                </div>
                            </dl>
                        </div>
                        {{-- Operational Details --}}
                        <div class="md:col-span-2 border-t pt-4">
                            <h3 class="text-lg font-semibold border-b pb-2 mb-3">Operational Details</h3>
                            <dl class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-2">
                                <div class="flex justify-between">
                                    <dt class="text-gray-500">Region:</dt>
                                    <dd class="font-medium">{{ $supplier->region ?? 'N/A' }}</dd>
                                </div>
                                <div class="flex justify-between">
                                    <dt class="text-gray-500">Years in Operation:</dt>
                                    <dd class="font-medium">{{ $supplier->years_operation ?? 'N/A' }} years</dd>
                                </div>
                                <div class="flex justify-between">
                                    <dt class="text-gray-500">Monthly Capacity:</dt>
                                    <dd class="font-medium">{{ number_format($supplier->monthly_capacity, 2) }} tons
                                    </dd>
                                </div>
                                <div class="flex justify-between">
                                    <dt class="text-gray-500">Annual Sales:</dt>
                                    <dd class="font-medium">{{ number_format($supplier->annual_sales, 2) }} tons</dd>
                                </div>
                                <div class="flex justify-between">
                                    <dt class="text-gray-500">Desired Price:</dt>
                                    <dd class="font-medium">${{ number_format($supplier->desired_price, 2) }}/ton</dd>
                                </div>
                            </dl>
                        </div>
                        {{-- PKS Composition --}}
                        <div class="md:col-span-2 border-t pt-4">
                            <h3 class="text-lg font-semibold border-b pb-2 mb-3">PKS Composition</h3>
                            <dl class="grid grid-cols-3 gap-x-6">
                                <div class="text-center">
                                    <dt class="text-gray-500">Dura</dt>
                                    <dd class="font-medium text-xl">{{ $supplier->dura_composition ?? 0 }}%</dd>
                                </div>
                                <div class="text-center">
                                    <dt class="text-gray-500">Tenera</dt>
                                    <dd class="font-medium text-xl">{{ $supplier->tenera_composition ?? 0 }}%</dd>
                                </div>
                                <div class="text-center">
                                    <dt class="text-gray-500">Pisifera</dt>
                                    <dd class="font-medium text-xl">{{ $supplier->pisifera_composition ?? 0 }}%</dd>
                                </div>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="footer">
            <p>&copy; {{ date('Y') }} FujiyamaBiomassEnergy. All rights reserved.</p>
        </footer>
    </div>
</body>

</html>
