@extends('layouts.layout')

@section('content')
    <div class="max-w-5xl mx-auto bg-white p-8 rounded-lg shadow-md">
        <h1 class="text-4xl font-bold text-red-800 mb-6">Donation</h1>

        <div class="flex flex-col md:flex-row items-center">
            <!-- Left: Image -->
            <div class="md:w-1/2">
                <img src="{{ asset('images/donatepic.png') }}" alt="Donation" class="w-full rounded-lg shadow">
            </div>

            <!-- Right: Text Content -->
            <div class="md:w-1/2 md:pl-10">
                <h2 class="text-2xl font-bold text-black mb-4">Why Donate?</h2>
                <p class="text-gray-700 leading-relaxed">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                    Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                </p>

                <!-- Donate Button -->
                <a href="{{ url('/donate-now') }}" class="mt-6 inline-flex items-center bg-red-800 text-white px-6 py-3 rounded-full text-lg font-semibold hover:bg-red-900 transition">
                    DONATE <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>
        </div>
    </div>
@endsection
