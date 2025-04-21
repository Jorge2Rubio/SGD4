@extends('layouts.layout')

@section('content')
    <div class="max-w-5xl mx-auto bg-white p-8 rounded-lg shadow-md">
        <h1 class="text-4xl font-bold text-red-800 mb-6">Donation</h1>

        <div class="flex flex-col md:flex-row items-start">
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
                    Duis aute irure dolor in reprehenderit in voluptate velit esse cillum.
                </p>
            </div>
        </div>

        <!-- Donate Today Panel -->
        <div class="mt-10 bg-red-800 text-white p-8 rounded-lg shadow-md max-w-3xl mx-auto">
            <h2 class="text-2xl font-bold text-center">DONATE TODAY</h2>
            <p class="text-center italic mb-6">Help support our cause</p>

            <!-- Donation Form -->
            <form action="{{ route('payment.pay') }}" method="POST" class="space-y-4">
                @csrf

                <div class="grid grid-cols-2 gap-4">
                    <input type="text" name="first_name" placeholder="First Name" class="p-3 rounded-lg text-black w-full" required>
                    <input type="text" name="last_name" placeholder="Last Name" class="p-3 rounded-lg text-black w-full" required>
                </div>

                <input type="email" name="email" placeholder="Email" class="w-full p-3 rounded-lg text-black" required>

                <!-- Donation Amount Buttons -->
                <div class="grid grid-cols-3 gap-4 text-center">
                    <button type="button" class="amount-btn p-3 bg-white text-red-800 rounded-lg font-bold" data-amount="20">₱20</button>
                    <button type="button" class="amount-btn p-3 bg-white text-red-800 rounded-lg font-bold" data-amount="50">₱50</button>
                    <button type="button" class="amount-btn p-3 bg-white text-red-800 rounded-lg font-bold" data-amount="100">₱100</button>
                    <button type="button" class="amount-btn p-3 bg-white text-red-800 rounded-lg font-bold" data-amount="500">₱500</button>
                    <button type="button" class="amount-btn p-3 bg-white text-red-800 rounded-lg font-bold" data-amount="1000">₱1000</button>
                </div>

                <!-- Custom Amount Input -->
                <input type="number" name="custom_amount" id="custom_amount" placeholder="₱ Custom Amount" class="w-full p-3 rounded-lg text-black">

                <input type="hidden" name="amount" id="amount" value="">

                <button type="submit" class="w-full bg-white text-red-800 py-3 rounded-lg font-bold hover:bg-gray-200">
                    DONATE
                </button>
            </form>
        </div>
    </div>

    <!-- JavaScript for handling donation amount selection -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const amountButtons = document.querySelectorAll('.amount-btn');
            const customAmountInput = document.getElementById('custom_amount');
            const amountField = document.getElementById('amount');

            // Click event for preset buttons
            amountButtons.forEach(button => {
                button.addEventListener('click', function () {
                    amountField.value = this.dataset.amount;
                    customAmountInput.value = ''; // Clear custom amount
                });
            });

            // Input event for custom amount
            customAmountInput.addEventListener('input', function () {
                amountField.value = this.value;
            });
        });
    </script>
@endsection