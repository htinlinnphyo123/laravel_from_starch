@props(['posts'])
@if (count($posts))
    <x-feature-posts :post="$posts[0]"/>

    @if(count($posts) > 1)
        <div class="lg:grid lg:grid-cols-6">
            @foreach($posts->skip(1) as $post)
                <x-posts-card :post="$post" class="{{ $loop->iteration < 3 ? 'col-span-3' : 'col-span-2' }}" />
            @endforeach
        </div>
    @endif
@else
    <h1 class="text-red-400 text-center text-3xl">There is no posts . </h1>    
@endif