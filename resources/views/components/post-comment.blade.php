@props(['comment'])
<x-panel>
    <div class="flex mb-4">
        <div class="mr-4">
            <img src="https://i.pravatar.cc/150?u={{ $comment->id }}" width="60" height="60" alt="">
        </div>
        <header class="mb-4">
            <h3>{{ $comment->author->fullName }}</h3>
            <p class="text-xs">
                Posted
                <time> {{ $comment->created_at->format('d-F-Y') }}. </time>
            </p>
        </header>
    </div>

    <p>
        {{ $comment->body }}
    </p>
</x-panel>