<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function create()
    {
        return view('register.create');
    }

    public function store()
    {
        
        $attributes = request()->validate([
            'userName' => 'required|min:5|max:50|unique:users,username',
            'fullName' => 'required|min:5|max:50',
            'email' => 'required|email|max:50|unique:users,email',
            'password' => 'required|min:5|max:20'
        ]);

        auth()->login(User::create($attributes));

        return redirect()->route('posts')->with('success','Your account has been created.');
    }


}

