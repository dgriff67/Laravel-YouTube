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
Route::get('/home', 'HomeController@home');
Route::get('/favourites', 'FavouritesController@index');

Route::get('/favourite/{id?}', [
            'uses' => 'FavouritesController@show',
            'as' => 'favourite.show'
        ]);

Route::get('/favourite/{id?}/edit', [
            'uses' => 'FavouritesController@edit',
            'as' => 'favourite.edit'
        ]);
Route::post('/favourite/{id?}/edit', [
            'uses' => 'FavouritesController@update',
            'as' => 'favourite.update'
        ]);

Route::post('/favourite/{id?}/delete', [
            'uses' => 'FavouritesController@destroy',
            'as' => 'favourite.delete'
        ]);

Route::get('/search', [
            'uses' => 'SearchController@results',
            'as' => 'search.get'
        ]);

Route::post('/search', [
            'uses' => 'FavouritesController@store',
            'as' => 'favourite.create'
        ]);

//Route::post('/create', [
//            'uses' => 'FavouritesController@store',
//            'as' => 'favourite.create'
//        ]);

//Route::get('/create', function(){
//    return redirect()->route('search.get');
//});

Route::get('users/register', 'Auth\RegisterController@showRegistrationForm');
Route::post('users/register', 'Auth\RegisterController@register');

Route::get('/tags', 'TagsController@index');
Route::post('/tags', 'TagsController@store');

Route::group(['prefix' => 'api'], function(){
    Route::get('favourites', ['as' => 'favourites', function () {
        return App\Favourite::all();
    }]);
});

Auth::routes();

Route::get('/home', 'HomeController@index');
