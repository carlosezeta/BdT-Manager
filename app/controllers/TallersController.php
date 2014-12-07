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
		$users = User::orderBy('username')->get();
		return View::make('tallers.create')->with('users', $users);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$imgPath = 'imgs/tallers/';
		$file = Input::file('img');
		$input = Input::all();
		$validation = Validator::make($input, Taller::$rules);

		if ($validation->passes())
		{

	        $taller = new Taller(array(
				'titulo'			=> Input::get('titulo'),
				'descripcion'		=> Input::get('descripcion'),
				'esgrupo'			=> Input::get('esgrupo'),
				'textorepeticion'	=> Input::get('textorepeticion'),
				'fecha'				=> Input::get('fecha'),
				'hora_inicio'		=> Input::get('hora_inicio'),
				'hora_fin'			=> Input::get('hora_fin'),
				'lugar'				=> Input::get('lugar'),
				'img'				=> Input::file('img')->getClientOriginalName(),
				'tallerista_id'		=> Input::get('tallerista_id'),
				'plazas'			=> Input::get('plazas')
			));
			if($taller->save()){
	            //guardamos la imagen en $imgPath = public/imgs/tallers con el nombre original
	            $i = 0;//indice para el while
	            //separamos el nombre de la img y la extensión
	            $info = explode(".",$file->getClientOriginalName());
	            //asignamos de nuevo el nombre de la imagen completo
	            $miImg = $file->getClientOriginalName();
	            //mientras el archivo exista iteramos y aumentamos i
	            while(file_exists($imgPath . $miImg)){
	                $i++;
	                $miImg = $info[0]."(".$i.")".".".$info[1];              
	            }
	            //guardamos la imagen con otro nombre ej foto(1).jpg || foto(2).jpg etc
	            $file->move($imgPath,$miImg);
	            //si ha cambiado el nombre de la foto por el original actualizamos el campo foto de la bd
	            if($miImg != $file->getClientOriginalName()){
	                $taller->img = $miImg;
	                $taller->save();
	            }

	            //redirigimos con un mensaje flash
	            return Redirect::route('tallers.index')->with(array('confirm' => 'Taller creado correctamente'));
	        } 


			return Redirect::route('tallers.index')->with(array('confirm' => 'La validación ha pasado, pero no se ha creado el taller'));
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
