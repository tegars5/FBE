<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Article</title>
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
                <a href="{{ route('admin.dashboard') }}" class="nav-link">
                    <i class="fas fa-home"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link active">
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
            <h1 class="page-title">Edit Article</h1>
            <div class="header-actions">
                <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Back to Dashboard
                </a>
            </div>
        </header>

        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        
        @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
        @endif

        <div class="content">
            <div class="form-card">
                <div class="form-header">
                    <h2>Edit Article Information</h2>
                </div>
                <div class="form-body">
                    <form action="{{ route('articles.update', $article->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <div class="form-group">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $article->title) }}" required>
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" required>{{ old('description', $article->description) }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>   

                        <div class="form-group">
                            <label for="photo" class="form-label">Featured Image</label>
                            <div class="file-upload">
                                <input type="file" id="photo" name="photo" accept="image/*" class="@error('photo') is-invalid @enderror" onchange="previewImage(this)">
                                <i class="fas fa-cloud-upload-alt"></i>
                                <p>Drag your image here or click to browse</p>
                                <span class="file-hint">JPG, PNG or GIF, Max size 2MB</span>
                            </div>
                            <div class="image-preview" id="imagePreview">
                                @if($article->photo)
                                    <img id="preview" src="{{ asset('storage/' . $article->photo) }}" alt="Preview">
                                @else
                                    <p>No Image Available</p>
                                @endif
                            </div>
                            @error('photo')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="form-buttons">
                            <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">Cancel</a>
                            <button type="submit" class="btn btn-primary">Update Article</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <footer class="footer">
            <p>&copy; 2023 Dashboard Admin. All rights reserved.</p>
        </footer>
    </div>
</body>
</html>
