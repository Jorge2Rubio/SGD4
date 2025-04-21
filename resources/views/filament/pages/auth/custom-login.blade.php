<x-filament::layouts.base>
    <div class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50">
        <div class="relative bg-white w-full max-w-2xl rounded-lg shadow-lg flex">

            {{-- Left Side: Login Form --}}
            <div class="w-1/2 p-8 relative bg-white" 
                 style="background: linear-gradient(to right, rgba(255, 255, 255, 1), rgba(255, 255, 255, 0.5));">

                {{-- Close Button (optional) --}}
                <button onclick="document.getElementById('loginPanel').remove()" 
                        class="absolute top-3 right-3 text-gray-600 hover:text-black">
                    ✖
                </button>

                {{-- Logo --}}
                <div class="flex justify-center mb-4">
                    <img src="{{ asset('images/qualityeduclogo.png') }}" alt="Logo" class="w-12">
                </div>

                {{-- Title --}}
                <h2 class="text-center text-xl font-semibold text-gray-900 mb-4">Welcome to Quality Education</h2>

                {{-- Laravel Livewire Form --}}
                <form wire:submit.prevent="authenticate" class="space-y-4">
                    {{ $this->form }}

                    {{-- Button Row --}}
                    <div class="flex gap-2">
                        <x-filament::button type="submit" class="w-1/2 justify-center">
                            Sign In
                        </x-filament::button>

                        <a href="{{ route('google.redirect') }}" 
                           class="w-1/2 flex justify-center items-center bg-red-600 hover:bg-red-700 text-white text-sm font-semibold rounded-md transition px-4 py-2">
                            <svg class="h-5 w-5 mr-2" viewBox="0 0 24 24">
                                <path fill="currentColor" d="M21.35 11.1h-9.17v2.95h5.42c-.23 1.18-1.38 3.45-5.42 3.45-3.27 0-5.95-2.71-5.95-6.05s2.68-6.05 5.95-6.05c1.87 0 3.12.79 3.84 1.48l2.62-2.56C16.6 3.1 14.58 2 12 2 6.74 2 2.5 6.24 2.5 11.5S6.74 21 12 21c6.33 0 10.5-4.42 10.5-10.6 0-.69-.08-1.21-.15-1.3z"/>
                            </svg>
                            Google
                        </a>
                    </div>
                </form>

                {{-- Forgot Password --}}
                <p class="text-center text-sm text-gray-500 mt-2">
                    <a href="#" class="text-red-600 hover:underline">Forgot Password?</a>
                </p>

                {{-- Sign Up Link --}}
                <p class="text-center text-sm text-gray-500 mt-2">
                    Don't have an account? <a href="/signup" class="text-red-600 hover:underline">Sign up</a>
                </p>
            </div>

            {{-- Right Side: Image --}}
            <div class="w-1/2 bg-cover bg-center rounded-r-lg" 
                 style="background-image: url('{{ asset('images/SQG4_1.png') }}');">
            </div>
        </div>
    </div>
</x-filament::layouts.base>
