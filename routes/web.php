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

// Route::get('/', function () {
//     return view('welcome');
// });
Auth::routes();

Route::get('/', 'FrontendController@index');
Route::get('/user/profile/{id}', 'FrontendController@userAlbum')->name('user.album');

Route::post('/follow', 'FollowerController@followUnfollow')->middleware('auth');
Route::get('/userfollow', 'FollowerController@userFollow')->name('userfollow');

Route::get('profile', 'UserController@profile');
Route::post('profile', 'UserController@update_avatar');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/getalbums', 'AlbumController@getAlbums')->middleware('auth');
Route::get('/albums', 'AlbumController@index')->middleware('auth');
Route::get('/albums/create', 'AlbumController@create')->name('album.create')->middleware('auth');
Route::post('/albums/store', 'AlbumController@store');
Route::put('/albums/{id}/edit', 'AlbumController@update')->middleware('auth');
Route::delete('/albums/{id}/delete', 'AlbumController@destroy')->middleware('auth');



Route::get('upload/images/{id}', 'GalleryController@create')->middleware('auth');
Route::post('uploadImage', 'GalleryController@upload')->middleware('auth');
Route::get('getImages', 'GalleryController@images')->middleware('auth');
Route::delete('/image/{id}', 'GalleryController@destroy')->middleware('auth');
Route::get('/albums/{slug}/{id}', 'GalleryController@viewAlbum')->name('view.album');




