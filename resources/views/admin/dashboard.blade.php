<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="{{ asset('FBE/dashboard.css') }}">
    <script src="{{ asset('FBE/main.js') }}"></script>   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <!-- Sidebar -->
    <x-dashboard.sidebar />

    <!-- Main Content -->
    <div class="main-content">
        <header class="header">
            <button class="menu-toggle" id="toggle-sidebar">
                <i class="fas fa-bars"></i>
            </button>
            <h1 class="page-title">Dashboard</h1>
            <div class="header-actions">
                <span class="date">{{ date('l, d F Y') }}</span>
            </div>
        </header>

        <div class="content">
            <!-- Welcome Banner -->
            <div class="welcome-banner">
                <h1>Welcome, {{ Auth::user()->name }}!</h1>
                <p>Easily manage your website's articles and content using this admin dashboard.</p>
            </div>

            <!-- Stats Row -->
            <div class="stats-row">
                <div class="stat-card">
                    <div class="stat-icon primary-bg">
                        <i class="fas fa-newspaper"></i>
                    </div>
                    <div class="stat-details">
                        <div class="stat-number"> {{ count($articles) }}</div>
                        <div class="stat-label">Total Articles</div>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon secondary-bg">
                        <i class="fas fa-eye"></i>
                    </div>
                    <div class="stat-details">
                        <div class="stat-number">2,450</div>
                        <div class="stat-label">Total Views</div>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon success-bg">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="stat-details">
                        <div class="stat-number">18</div>
                        <div class="stat-label">Users</div>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon warning-bg">
                        <i class="fas fa-comments"></i>
                    </div>
                    <div class="stat-details">
                        <div class="stat-number">156</div>
                        <div class="stat-label">Comments</div>
                    </div>
                </div>
            </div>

            <!-- Article Management -->
            <x-dashboard.article-management :articles="$articles" />

        </div>
        <footer class="footer">
            <p>&copy; 2025 FujiyamaBiomasEnergy. All rights reserved.</p>
        </footer>
    </div>
</body>
</html>
