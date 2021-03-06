<?php

use App\Http\Controllers\PostsController;
use App\Http\Controllers\ProfilesController;
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



Route::POST('/p','PostsController@store');
Route::get('/p/create','PostsController@create');
Route::GET('/p/{post}','PostsController@show');

Route::POST('follow/{user}','FollowsController@store');
//showing a single user's profile
Route::get('/profile/{user}', 'ProfilesController@index')->name('profile.show');
//Shows the edit form
Route::get('/profile/{user}/edit','ProfilesController@edit')->name('profile.edit');
//Updates the record
Route::patch('/profile/{user}','ProfilesController@update')->name('profile.update');

// Auth::routes();

// Route::get('/home', 'ProfilesController@index')->name('home');

Route::get('/home', 'HomeController@index')->name('home');
