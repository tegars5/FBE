<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="{{ asset('FBE/style.css') }}">
    <script src="{{ asset('FBE/main.js') }}"></script>   
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body class="login-page">
    <div class="login-container">
        <div class="login-image">
            <h1>Log in to your account.</h1>
            <p style="color: #fff; font-size: 16px; margin-top: 10px; position: relative; z-index: 2; max-width: 80%;">Welcome back! Please enter your details to access your account.</p>
        </div>
        <div class="login-form-container">
            <h2>Login</h2>
            <form method="POST" action="{{ url('admin/login') }}" id="loginForm">
                @csrf
                <div class="input-group">
                    <label for="email">Email</label>
            <input type="email" name="email" id="email" required>
                </div>
                <div class="input-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="••••••••" required>
                    <span class="toggle-password" onclick="togglePassword()">👁️</span>
                </div>
                <div class="forgot-password">
                    <a href="#">Forgot your password?</a>
                </div>
                <div class="button-wrapper">
                    <button type="submit" class="login-btn-dash">Login</button>
                    @if ($errors->any())
                    <div class="error-messages">
                        @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif
                  </div>
                
                <div class="divider">Or login with</div>
                
                <div class="social-login">
                    <div class="social-btn google">G</div>
                    <div class="social-btn facebook">f</div>
                    <div class="social-btn linkedin">in</div>
                </div>
                
                <div class="create-account">
                    Don't have an account? <a href="#">Create Account</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>