<!DOCTYPE html>
<html lang="en">
    <x-layout.head title="Create Article"/>

<body>
   <x-dashboard.sidebar />
    <!-- Main Content -->
 <x-dashboard.main-content title="Create New Article" back-link="{{ route('admin.dashboard') }}">
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