<main class="max-w-7xl mx-auto mt-3 lg:mt-7 space-y-6">
    @include('components._header')

    <div class="flex flex-col md:flex-row">
        <aside class="mb-4 w-full md:w-48 flex justify-center">
            <ul class="flex md:flex-col">
                <li class="px-2 md:px-auto">
                    <a href="/admin/posts" class="{{ request()->is('admin/posts') ? 'text-blue-500' : '' }}">All Posts</a>
                </li>
                <li class="px-2 md:px-auto">
                    <a href="/admin/posts/create" class="{{ request()->is('admin/posts/create') ? 'text-blue-500' : '' }}">New Post</a>
                </li>
            </ul>
        </aside>
        <div class="flex-1 mx-4">
            <x-panel>
                {{ $slot }}
            </x-panel>
        </div>
    </div>

    @include('components._footer')

</main>