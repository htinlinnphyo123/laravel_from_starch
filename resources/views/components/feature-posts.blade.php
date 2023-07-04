@props(['post'])
<article
    class="transition-colors duration-300 hover:bg-gray-100 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl">
    <div class="py-6 px-5 lg:flex">
        <div class="lg:mr-8 w-5/12 h-96 rounded-xl">
            @if ($post->thumbnails)
                <img src="{{ asset('storage/'. $post->thumbnails) }}" alt="Blog Post illustration" class="w-full h-96 object-cover mx-auto rounded-xl">
            @else
                <img src="images/illustration-1.png" alt="" class="w-full h-96 object-cover mx-auto rounded-xl">            
            @endif
        </div>

        <div class="flex-1 flex flex-col justify-between">
            <header class="mt-8 lg:mt-0">
                <div class="space-x-2">
                    <a href="/posts?category={{ $post->category->name }}&{{ http_build_query(request()->except('category','page')) }}"
                        class="px-3 py-1 border border-blue-500 rounded-full text-blue-500 text-xs uppercase font-semibold"
                        style="font-size: 12px">{{ $post->category->name }}</a>
                </div>

                <div class="mt-4">
                    <h1 class="text-3xl">
                        {{ $post->title }}
                    </h1>

                    <span class="mt-2 block text-gray-400 text-xs">
                            Published <time>{{ $post->created_at->diffForHumans() }}</time>
                        </span>
                </div>
            </header>

            <div class="text-sm mt-2">
                <p>
                   {!! Str::substr($post->body,0,150) !!}
                </p>
            </div>

            <footer class="flex justify-between items-center mt-8">
                <div class="flex items-center text-sm">
                    <img src="/images/lary-avatar.svg" alt="Lary avatar">
                    <div class="ml-3">
                        @if ($post->author->userName ?? false)
                            <a href="/posts?author={{$post->author->userName}}&{{ http_build_query(request()->except('author','page')) }}" class="font-bold">{{ $post->author->userName}}</a>
                        @else
                            <a href="/posts?author=unknown&{{ http_build_query(request()->except('author','page')) }}">Unknown</a>
                        @endif
                        <h6>Mascot at Laracasts</h6>
                    </div>
                </div>

                <div class="hidden lg:block">
                    <a href="/post/{{ $post->id }}"
                        class="transition-colors duration-300 text-xs font-semibold bg-gray-200 hover:bg-gray-300 rounded-full py-2 px-8"
                    >Read More</a>
                </div>
            </footer>
        </div>
    </div>
</article>