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
Route::get('/favourites', 'FavouritesController@index');
Route::get('/favourite/{id?}', 'FavouritesController@show');
Route::get('/favourite/{id?}/edit', 'FavouritesController@edit');
Route::post('/favourite/{id?}/edit', 'FavouritesController@update');
Route::post('/favourite/{id?}/delete', 'FavouritesController@destroy');
Route::post('/tag', 'TagsController@newTag');
Route::get('/tags', 'PagesController@tags');
Route::get('/create', 'FavouritesController@create');
Route::post('/create', 'FavouritesController@store');


Route::group(['prefix' => 'api'], function(){
    Route::get('favourites', ['as' => 'favourites', function () {
        return App\Favourite::all();
    }]);
});
