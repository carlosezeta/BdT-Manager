<?php

class TareasController extends BaseController {

	/**
	 * Tarea Repository
	 *
	 * @var Tarea
	 */
	protected $tarea;

	public function __construct(Tarea $tarea)
	{
		$this->tarea = $tarea;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$tareas = $this->tarea->all();

		return View::make('tareas.index', compact('tareas'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('tareas.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = array(
			'autor_id'	=> Session::get('userId'),
			'titulo'	=> Input::get('titulo')
		);
		$validation = Validator::make($input, Tarea::$rules);

		if ($validation->passes())
		{
			$this->tarea->create($input);

			return Redirect::route('tareas.index');
		}

		return Redirect::route('tareas.create')
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
		$tarea = $this->tarea->findOrFail($id);

		return View::make('tareas.show', compact('tarea'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$tarea = $this->tarea->find($id);

		if (is_null($tarea))
		{
			return Redirect::route('tareas.index');
		}

		return View::make('tareas.edit', compact('tarea'));
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
		$validation = Validator::make($input, Tarea::$rules);

		if ($validation->passes())
		{
			$tarea = $this->tarea->find($id);
			$tarea->update($input);

			return Redirect::route('tareas.show', $id);
		}

		return Redirect::route('tareas.edit', $id)
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
		$this->tarea->find($id)->delete();

		return Redirect::route('tareas.index');
	}


	/**
	 * Marca una tarea como completada.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function completada($id)
	{
		$tarea = Tarea::Find($id);
		$tarea->estado = 1;
		$tarea->save();

		return Redirect::route('tareas.index');
	}
}
