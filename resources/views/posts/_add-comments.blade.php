@auth
    <form action="/posts/{{ $post->id }}/comments" method="POST">
        @csrf
        <x-panel>
            <div class="flex-shrink-0">
                <img src="https://i.pravatar.cc/150?u={{ auth()->id() }}" width="40" height="40" alt="">
            </div>
            <div>
                <h3 class="mb-4">Want to participate?</h3>
                <div class="mt-6">
                    <x-form.textarea name="body">{{ old('body') ?? '' }}</x-form.textarea>
                </div>
                <div class="flex flex-end">
                    <button class="bg-blue-500 mt-2 p-2 rounded-md text-white">Post</button>
                </div>
            </div>
        </x-panel>
    </form>
@else
    <span class="font-semibold text-lg border border-gray-300 p-3 rounded-sm">
        <a href="/register" class="hover:text-blue-500">Register</a> Or <a href="/login" class="hover:text-blue-500">Login</a> To participate your comment.
    </span>
@endauth