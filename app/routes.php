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
Route::get('/', array('as' => 'home', 'uses' => 'HomeController@showWelcome'));


// Rutas para Admins
Route::group(array('before' => 'Sentinel\inGroup:Admins'), function() {
    Route::resource('admin/categorias', 'AdminCategoriaController');
    Route::get('tareas/{id}/completada', array('as' => 'tarea.completada', 'uses' => 'TareasController@completada'));
    Route::get('users/activar-usuario/{id}', array('as' => 'activarUsuario', 'uses' => 'SociController@activarUsuario'));
    Route::controller('search', 'SearchController');
});

// Rutas para usuarios activados
Route::group(array('before' => 'Sentinel\hasAccess:users'), function() {
	Route::get('publicar-oferta', array('as'=>'publicar-oferta', 'uses' => 'AnunciosController@crearoferta'));
	Route::get('publicar-demanda', array('as'=>'publicar-demanda', 'uses' => 'AnunciosController@creardemanda'));
	Route::get('socis/{id}', 'SociController@show');
	Route::post('sociImgStore', 'SociController@imgStore');
	Route::post('postImg', ['as'=>'post-img', 'uses' => 'SociController@postImg']);
	Route::post('crop', ['as' => 'soci-crop', 'uses' => 'SociController@crop']);
	Route::get('ofertas/usuario/{usuario}', array('as' => 'ofertas-usuario', 'uses' => 'AnunciosController@ofertasUsuario'));
	Route::get('demandas/usuario/{usuario}', array('as' => 'demandas-usuario', 'uses' => 'AnunciosController@demandasUsuario'));

});

// Rutas de acceso público
Route::resource('categorias', 'CategoriaController');

Route::resource('intercambios', 'IntercambiosController');
Route::get('intercambios/categoria/{cat_slug}', 'IntercambiosController@intercambiosCat');

// anuncios (ofertas)
Route::resource('anuncios', 'AnunciosController');

// ofertas y demandas
Route::get('ofertas', 'AnunciosController@ofertas');
Route::get('demandas', 'AnunciosController@demandas');

// ofertas y demandas filtradas por días
Route::get('ofertas/ultimos-{dias}-dias', array('as' => 'ofertas-ultimos-dias', 'uses' => 'AnunciosController@ofertas'));
Route::get('demandas/ultimos-{dias}-dias', array('as' => 'demandas-ultimos-dias', 'uses' => 'AnunciosController@demandas'));

// ofertas y demandas filtradas por categorías
Route::get('ofertas/{cat_slug}', array('uses' => 'AnunciosController@ofertasCat'));
Route::get('demandas/{cat_slug}', array('uses' => 'AnunciosController@demandasCat'));

Route::post('ofertas-cat', array('as' => 'ofertas-cat', 'uses' => 'AnunciosController@filtraOfertasCat'));

Route::resource('tallers', 'TallersController');

Route::resource('propuestas', 'PropuestasController');

Route::resource('noticias', 'NoticiasController');

Route::resource('tareas', 'TareasController');

Route::get('graficas1', function(){
	return View::make('estadisticas.flot');
});
Route::get('graficas2', function(){
	return View::make('estadisticas.morris');
});