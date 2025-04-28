<x-blog-layout>
    <section class="py-12 min-h-screen bg-gray-100 transition-all duration-500 ease-in-out">
        <div class="max-w-7xl mx-auto px-6">
            {{-- Check if posts exist --}}
            @if(count($posts))
                {{-- Hero Post --}}
                <div class="bg-white rounded-3xl shadow-lg overflow-hidden flex flex-col md:flex-row items-center mb-12 animate-fade-in">
                    @foreach ($posts->take(1) as $post)
                        <x-blog-feature-card :post="$post" />
                    @endforeach
                </div>

                {{-- Blog Grid --}}
                <div class="grid md:grid-cols-3 gap-8 mt-10">
                    @foreach ($posts->skip(1) as $post)
                        <div class="bg-white rounded-2xl shadow-md hover:shadow-lg transition-all duration-300 p-6 animate-fade-in">
                            <x-blog-card :post="$post" />
                        </div>
                    @endforeach
                </div>

                {{-- Show All Button --}}
                <div class="flex justify-center mt-14">
                    <a href="{{ route('filamentlessons.post.all') }}" class="flex items-center gap-2 bg-red-800 text-white py-3 px-10 rounded-full font-semibold hover:bg-red-700 transition">
                        Show All Lessons
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                        </svg>
                    </a>
                </div>
            @else
                {{-- No posts fallback --}}
                <div class="flex items-center justify-center h-[60vh]">
                    <p class="text-2xl font-semibold text-gray-400">No posts found</p>
                </div>
            @endif
        </div>
    </section>
</x-blog-layout>
