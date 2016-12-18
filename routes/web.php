<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', 'PagesController@home');
Route::get('/favourites', 'PagesController@favourites');
Route::get('/tags', 'PagesController@tags');
Route::get('/create', 'FavouritesController@create');
Route::post('/contact', 'FavouritesController@store');


Route::group(['prefix' => 'api'], function(){
    Route::get('favourites', ['as' => 'favourites', function () {
        return App\Favourite::all();
    }]);
});
