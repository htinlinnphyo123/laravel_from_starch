<x-layout>

    <main class="">
        @include('components._header')
        @include('posts._header')
        <x-post-grid :posts="$posts"/>

        {{ $posts->links() }}

        @include('components._footer')

    </main>

</x-layout>