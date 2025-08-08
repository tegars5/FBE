<!DOCTYPE html>
<html lang="en">
<x-layout.head title="Buyer Details" :styles="false" />

<body>
    <x-dashboard.sidebar />

    <div class="main-content">
        <header class="header">
            <button class="menu-toggle" id="dashboard-toggle"><i class="fas fa-bars"></i></button>
            <h1 class="page-title">Buyer Details</h1>
            <div class="header-actions">
                <a href="{{ route('admin.buyers.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Back to All Buyers
                </a>
            </div>
        </header>

        <div class="content">
            <div class="content-card">
                <div class="card-header">
                    <h2>{{ $buyer->company_name ?? 'Buyer Information' }}</h2>
                </div>
                <div class="card-body">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <h3 class="text-lg font-semibold border-b pb-2 mb-3">Account Details</h3>
                            <dl class="space-y-2">
                                <div class="flex justify-between">
                                    <dt class="text-gray-500">User Name:</dt>
                                    <dd class="font-medium">{{ $buyer->user->name ?? 'N/A' }}</dd>
                                </div>
                                <div class="flex justify-between">
                                    <dt class="text-gray-500">User Email:</dt>
                                    <dd class="font-medium">{{ $buyer->user->email ?? 'N/A' }}</dd>
                                </div>
                            </dl>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold border-b pb-2 mb-3">Company Information</h3>
                            <dl class="space-y-2">
                                <div class="flex justify-between">
                                    <dt class="text-gray-500">Company Name:</dt>
                                    <dd class="font-medium">{{ $buyer->company_name ?? 'N/A' }}</dd>
                                </div>
                                <div class="flex justify-between">
                                    <dt class="text-gray-500">Country:</dt>
                                    <dd class="font-medium">{{ $buyer->country ?? 'N/A' }}</dd>
                                </div>
                                <div class="flex justify-between">
                                    <dt class="text-gray-500">City:</dt>
                                    <dd class="font-medium">{{ $buyer->city ?? 'N/A' }}</dd>
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
