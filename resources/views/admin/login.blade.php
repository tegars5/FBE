<!DOCTYPE html>
<html lang="en">
<x-layout.head title="Login" />

<body class="bg-gradient-to-r from-green-600 to-green-800 flex justify-center items-center min-h-screen p-5">

    <div class="flex w-full max-w-screen-md bg-white rounded-3xl overflow-hidden shadow-xl">

        <!-- Image Section -->
        <div class="relative w-1/2 bg-cover bg-center p-10 text-white"
            style="background-image: url('{{ asset('assets/login-background.jpg') }}')">
            <div class="absolute inset-0 bg-gradient-to-t from-black opacity-40"></div>
            <h1 class="relative z-10 text-4xl md:text-5xl font-bold text-shadow-lg">Log in to your account.</h1>
            <p class="relative z-10 mt-4 text-lg md:text-xl">Welcome back! Please enter your details to access your
                account.</p>
        </div>

        <!-- Form Section -->
        <div class="w-1/2 p-10 flex flex-col justify-center">

            <h2 class="text-3xl font-bold mb-8">Login</h2>

            <form method="POST" action="{{ url('admin/login') }}" id="loginForm">
                @csrf

                <!-- Email Input -->
                <div class="mb-6">
                    <label for="email" class="block text-gray-700 text-sm font-medium mb-2">Email</label>
                    <input autocomplete="off" type="email" name="email" id="email"
                        class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500"
                        required>
                </div>

                <!-- Password Input -->
                <div class="mb-6 relative">
                    <label for="password" class="block text-gray-700 text-sm font-medium mb-2">Password</label>
                    <input autocomplete="off" type="password" id="password" name="password" placeholder="••••••••"
                        class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500"
                        required>
                    <span class="absolute right-4 top-1/2 transform -translate-y-1/2 cursor-pointer text-gray-500">
                        <i class="fas fa-eye"></i>
                    </span>
                </div>

                <!-- Forgot Password Link -->
                <div class="text-right mb-6">
                    <a href="#" class="text-gray-600 text-sm">Forgot your password?</a>
                </div>

                <!-- Error Messages -->
                @if ($errors->any())
                    <div class="bg-red-100 text-red-700 p-3 rounded-lg mb-6">
                        @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif

                <!-- Submit Button -->
                <div class="text-center mb-6">
                    <button type="submit"
                        class="w-full py-3 bg-green-800 text-white rounded-lg font-semibold hover:bg-green-700">Login</button>
                </div>

                <!-- Divider -->
                <div class="flex items-center mb-6">
                    <div class="flex-1 border-t border-gray-300"></div>
                    <span class="mx-4 text-gray-600">Or login with</span>
                    <div class="flex-1 border-t border-gray-300"></div>
                </div>

                <!-- Social Login Buttons -->
                <div class="flex justify-center gap-6 mb-6">
                    <button
                        class="w-12 h-12 bg-red-600 text-white rounded-full flex items-center justify-center text-xl hover:scale-105 transition transform">
                        <i class="fab fa-google"></i>
                    </button>
                    <button
                        class="w-12 h-12 bg-blue-600 text-white rounded-full flex items-center justify-center text-xl hover:scale-105 transition transform">
                        <i class="fab fa-facebook-f"></i>
                    </button>
                    <button
                        class="w-12 h-12 bg-blue-700 text-white rounded-full flex items-center justify-center text-xl hover:scale-105 transition transform">
                        <i class="fab fa-linkedin-in"></i>
                    </button>
                </div>

            </form>
        </div>

    </div>

</body>

</html>
