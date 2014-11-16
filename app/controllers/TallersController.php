<?php

class TallersController extends BaseController {

	/**
	 * Taller Repository
	 *
	 * @var Taller
	 */
	protected $taller;

	public function __construct(Taller $taller)
	{
		$this->taller = $taller;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$tallers = $this->taller->all();

		return View::make('tallers.index', compact('tallers'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('tallers.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Taller::$rules);

		if ($validation->passes())
		{
			$this->taller->create($input);

			return Redirect::route('tallers.index');
		}

		return Redirect::route('tallers.create')
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
		$taller = $this->taller->findOrFail($id);

		return View::make('tallers.show', compact('taller'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$taller = $this->taller->find($id);

		if (is_null($taller))
		{
			return Redirect::route('tallers.index');
		}

		return View::make('tallers.edit', compact('taller'));
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
		$validation = Validator::make($input, Taller::$rules);

		if ($validation->passes())
		{
			$taller = $this->taller->find($id);
			$taller->update($input);

			return Redirect::route('tallers.show', $id);
		}

		return Redirect::route('tallers.edit', $id)
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
		$this->taller->find($id)->delete();

		return Redirect::route('tallers.index');
	}

}
