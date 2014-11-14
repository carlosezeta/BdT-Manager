<?php

class AnunciosController extends BaseController {

	/**
	 * Anuncio Repository
	 *
	 * @var Anuncio
	 */
	protected $anuncio;

	public function __construct(Anuncio $anuncio)
	{
		$this->anuncio = $anuncio;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$anuncios = $this->anuncio->all();

		return View::make('anuncios.index', compact('anuncios'));
	}

	public function ofertas()
	{
		$anuncios = Anuncio::whereTipo('O')->orderBy('created_at', 'desc')->get();
		return View::make('anuncios.index')->with('anuncios', $anuncios);
	}

	public function demandas()
	{
		$anuncios = Anuncio::whereTipo('D')->orderBy('created_at', 'desc')->get();
		return View::make('anuncios.index')->with('anuncios', $anuncios);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('anuncios.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Anuncio::$rules);

		if ($validation->passes())
		{
			$this->anuncio->create($input);

			return Redirect::route('anuncios.index');
		}

		return Redirect::route('anuncios.create')
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$anuncio = $this->anuncio->findOrFail($id);

		return View::make('anuncios.show', compact('anuncio'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$anuncio = $this->anuncio->find($id);

		if (is_null($anuncio))
		{
			return Redirect::route('anuncios.index');
		}

		return View::make('anuncios.edit', compact('anuncio'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$input = array_except(Input::all(), '_method');
		$validation = Validator::make($input, Anuncio::$rules);

		if ($validation->passes())
		{
			$anuncio = $this->anuncio->find($id);
			$anuncio->update($input);

			return Redirect::route('anuncios.show', $id);
		}

		return Redirect::route('anuncios.edit', $id)
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->anuncio->find($id)->delete();

		return Redirect::route('anuncios.index');
	}

}
