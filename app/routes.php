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

// Rutas para Admins
Route::group(array('before' => 'Sentinel\inGroup:Admins'), function() {
    Route::resource('admin/categorias', 'AdminCategoriaController');
});

// Rutas para usuarios registrados
Route::group(array('before' => 'Sentinel\auth'), function() {
	Route::get('publicar-oferta', array('as'=>'publicar-oferta', 'uses' => 'AnunciosController@crearoferta'));
	Route::get('publicar-demanda', array('as'=>'publicar-demanda', 'uses' => 'AnunciosController@creardemanda'));
	/*Route::get('socis/{id}', function($id)
	{
		$user = User::find($id);
		return View::make('users.show')->with('user', $user);
	});
	*/
	Route::get('socis/{id}', 'SociController@show');
});

// Rutas de acceso público
Route::resource('categorias', 'CategoriaController');

Route::resource('intercambios', 'IntercambiosController');

Route::resource('anuncios', 'AnunciosController');
Route::get('ofertas', 'AnunciosController@ofertas');
Route::get('ofertas/{cat_slug}', 'AnunciosController@ofertasCat');

Route::get('demandas', 'AnunciosController@demandas');
Route::get('demandas/{cat_slug}', 'AnunciosController@demandasCat');

Route::resource('tallers', 'TallersController');

Route::resource('propuestas', 'PropuestasController');