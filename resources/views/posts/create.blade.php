<x-layout>

    <x-setting>
        <form action="/admin/posts" method="POST" class="w-full p-5" enctype="multipart/form-data">
            @csrf
            <h2 class="uppercase h2 text-center font-bold text-2xl">Publish New Post</h2>

            <x-form.input name="title" required/>
            <x-form.input name="slug" required/>
            <x-form.textarea name="body" required>{{ old('body' ?? '') }}</x-form.textarea>
            <x-form.input name="thumbnails" type="file" />

            <x-form.field>
                <x-form.label name="category" />
                <select name="category_id" id="category" class="w-full block p-2">
                    @foreach (\App\Models\Category::all() as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </x-form.field>
            <x-form.button>Create Post</x-form.button>
        </form>
    </x-setting>

</x-layout>