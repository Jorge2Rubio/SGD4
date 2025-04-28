<x-blog-layout>
    <section class="pb-16">
        <div class="container mx-auto">
            <div class="mb-10 flex gap-x-2 text-sm font-semibold">
                <a href="{{ route('filamentlessons.post.index') }}" class="opacity-60">Home</a>
                <span class="opacity-30">/</span>
                <a href="{{ route('filamentlessons.post.all') }}" class="opacity-60">Lesson</a>
                <span class="opacity-30">/</span>
                <a title="{{ $post->slug }}" href="{{ route('filamentlessons.post.show', ['post' => $post->slug]) }}" class="hover:text-primary-600 max-w-2xl truncate font-medium transition-all duration-300">
                    {{ $post->title }}
                </a>
            </div>
            <div class="mx-auto mb-20 space-y-10">
                <div class="grid gap-x-20 sm:grid-cols-[minmax(min-content,10%)_1fr_minmax(min-content,10%)]">
                    <!-- Remove Left COMMENT BUTTON Column -->
                    <div></div>
                    
                    <div class="space-y-10">
                        <div>
                            <div class="flex flex-col justify-end">
                                <div class="mb-6 h-full w-full overflow-hidden rounded bg-slate-200">
                                    <img class="flex h-full min-h-[400px] items-center justify-center object-cover object-top text-sm text-xl font-semibold text-slate-400" src="{{ $post->featurePhoto }}" alt="{{ $post->photo_alt_text }}">
                                </div>
                                <div class="mb-6">
                                    <h1 class="mb-6 text-4xl font-semibold">
                                        {{ $post->title }}
                                    </h1>
                                    <p>{{ $post->sub_title }}</p>
                                    <div class="mt-2">
                                        @foreach ($post->categories as $category)
                                            <a href="{{ route('filamentlessons.category.post', ['category' => $category->slug]) }}">
                                                <span class="bg-primary-200 text-primary-800 mr-2 inline-flex rounded-full px-2 py-1 text-xs font-semibold">{{ $category->name }}</span>
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="mb-5 flex items-center justify-between gap-x-3 py-5">
                                    <div>
                                        <div class="flex items-center gap-4">
                                            <img class="h-14 w-14 overflow-hidden rounded-full border-4 border-white bg-zinc-300 object-cover text-[0] ring-1 ring-slate-300" src="{{ $post->user->avatar }}" alt="{{ $post->user->name() }}">
                                            <div>
                                                <span title="{{ $post->user->name() }}" class="block max-w-[150px] overflow-hidden text-ellipsis whitespace-nowrap font-semibold">{{ $post->user->name() }}</span>
                                                <span class="block whitespace-nowrap text-sm font-medium font-semibold text-zinc-600">
                                                    {{ $post->formattedPublishedDate() }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <article class="m-auto leading-6">
                                        {!! tiptap_converter()->asHTML($post->body, toc: true, maxDepth: 3) !!}
                                    </article>

                                    @if($post->tags->count())
                                    <div class="pt-10">
                                        <span class="mb-3 block font-semibold">Tags</span>
                                        <div class="space-x-2 space-y-1">
                                            @foreach ($post->tags as $tag)
                                                <a href="{{ route('filamentlessons.tag.post', ['tag' => $tag->slug]) }}" class="rounded-full border border-slate-300 px-3 py-1 text-sm font-medium font-medium text-black text-slate-600 hover:bg-slate-100">
                                                    {{ $tag->name }}
                                                </a>
                                            @endforeach
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Completely Removed Comment Section -->

                    </div>

                    <div>
                        {{-- Optional: Ads section (if you want to activate later) --}}
                    </div>
                </div>
            </div>

            <div>
                <div>
                    <div class="relative mb-6 flex items-center gap-x-8">
                        <h2 class="whitespace-nowrap text-xl font-semibold">
                            <span class="text-primary font-bold">#</span> Related Posts
                        </h2>
                        <div class="flex w-full items-center">
                            <span class="h-0.5 w-full rounded-full bg-slate-200"></span>
                        </div>
                    </div>
                    <div class="grid md:grid-cols-3 sm:grid-cols-1 gap-x-12 gap-y-10">
                        @forelse($post->relatedPosts() as $post)
                            <x-blog-card :post="$post" />
                        @empty
                            <div class="col-span-3">
                                <p class="text-center text-xl font-semibold text-gray-300">No related posts found.</p>
                            </div>
                        @endforelse
                    </div>
                    <div class="flex justify-center pt-20">
    <a href="{{ route('filamentlessons.post.all') }}" class="flex items-center justify-center md:gap-x-5 rounded-full bg-red-800 text-white px-20 py-4 text-sm font-semibold transition-all duration-300 hover:bg-red-700">
        <span>Show All Lessons</span>
        <svg xmlns="http://www.w3.org/2000/svg" class="w-6" viewBox="0 0 24 24">
            <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6 18L18 6m0 0H9m9 0v9" />
        </svg>
    </a>
</div>
                </div>
            </div>
        </div>
    </section>

    {!! $shareButton?->script_code !!}
</x-blog-layout>
