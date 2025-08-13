<!DOCTYPE html>
<html lang="en">
<x-layout.head title="Admin Dashboard" :styles="false" />

<body>
    <x-dashboard.sidebar />

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
            <div
                style="background: linear-gradient(135deg, #2d5016 0%, #4a7c59 50%, #6db33f 100%); border-radius: 15px; padding: 2rem; color: white; margin-bottom: 2rem; position: relative; overflow: hidden;">
                <div style="position: relative; z-index: 2;">
                    <h1
                        style="font-size: 2rem; font-weight: bold; margin-bottom: 0.5rem; text-shadow: 0 2px 4px rgba(0,0,0,0.3);">
                        Welcome back, {{ Auth::user()->name }}! 👋
                    </h1>
                    <p style="font-size: 1rem; opacity: 0.95; margin-bottom: 1rem;">
                        Review new submissions, manage users, and oversee all platform activities from here.
                    </p>
                    <div style="display: flex; gap: 1rem; flex-wrap: wrap;">
                        <a href="{{ route('admin.users.pending') }}"
                            style="background: rgba(255,255,255,0.2); color: white; text-decoration: none; padding: 0.5rem 1rem; border-radius: 8px; font-size: 0.875rem; backdrop-filter: blur(10px); transition: all 0.3s;"
                            onmouseover="this.style.background='rgba(255,255,255,0.3)'"
                            onmouseout="this.style.background='rgba(255,255,255,0.2)'">
                            <i class="fas fa-user-check" style="margin-right: 0.5rem;"></i>Review Pending Users
                        </a>
                        <a href="{{ route('admin.suppliers.index') }}"
                            style="background: rgba(255,255,255,0.2); color: white; text-decoration: none; padding: 0.5rem 1rem; border-radius: 8px; font-size: 0.875rem; backdrop-filter: blur(10px); transition: all 0.3s;"
                            onmouseover="this.style.background='rgba(255,255,255,0.3)'"
                            onmouseout="this.style.background='rgba(255,255,255,0.2)'">
                            <i class="fas fa-industry" style="margin-right: 0.5rem;"></i>Manage Suppliers
                        </a>
                        <a href="{{ route('admin.articles.index') }}"
                            style="background: rgba(255,255,255,0.2); color: white; text-decoration: none; padding: 0.5rem 1rem; border-radius: 8px; font-size: 0.875rem; backdrop-filter: blur(10px); transition: all 0.3s;"
                            onmouseover="this.style.background='rgba(255,255,255,0.3)'"
                            onmouseout="this.style.background='rgba(255,255,255,0.2)'">
                            <i class="fas fa-newspaper" style="margin-right: 0.5rem;"></i>Manage Articles
                        </a>
                    </div>
                </div>
                <div
                    style="position: absolute; top: -50px; right: -50px; width: 200px; height: 200px; background: rgba(255,255,255,0.1); border-radius: 50%; z-index: 1;">
                </div>
                <div
                    style="position: absolute; bottom: -30px; left: -30px; width: 120px; height: 120px; background: rgba(255,255,255,0.05); border-radius: 50%; z-index: 1;">
                </div>
            </div>

            <div class="stats-row">
                <div class="stat-card" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                    <div>
                        <div class="stat-number">{{ \App\Models\User::where('role', 'supplier')->count() }}</div>
                        <div class="stat-label">Total Suppliers</div>
                    </div>
                    <div class="stat-icon"><i class="fas fa-industry"></i></div>
                </div>
                <div class="stat-card" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);">
                    <div>
                        <div class="stat-number">{{ \App\Models\User::where('role', 'buyer')->count() }}</div>
                        <div class="stat-label">Total Buyers</div>
                    </div>
                    <div class="stat-icon"><i class="fas fa-shopping-cart"></i></div>
                </div>
                <div class="stat-card" style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);">
                    <div>
                        <div class="stat-number">{{ $submissions->count() }}</div>
                        <div class="stat-label">Pending Submissions</div>
                    </div>
                    <div class="stat-icon"><i class="fas fa-inbox"></i></div>
                </div>
                <div class="stat-card" style="background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);">
                    <div>
                        <div class="stat-number">{{ count($articles) }}</div>
                        <div class="stat-label">Total Articles</div>
                    </div>
                    <div class="stat-icon"><i class="fas fa-newspaper"></i></div>
                </div>
            </div>

            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="content-card">
                <div class="card-header">
                    <h2>Submissions for Review</h2>
                    <p>Review new product submissions from suppliers. You can accept the proposed amount or enter a
                        different one.</p>
                </div>
                <div class="card-body">
                    @forelse ($submissions as $submission)
                        <div class="submission-card">
                            <div class="sub-info">
                                <div class="sub-name">{{ $submission->user->name ?? 'Unknown User' }}</div>
                                <div class="sub-meta">Submitted: {{ $submission->created_at->diffForHumans() }}</div>
                                <div class="sub-region">Region: {{ $submission->region ?? 'N/A' }}</div>
                            </div>
                            <div class="sub-offered">
                                <div class="sub-offered-label">Month Available Volume</div>
                                <div class="sub-offered-value">{{ $submission->monthly_capacity ?? 0 }} tons</div>
                            </div>
                            <div class="sub-actions">
                                <form action="{{ route('admin.submissions.accept', $submission->id) }}" method="POST"
                                    class="accept-form">
                                    @csrf
                                    <label for="accepted_volume_{{ $submission->id }}" class="accept-label">Accept
                                        Amount</label>
                                    <input type="number" id="accepted_volume_{{ $submission->id }}"
                                        name="accepted_volume" value="{{ $submission->monthly_capacity ?? 0 }}"
                                        min="0" max="{{ $submission->monthly_capacity ?? 0 }}" step="1"
                                        class="accept-input" required>
                                    <button type="submit" class="btn-accept"><i class="fas fa-check"></i>
                                        Accept</button>
                                </form>
                                <form action="{{ route('admin.submissions.reject', $submission->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn-reject"
                                        onclick="return confirm('Reject submission from {{ $submission->user->name ?? 'this supplier' }}?')">
                                        <i class="fas fa-times"></i> Reject
                                    </button>
                                </form>
                            </div>
                        </div>
                    @empty
                        <div class="empty-state">
                            <i class="fas fa-inbox"></i>
                            <p>No new submissions to review at the moment.</p>
                        </div>
                    @endforelse
                </div>
            </div>

        </div>

        <footer class="footer">
            <p>&copy; {{ date('Y') }} FujiyamaBiomassEnergy. All rights reserved.</p>
        </footer>
    </div>

    <style>
        :root {
            --primary: #1b5e20;
            --danger: #e74c3c;
            --gray: #6c757d;
            --gray-light: #e9ecef;
            --body-bg: #f5f7fb;
            --dark: #343a40;
            --sidebar-width: 250px;
            --header-height: 70px;
            --radius: 10px;
            --shadow: 0 4px 6px rgba(0, 0, 0, .05);
            --transition: all .3s ease;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", "Segoe UI", sans-serif;
        }

        body {
            background-color: var(--body-bg);
            color: var(--dark);
            display: flex;
        }

        /* === Layout & Basic Elements (Sama seperti sebelumnya) === */
        .main-content {
            margin-left: var(--sidebar-width);
            width: calc(100% - var(--sidebar-width));
        }

        .header {
            height: var(--header-height);
            background: #fff;
            box-shadow: var(--shadow);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 30px;
            position: sticky;
            top: 0;
            z-index: 99;
        }

        .content {
            padding: 30px;
        }

        .footer {
            padding: 20px 30px;
            text-align: center;
            color: var(--gray);
            font-size: .9rem;
            border-top: 1px solid var(--gray-light);
        }

        .sidebar {
            width: var(--sidebar-width);
            background: #fff;
            /* ... sisa style sidebar bisa disamakan ... */
        }

        /* === Konten Utama (Gaya yang Anda Sukai) === */

        /* Stats Row */
        .stats-row {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .stat-card {
            border-radius: 12px;
            padding: 1.5rem;
            color: white;
            position: relative;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: space-between;
            transition: var(--transition);
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
        }

        .stat-number {
            font-size: 2.25rem;
            font-weight: bold;
            margin-bottom: 0.25rem;
        }

        .stat-label {
            font-size: 0.875rem;
            opacity: 0.9;
        }

        .stat-icon {
            font-size: 2.5rem;
            opacity: 0.3;
        }

        /* Alerts */
        .alert {
            padding: 1rem;
            margin-bottom: 1.5rem;
            border-radius: 8px;
            border: 1px solid transparent;
        }

        .alert-success {
            color: #155724;
            background-color: #d4edda;
            border-color: #c3e6cb;
        }

        .alert-danger {
            color: #721c24;
            background-color: #f8d7da;
            border-color: #f5c6cb;
        }

        /* Content Card & Submission List */
        .content-card {
            background: #fff;
            padding: 1.5rem;
            border-radius: var(--radius);
            box-shadow: var(--shadow);
        }

        .card-header h2 {
            font-size: 1.5rem;
            font-weight: bold;
            color: #2c3e50;
            margin-bottom: 1rem;
        }

        .card-header p {
            font-size: 0.875rem;
            color: #6b7280;
            margin-bottom: 1rem;
        }

        .card-body {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .submission-card {
            border: 1px solid #e5e7eb;
            padding: 1.25rem;
            border-radius: 8px;
            background: #fafafa;
            display: flex;
            align-items: center;
            gap: 1.5rem;
            flex-wrap: wrap;
            /* Agar responsif di layar kecil */
        }

        .sub-info {
            flex: 2;
            min-width: 250px;
        }

        .sub-name {
            font-weight: 600;
            font-size: 1rem;
            color: #1f2937;
        }

        .sub-meta,
        .sub-region {
            font-size: .8rem;
            color: #6b7280;
        }

        .sub-offered {
            flex: 1;
            text-align: center;
        }

        .sub-offered-label {
            font-size: .8rem;
            color: #6b7280;
        }

        .sub-offered-value {
            font-weight: 700;
            font-size: 1.2rem;
            color: #059669;
        }

        .sub-actions {
            flex: 2;
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            /* Aksi rata kanan */
            gap: .75rem;
            /* Jarak antara form accept dan reject */
        }

        .accept-form {
            display: flex;
            align-items: center;
            gap: .75rem;
        }

        .accept-label {
            font-size: .8rem;
            color: #6b7280;
            white-space: nowrap;
        }

        .accept-input {
            width: 100px;
            text-align: center;
            font-weight: 600;
            border: 1px solid #d1d5db;
            border-radius: 6px;
            padding: .5rem;
        }

        .btn-accept,
        .btn-reject {
            padding: .55rem 1rem;
            border-radius: 6px;
            font-size: .9rem;
            font-weight: 600;
            border: none;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: .5rem;
            transition: background-color .2s;
        }

        /* WARNA KESUKAAN ANDA DIKEMBALIKAN */
        .btn-accept {
            background: #10b981;
            color: #fff;
        }

        .btn-accept:hover {
            background: #059669;
        }

        .btn-reject {
            background: #ef4444;
            color: #fff;
        }

        .btn-reject:hover {
            background: #dc2626;
        }

        .empty-state {
            text-align: center;
            padding: 3rem 0;
            color: var(--gray);
        }

        .empty-state i {
            font-size: 3rem;
            color: var(--gray-light);
            margin-bottom: 1rem;
        }

        .empty-state p {
            font-size: 1rem;
        }

        @media (max-width: 992px) {
            .submission-card {
                flex-direction: column;
                align-items: stretch;
            }

            .sub-offered {
                text-align: left;
            }

            .sub-actions {
                align-items: flex-start;
            }
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const menuToggle = document.getElementById('dashboard-toggle');
            const sidebar = document.querySelector('.sidebar');

            if (menuToggle) {
                menuToggle.addEventListener('click', () => {
                    sidebar.classList.toggle('active');
                });
            }

            // Auto-hide success/error alerts
            const alert = document.querySelector('.alert');
            if (alert) {
                setTimeout(() => {
                    alert.style.transition = 'opacity 0.5s ease';
                    alert.style.opacity = '0';
                    setTimeout(() => alert.remove(), 500);
                }, 5000);
            }
        });
    </script>
</body>

</html>
