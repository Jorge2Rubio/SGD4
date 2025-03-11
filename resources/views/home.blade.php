@extends('layouts.layout')
@section('content')
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
 @endsection