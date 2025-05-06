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
    <x-dashboard.sidebar />
    <!-- Main Content -->
    <x-dashboard.main-content title="edit article" back-link="{{ route('admin.dashboard') }}">
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
    </x-dashboard.main-content> 
</body>
</html>
