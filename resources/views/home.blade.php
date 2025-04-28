@extends('layouts.layout')

@section('content')
<!-- First Section -->
<div class="relative flex flex-col md:flex-row items-center bg-white rounded-lg shadow-md overflow-hidden mx-auto mt-10 max-w-5xl">
    <div class="md:w-1/2 p-8">
        <h2 class="text-3xl font-semibold text-red-800">
            Ensure inclusive and equitable quality education
            and promote lifelong learning opportunities for all.
        </h2>
        <a href="/lessons" class="mt-4 inline-block bg-red-800 text-white px-6 py-2 rounded-full text-lg">DISCOVER MORE →</a>
    </div>
    <div class="md:w-1/2">
        <img src="{{ asset('images/students.png') }}" alt="Student Learning" class="w-full h-auto">
    </div>
</div>

<!-- Second Section -->
<div class="relative flex flex-col md:flex-row items-center bg-white rounded-lg shadow-md overflow-hidden mx-auto mt-10 max-w-5xl">
    <div class="md:w-1/2">
        <img src="{{ asset('images/35b93812-a70b-48e1-b77a-17e579621068.png') }}" alt="Community Engagement" class="w-full h-auto">
    </div>
    <div class="md:w-1/2 p-8">
        <h2 class="text-3xl font-semibold text-red-800">
            Empower communities through education-driven initiatives.
        </h2>
        <p class="mt-4 text-gray-700 text-lg">
            We believe that sustainable development begins with access to knowledge. 
            Partner with us to create meaningful, long-term impacts in marginalized areas.
        </p>
        <a href="/initiatives" class="mt-6 inline-block bg-red-800 text-white px-6 py-2 rounded-full text-lg">OUR INITIATIVES →</a>
    </div>
</div>

<!-- Third Section: Featured Programs -->
<div class="relative flex flex-col md:flex-row items-center bg-white rounded-lg shadow-md overflow-hidden mx-auto mt-10 max-w-5xl">
    <div class="md:w-1/2 p-8">
        <h2 class="text-3xl font-semibold text-red-800">
            Featured Programs and Scholarships
        </h2>
        <p class="mt-4 text-gray-700 text-lg">
            Unlock potential through our featured programs designed to uplift underserved youth. 
            Scholarships and specialized training available for those ready to shape their futures.
        </p>
        <a href="/programs" class="mt-6 inline-block bg-red-800 text-white px-6 py-2 rounded-full text-lg">EXPLORE PROGRAMS →</a>
    </div>
    <div class="md:w-1/2">
        <img src="{{ asset('images/programs.jpg') }}" alt="Featured Programs" class="w-full h-auto">
    </div>
</div>

<!-- Fourth Section: Get Involved -->
<div class="relative flex flex-col md:flex-row items-center bg-white rounded-lg shadow-md overflow-hidden mx-auto mt-10 max-w-5xl mb-10">
    <div class="md:w-1/2">
        <img src="{{ asset('images/volunteer.jpg') }}" alt="Volunteer" class="w-full h-auto">
    </div>
    <div class="md:w-1/2 p-8">
        <h2 class="text-3xl font-semibold text-red-800">
            Get Involved: Volunteer or Donate
        </h2>
        <p class="mt-4 text-gray-700 text-lg">
            Your contribution, whether time or resources, makes a real difference. 
            Join our mission to create a brighter future, one child at a time.
        </p>
        <a href="/get-involved" class="mt-6 inline-block bg-red-800 text-white px-6 py-2 rounded-full text-lg">JOIN US →</a>
    </div>
</div>
@endsection
