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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/profile','ProfileController@index')->name('profile');

Route::put('/profile/update','ProfileController@update')->name('profile.update');


Route::get('/post','PostController@index')->name('posts');

Route::get('/post/trashed','PostController@trash')->name('posts.trash');

Route::get('/post/create','PostController@create')->name('posts.create');

Route::post('/post/store','PostController@store')->name('posts.store');

Route::get('/post/show/{slag}','PostController@show')->name('posts.show');

Route::get('/post/edit/{id}','PostController@edit')->name('posts.edit');

Route::post('/post/update/{id}','PostController@update')->name('posts.update');

Route::get('/post/destroy/{id}','PostController@destroy')->name('posts.destroy');

Route::get('/post/soft/delete/{id}','PostController@softDelete')->name('soft.delete');

Route::get('/post/restore/{id}','PostController@restore')->name('restore');


//route for tag

Route::get('/tag','TagController@index')->name('tags');

Route::get('/tag/create','TagController@create')->name('tags.create');

Route::post('/tag/store','TagController@store')->name('tags.store');


Route::get('/tag/edit/{id}','TagController@edit')->name('tags.edit');

Route::post('/tag/update/{id}','TagController@update')->name('tags.update');

Route::get('/tag/destroy/{id}','TagController@destroy')->name('tags.destroy');

//route for user

Route::get('/user','UserController@index')->name('users');

Route::get('/user/create','UserController@create')->name('users.create');

Route::post('/user/store','UserController@store')->name('users.store');

Route::get('/user/destroy/{id}','UserController@destroy')->name('users.destroy');