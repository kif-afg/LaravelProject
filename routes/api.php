<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();

});

Route::resource('movie', 'MovieController');
Route::resource('rating','RatingController');
Route::resource('cast','CastController');
Route::resource('actor','ActorController');
Route::resource('genres','genresController');
Route::get('getmoviesid', 'MovieController@getmoviesid');
Route::resource('genres_list','genres_listController');
Route::get('getgenreid', 'GenresController@getGenreId');
Route::get('getactorid', 'ActorController@getactorid');
