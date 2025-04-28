@php use Illuminate\Support\Str; @endphp
@props(['post'])

<div class="grid sm:grid-cols-2 gap-y-5 gap-x-10">
    <!-- Lesson Feature Image -->
    <div class="md:h-[400px] w-full overflow-hidden rounded-xl bg-zinc-300">
        <img 
            src="{{ Str::startsWith($post->featurePhoto, ['http://', 'https://']) 
                ? $post->featurePhoto 
                : asset('storage/' . $post->featurePhoto) }}" 
            alt="{{ $post->photo_alt_text ?? 'Lesson Cover' }}" 
            class="flex h-full w-full items-center justify-center object-cover object-top" />
    </div>

    <!-- Lesson Details -->
    <div class="flex flex-col justify-center space-y-10 py-4 sm:pl-10">
        <div>
            <div class="mb-5">
                <a href="{{ route('filamentlessons.post.show', ['post' => $post->slug]) }}" 
                   class="mb-4 block text-xl md:text-4xl font-semibold text-gray-900 hover:text-red-700 transition">
                    {{ $post->title }}
                </a>

                <div>
                    @foreach ($post->categories as $category)
                    <a href="{{ route('filamentlessons.category.post', ['category' => $category->slug]) }}">
                        <span class="bg-red-100 text-red-800 mr-2 inline-flex rounded-full px-2 py-1 text-xs font-semibold">
                            {{ $category->name }}
                        </span>
                    </a>
                    @endforeach
                </div>
            </div>

            <p class="mb-4 text-gray-700 leading-relaxed">
                {!! Str::limit($post->sub_title, 120) !!}
            </p>
        </div>

        <!-- Author Info -->
        <div class="flex items-center gap-4">
            <img 
                class="h-14 w-14 overflow-hidden rounded-full bg-zinc-300 object-cover text-[0]" 
                src="{{ $post->user->avatar ?? asset('images/default-avatar.png') }}" 
                alt="{{ $post->user->name() }}" />

            <div>
                <span title="{{ $post->user->name() }}" 
                      class="block max-w-[150px] overflow-hidden text-ellipsis whitespace-nowrap font-semibold text-gray-800">
                    {{ $post->user->name() }}
                </span>
                <span class="block text-sm font-medium text-zinc-600">
                    {{ $post->formattedPublishedDate() }}
                </span>
            </div>
        </div>
    </div>
</div>
