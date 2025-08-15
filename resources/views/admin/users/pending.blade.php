<!DOCTYPE html>
<html lang="en">
<x-layout.head title="Pending Users" :styles="false" /> {{-- ← jangan pakai :styles="false" --}}

<body class="bg-gray-50">
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

            <!-- Flash -->
            @if (session('success'))
                <div class="mt-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded" role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif
            @if ($errors->any())
                <div class="mt-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded" role="alert">
                    <ul class="mb-0 list-disc pl-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Pending Users -->
            <div class="mt-8 bg-white p-6 rounded-lg shadow-md">
                <div class="flex items-center justify-between mb-4">
                    <div>
                        <h2 class="text-2xl font-bold text-gray-800">Users Waiting for Approval</h2>
                        <p class="text-sm text-gray-600">Review new user registrations and approve or reject them.</p>
                    </div>
                    {{-- (Opsional) tempatkan filter/search di sini nanti --}}
                </div>

                <div class="space-y-3">
                    @forelse ($pendingUsers as $user)
                        @php
                            $roleBadge =
                                $user->role === 'supplier'
                                    ? 'bg-blue-100 text-blue-800'
                                    : 'bg-green-100 text-green-800';
                            $statusBadge = 'bg-yellow-100 text-yellow-800';
                        @endphp

                        <div class="border p-4 rounded-md bg-white pending-row" tabindex="0"
                            aria-label="Open details for {{ $user->name }}" data-name="{{ $user->name }}"
                            data-email="{{ $user->email }}" data-role="{{ ucfirst($user->role) }}"
                            data-status="{{ ucfirst($user->status) }}"
                            data-registered="{{ $user->created_at->format('d M Y H:i') }}"
                            data-approve-url="{{ route('admin.users.approve', $user->id) }}"
                            data-reject-url="{{ route('admin.users.reject', $user->id) }}">
                            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 items-center">
                                <div>
                                    <div class="font-semibold text-lg text-gray-900">{{ $user->name }}</div>
                                    <div class="text-sm text-gray-600">{{ $user->email }}</div>
                                    <div class="text-xs text-gray-500">Registered:
                                        {{ $user->created_at->diffForHumans() }}</div>
                                </div>
                                <div class="text-center">
                                    <span
                                        class="inline-flex px-3 py-1 text-xs font-semibold rounded-full {{ $roleBadge }}">
                                        {{ ucfirst($user->role) }}
                                    </span>
                                </div>
                                <div class="text-center">
                                    <span
                                        class="inline-flex px-3 py-1 text-xs font-semibold rounded-full {{ $statusBadge }}">
                                        {{ ucfirst($user->status) }}
                                    </span>
                                </div>
                                <div class="text-right space-x-2">
                                    {{-- Fallback aksi tetap ada (tanpa modal pun bisa jalan) --}}
                                    <form action="{{ route('admin.users.approve', $user->id) }}" method="POST"
                                        class="inline-block">
                                        @csrf
                                        <button type="submit"
                                            class="text-xs bg-green-600 hover:bg-green-700 text-white py-2 px-4 rounded-md font-semibold transition">
                                            Approve
                                        </button>
                                    </form>
                                    <form action="{{ route('admin.users.reject', $user->id) }}" method="POST"
                                        class="inline-block">
                                        @csrf
                                        <button type="submit"
                                            class="text-xs bg-red-600 hover:bg-red-700 text-white py-2 px-4 rounded-md font-semibold transition"
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

    {{-- MODAL DETAIL USER --}}
    <div id="user-modal" class="fixed inset-0 z-[200] hidden items-center justify-center bg-black/40">
        <div class="mx-4 w-full max-w-xl rounded-xl bg-white shadow-lg ring-1 ring-black/5">
            <div class="flex items-center justify-between border-b px-5 py-3">
                <h3 class="text-lg font-semibold text-gray-800">User Details</h3>
                <button id="user-modal-close" class="p-2 text-gray-500 hover:text-gray-700" aria-label="Close modal">
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <div class="px-5 py-4 space-y-4">
                <dl class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <dt class="text-xs text-gray-500">Name</dt>
                        <dd id="um-name" class="font-medium text-gray-900">—</dd>
                    </div>
                    <div>
                        <dt class="text-xs text-gray-500">Email</dt>
                        <dd class="font-medium text-gray-900 break-all">
                            <a id="um-email" href="#" class="text-blue-600 hover:underline">—</a>
                        </dd>
                    </div>
                    <div>
                        <dt class="text-xs text-gray-500">Role</dt>
                        <dd id="um-role" class="font-medium text-gray-900">—</dd>
                    </div>
                    <div>
                        <dt class="text-xs text-gray-500">Status</dt>
                        <dd id="um-status" class="font-medium text-gray-900">—</dd>
                    </div>
                    <div class="sm:col-span-2">
                        <dt class="text-xs text-gray-500">Registered</dt>
                        <dd id="um-registered" class="font-medium text-gray-900">—</dd>
                    </div>
                </dl>

                <div class="mt-2 flex flex-wrap items-center justify-end gap-2 border-t pt-4">
                    <form id="modal-approve-form" method="POST" class="inline">
                        @csrf
                        <button type="submit"
                            class="rounded-md bg-green-600 px-4 py-2 text-sm font-semibold text-white hover:bg-green-700">
                            Approve
                        </button>
                    </form>
                    <form id="modal-reject-form" method="POST" class="inline"
                        onsubmit="return confirm('Are you sure you want to reject and delete this user?');">
                        @csrf
                        <button type="submit"
                            class="rounded-md bg-red-600 px-4 py-2 text-sm font-semibold text-white hover:bg-red-700">
                            Reject
                        </button>
                    </form>
                    <button id="user-modal-cancel"
                        class="rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>

    {{-- Row hover/focus --}}
    <style>
        .pending-row {
            cursor: pointer;
        }

        .pending-row:hover {
            background: #f9fafb;
        }

        .pending-row:focus {
            outline: 2px solid rgba(37, 99, 235, .25);
            outline-offset: 2px;
        }
    </style>

    {{-- Interaksi modal & dblclick --}}
    <script>
        function openUserModal(data) {
            const modal = document.getElementById('user-modal');
            document.getElementById('um-name').textContent = data.name || '—';
            document.getElementById('um-role').textContent = data.role || '—';
            document.getElementById('um-status').textContent = data.status || '—';
            document.getElementById('um-registered').textContent = data.registered || '—';

            const emailLink = document.getElementById('um-email');
            emailLink.textContent = data.email || '—';
            emailLink.href = data.email ? ('mailto:' + data.email) : '#';

            // Set form action
            document.getElementById('modal-approve-form').setAttribute('action', data.approveUrl);
            document.getElementById('modal-reject-form').setAttribute('action', data.rejectUrl);

            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }

        function closeUserModal() {
            const modal = document.getElementById('user-modal');
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        }

        document.addEventListener('DOMContentLoaded', function() {
            const modal = document.getElementById('user-modal');
            document.querySelectorAll('.pending-row').forEach(function(row) {
                const payload = {
                    name: row.dataset.name,
                    email: row.dataset.email,
                    role: row.dataset.role,
                    status: row.dataset.status,
                    registered: row.dataset.registered,
                    approveUrl: row.dataset.approveUrl,
                    rejectUrl: row.dataset.rejectUrl
                };

                // dblclick → buka modal (hindari jika klik tombol/link dalam row)
                row.addEventListener('dblclick', function(e) {
                    if (e.target.closest('a,button,form,input,label,i')) return;
                    openUserModal(payload);
                });

                // Enter → buka modal
                row.addEventListener('keydown', function(e) {
                    if (e.key === 'Enter') openUserModal(payload);
                });
            });

            // Tutup modal
            document.getElementById('user-modal-close').addEventListener('click', closeUserModal);
            document.getElementById('user-modal-cancel').addEventListener('click', closeUserModal);
            modal.addEventListener('click', function(e) {
                if (e.target === modal) closeUserModal();
            });
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape') closeUserModal();
            });
        });
    </script>
</body>

</html>
