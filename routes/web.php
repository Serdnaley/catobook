<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return redirect()->route('home');
});

Auth::routes();

Route::middleware('auth')->group(function () {

    Route::get('/home', function () {
        return redirect()->route('welcome');
    })->name('home');

    Route::get('/welcome', function () {
        return view('welcome');
    })->name('welcome');

    Route::resources([
        'user' => 'UserController',
        'chat' => 'ChatController',
        'topic' => 'TopicController',
        'comment' => 'CommentController',
        'message' => 'MessageController',
        'category' => 'TopicCategoryController',
    ]);

});
