<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login-form</title>
    <link rel="stylesheet" href="{{ asset('FBE/style.css') }}">
    <script src="{{ asset('FBE/main.js') }}"></script> 
</head>
<body>

    <form method="POST" action="{{ url('admin/login') }}" class="login-form">
        @csrf
        <h2>Login</h2>
        <div>
            <label for="email">Email</label>
            <input type="email" name="email" id="email" required>
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" name="password" id="password" required>
        </div>
        <button type="submit">Login</button>
        @if ($errors->any())
            <div class="error-messages">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif
    </form>

    <script src="script.js"></script>
</body>
</html>
