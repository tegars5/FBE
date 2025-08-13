<!DOCTYPE html>
<html lang="en">
<x-layout.head title="Pending Users" :styles="false" />

<body>
    <!-- Sidebar -->
    <x-dashboard.sidebar />

    <!-- Main Content -->
    <div class="main-content">
        <header class="header">
            <button class="menu-toggle" id="dashboard-toggle">
                <i class="fas fa-bars"></i>
            </button>
            <h1 class="page-title">User Verification</h1>
            <div class="header-actions">
                <span class="date">{{ date('l, d F Y') }}</span>
            </div>
        </header>

        <div class="content">
            <!-- Welcome Banner -->
            <div class="welcome-banner">
                <h1>Pending User Verification</h1>
                <p>Review and approve/reject new user registrations.</p>
            </div>

            <!-- Menampilkan Pesan Success -->
            @if(session('success'))
                <div class="mt-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded" role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            <!-- Pending Users Section -->
            <div class="mt-8 bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-2xl font-bold text-gray-800 mb-4">Users Waiting for Approval</h2>
                <p class="text-sm text-gray-600 mb-4">Review new user registrations and approve or reject them.</p>

                <div class="space-y-3">
                    @forelse ($pendingUsers as $user)
                        <div class="border p-4 rounded-md">
                            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 items-center">
                                <div>
                                    <div class="font-semibold text-lg">{{ $user->name }}</div>
                                    <div class="text-sm text-gray-600">{{ $user->email }}</div>
                                    <div class="text-xs text-gray-500">Registered: {{ $user->created_at->diffForHumans() }}</div>
                                </div>
                                <div class="text-center">
                                    <span class="inline-flex px-3 py-1 text-xs font-semibold rounded-full 
                                        {{ $user->role === 'supplier' ? 'bg-blue-100 text-blue-800' : 'bg-green-100 text-green-800' }}">
                                        {{ ucfirst($user->role) }}
                                    </span>
                                </div>
                                <div class="text-center">
                                    <span class="inline-flex px-3 py-1 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                        {{ ucfirst($user->status) }}
                                    </span>
                                </div>
                                <div class="text-right space-x-2">
                                    <form action="{{ route('admin.users.approve', $user->id) }}" method="POST" class="inline-block">
                                        @csrf
                                        <button type="submit"
                                                class="text-xs bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded-md font-semibold transition duration-200">
                                            Approve
                                        </button>
                                    </form>
                                    <form action="{{ route('admin.users.reject', $user->id) }}" method="POST" class="inline-block">
                                        @csrf
                                        <button type="submit"
                                                class="text-xs bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded-md font-semibold transition duration-200"
                                                onclick="return confirm('Are you sure you want to reject and delete this user?')">
                                            Reject
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p class="text-center text-gray-500 text-sm pt-4">No pending users to review.</p>
                    @endforelse
                </div>
            </div>

        </div>
        <footer class="footer">
            <p>&copy; {{ date('Y') }} FujiyamaBiomassEnergy. All rights reserved.</p>
        </footer>
    </div>
</body>

</html>