@extends('layouts.layout')

@section('content')
<div class="max-w-5xl mx-auto mt-10 mb-10">
    <h1 class="text-4xl font-bold text-red-800 mb-6 text-center">Latest News and Updates</h1>

    <!-- News Item 1 -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden mb-8 flex flex-col md:flex-row">
        <div class="md:w-1/2">
            <img src="{{ asset('images/3bed6289-87fb-4fd2-b682-5cda611f0aef.png') }}" alt="News Event" class="w-full h-full object-cover">
        </div>
        <div class="md:w-1/2 p-6 flex flex-col justify-between">
            <div>
                <h2 class="text-2xl font-semibold text-gray-800 mb-2">Bringing Education to Every Corner</h2>
                <p class="text-gray-700 mb-4">
                    Our outreach programs have successfully launched in remote areas, providing quality education tools and building learning hubs for children who need them the most.
                </p>
            </div>
            <a href="#" class="inline-block bg-red-800 text-white px-6 py-2 rounded-full text-lg self-start">Read More →</a>
        </div>
    </div>

    <!-- News Item 2 -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden mb-8 flex flex-col md:flex-row">
        <div class="md:w-1/2">
            <img src="{{ asset('images/news-placeholder.jpg') }}" alt="New Learning Center" class="w-full h-full object-cover">
        </div>
        <div class="md:w-1/2 p-6 flex flex-col justify-between">
            <div>
                <h2 class="text-2xl font-semibold text-gray-800 mb-2">Opening of New Learning Centers</h2>
                <p class="text-gray-700 mb-4">
                    A new wave of learning centers is opening across the region, equipped with modern facilities and trained educators committed to making a difference.
                </p>
            </div>
            <a href="#" class="inline-block bg-red-800 text-white px-6 py-2 rounded-full text-lg self-start">Read More →</a>
        </div>
    </div>

    <!-- News Item 3 -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden flex flex-col md:flex-row">
        <div class="md:w-1/2">
            <img src="{{ asset('images/news-placeholder2.jpg') }}" alt="Scholarship Awards" class="w-full h-full object-cover">
        </div>
        <div class="md:w-1/2 p-6 flex flex-col justify-between">
            <div>
                <h2 class="text-2xl font-semibold text-gray-800 mb-2">Scholarship Awards: Celebrating Achievers</h2>
                <p class="text-gray-700 mb-4">
                    Congratulations to our scholarship recipients! These outstanding students have shown exceptional dedication to their studies and community leadership.
                </p>
            </div>
            <a href="#" class="inline-block bg-red-800 text-white px-6 py-2 rounded-full text-lg self-start">Learn More →</a>
        </div>
    </div>

</div>
@endsection
