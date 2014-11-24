<?php

class NoticiasController extends BaseController {

	/**
	 * Noticia Repository
	 *
	 * @var Noticia
	 */
	protected $noticia;

	public function __construct(Noticia $noticia)
	{
		$this->noticia = $noticia;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$noticias = $this->noticia->all();

		return View::make('noticias.index', compact('noticias'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('noticias.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Noticia::$rules);

		if ($validation->passes())
		{
			$this->noticia->create($input);

			return Redirect::route('noticias.index');
		}

		return Redirect::route('noticias.create')
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
		$noticia = $this->noticia->findOrFail($id);

		return View::make('noticias.show', compact('noticia'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$noticia = $this->noticia->find($id);

		if (is_null($noticia))
		{
			return Redirect::route('noticias.index');
		}

		return View::make('noticias.edit', compact('noticia'));
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
		$validation = Validator::make($input, Noticia::$rules);

		if ($validation->passes())
		{
			$noticia = $this->noticia->find($id);
			$noticia->update($input);

			return Redirect::route('noticias.show', $id);
		}

		return Redirect::route('noticias.edit', $id)
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
		$this->noticia->find($id)->delete();

		return Redirect::route('noticias.index');
	}

}
