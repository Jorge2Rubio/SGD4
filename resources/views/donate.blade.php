<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quality Education</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-gray-100">
    <!-- Navigation Bar -->
    <nav class="bg-red-800 text-white p-4 flex justify-between">
        <div class="text-lg font-bold flex items-center">
            <svg class="w-6 h-6 mr-2" fill="white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <path d="M12 0L0 6v12l12 6 12-6V6L12 0zM3 8.08L12 3l9 5.08v7.84L12 21l-9-5.08V8.08z"></path>
            </svg>
            <span>QUALITY EDUCATION</span>
        </div>
        <div class="flex items-center space-x-4">
            <a href="{{ url('/') }}" class="hover:underline">HOME</a>
            <a href="{{ url('/news') }}" class="hover:underline">NEWS</a>
            <a href="{{ url('/about') }}" class="hover:underline">ABOUT</a>
            <a href="{{ url('/donate') }}" class="hover:underline">DONATE</a>

            <!-- Sign In Dropdown -->
            <div class="relative" x-data="{ open: false, showModal: false }">
                <button @click="open = !open" class="flex items-center px-4 py-2 bg-white text-red-800 rounded-lg shadow hover:bg-gray-200">
                    Sign In
                    <svg class="w-4 h-4 ml-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </button>
                <div x-show="open" @click.away="open = false" class="absolute right-0 mt-2 w-40 bg-white rounded-md shadow-lg z-10">
                    <button @click="showModal = true; open = false" class="block w-full text-left px-4 py-2 text-gray-800 hover:bg-gray-100">Sign In</button>
                </div>

                <!-- Sign In Modal (Fix: Higher Z-Index & Centered) -->
<div x-show="showModal" class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center z-50" x-cloak>
    <div class="bg-white p-6 rounded-lg shadow-lg max-w-md w-full relative">
        <button @click="showModal = false" class="absolute top-2 right-2 text-gray-500 hover:text-gray-700">
            ✖
        </button>
        <div class="flex flex-col items-center">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-16 mb-2">
            <h2 class="text-xl font-semibold text-red-800">Welcome to Quality Education</h2>
        </div>
        <div class="mt-4">
            <button class="w-full flex items-center justify-center border px-4 py-2 rounded-md text-gray-700 hover:bg-gray-100">
                <img src="https://upload.wikimedia.org/wikipedia/commons/5/53/Google_%22G%22_Logo.svg" class="w-5 h-5 mr-2">
                Continue with Google
            </button>
            <button class="w-full flex items-center justify-center border px-4 py-2 rounded-md text-gray-700 mt-2 hover:bg-gray-100">
                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M21 4H3a2 2 0 00-2 2v12a2 2 0 002 2h18a2 2 0 002-2V6a2 2 0 00-2-2zm-3 2l-6 4-6-4h12zm-6 6l6-4v10H6V8l6 4z"></path>
                </svg>
                Continue with Email
            </button>
        </div>
        <p class="mt-4 text-sm text-gray-600 text-center">
            By continuing, you agree to our <a href="#" class="text-blue-600 hover:underline">Terms of Use</a> and <a href="#" class="text-blue-600 hover:underline">Privacy Policy</a>.
        </p>
    </div>
</div>
<!-- End Modal -->

            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="relative flex flex-col md:flex-row items-center bg-white rounded-lg shadow-md overflow-hidden mx-auto mt-10 max-w-5xl">
        <div class="md:w-1/2 p-8">
            <h2 class="text-3xl font-semibold text-red-800">
                Ensure inclusive and equitable quality education
                and promote lifelong learning opportunities for all.
            </h2>
            <a href="#" class="mt-4 inline-block bg-red-800 text-white px-6 py-2 rounded-full text-lg">DISCOVER MORE →</a>
        </div>
        <div class="md:w-1/2">
            <img src="{{ asset('images/students.png') }}" alt="Student Learning" class="w-full h-auto">
        </div>
    </div>
</body>
</html>
