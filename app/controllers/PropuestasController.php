<?php

class PropuestasController extends BaseController {

	/**
	 * Propuesta Repository
	 *
	 * @var Propuesta
	 */
	protected $propuesta;

	public function __construct(Propuesta $propuesta)
	{
		$this->propuesta = $propuesta;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$propuestas = $this->propuesta->all();

		return View::make('propuestas.index', compact('propuestas'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('propuestas.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Propuesta::$rules);

		if ($validation->passes())
		{
			$this->propuesta->create($input);

			return Redirect::route('propuestas.index');
		}

		return Redirect::route('propuestas.create')
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
		$propuesta = $this->propuesta->findOrFail($id);

		return View::make('propuestas.show', compact('propuesta'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$propuesta = $this->propuesta->find($id);

		if (is_null($propuesta))
		{
			return Redirect::route('propuestas.index');
		}

		return View::make('propuestas.edit', compact('propuesta'));
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
		$validation = Validator::make($input, Propuesta::$rules);

		if ($validation->passes())
		{
			$propuesta = $this->propuesta->find($id);
			$propuesta->update($input);

			return Redirect::route('propuestas.show', $id);
		}

		return Redirect::route('propuestas.edit', $id)
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
		$this->propuesta->find($id)->delete();

		return Redirect::route('propuestas.index');
	}

}
