<x-layout>

    <x-setting>
        <form action="/admin/posts/{{ $post->id }}" method="POST" class="w-full p-5" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <h2 class="uppercase h2 text-center font-bold text-2xl">Edit Your New Post</h2>

            <x-form.input name="title" required :value="old('title',$post->title)"/>
            <x-form.textarea name="body" required>{{ $post->body ?? old('body') }}</x-form.textarea>
            <x-form.textarea name="slug" required>{{ $post->slug ?? old('slug') }}</x-form.textarea>
            <div class="flex mt-6 items-center">
                <x-form.input name="thumbnails" type="file" :value="old('thumbnails',$post->thumbnails)"/>
                @if ($post->thumbnails)
                    <img src="{{ asset('storage/'.$post->thumbnails) }}" alt="" class="rounded-xl object-cover w-24 h-24 ml-6 mt-6"> 
                @else
                    <img src="/../images/illustration-1.png" alt="" class="rounded-xl object-cover w-24 h-24 ml-6 mt-6">              
                @endif
            </div>

            <x-form.field>
                <x-form.label name="category" />
                <select name="category_id" id="category" class="w-full block p-2">
                    @foreach (\App\Models\Category::all() as $category)
                        <option value="{{ $category->id }}" {{ $category->id===$post->category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
            </x-form.field>
            <x-form.button>Update Post</x-form.button>
        </form>
    </x-setting>

</x-layout>