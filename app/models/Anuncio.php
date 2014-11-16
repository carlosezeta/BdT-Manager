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

	public function categoria()
	{
	    return $this->belongsTo('Categoria', 'categoria_id');
	}

	public function user()
	{
	    return $this->belongsTo('User', 'user_id');
	}

}
