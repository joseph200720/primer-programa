<?php

use App\Http\Controllers\dashboard\CategoryController;
use App\Http\Controllers\dashboard\PostController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/',function(){
    return view('Welcome');
});


Route::resource('post',PostController::class);
Route::resource('category',CategoryController::class);


//Route::get('post', [PostController::class, 'index']);
//Route::get('post/{post}', [PostController::class, 'show']);
//Route::get('post/create', [PostController::class, 'create']); 
Route::get('/Post/create', 'PostController@create')->name('Post.create');


//Route::get('post/{post}/edit', [PostController::class, 'edit']);

//Route::post('post', [PostController::class, 'store']);
//Route::put('post', [PostController::class, 'udapte']);
//Route::delete('post', [PostController::class, 'delete']);

