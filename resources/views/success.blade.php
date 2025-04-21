@extends('layouts.layout')
@section('content')
<div class="container mx-auto mt-10 text-center">
    <h1 class="text-2xl font-bold mb-4">Thank you for your donation, {{ $donorName }}!</h1>
    <p class="text-lg">Amount: ₱{{ number_format($amount, 2) }}</p>
    <p class="text-sm text-gray-500 mt-2">Session ID: {{ $sessionId }}</p>
</div>
@endsection
