<!DOCTYPE html>
<html lang="en">
<x-layout.head title="Admin Dashboard" :styles="false" />

<body>
    <!-- Sidebar -->
    <x-dashboard.sidebar />

    <!-- Main Content -->
    <div class="main-content">
        <header class="header">
            <button class="menu-toggle" id="dashboard-toggle">
                <i class="fas fa-bars"></i>
            </button>
            <h1 class="page-title">Admin Dashboard</h1>
            <div class="header-actions">
                <span class="date">{{ date('l, d F Y') }}</span>
            </div>
        </header>

        <div class="content">
            <!-- Welcome Banner -->
            <div class="welcome-banner">
                <h1>Welcome, {{ Auth::user()->name }}!</h1>
                <p>Review new submissions, manage users, and oversee all platform activities from here.</p>
            </div>

            <!-- Stats Row -->
            <div class="stats-row">
                <div class="stat-card">
                    <div class="stat-icon primary-bg">
                        <i class="fas fa-industry"></i>
                    </div>
                    <div class="stat-details">
                        <div class="stat-number">{{ \App\Models\User::where('role', 'supplier')->count() }}</div>
                        <div class="stat-label">Total Suppliers</div>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon success-bg">
                        <i class="fas fa-shopping-cart"></i>
                    </div>
                    <div class="stat-details">
                        <div class="stat-number">{{ \App\Models\User::where('role', 'buyer')->count() }}</div>
                        <div class="stat-label">Total Buyers</div>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon warning-bg">
                        <i class="fas fa-inbox"></i>
                    </div>
                    <div class="stat-details">
                        <div class="stat-number">{{ $submissions->count() }}</div>
                        <div class="stat-label">Pending Submissions</div>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon secondary-bg">
                        <i class="fas fa-newspaper"></i>
                    </div>
                    <div class="stat-details">
                        <div class="stat-number"> {{ count($articles) }}</div>
                        <div class="stat-label">Total Articles</div>
                    </div>
                </div>
            </div>

            <!-- Submission Review Section -->
            <div class="mt-8 bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-2xl font-bold text-gray-800 mb-4">Submissions for Review</h2>
                <p class="text-sm text-gray-600 mb-4">Review new product submissions from suppliers. You can accept the
                    proposed amount or enter a different one.</p>

                <div class="space-y-3">
                    @forelse ($submissions as $submission)
                        {{-- PERBAIKAN 1: Mengubah div menjadi form --}}
                        <form action="{{ route('admin.suppliers.accept', $submission->id) }}" method="POST">
                            @csrf
                            <div class="border p-3 rounded-md grid grid-cols-1 md:grid-cols-4 gap-4 items-center">
                                <div>
                                    <div class="font-semibold">{{ $submission->user->name ?? 'Unknown User' }}</div>
                                    <div class="text-xs text-gray-500">Submitted:
                                        {{ $submission->created_at->diffForHumans() }}</div>
                                </div>
                                <div class="text-center">
                                    <div class="text-xs text-gray-500">Offered</div>
                                    <div class="font-bold text-lg">{{ $submission->monthly_capacity ?? 0 }} tons</div>
                                </div>
                                <div class="text-center">
                                    <label for="accepted_volume_{{ $submission->id }}"
                                        class="text-xs text-gray-500">Accepted Amount</label>
                                    {{-- PERBAIKAN 2: Menambahkan atribut 'name' --}}
                                    <input type="number" name="accepted_volume"
                                        id="accepted_volume_{{ $submission->id }}"
                                        value="{{ $submission->monthly_capacity ?? 0 }}"
                                        class="w-24 text-center font-bold border-gray-300 rounded-md shadow-sm">
                                </div>
                                <div class="text-right space-x-2">
                                    {{-- PERBAIKAN 3: Mengubah button menjadi type="submit" --}}
                                    <button type="submit"
                                        class="text-xs bg-green-500 hover:bg-green-600 text-white py-2 px-3 rounded-md font-semibold">Accept</button>
                                    <button type="button"
                                        class="text-xs bg-red-500 hover:bg-red-600 text-white py-2 px-3 rounded-md font-semibold">Reject</button>
                                </div>
                            </div>
                        </form>
                    @empty
                        <p class="text-center text-gray-500 text-sm pt-2">No new submissions to review.</p>
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
