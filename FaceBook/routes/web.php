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
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', 'HomeController@index');
      Route::get('/profile', 'HomeController@index');
  Route::get('/profile/{slug}', 'ProfileController@index');
  Route::get('/changePhoto', function(){

    return view ('profile.pic');
  });
  Route::post('/uploadPhoto', 'ProfileController@uploadPhoto');
  Route::get('/findFriends', 'ProfileController@findFriends');
    Route::get('/addFriend/{id}', 'ProfileController@sendRequest');
    Route::get('/requests', 'ProfileController@requests');
    Route::get('/accept/{name}/{id}', 'ProfileController@accept');
    Route::get('friends', 'ProfileController@friends');
    Route::get('/accept/{name}/{id}', 'ProfileController@accept');
    

 Route::get('/newsfeed', 'PostController@getpostsbytime');
Route::post('/createpost', [
    'uses' => 'PostController@postCreatePost',
    'as' => 'post.create',
    'middleware' => 'auth'
]);


    });
Route::get('/logout', 'Auth\LoginController@logout');