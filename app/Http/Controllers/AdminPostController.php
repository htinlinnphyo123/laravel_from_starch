<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminPostController extends Controller
{   
    public function index()
    {
        return view('admin.posts.index',[
            'posts' => Post::latest()->paginate(5)
        ]);
    }
    public function create()
    {
        return view('posts.create');
    }
    public function store()
    {
        Post::create(array_merge($this->validationRules(),[
            'user_id' => auth()->id(),
            'thumbnails' => request()->file('thumbnails')->store('thumbnails')
        ]));

        return redirect('/posts')->with('success', 'Created Post Successfully');
    }
    public function destroy(Post $post)
    {
        $post->delete();
        return back()->with('success','Post Delete Successfully');
    }
    public function edit(Post $post)
    {
        return view('admin.posts.edit',[
            'post' => $post
        ]);
    }
    public function update(Post $post)
    {
        $attributes = $this->validationRules($post);

        if($attributes['thumbnails'] ?? false){
            $attributes['thumbnails'] = request()->file('thumbnails')->store('thumbnails');
        }

        $post->update($attributes);

        return back()->with('success','Post Updated Successfully');

    }

    public function validationRules(Post $post=null)
    {
        $post ??= new Post();
        return request()->validate([
            'title' => ['required', Rule::unique('posts', 'title')->ignore($post)],
            'slug' => ['required',Rule::unique('posts','slug')->ignore($post)],
            'thumbnails' => $post->exists ? ['image'] : ['required','image'],
            'body' => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id')]
        ]);
    }



}