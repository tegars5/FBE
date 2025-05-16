<!DOCTYPE html>
<html lang="en">
    <x-layout.head title="Login"/>

<body class="login-page">
    <div class="login-container">
        <div class="login-image">
            <h1>Log in to your account.</h1>
            <p>Welcome back! Please enter your details to access your account.</p>
        </div>
        <div class="login-form-container">
            <h2>Login</h2>
            <form method="POST" action="{{ url('admin/login') }}" id="loginForm">
                @csrf
                <div class="input-group">
                    <label for="email">Email</label>
            <input autocomplete="off" type="email" name="email" id="email" required>
                </div>
                <div class="input-group">
                    <label for="password">Password</label>
                    <input autocomplete="off" type="password" id="password" name="password" placeholder="••••••••" required>
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
                    <div class="social-btn facebookku">f</div>
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