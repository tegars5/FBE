@props(['title', 'backLink'])

<div class="main-content">
    <header class="header">
        <button class="menu-toggle" id="toggle-sidebar">
            <i class="fas fa-bars"></i>
        </button>
        <h1 class="page-title">{{ $title }}</h1>
        <div class="header-actions">
            <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Back
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
                <h2>Article Information</h2>
            </div>
            <div class="form-body">
                <form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}" required>
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" required>{{ old('description') }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>   

                    <div class="form-group">
                      <label for="photo" class="form-label">Featured Image</label>
                      <div id="imagePreviewku" style="display: none; margin-top: 10px;">
                            <img id="previewku" src="#" alt="Preview Image" style="max-width: 200px;">
                        </div>
                        <div class="file-upload">
                            <input type="file" id="photo" name="photo" accept="image/*" class="@error('photo') is-invalid @enderror" onchange="previewImageku(this)">
                            <i class="fas fa-cloud-upload-alt"></i>
                            <p>Drag your image here or click to browse</p>
                            <span class="file-hint">JPG, PNG or GIF, Max size 2MB</span>
                        </div>
                        
                        @if(isset($article) && $article->photo)
                            <img src="{{ asset('storage/' . $article->photo) }}" alt="Current Photo" style="max-width: 200px; margin-top: 10px;">
                        @endif

                        @error('photo')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-buttons">
                        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">Cancel</a>
                        <button type="submit" class="btn btn-primary">Create Article</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <footer class="footer">
        <p>&copy; 2025 Fujiyama. All rights reserved.</p>
    </footer>
</div>

