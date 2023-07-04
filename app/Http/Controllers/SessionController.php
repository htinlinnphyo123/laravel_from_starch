<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function destroy()
    {
        auth()->logout();
        return redirect()->route('posts')->with('success','Goodbye!');
    }
    public function create()
    {
        return view('session.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(auth()->attempt($attributes)){
            session()->regenerate();
            return redirect('/posts')->with('success','Welcome back!');
        }

        throw ValidationException::withMessages([
            'email' => 'Your credential do not exists,please try again.'
        ]);

    }

}
