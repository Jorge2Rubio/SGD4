@extends('layouts.layout')

@section('content')

<div class="flex justify-center items-center min-h-screen bg-gray-100">
    <div class="bg-white shadow-lg rounded-lg p-8 w-full max-w-3xl">
        
        <!-- Profile Header -->
        <h2 class="text-2xl font-bold text-red-800 mb-6">PROFILE</h2>

        <div class="flex items-center space-x-8">
            
            <!-- Left: Profile Image -->
            <div class="text-center">
                <div class="w-32 h-32 bg-blue-500 rounded-full flex items-center justify-center overflow-hidden">
                    <img src="{{ asset('images/profile-placeholder.png') }}" alt="Profile Picture" class="w-full">
                </div>
                <button class="mt-4 bg-red-700 text-white px-4 py-2 rounded-lg hover:bg-red-800 transition">
                    Change Profile
                </button>
            </div>

            <!-- Right: Profile Form -->
            <div class="flex-1 bg-gray-50 p-6 rounded-lg">
                <form action="{{ route('profile') }}" method="POST">
                    <!-- @csrf
                    @method('PUT') -->

                    <label class="block text-gray-700 font-medium">Full Name</label>
                    <input type="text" name="name" value="Juan Dela Cruz" class="w-full p-2 border border-gray-300 rounded mb-3">

                    <label class="block text-gray-700 font-medium">Email</label>
                    <input type="email" name="email" value="juandelacruz@gmail.com" class="w-full p-2 border border-gray-300 rounded mb-3">

                    <label class="block text-gray-700 font-medium">Contact Number</label>
                    <input type="text" name="contact" value="+63 09 123 465" class="w-full p-2 border border-gray-300 rounded mb-3">

                    <label class="block text-gray-700 font-medium">Password</label>
                    <input type="password" name="password" value="********" class="w-full p-2 border border-gray-300 rounded mb-4">

                    <button type="submit" class="w-full bg-gray-400 text-white p-2 rounded cursor-not-allowed" disabled>
                        Edit
                    </button>
                </form>
            </div>

        </div>
    </div>
</div>
@endsection
