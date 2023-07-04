<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Service\Newspaper;
use Illuminate\Validation\ValidationException;

class NewspaperController extends Controller
{
    public function __invoke(Newspaper $newspaper)
    {
        request()->validate(['email'=>'required|max:50']);
    
        try{
            $newspaper->subscribe(request('email'));            
        }catch(\Exception $e){
            throw ValidationException::withMessages([
                'email' => 'This email cannot be subscribed . please try again'
            ]);
        }
        
        return redirect('/posts')->with('success','subscribed successfully');
    }
}
