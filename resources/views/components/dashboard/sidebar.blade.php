<aside class="sidebar" id="sidebar">
    <div class="sidebar-header">
        <div class="logo">
            <div class="logo-icon">A</div>
            <span>AdminPanel</span>
        </div>
        {{-- Tombol ini sekarang akan berfungsi untuk menutup sidebar di mode mobile --}}
        <button class="menu-toggle" id="sidebar-close">
            <i class="fas fa-times"></i>
        </button>
    </div>

    <ul class="nav-menu">
        <li class="nav-item">
            <a href="{{ route('admin.dashboard') }}"
                class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class="fas fa-home"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.users.pending') }}"
                class="nav-link {{ request()->routeIs('admin.users.pending') ? 'active' : '' }}">
                <i class="fas fa-user-check"></i><span>User Verification</span>
                @php
                    $pendingUserCount = \App\Models\User::where('status', 'pending')
                        ->where('role', '!=', 'admin')
                        ->count();
                @endphp
                @if ($pendingUserCount > 0)
                    <span class="badge bg-warning ms-auto">{{ $pendingUserCount }}</span>
                @endif
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.suppliers.index') }}" class="nav-link">
                <i class="fas fa-industry"></i>
                <span>Suppliers</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.buyers.index') }}" class="nav-link">
                <i class="fas fa-shopping-cart"></i>
                <span>Buyers</span>
            </a>
        </li>
    </ul>

    <div class="user-info">
        <div class="user-details">
            <div class="user-avatar">
                {{ substr(Auth::user()->name, 0, 1) }}
            </div>
            <div>
                <div class="user-name">{{ Auth::user()->name }}</div>
                <div class="user-role">Administrator</div>
            </div>
        </div>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="logout-btn">
                <i class="fas fa-sign-out-alt"></i> Logout
            </button>
        </form>
    </div>

    {{-- PERBAIKAN: Tambahkan CSS khusus untuk sidebar --}}
    <style>
        .sidebar {
            width: var(--sidebar-width);
            background-color: white;
            box-shadow: var(--shadow);
            position: fixed;
            height: 100vh;
            z-index: 100;
            transition: var(--transition);
            display: flex;
            flex-direction: column;
        }

        .sidebar-header {
            padding: 24px 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 1px solid var(--gray-light);
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 10px;
            font-weight: 700;
            color: var(--primary);
            font-size: 1.25rem;
        }

        .logo-icon {
            height: 32px;
            width: 32px;
            background-color: var(--primary);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
        }

        #sidebar-close {
            display: none;
        }

        /* Sembunyikan tombol close di desktop */
        .nav-menu {
            list-style: none;
            padding: 20px 0;
            overflow-y: auto;
            flex-grow: 1;
        }

        .nav-item {
            margin-bottom: 5px;
        }

        .nav-link {
            display: flex;
            align-items: center;
            padding: 12px 20px;
            color: var(--gray);
            text-decoration: none;
            border-radius: 0 30px 30px 0;
            transition: var(--transition);
            margin-right: 15px;
        }

        .nav-link:hover,
        .nav-link.active {
            background-color: rgba(27, 94, 32, 0.1);
            color: var(--primary);
        }

        .nav-link i {
            margin-right: 12px;
            font-size: 1.2rem;
            width: 20px;
            text-align: center;
        }

        .user-info {
            padding: 15px 20px;
            border-top: 1px solid var(--gray-light);
            background-color: white;
        }

        .user-details {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
            gap: 10px;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: var(--primary);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            flex-shrink: 0;
        }

        .user-name {
            font-weight: 600;
        }

        .user-role {
            font-size: 0.8rem;
            color: var(--gray);
        }

        .logout-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            width: 100%;
            padding: 10px;
            text-align: center;
            background-color: var(--gray-light);
            color: var(--gray);
            border: none;
            border-radius: var(--radius);
            cursor: pointer;
            transition: var(--transition);
            font-weight: 500;
        }

        .logout-btn:hover {
            background-color: var(--danger);
            color: white;
        }

        .badge {
            padding: 4px 8px;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
            color: white;
        }

        .badge.bg-warning {
            background-color: var(--warning);
            color: var(--dark);
        }

        @media (max-width: 992px) {
            #sidebar-close {
                display: block;
            }
        }

        /* Tampilkan tombol close di mobile */
    </style>
</aside>
