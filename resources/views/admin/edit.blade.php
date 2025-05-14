<!DOCTYPE html>
<html lang="en">
    <x-layout.head title="Create Article" :styles="false"/>

<body>
   <x-dashboard.sidebar />

   <div class="main-content">
       <header class="header">
           <button class="menu-toggle" id="toggle-sidebar">
               <i class="fas fa-bars"></i>
           </button>
           <h1 class="page-title">Edit article</h1>
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
                        @if($article->photo)
                            <div class="current-image mb-3">
                                <img src="{{  $article->image_url}}" alt="Current Image" style="max-width: 200px; max-height: 200px;">
                                <p>Current image</p>
                            </div>
                        @endif
                        <div class="file-upload">
                            <input type="file" id="photo" name="photo" accept="image/*" class="@error('photo') is-invalid @enderror" onchange="previewImage(this)">
                            <i class="fas fa-cloud-upload-alt"></i>
                            <p>Drag your image here or click to browse</p>
                            <span class="file-hint">JPG, PNG or GIF, Max size 2MB</span>
                        </div>
                        <div class="image-preview" id="imagePreview" style="display: none;">
                            <img id="preview" src="#" alt="Preview">
                            <p>New image preview</p>
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
           <p>&copy; 2025 Fujiyama. All rights reserved.</p>
       </footer>
   </div>
   
</body>
</html>