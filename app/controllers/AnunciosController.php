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
		$anuncios = Anuncio::orderBy('categoria_id')
						   ->orderBy('titulo')
						   ->get();

		return View::make('anuncios.index', compact('anuncios'));
	}

	public function ofertas()
	{
		//$anuncios = Anuncio::whereTipo('O')->join('categorias as cat', 'cat.id', '=', 'anuncios.categoria_id')->orderBy('cat.nombre')->get();
		$anuncios = Anuncio::whereTipo('O')->orderBy('categoria_id')->orderBy('titulo')->get();
		//$anuncios = Anuncio::whereTipo('O')->->orderBy('categorias.nombre')->get();
		
		return View::make('anuncios.index')->with('anuncios', $anuncios);
	}

	public function ofertasCat($cat_slug)
	{
		$cat = Categoria::whereSlug($cat_slug)->get()->first();
		if (empty($cat)) {
			Redirect::to('ofertas');
		} else {
			$anuncios = Anuncio::whereTipo('O')->whereCategoriaId($cat->id)->orderBy('created_at', 'desc')->get();

			return View::make('anuncios.index')->with('anuncios', $anuncios);
		}
	}


	public function demandas()
	{
		$anuncios = Anuncio::whereTipo('D')->orderBy('categoria_id')->orderBy('titulo')->get();
		return View::make('anuncios.index')->with('anuncios', $anuncios);
	}


	public function demandasCat($cat_slug)
	{
		$cat = Categoria::whereSlug($cat_slug)->get()->first();
		if (empty($cat)) {
			Redirect::to('ofertas');
		} else {
			$anuncios = Anuncio::whereTipo('D')->whereCategoriaId($cat->id)->orderBy('created_at', 'desc')->get();

			return View::make('anuncios.index')->with('anuncios', $anuncios);
		}
	}




	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$categorias = Categoria::orderBy('nombre')->get();
		return View::make('anuncios.create')->with('categorias', $categorias);
	}

	public function crearoferta()
	{
		$categorias = Categoria::orderBy('nombre')->get();
		return View::make('anuncios.crearoferta')->with('categorias', $categorias);
	}

	public function creardemanda()
	{
		$categorias = Categoria::orderBy('nombre')->get();
		return View::make('anuncios.creardemanda')->with('categorias', $categorias);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$messages = array(
		    'categoria_id.required' => Lang::get('anuncios.categoria_required'),
		    'titulo.required' => Lang::get('anuncios.titulo_required'),
		    'descripcion.required' => Lang::get('anuncios.descripcion_required')
		);
		$validation = Validator::make($input, Anuncio::$rules, $messages);

		if ($validation->passes())
		{
			$this->anuncio->create($input);

			return Redirect::route('anuncios.index');
		}

		if (Input::get('tipo') == 'O') {
			return Redirect::route('publicar-oferta')
				->withInput()
				->withErrors($validation);
		} elseif (Input::get('tipo') == 'D') {
			return Redirect::route('publicar-demanda')
				->withInput()
				->withErrors($validation);
		}

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
		$categorias = Categoria::orderBy('nombre')->get();
		$anuncio = $this->anuncio->find($id);

		if (is_null($anuncio))
		{
			return Redirect::route('anuncios.index');
		}

		return View::make('anuncios.edit', compact('anuncio', 'categorias'));
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
