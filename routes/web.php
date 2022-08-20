<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use GuzzleHttp\Middleware;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[PostController::class,'index']);


//show create form
Route::get('/posts/create',[PostController::class,'create'])->Middleware('auth');


//store posts data
Route::post('/posts',[PostController::class,'store'])->Middleware('auth');

//show Edit form
Route::get('/posts/{post}/edit',[PostController::class,'edit'])->Middleware('auth');

// update post
Route::put('/posts/{post}',[PostController::class, 'update'])->Middleware('auth');

//delete post
Route::delete('/posts/{post}',[PostController::class, 'delete'])->Middleware('auth');



//manage posts
Route::get('/posts/manage',[PostController::class,'manage'])->middleware('auth');


//single post
Route::get('/posts/{post}', [PostController::class,'show']);


//show register create form
Route::get('/register',[UserController::class,'create'])->middleware('guest');

//create new user
Route::post('/users',[UserController::class,'store']);

//log user out
Route::post('/logout',[UserController::class,'logout'])->Middleware('auth');

//show logn form
Route::get('/login',[UserController::class,'login'])->name('login')->middleware('guest');
//login user
Route::post('/users/authenticate',[UserController::class,'authenticate']);

