@extends('layouts.layout')

@section('content')
<div class="max-w-7xl mx-auto bg-white p-10 rounded-2xl shadow-xl mt-10">
    <h1 class="text-5xl font-extrabold text-red-900 mb-10 text-center tracking-tight animate-fade-in">Make a Difference</h1>

    <div class="flex flex-col lg:flex-row gap-10 items-start justify-between animate-slide-in-up">
        {{-- Left Panel: Image + Why Donate --}}
        <div class="w-full lg:w-1/2 space-y-6 animate-fade-in-left">
            <img src="{{ asset('images/donatepic.png') }}" alt="Donation" class="w-full rounded-xl shadow-lg">
            <div>
                <h2 class="text-2xl font-bold text-gray-800 mb-2">Why Donate?</h2>
                <p class="text-gray-600 text-lg leading-relaxed">
                    Your contribution helps us bring education closer to those who need it most.
                    Every peso you give is a step toward a brighter, more educated future.
                </p>
            </div>
        </div>

        {{-- Right Panel: Donation Form --}}
        <div class="w-full lg:w-1/2 bg-red-800 text-white p-10 rounded-2xl shadow-md animate-fade-in-right">
            <h2 class="text-3xl font-bold text-center mb-2">Donate Today</h2>
            <p class="text-center italic text-white/80 mb-6">Empower learning. Fund a future.</p>

            <form action="{{ route('payment.pay') }}" method="POST" class="space-y-6" onsubmit="return validateDonationAmount();">
                @csrf

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <input type="text" name="first_name" placeholder="First Name" class="p-3 rounded-lg text-gray-900 w-full focus:ring-4 focus:ring-white/30" required>
                    <input type="text" name="last_name" placeholder="Last Name" class="p-3 rounded-lg text-gray-900 w-full focus:ring-4 focus:ring-white/30" required>
                </div>

                <input type="email" name="email" placeholder="Email" class="w-full p-3 rounded-lg text-gray-900 focus:ring-4 focus:ring-white/30" required>

                <!-- <div class="grid grid-cols-2 sm:grid-cols-3 gap-4 text-center">
                    @foreach([20, 50, 100, 500, 1000] as $preset)
                        <button type="button" class="amount-btn p-3 bg-white text-red-800 rounded-xl font-bold hover:bg-gray-100 transition" data-amount="{{ $preset }}">
                            ₱{{ number_format($preset) }}
                        </button>
                    @endforeach
                </div> -->

                <input type="number" name="custom_amount" id="custom_amount" placeholder="₱ Enter Amount" class="w-full p-3 rounded-lg text-gray-900 focus:ring-4 focus:ring-white/30" min="1">

                <input type="hidden" name="amount" id="amount" value="">

                <button type="submit" class="w-full bg-white text-red-800 py-3 rounded-lg font-bold hover:bg-gray-200 transition flex items-center justify-center gap-2">
                    <img src="{{ asset('images/pay-icon.png') }}" alt="Pay" class="w-5 h-5"> DONATE
                </button>
            </form>

            <div class="mt-6 flex justify-center gap-4">
            <span class="font-medium text-white">Powered by:</span>
                <img src="{{ asset('images/paymongo.jpg')}}" alt="PayMongo" class="h-6">
                <span class="font-medium text-white">Paymongo</span>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const amountButtons = document.querySelectorAll('.amount-btn');
        const customAmountInput = document.getElementById('custom_amount');
        const amountField = document.getElementById('amount');

        amountButtons.forEach(button => {
            button.addEventListener('click', function () {
                amountField.value = this.dataset.amount;
                customAmountInput.value = '';
                amountButtons.forEach(btn => btn.classList.remove('ring-2', 'ring-white', 'bg-gray-200'));
                this.classList.add('ring-2', 'ring-white', 'bg-gray-200');
            });
        });

        customAmountInput.addEventListener('input', function () {
            amountField.value = this.value;
            amountButtons.forEach(btn => btn.classList.remove('ring-2', 'ring-white', 'bg-gray-200'));
        });
    });

    function validateDonationAmount() {
        const amount = document.getElementById('amount').value;
        if (!amount || isNaN(amount) || parseFloat(amount) <= 0) {
            alert("Please select or enter a valid donation amount.");
            return false;
        }
        return true;
    }
</script>
@endsection