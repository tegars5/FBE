<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Admin Dashboard' }}</title>
    {{-- Font Awesome untuk ikon --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>

<body>
    {{-- Komponen Sidebar Anda (Pastikan file ini ada) --}}
    <x-dashboard.sidebar />

    {{-- PERBAIKAN: Overlay untuk background saat sidebar mobile aktif --}}
    <div class="sidebar-overlay"></div>

    <div class="main-content">
        <header class="header">
            {{-- Tombol ini sekarang akan berfungsi untuk membuka sidebar --}}
            <button class="menu-toggle" id="menu-toggle">
                <i class="fas fa-bars"></i>
            </button>
            <h1 class="page-title">Admin Dashboard</h1>
            <div class="header-actions">
                <span class="date-display">{{ date('l, d F Y') }}</span>
            </div>
        </header>

        <main class="content">
            <div class="welcome-banner">
                <div class="welcome-message">
                    <h1>Welcome back, {{ Auth::user()->name ?? 'Admin' }}! 👋</h1>
                    <p>Review new submissions, manage users, and oversee all platform activities from here.</p>
                    <div class="action-links">
                        <a href="{{ route('admin.users.pending') }}"><i class="fas fa-user-clock"></i> Review Users</a>
                        <a href="{{ route('admin.suppliers.index') }}"><i class="fas fa-industry"></i> Manage
                            Suppliers</a>
                        <a href="{{ route('admin.articles.index') }}"><i class="fas fa-newspaper"></i> Manage
                            Articles</a>
                    </div>
                </div>
            </div>

            <div class="stats-row">
                <div class="stat-card">
                    <div class="stat-icon primary-bg"><i class="fas fa-industry"></i></div>
                    <div class="stat-details">
                        <div class="stat-number">{{ \App\Models\User::where('role', 'supplier')->count() }}</div>
                        <div class="stat-label">Total Suppliers</div>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon secondary-bg"><i class="fas fa-shopping-cart"></i></div>
                    <div class="stat-details">
                        <div class="stat-number">{{ \App\Models\User::where('role', 'buyer')->count() }}</div>
                        <div class="stat-label">Total Buyers</div>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon success-bg"><i class="fas fa-inbox"></i></div>
                    <div class="stat-details">
                        <div class="stat-number">{{ $submissions->count() }}</div>
                        <div class="stat-label">Pending Submissions</div>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon warning-bg"><i class="fas fa-newspaper"></i></div>
                    <div class="stat-details">
                        <div class="stat-number">{{ count($articles) }}</div>
                        <div class="stat-label">Total Articles</div>
                    </div>
                </div>
            </div>

            <div class="content-card">
                <div class="card-header">
                    <h2>Submissions for Review</h2>
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
                                <div class="sub-offered-label">Monthly Volume</div>
                                <div class="sub-offered-value">{{ $submission->monthly_capacity ?? 0 }} tons</div>
                            </div>
                            <div class="sub-actions">
                                <form action="{{ route('admin.submissions.accept', $submission->id) }}" method="POST"
                                    class="accept-form">
                                    @csrf
                                    <input type="number" name="accepted_volume"
                                        value="{{ $submission->monthly_capacity ?? 0 }}" min="0"
                                        max="{{ $submission->monthly_capacity ?? 0 }}" step="1"
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
        </main>

        <footer class="footer">
            <p>&copy; {{ date('Y') }} FujiyamaBiomassEnergy. All rights reserved.</p>
        </footer>
    </div>

    {{-- PERBAIKAN: Semua CSS digabung dan diperbaiki di sini --}}
    <style>
        :root {
            --primary: #1b5e20;
            --primary-dark: #144618;
            --secondary: #228b22;
            --success: #28a745;
            --danger: #dc3545;
            --warning: #ffc107;
            --light: #f8f9fa;
            --dark: #343a40;
            --gray: #6c757d;
            --gray-light: #e9ecef;
            --body-bg: #f5f7fb;
            --sidebar-width: 250px;
            --header-height: 70px;
            --shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            --radius: 10px;
            --transition: all 0.3s ease;
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
            min-height: 100vh;
            display: flex;
        }

        .main-content {
            margin-left: var(--sidebar-width);
            width: calc(100% - var(--sidebar-width));
            min-height: 100vh;
            transition: var(--transition);
            display: flex;
            flex-direction: column;
        }

        .content {
            flex-grow: 1;
            padding: 30px;
        }

        .header {
            height: var(--header-height);
            background-color: white;
            box-shadow: var(--shadow);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 30px;
            position: sticky;
            top: 0;
            z-index: 99;
        }

        .page-title {
            font-size: 1.5rem;
            font-weight: 600;
        }

        .footer {
            padding: 20px 30px;
            text-align: center;
            color: var(--gray);
            font-size: 0.9rem;
            border-top: 1px solid var(--gray-light);
        }

        .menu-toggle {
            display: none;
            background: none;
            border: none;
            color: var(--gray);
            cursor: pointer;
            font-size: 1.5rem;
        }

        .sidebar-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 999;
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.3s, visibility 0.3s;
        }

        .sidebar-overlay.active {
            opacity: 1;
            visibility: visible;
        }

        .welcome-banner {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            border-radius: var(--radius);
            padding: 30px;
            margin-bottom: 30px;
            box-shadow: var(--shadow);
        }

        .welcome-banner h1 {
            font-size: 1.75rem;
            margin-bottom: 10px;
        }

        .welcome-banner p {
            opacity: 0.9;
            margin-bottom: 20px;
            max-width: 600px;
        }

        .action-links {
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
        }

        .action-links a {
            background: rgba(255, 255, 255, 0.2);
            color: white;
            text-decoration: none;
            padding: 8px 15px;
            border-radius: 20px;
            font-size: 0.875rem;
            transition: var(--transition);
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .action-links a:hover {
            background: rgba(255, 255, 255, 0.3);
        }

        .stats-row {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-card {
            background-color: white;
            border-radius: var(--radius);
            padding: 20px;
            box-shadow: var(--shadow);
            display: flex;
            align-items: center;
            gap: 20px;
            transition: var(--transition);
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.07);
        }

        .stat-icon {
            height: 50px;
            width: 50px;
            min-width: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
        }

        .stat-number {
            font-size: 1.75rem;
            font-weight: 700;
        }

        .stat-label {
            color: var(--gray);
            font-size: 0.9rem;
        }

        .primary-bg {
            background-color: rgba(27, 94, 32, 0.1);
            color: var(--primary);
        }

        .secondary-bg {
            background-color: rgba(34, 139, 34, 0.1);
            color: var(--secondary);
        }

        .success-bg {
            background-color: rgba(40, 167, 69, 0.1);
            color: var(--success);
        }

        .warning-bg {
            background-color: rgba(255, 193, 7, 0.1);
            color: var(--warning);
        }

        .content-card {
            background-color: white;
            border-radius: var(--radius);
            box-shadow: var(--shadow);
            overflow: hidden;
            margin-bottom: 30px;
        }

        .card-header {
            padding: 20px;
            border-bottom: 1px solid var(--gray-light);
        }

        .card-header h2 {
            font-size: 1.25rem;
            font-weight: 600;
        }

        .card-body {
            padding: 20px;
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        /* --- PERBAIKAN: Tata Letak Submission Card dengan Flexbox yang konsisten --- */
        .submission-card {
            border: 1px solid var(--gray-light);
            padding: 1.25rem;
            border-radius: var(--radius);
            background: var(--light);
            display: flex;
            align-items: center;
            gap: 1.5rem;
            flex-wrap: wrap;
        }

        .sub-info {
            flex: 2;
            min-width: 200px;
        }

        .sub-name {
            font-weight: 600;
            font-size: 1rem;
            color: var(--dark);
        }

        .sub-meta,
        .sub-region {
            font-size: 0.8rem;
            color: var(--gray);
        }

        .sub-region {
            color: var(--primary);
        }

        .sub-offered {
            flex: 1;
            text-align: center;
            min-width: 120px;
        }

        .sub-offered-label {
            font-size: 0.8rem;
            color: var(--gray);
        }

        .sub-offered-value {
            font-weight: 700;
            font-size: 1.2rem;
            color: var(--success);
        }

        .sub-actions {
            flex: 2;
            display: flex;
            align-items: center;
            justify-content: flex-end;
            gap: 1rem;
            flex-wrap: wrap;
            min-width: 280px;
        }

        .accept-form {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .accept-input {
            width: 100px;
            text-align: center;
            font-weight: 600;
            border: 1px solid #d1d5db;
            border-radius: 6px;
            padding: 0.5rem;
        }

        .btn-accept,
        .btn-reject {
            padding: 0.55rem 1rem;
            border-radius: 6px;
            font-size: 0.9rem;
            font-weight: 600;
            border: none;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            transition: background-color 0.2s;
            color: white;
        }

        .btn-accept {
            background: var(--success);
        }

        .btn-accept:hover {
            background: #218838;
        }

        .btn-reject {
            background: var(--danger);
        }

        .btn-reject:hover {
            background: #c82333;
        }

        .empty-state {
            text-align: center;
            padding: 3rem 0;
            color: var(--gray);
        }

        .empty-state i {
            font-size: 3rem;
            color: #e9ecef;
            margin-bottom: 1rem;
        }

        /* --- PERBAIKAN: Media Queries yang disederhanakan --- */
        @media (max-width: 992px) {
            .sidebar {
                transform: translateX(-100%);
                z-index: 1000;
            }

            .sidebar.active {
                transform: translateX(0);
                box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
            }

            .main-content {
                margin-left: 0;
                width: 100%;
            }

            .menu-toggle {
                display: block;
            }

            .header,
            .content {
                padding-left: 20px;
                padding-right: 20px;
            }

            .submission-card {
                flex-direction: column;
                align-items: stretch;
            }

            .sub-offered,
            .sub-actions {
                text-align: left;
                justify-content: flex-start;
            }

            .sub-actions {
                margin-top: 1rem;
            }
        }

        @media (max-width: 576px) {
            .welcome-banner {
                padding: 20px;
                text-align: center;
            }

            .welcome-banner h1 {
                font-size: 1.5rem;
            }

            .action-links {
                justify-content: center;
            }

            .date-display {
                display: none;
            }

            .accept-form {
                flex-direction: column;
                align-items: stretch;
                width: 100%;
            }

            .accept-input {
                width: 100%;
            }

            .btn-accept {
                justify-content: center;
            }

            .sub-actions {
                flex-direction: column;
                align-items: stretch;
                gap: 0.5rem;
            }

            .btn-reject {
                justify-content: center;
                width: 100%;
            }
        }
    </style>

    {{-- PERBAIKAN: JavaScript untuk fungsionalitas tombol sidebar --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const menuToggle = document.getElementById('menu-toggle');
            const sidebarClose = document.getElementById('sidebar-close');
            const sidebar = document.getElementById('sidebar');
            const overlay = document.querySelector('.sidebar-overlay');

            // Fungsi untuk membuka/menutup sidebar
            function toggleSidebar() {
                if (sidebar && overlay) {
                    sidebar.classList.toggle('active');
                    overlay.classList.toggle('active');
                }
            }

            // Event listener untuk tombol hamburger (buka)
            if (menuToggle) {
                menuToggle.addEventListener('click', (e) => {
                    e.stopPropagation();
                    toggleSidebar();
                });
            }

            // Event listener untuk tombol close di dalam sidebar (tutup)
            if (sidebarClose) {
                sidebarClose.addEventListener('click', (e) => {
                    e.stopPropagation();
                    toggleSidebar();
                });
            }

            // Event listener untuk overlay (klik di luar sidebar untuk menutup)
            if (overlay) {
                overlay.addEventListener('click', () => {
                    if (sidebar.classList.contains('active')) {
                        toggleSidebar();
                    }
                });
            }
        });
    </script>
</body>

</html>
