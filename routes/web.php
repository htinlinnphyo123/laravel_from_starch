<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\NewspaperController;

Route::post('newspaper',NewspaperController::class);

Route::get('/',function(){
    return redirect('/posts');
});

Route::get('posts',[PostsController::class,'index'])->name('posts');
Route::get('post/{post}',[PostsController::class,'show']);

Route::post('posts/{post:id}/comments',[CommentController::class,'store'])->middleware('auth');

//user logout
Route::post('logout',[SessionController::class,'destroy'])->name('logout')->middleware('auth');

Route::group(['middleware'=>'guest'],function(){
    Route::get('register',[UserController::class,'create'])->name('registerPage');
    Route::post('register',[UserController::class,'store'])->name('register');

    Route::get('login',[SessionController::class,'create'])->name('loginPage');
    Route::post('session',[SessionController::class,'store']);
});

Route::middleware('can:admin')->group(function(){
    Route::resource('admin/posts', AdminPostController::class);
    // Route::get('admin/posts/create',[AdminPostController::class,'create']);
    // Route::post('admin/posts',[AdminPostController::class,'store']);
    // Route::get('admin/posts',[AdminPostController::class,'index']);
    // Route::get('admin/post/{post}/edit',[AdminPostController::class,'edit']);
    // Route::delete('admin/post/{post}',[AdminPostController::class,'destroy']);
    // Route::patch('admin/post/{post}',[AdminPostController::class,'update']);
});
