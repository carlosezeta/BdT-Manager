<?php

class IntercambiosController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$intercambios = Intercambio::all();
        return View::make('intercambios.index')->with('intercambios', $intercambios)->with('titulo_pagina', 'Todos los intercambios');
	}


	public function intercambiosCat($cat_slug)
	{
		$cat = Categoria::whereSlug($cat_slug)->get()->first();
		if (empty($cat)) {
			Redirect::to('intercambios');
		} else {
			$intercambios = Intercambio::whereCategoriaId($cat->id)->orderBy('created_at', 'desc')->get();

			return View::make('intercambios.index')->with('intercambios', $intercambios)->with('titulo_pagina', 'Intercambios de '.$cat->nombre);
		}
	}


	
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function Create()
	{

		$usuarios = User::all();

	    $users = $usuarios->filter(function($user)
	    {
	        if ($user->id <> Session::get('userId')) {
	            return true;
	        }
	    })->lists('username', 'first_name', 'id');


		$categorias = Categoria::orderBy('nombre')->lists('nombre', 'id');
		return View::make('intercambios.create')->with('categorias', $categorias)->with('users', $users);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$pagador_id = Session::get('userId');

		$cobrador_id = Input::get('cobrador_id');
		$categoria_id = Input::get('categoria_id');
		$horas = Input::get('horas');
		$descripcion = Input::get('descripcion');

		$intercambio = new Intercambio;
		$intercambio->pagador_id = $pagador_id;
		$intercambio->cobrador_id = $cobrador_id;
		$intercambio->categoria_id = $categoria_id;
		$intercambio->horas = $horas;
		$intercambio->descripcion = $descripcion;
		$intercambio->save();

		$pagador = User::find($pagador_id);
		$pagador->horas -= $horas;
		$pagador->save();

		$cobrador = User::find($cobrador_id);
		$cobrador->horas += $horas;
		$cobrador->save();

        return View::make('intercambios.creado');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        return View::make('intercambios.show');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        return View::make('intercambios.edit');
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
