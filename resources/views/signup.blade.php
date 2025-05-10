@extends('layouts.layout')
@section('content')
<div id="signupPanel" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50">
    <div class="relative bg-white w-full max-w-md rounded-lg shadow-lg p-8">
        
        <!-- Close Button -->
        <button onclick="closeSignupPanel()" class="absolute top-3 right-3 text-gray-600 hover:text-black">
            ✖
        </button>

        <!-- Logo -->
        <div class="flex justify-center mb-4">
            <img src="{{ asset('images/qualityeduclogo.png') }}" alt="Logo" class="w-12">
        </div>

        <!-- Title -->
        <h2 class="text-center text-xl font-semibold text-gray-900 mb-4">Sign up</h2>

        <!-- Input Fields -->
        <input type="email" placeholder="Email address" class="w-full p-2 border border-gray-300 rounded mb-2 focus:ring focus:ring-red-300">
        <input type="password" placeholder="Password" class="w-full p-2 border border-gray-300 rounded mb-4 focus:ring focus:ring-red-300">

        <!-- Sign Up Button --> 
        <button class="w-full bg-red-700 text-white p-2 rounded text-center hover:bg-red-800 transition">
            SIGN UP
        </button>

        <!-- Alternative Sign Up -->
        <div class="text-center text-sm text-gray-500 mt-4">or sign up with</div>
        <div class="flex justify-center gap-4 mt-2">
            <button class="p-2 border rounded bg-gray-100 hover:bg-gray-200">
                <img src="{{ asset('images/googlelogo.png') }}" alt="Google" class="w-6">
            </button>
        </div>
    </div>
</div>

<!-- JavaScript to Close Modal -->
<script>
    function closeSignupPanel() {
        document.getElementById('signupPanel').remove();
    }
</script>
@endsection
