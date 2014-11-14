<?php

class Anuncio extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'user_id' => 'required',
		'titulo' => 'required',
		'categoria_id' => 'required',
		'descripcion' => 'required',
		'tipo' => 'required'
	);
}
