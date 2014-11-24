<?php

class Noticia extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'user_id' => 'required',
		'titulo' => 'required',
		'entradilla' => 'required',
		'mensaje' => 'required',
		'slug' => 'required'
	);
}
