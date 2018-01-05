<?php

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
    $article = App\Article::first();
    return view('welcome', compact('article'));
});

Route::get('/{article}', function ($article) {
    $article = App\Article::find($article);
    return view('welcome', compact('article'));
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('videos/{video}', 'VideoController@show');

// follow button routes
Route::get('/api/toggleFollow', 'Api\\FollowController@toggleFollow');
Route::get('/api/following', 'Api\\FollowController@following');
