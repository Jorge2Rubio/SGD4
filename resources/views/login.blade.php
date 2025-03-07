@extends('layouts.layout')
@section('content')
<div id="loginPanel" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50">
    <div class="relative bg-white w-full max-w-2xl rounded-lg shadow-lg flex">
        
        <!-- Left Side: Login Form -->
        <div class="w-1/2 p-8 relative bg-white" 
             style="background: linear-gradient(to right, rgba(255, 255, 255, 1), rgba(255, 255, 255, 0.5));">
            <!-- Close Button -->
            <button onclick="closeLoginPanel()" class="absolute top-3 right-3 text-gray-600 hover:text-black">
                ✖
            </button>

            <!-- Logo -->
            <div class="flex justify-center mb-4">
                <img src="{{ asset('images/qualityeduclogo.png') }}" alt="Logo" class="w-12">
            </div>

            <!-- Title -->
            <h2 class="text-center text-xl font-semibold text-gray-900 mb-4">Welcome to Quality Education</h2>

            <!-- Input Fields -->
            <input type="email" placeholder="Email" class="w-full p-2 border border-gray-300 rounded mb-2 focus:ring focus:ring-red-300">
            <input type="password" placeholder="Password" class="w-full p-2 border border-gray-300 rounded mb-4 focus:ring focus:ring-red-300">

            <!-- Sign In Button --> 
            <a href="{{ url('/profile') }}" class="w-full bg-red-700 text-white p-2 rounded text-center block hover:bg-red-800 transition">
                SIGN IN
            </a>

            <!-- Forgot Password -->
            <p class="text-center text-sm text-gray-500 mt-2">
                <a href="#" class="text-red-600 hover:underline">Forgot Password?</a>
            </p>
            
            <!-- Sign Up Link -->
            <p class="text-center text-sm text-gray-500 mt-2">
                Don't have an account? <a href="/signup" class="text-red-600 hover:underline">Sign up</a>
            </p>
        </div>

        <!-- Right Side: Background Image -->
        <div class="w-1/2 bg-cover bg-center rounded-r-lg" 
            style="background-image: url('{{ asset('images/SQG4_1.png') }}'); 
                   background-size: cover;
                   background-position: center;">
        </div>

    </div>
</div>

<!-- JavaScript to Close Modal -->
<script>
    function closeLoginPanel() {
        document.getElementById('loginPanel').remove();
    }
</script>
@endsection
