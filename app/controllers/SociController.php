<?php

class SociController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        return View::make('socis.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('socis.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$user = User::find($id);
		$intercambios = Intercambio::where('pagador_id','=',$id)->orWhere('cobrador_id','=',$id)->orderBy('created_at', 'desc')->get();
        $ofertas = Anuncio::whereTipo('O')->whereUserId($id)->orderBy('created_at', 'desc')->get();
        $demandas = Anuncio::whereTipo('D')->whereUserId($id)->orderBy('created_at', 'desc')->get();
        return View::make('socis.show')
        			->with('user', $user)
        			->with('intercambios', $intercambios)
        			->with('ofertas', $ofertas)
        			->with('demandas', $demandas);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        return View::make('socis.edit');
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
