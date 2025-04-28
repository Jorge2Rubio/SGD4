@extends('layouts.layout')

@section('content')
<div class="min-h-screen flex flex-col items-center justify-center bg-gray-100 px-4 py-12">
    <div class="bg-white shadow-xl rounded-2xl max-w-xl w-full p-8 text-center">
        <!-- Heroicon Check Circle -->
        <div class="mb-6">
            <svg class="mx-auto h-16 w-16 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2l4-4" />
                <circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="1.5" fill="none" />
            </svg>
        </div>

        <h1 class="text-2xl md:text-3xl font-bold text-gray-800 mb-4">
            Thank you for your donation, <br>{{ $donorName }}!
        </h1>
        <p class="text-lg text-gray-700 mb-2">
            Amount: <span class="font-semibold text-green-600">₱{{ number_format($amount, 2) }}</span>
        </p>
        <p class="text-sm text-gray-500 mb-6">
            Session ID: <code>{{ $sessionId }}</code>
        </p>

        <a href="{{ url('/') }}"
           class="inline-block px-6 py-3 bg-red-700 hover:bg-red-800 text-white font-semibold rounded-full transition duration-200">
            ← Go back to Home
        </a>
    </div>
</div>
@endsection
