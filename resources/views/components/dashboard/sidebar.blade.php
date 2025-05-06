 <!-- Sidebar -->
 <aside class="sidebar" id="sidebar">
    <div class="sidebar-header">
        <div class="logo">
            <div class="logo-icon">A</div>
            <span>AdminPanel</span>
        </div>
        <button class="menu-toggle" id="close-sidebar">
            <i class="fas fa-times"></i>
        </button>
    </div>
    <ul class="nav-menu">
        <li class="nav-item">
            <a href="{{ route('admin.dashboard') }}" 
               class="nav-link {{ request()->routeIs('admin.dashboard*') ? 'active' : '' }}">
                <i class="fas fa-home"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.articles') }}" 
               class="nav-link {{ request()->routeIs('admin.articles*') ? 'active' : '' }}">
                <i class="fas fa-newspaper"></i>
                <span>Articles</span>
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
        <form method="POST" action="{{ route('admin.logout') }}">
            @csrf
            <button type="submit" class="logout-btn">
                <i class="fas fa-sign-out-alt"></i> Logout
            </button>
        </form>
    </div>
</aside>