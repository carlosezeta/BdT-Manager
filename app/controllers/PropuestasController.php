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
		$imgPath = 'imgs/tallers/';
		$file = Input::file('img');
		$input = array(
			'tallerista_id' 	=> Session::get('userId'),
			'titulo' 			=> Input::get('titulo'),
			'descripcion' 		=> Input::get('descripcion'),
			'duracion' 			=> Input::get('duracion'),
			'espacio' 			=> Input::get('espacio'),
			'material_alumnos'	=> Input::get('material_alumnos'),
			'material_bdt'		=> Input::get('material_bdt'),
			'oyentes'			=> Input::get('oyentes'),
			'img' 				=> Input::file('img')->getClientOriginalName()
		);
		$validation = Validator::make($input, Propuesta::$rules);

		if ($validation->passes())
		{

			$propuesta = new Propuesta($input);
			
			if($propuesta->save() && Input::hasFile('img')){
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
	                $propuesta->img = $miImg;
	                $propuesta->save();
	            }

	            //redirigimos con un mensaje flash
	            return Redirect::route('propuestas.index')->with(array('confirm' => 'Taller creado correctamente'));
	        } 


			return Redirect::route('propuestas.index')->with(array('confirm' => 'La validación ha pasado, pero no se ha creado el taller'));
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
