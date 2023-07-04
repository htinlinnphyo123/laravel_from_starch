<x-dropdown>

    <x-slot name="trigger">
        {{ isset($currentCategory) ? ucwords($currentCategory->name) : "Categories" }}
        <x-icon name="drop-arrow" />
    </x-slot>
    
    <x-dropdown-item href="/posts?{{ http_build_query(request()->except('category','page')) }}" :active="request()->routeIs('posts') && is_null(request()->getQueryString())">All</x-dropdown-item>

    @foreach ($categories as $c)
        <x-dropdown-item 
            href="/posts?category={{ $c->name }}&{{ http_build_query(request()->except('category','page')) }}"
            :active="isset($currentCategory) && $currentCategory->name === $c->name">
            {{ ucwords($c->name) }} 
        </x-dropdown-item>
    @endforeach

</x-dropdown>