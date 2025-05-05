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
                <a href="{{ route('admin.dashboard') }}" class="nav-link active">
                    <i class="fas fa-home"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.articles') }}" class="nav-link">
                    <i class="fas fa-newspaper"></i>
                    <span>Articles</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="fas fa-users"></i>
                    <span>Users</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="fas fa-cog"></i>
                    <span>Settings</span>
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
                <h1>Selamat Datang, {{ Auth::user()->name }}!</h1>
                <p>Kelola artikel dan konten website Anda dengan mudah menggunakan dashboard admin ini.</p>
            </div>

            <!-- Stats Row -->
            <div class="stats-row">
                <div class="stat-card">
                    <div class="stat-icon primary-bg">
                        <i class="fas fa-newspaper"></i>
                    </div>
                    <div class="stat-details">
                        <div class="stat-number">{{ count($articles) }}</div>
                        <div class="stat-label">Total Artikel</div>
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
                        <div class="stat-label">Pengguna</div>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon warning-bg">
                        <i class="fas fa-comments"></i>
                    </div>
                    <div class="stat-details">
                        <div class="stat-number">156</div>
                        <div class="stat-label">Komentar</div>
                    </div>
                </div>
            </div>

            <!-- Article Management -->
            <div class="content-card">
                <div class="card-header">
                    <h2>Manajemen Artikel</h2>
                    <a href="{{ route('articles.create') }}" class="add-button">
                        <i class="fas fa-plus"></i> Tambah Artikel
                    </a>
                </div>
                <div class="card-body">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>Foto</th>
                                <th>Judul</th>
                                <th>Deskripsi</th>
                                <th>Tanggal</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($articles as $article)
                            <tr>
                                <td>
                                    @if($article->photo)
                                        <!-- Menampilkan gambar dengan asset -->
                                        <img class="table-image" src="{{ asset('storage/' . $article->photo) }}" alt="Artikel">
                                    @else
                                        <div class="no-image">No Image</div>
                                    @endif
                                </td>
                                <td>{{ $article->title }}</td>
                                <td class="truncate">{{ $article->description }}</td>
                                <td class="date">{{ optional($article->created_at)->format('d M Y') }}</td>
                                <td><span class="badge badge-success">Published</span></td>
                                <td>
                                    <div class="table-actions">
                                        <a href="{{ route('articles.edit', $article->id) }}" class="action-btn edit-btn">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('articles.destroy', $article->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button class="action-btn delete-btn">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>                        
                    </table>
                </div>
            </div>
        </div>

        <footer class="footer">
            <p>&copy; 2025 Dashboard Admin. All rights reserved.</p>
        </footer>
    </div>
</body>
</html>