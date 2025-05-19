<!DOCTYPE html>
<html lang="en">
<x-layout.head title="Dashboard" :styles="false" />

<body>
    <!-- Sidebar -->
    <x-dashboard.sidebar />

    <!-- Main Content -->
    <div class="main-content">
        <header class="header">
            <button class="menu-toggle" id="dashboard-toggle">
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
                        <div class="stat-number">0</div>
                        <div class="stat-label">Total Views</div>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon success-bg">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="stat-details">
                        <div class="stat-number">0</div>
                        <div class="stat-label">Users</div>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon warning-bg">
                        <i class="fas fa-comments"></i>
                    </div>
                    <div class="stat-details">
                        <div class="stat-number">0</div>
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
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const dashboardToggle = document.getElementById("dashboard-toggle");
            const sidebar = document.getElementById("sidebar");
            const sidebarClose = document.getElementById("sidebar-close");

            if (dashboardToggle && sidebar) {
                // Toggle Sidebar
                dashboardToggle.addEventListener("click", function(e) {
                    e.preventDefault();
                    sidebar.classList.toggle("active");
                });

                // Close Sidebar when clicking close button (X)
                sidebarClose.addEventListener("click", function(e) {
                    e.preventDefault();
                    sidebar.classList.remove("active");
                });

                // Close Sidebar when clicking outside (on mobile)
                document.addEventListener("click", function(event) {
                    if (window.innerWidth <= 992) {
                        if (
                            !sidebar.contains(event.target) &&
                            !dashboardToggle.contains(event.target) &&
                            sidebar.classList.contains("active")
                        ) {
                            sidebar.classList.remove("active");
                        }
                    }
                });
            }
        });
    </script>
</body>

</html>
