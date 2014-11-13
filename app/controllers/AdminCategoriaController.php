<?php

class AdminCategoriaController extends BaseController {

	/**
	 * Categoria Repository
	 *
	 * @var Categoria
	 */
	protected $categoria;

	public function __construct(Categoria $categoria)
	{
		$this->categoria = $categoria;

        $this->beforeFilter('Sentinel\inGroup:Admins', array('on' => 'create'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('categorias.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Categoria::$rules);

		if ($validation->passes())
		{
			$this->categoria->create($input);

			return Redirect::route('categorias.index');
		}

		return Redirect::route('categorias.create')
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.');
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$categoria = $this->categoria->find($id);

		if (is_null($categoria))
		{
			return Redirect::route('categorias.index');
		}

		return View::make('categorias.edit', compact('categoria'));
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
		$validation = Validator::make($input, Categoria::$rules);

		if ($validation->passes())
		{
			$categoria = $this->categoria->find($id);
			$categoria->update($input);

			return Redirect::route('categorias.show', $id);
		}

		return Redirect::route('categorias.edit', $id)
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
		$this->categoria->find($id)->delete();

		return Redirect::route('categorias.index');
	}

}
