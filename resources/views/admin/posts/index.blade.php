<x-layout>

    <x-setting>
        
        <ul role="list" class="divide-y divide-gray-100">
            @foreach ($posts as $p)
                <li class="grid grid-cols-2 md:grid-cols-3 gap-x-6 p-4 rounded-lg my-3 bg-white">
                    <div class="flex gap-x-4 items-center">
                        @if ($p->thumbnails)
                            <img class="h-12 w-12 flex-none rounded-full bg-gray-50" src="{{ asset('storage/'.$p->thumbnails) }}" alt="">                        
                        @else
                            <img class="h-12 w-12 flex-none rounded-full bg-gray-50 object-cover" src="../images/illustration-1.png" alt="">                        
                        @endif
                        <a href="/post/{{ $p->id }}" class="text-sm font-semibold leading-6 text-gray-900">{{ $p->title }}</a>
                    </div>
                    <div class="text-center self-center">
                        <span class="rounded-md bg-green-500 px-2 py-1 text-xs font-medium text-white ring-1 ring-inset ring-gray-500/10">Published</span>
                    </div>
                    <div class="hidden sm:flex justify-end items-center">
                        <a href="/admin/posts/{{ $p->id }}/edit" class="bg-blue-300 px-3 py-1 rounded-md">Edit</a>
                        <form action="/admin/posts/{{ $p->id }}" method="POST">
                            @csrf
                            @method('delete')
                            <button class="bg-red-300 px-3 py-1 ml-2 rounded-md">Delete</button>
                        </form>
                    </div>
                </li>
            @endforeach
          </ul>
          {{ $posts->links() }}

    </x-setting> 

</x-layout>