@extends('layouts.layout')

@section('content')
<div x-data="{ currentSlide: 0, slides: ['slide1', 'slide2', 'slide3'] }" class="relative w-screen h-screen overflow-hidden">

    <!-- Slides Wrapper -->
    <div class="flex transition-transform duration-500 ease-in-out h-full w-full"
         :style="'transform: translateX(-' + currentSlide * 100 + '%)'">
         
        <!-- Slide 1 - What We Do -->
        <div class="min-w-full h-full flex flex-col justify-center items-center bg-gray-100 text-gray-900">
            <h1 class="text-5xl font-bold mb-4 text-red-800">WHAT WE DO</h1>
            <p class="text-lg text-center w-3/4 text-gray-600">
                We work tirelessly to support underprivileged communities, students, and educators by providing:
            </p>

            <!-- Icons Section -->
            <div class="flex justify-center items-center gap-12 mt-8">
                <div class="flex flex-col items-center">
                    <i class="fas fa-book-reader text-red-800 text-5xl"></i>
                    <p class="mt-2 font-semibold">Educational Resources</p>
                </div>

                <div class="flex flex-col items-center">
                    <i class="fas fa-globe text-red-800 text-5xl"></i>
                    <p class="mt-2 font-semibold">Digital Learning Access</p>
                </div>

                <div class="flex flex-col items-center">
                    <i class="fas fa-graduation-cap text-red-800 text-5xl"></i>
                    <p class="mt-2 font-semibold">Scholarships & Financial Assistance</p>
                </div>

                <div class="flex flex-col items-center">
                    <i class="fas fa-school text-red-800 text-5xl"></i>
                    <p class="mt-2 font-semibold">Community Learning Centers</p>
                </div>

                <div class="flex flex-col items-center">
                    <i class="fas fa-chalkboard-teacher text-red-800 text-5xl"></i>
                    <p class="mt-2 font-semibold">Teacher & Mentor Support</p>
                </div>
            </div>
        </div>

        <!-- Slide 2 - About & Contact Us -->
        <div class="min-w-full h-full flex flex-col bg-red-800 text-white">
            <div class="text-center py-8">
                <h1 class="text-4xl font-bold">ABOUT</h1>
            </div>

            <div class="relative w-full h-60 flex items-center justify-center bg-cover bg-center"
                style="background-image: url('your-image-url.jpg');">
                <div class="absolute inset-0 bg-red-800 bg-opacity-70"></div>
                <div class="relative text-center">
                    <h2 class="text-3xl font-bold">LOREM IPSUM DOLOR SIT AMET.</h2>
                    <p class="mt-2 text-lg w-3/4 mx-auto">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                    </p>
                </div>
            </div>

            <div class="text-center py-8">
                <h1 class="text-4xl font-bold">CONTACT US</h1>
            </div>
        </div>

        <!-- Slide 3 - Why It Matters? -->
        <div class="relative min-w-full h-screen flex flex-col bg-red-800 text-white">
            <div class="text-center py-6">
                <h1 class="text-4xl font-bold">WHY IT MATTERS?</h1>
            </div>

            <div class="relative w-full h-full flex items-center justify-center bg-cover bg-center px-12 text-center"
                style="background-image: url('your-image-url.jpg');">
                <div class="absolute inset-0 bg-red-800 bg-opacity-80"></div>
                <div class="relative max-w-2xl">
                    <h2 class="text-3xl font-bold mb-4">WHY IT MATTERS?</h2>
                    <p class="text-lg leading-relaxed">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor 
                        incididunt ut labore et dolore magna aliqua.
                    </p>
                </div>
            </div>
        </div>

    </div>

    <!-- Navigation Buttons -->
    <button @click="currentSlide = (currentSlide - 1 + slides.length) % slides.length"
            class="absolute left-5 top-1/2 transform -translate-y-1/2 bg-white text-gray-800 p-4 rounded-full shadow-lg hover:bg-gray-300 transition">
        <i class="fas fa-arrow-left"></i>
    </button>

    <button @click="currentSlide = (currentSlide + 1) % slides.length"
            class="absolute right-5 top-1/2 transform -translate-y-1/2 bg-white text-gray-800 p-4 rounded-full shadow-lg hover:bg-gray-300 transition">
        <i class="fas fa-arrow-right"></i>
    </button>

</div>
@endsection
