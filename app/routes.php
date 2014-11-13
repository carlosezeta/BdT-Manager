<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

// Set Home Route (needed for sydurham/Sentinel)
 Route::get('/', array('as' => 'home', function()
{
    return View::make('hello');
}));

/*
Route::get('categorias/create', array('before' => 'Sentinel\inGroup:Admins',
 
            'uses' => 'CategoriaController@create'));

Route::resource('categorias', 'CategoriaController',
	array('except' => array('create'));
*/
Route::group(array('before' => 'Sentinel\inGroup:Admins'), function() {
    Route::resource('admin/categorias', 'AdminCategoriaController');
});

Route::resource('categorias', 'CategoriaController');