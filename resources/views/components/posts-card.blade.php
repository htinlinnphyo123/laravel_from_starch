@props(['post'])
<article
    {{ $attributes->merge(['class'=>"transition-colors duration-300 hover:bg-gray-100 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl"]) }}>
    <div class="py-6 px-5">
        <div>
            @if ($post->thumbnails)
                <img src="{{ asset('storage/'. $post->thumbnails) }}" alt="Blog Post illustration" class="rounded-xl w-full h-64 object-cover">
            @else
                <img src="images/illustration-1.png" alt="" class="rounded-xl w-full h-64 object-cover">            
            @endif
        </div>

        <div class="mt-8 flex flex-col justify-between">
            <header>
                <div class="space-x-2">
                    <x-category-button :category="$post->category" />
                </div>

                <div class="mt-4">
                    <h1 class="text-xl font-bold">
                        {{ $post->title }}
                    </h1>

                    <span class="mt-2 block text-gray-400 text-xs">
                        Published <time>{{ $post->created_at->diffForHumans() }}</time>
                    </span>
                </div>
            </header>

            <div class="text-sm mt-4">
                <p>
                    {!! Str::substr($post->body,0,200) !!} ..........
                </p>
            </div>

            <footer class="flex justify-between items-center mt-8">
                <div class="flex items-center text-sm">
                    <img src="/images/lary-avatar.svg" alt="Lary avatar">
                    <div class="ml-3">
                        @if ($post->author->userName ?? false)
                            <a href="/posts?author={{$post->author->userName}}&{{ http_build_query(request()->except('author','page')) }}" class="font-bold">{{ $post->author->userName}}</a>
                        @else
                            <a href="/posts?author={{ 'unknown' }}&{{ http_build_query(request()->except('author','page')) }}">Unknown</a>
                        @endif
                        <h6>Mascot at Laracasts</h6>
                    </div>
                </div>

                <div>
                    <a href="/post/{{ $post->id }}"
                        class="transition-colors duration-300 text-xs font-semibold bg-gray-200 hover:bg-gray-300 rounded-full py-2 px-3"
                    >
                        Read More
                    </a>
                </div>
            </footer>
        </div>
    </div>
</article>