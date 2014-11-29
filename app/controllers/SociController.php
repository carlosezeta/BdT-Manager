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
		$data['user'] = User::find($id);
		$data['intercambios'] = Intercambio::where('pagador_id','=',$id)->orWhere('cobrador_id','=',$id)->orderBy('created_at', 'desc')->get();
        $data['ofertas'] = Anuncio::whereTipo('O')->whereUserId($id)->orderBy('created_at', 'desc')->get();
        $data['demandas'] = Anuncio::whereTipo('D')->whereUserId($id)->orderBy('created_at', 'desc')->get();

        $data['imagen'] = '';//Session::get('img');
        
        $data['modal'] = (Session::get('modal') == null ? 'false' : 'true');
        return View::make('socis.show', compact('data'));

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


	public function crop()
	{
		Session::forget('modal');
		$img = Session::get('img');
		$id = Input::get('user-id');
		$user = User::find($id);
		$int_img = Image::make($img);
		$int_img->crop(intval(Input::get('w')), intval(Input::get('h')), intval(Input::get('x')), intval(Input::get('y')));
		$int_img->fit(200);
		$int_img->save($img);
		$imgPath = 'imgs/perfiles/';
		$i = 0;//indice para el while
		$miImg = $user->username.'jpg';
		//separamos el nombre del archivo de la extensión
		$ext = explode(".", $miImg);
		//mientras el archivo exista iteramos y aumentamos i
		while(file_exists($imgPath . $miImg)){
			$i++;
			$miImg = $ext[0]."(".$i.").jpg";
		}
		Image::make($img)->save($imgPath.$miImg.'.jpg');
		$user->img = $miImg.'.jpg';
		$user->save();

		Session::forget('imagen');

		return Redirect::action('SociController@show',$id);
		$data['user'] = $user;
		$data['intercambios'] = Intercambio::where('pagador_id','=',$id)->orWhere('cobrador_id','=',$id)->orderBy('created_at', 'desc')->get();
        $data['ofertas'] = Anuncio::whereTipo('O')->whereUserId($id)->orderBy('created_at', 'desc')->get();
        $data['demandas'] = Anuncio::whereTipo('D')->whereUserId($id)->orderBy('created_at', 'desc')->get();
        
        $data['imagen'] = '';
        $data['modal'] = 'false';
        return View::make('socis.show', compact('data'));
	}

	public function postImg()
	{
		if (Input::hasFile('img')){
			$id = Input::get('user-id');
			$imgPath = 'imgs/perfiles/originales/';
			$file = Input::file('img');
			$i = 0;//indice para el while
			//asignamos a la imagen el nombre original
			$miImg = $file->getClientOriginalName();
			//separamos el nombre del archivo de la extensión
			$ext = explode(".", $miImg);
			//mientras el archivo exista iteramos y aumentamos i
			while(file_exists($imgPath . $miImg)){
				$i++;
				$miImg = $ext[0]."(".$i.")".".".$ext[1];
			}
			//guardamos la imagen original con el nombre final
			$file->move($imgPath,$miImg);
			Image::make($imgPath.$miImg)->resize(868, 800, function ($constraint) {
					$constraint->aspectRatio();
					$constraint->upsize();
				})->save($imgPath.$miImg);
			$data['user'] = User::find($id);
			$data['intercambios'] = Intercambio::where('pagador_id','=',$id)->orWhere('cobrador_id','=',$id)->orderBy('created_at', 'desc')->get();
	        $data['ofertas'] = Anuncio::whereTipo('O')->whereUserId($id)->orderBy('created_at', 'desc')->get();
	        $data['demandas'] = Anuncio::whereTipo('D')->whereUserId($id)->orderBy('created_at', 'desc')->get();

	        $data['imagen'] = $imgPath.$miImg;
	        Session::put('img', $imgPath.$miImg);
	        $data['modal'] = 'true';

	        return View::make('socis.show', compact('data'));
		} else {
			Session::put('img', Input::get('img_bckp'));
		}
	}

	public function imgStore()
	{
		if (Input::hasFile('img')){
			$user = Sentry::getUser();

			$imgPath = 'imgs/perfiles/';
			$file = Input::file('img');

			$i = 0;//indice para el while
			$ext = explode(".", $file->getClientOriginalName());
			//asignamos a la imagen el username
			$miImg = $user->username;
			//mientras el archivo exista iteramos y aumentamos i
			while(file_exists($imgPath . $miImg . '.jpg')){
			    $i++;
			    $miImg = $user->username."(".$i.")";
			}
			//guardamos la imagen original con otro nombre ej user-1-original.jpg || user-2-original.png etc
			if ($i <> 0){
				$nombreFinal = $user->username."-".$i."-original.".$ext[1];
			} else {
				$nombreFinal = $user->username."-original.".$ext[1];
			}
			$file->move($imgPath,$nombreFinal);

			//guardamos la imagen en 200x200 y jpg.
			Image::make($imgPath.$nombreFinal)->resize(200, 200)->save($imgPath.$miImg.'.jpg');

			$user->img = $miImg.'.jpg';
			$user->save();

			Session::put('modal', 'true');
		}else{
			$nombreFinal = Input::get('img_bckp');
		}
		
		Session::put('img', $imgPath.$nombreFinal);
		return Redirect::to('socis/'.$user->id);
	}



}
