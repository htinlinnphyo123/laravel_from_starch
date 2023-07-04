@props(['category'])
<a href="/posts?category={{ $category->name }}&{{ http_build_query(request()->except('category','page')) }}"
    class="px-3 py-1 border border-blue-500 rounded-full text-blue-500 text-xs uppercase font-semibold"
    style="font-size: 10px">{{ $category->name }}
</a>