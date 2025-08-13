<!DOCTYPE html>
<html lang="en">
<x-layout.head title="Manage Suppliers" :styles="false" />

<body>
    <x-dashboard.sidebar />

    <div class="main-content">
        <header class="header">
            <button class="menu-toggle" id="dashboard-toggle">
                <i class="fas fa-bars"></i>
            </button>
            <h1 class="page-title">Supplier Management</h1>
            <div class="header-actions">
                <span class="date">{{ date('l, d F Y') }}</span>
            </div>
        </header>

        <div class="content">
            @if (session('success'))
                <div class="mt-4 mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded"
                    role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            @if ($errors->any())
                <div class="mt-4 mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded" role="alert">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="content-card">
                <div class="card-header">
                    <h2>All Suppliers</h2>
                </div>
                <div class="card-body">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>Company / User Name</th>
                                <th>Contact Person</th>
                                <th>Region</th>
                                <th>Status</th>
                                <th>Registered On</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($suppliers as $user)
                                <tr>
                                    <td>
                                        <div class="font-semibold">{{ $user->name }}</div>
                                        <div class="text-xs text-gray-500">{{ $user->email }}</div>
                                    </td>

                                    @if ($user->supplier)
                                        <td>{{ $user->supplier->contact_name ?? 'N/A' }}</td>
                                        <td>{{ $user->supplier->region ?? 'N/A' }}</td>
                                        <td>
                                            @if ($user->supplier->submission_status == 'accepted')
                                                <span class="badge badge-success">Accepted</span>
                                            @elseif($user->supplier->submission_status == 'rejected')
                                                <span class="badge badge-danger">Rejected</span>
                                            @else
                                                <span class="badge badge-warning">Pending</span>
                                            @endif
                                        </td>
                                    @else
                                        <td colspan="3" class="text-center text-sm text-gray-500 italic">Profile not
                                            completed</td>
                                    @endif

                                    <td class="date">{{ $user->created_at->format('d M Y') }}</td>
                                    <td class="text-center">
                                        <div class="table-actions inline-flex gap-x-2">
                                            {{-- LOGIKA TOMBOL DIPERBARUI --}}
                                            @if ($user->supplier)
                                                {{-- Tombol Accept & Reject dihapus. Tombol di bawah ini akan selalu tampil. --}}
                                                <a href="{{ route('admin.suppliers.show', $user->supplier->id) }}"
                                                    class="action-btn view-btn" style="background-color: #3498db;"
                                                    title="View Details"><i class="fas fa-eye"></i></a>

                                                <a href="{{ route('admin.suppliers.edit', $user->supplier->id) }}"
                                                    class="action-btn edit-btn" title="Edit"><i
                                                        class="fas fa-edit"></i></a>

                                                <form id="delete-form-{{ $user->supplier->id }}"
                                                    action="{{ route('admin.suppliers.destroy', $user->supplier->id) }}"
                                                    method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button"
                                                        onclick="showDeleteModal('delete-form-{{ $user->supplier->id }}')"
                                                        class="action-btn delete-btn" title="Delete">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            @else
                                                <span class="text-xs text-gray-400">No actions available</span>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center py-4">No suppliers found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <footer class="footer">
            <p>&copy; {{ date('Y') }} FujiyamaBiomassEnergy. All rights reserved.</p>
        </footer>
    </div>

    {{-- Modal Konfirmasi Delete --}}
    <div id="delete-modal" style="display: none;"
        class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-[100] flex items-center justify-center">
        <div class="relative mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
            <div class="mt-3 text-center">
                <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-red-100">
                    <i class="fas fa-exclamation-triangle text-red-600 text-xl"></i>
                </div>
                <h3 class="text-lg leading-6 font-medium text-gray-900 mt-2">Delete Supplier</h3>
                <div class="mt-2 px-7 py-3">
                    <p class="text-sm text-gray-500">
                        Are you sure you want to delete this supplier? This action cannot be undone.
                    </p>
                </div>
                <div class="items-center px-4 py-3 space-x-4">
                    <button id="cancel-delete-btn"
                        class="px-4 py-2 bg-gray-200 text-gray-800 rounded-md hover:bg-gray-300">
                        Cancel
                    </button>
                    <button id="confirm-delete-btn" class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700">
                        Delete
                    </button>
                </div>
            </div>
        </div>
    </div>
    {{-- Lottie CDN --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lottie-web/5.12.2/lottie.min.js"></script>
    <script>
        // Lottie animation for Accept
        document.querySelectorAll('.accept-form').forEach(form => {
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                const container = document.getElementById('lottie-success-container');
                container.style.display = 'flex';
                lottie.loadAnimation({
                    container: document.getElementById('lottie-success'),
                    renderer: 'svg',
                    loop: false,
                    autoplay: true,
                    path: 'https://assets10.lottiefiles.com/packages/lf20_jbrw3hcz.json'
                });
                setTimeout(() => {
                    container.style.display = 'none';
                    this.submit();
                }, 1200);
            });
        });

        // JavaScript untuk Modal Delete
        const deleteModal = document.getElementById('delete-modal');
        const cancelDeleteBtn = document.getElementById('cancel-delete-btn');
        const confirmDeleteBtn = document.getElementById('confirm-delete-btn');
        let formToDelete = null;

        function showDeleteModal(formId) {
            formToDelete = document.getElementById(formId);
            if (formToDelete) {
                deleteModal.style.display = 'flex';
            }
        }

        function hideDeleteModal() {
            deleteModal.style.display = 'none';
            formToDelete = null;
        }

        cancelDeleteBtn.addEventListener('click', hideDeleteModal);

        confirmDeleteBtn.addEventListener('click', () => {
            if (formToDelete) {
                formToDelete.submit();
            }
            hideDeleteModal();
        });

        // Close modal when clicking outside
        deleteModal.addEventListener('click', function(e) {
            if (e.target === deleteModal) {
                hideDeleteModal();
            }
        });
    </script>
</body>

</html>
