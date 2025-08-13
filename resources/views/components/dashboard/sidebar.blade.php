<!-- Sidebar -->
<aside class="sidebar" id="sidebar">
    <div class="sidebar-header">
        <div class="logo">
            <div class="logo-icon">A</div>
            <span>AdminPanel</span>
        </div>
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
        {{-- MENU BARU UNTUK VERIFIKASI USER --}}
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
            <a href="{{ route('admin.articles.index') }}"
                class="nav-link {{ request()->routeIs('admin.articles.index') ? 'active' : '' }}">
                <i class="fas fa-list-ul"></i>
                <span>Articles</span>
            </a>
        </li>
        <li class="nav-item">
            {{-- Rute ini perlu Anda buat nanti --}}
            <a href="{{ route('admin.suppliers.index') }}" class="nav-link {{-- request()->routeIs('admin.suppliers*') ? 'active' : '' --}}">
                <i class="fas fa-industry"></i>
                <span>Suppliers</span>
            </a>
        </li>
        <li class="nav-item">
            {{-- Rute ini perlu Anda buat nanti --}}
            <a href="{{ route('admin.buyers.index') }}" class="nav-link {{-- request()->routeIs('admin.buyers*') ? 'active' : '' --}}">
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
        {{-- Rute logout ini sudah benar --}}
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="logout-btn">
                <i class="fas fa-sign-out-alt"></i> Logout
            </button>
        </form>
    </div>
</aside>
