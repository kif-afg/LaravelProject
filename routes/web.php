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

//route::get('/about',function ()

//{
    //return view ('pages.about');
//});

//Route::get('/movie', 'MovieController@index');
Route::resource('movie', 'MovieController');
Route::resource('rating','RatingController');
Route::resource('cast','CastController');
Route::resource('actor','ActorController');
Route::resource('genres','genresController');
Route::resource('genres_list','genres_listController');
Route::get('getmoviesid', 'MovieController@getmoviesid');
Route::get('getgenreid', 'MovieController@getmoviesid');
Route::get('getgenreid', 'GenresController@getGenreId');
Route::get('getactorid', 'ActorController@getactorid');