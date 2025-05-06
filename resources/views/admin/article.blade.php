<!DOCTYPE html>
<html lang="en">
    <x-layout.head title="Articles" :styles="false"/>

<body>
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

    <div class="content-card">
        <div class="card-header">
            <h2>Article Management</h2>
            <a href="{{ route('articles.create') }}" class="add-button">
                <i class="fas fa-plus"></i> Add Article
            </a>
        </div>
        <div class="card-body">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>Photo</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($articles as $article)
                    <tr>
                        <td>
                            @if($article->photo)
                                <!-- Display image using asset -->
                                <img class="table-image" src="{{ asset('storage/' . $article->photo) }}" alt="Article">
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
        <footer class="footer">
            <p>&copy; 2025 FujiyamaBiomasEnergy. All rights reserved.</p>
        </footer>
    </div>
</body>
</html>
