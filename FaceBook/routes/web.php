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
  Route::get('/findFriends', 'RequestController@findFriends');
    Route::get('/addFriend/{id}', 'RequestController@sendRequest');
    Route::get('/requests', 'RequestController@requests');
    Route::get('/accept/{name}/{id}', 'RequestController@accept');
    Route::get('friends', 'ProfileController@friends');
    Route::get('/accept/{name}/{id}', 'RequestController@accept');
    

Route::get('/newsfeed', [
'uses' =>'PostController@getpost',
'as'=>'newsfeed'
]

  );
Route::post('/createpost', [
    'uses' => 'PostController@postCreatePost',
    'as' => 'post.create',
    'middleware' => 'auth'
]);
Route::post('/like', [
    'uses' => 'PostController@postLikePost',
    'as' => 'like'
]);



    });
Route::get('/logout', 'Auth\LoginController@logout');