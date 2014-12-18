<?php

class Taller extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'titulo' => 'required',
		'descripcion' => 'required',
		'esgrupo' => 'required',
		'textorepeticion' => 'required',
		'fecha' => 'required',
		'lugar' => 'required',
		'img' => 'required',
		'tallerista_id' => 'required',
		'plazas' => 'required'
	);

	public function tallerista()
	{
	    return $this->belongsTo('User', 'tallerista_id');
	}

	public function asistentes()
	{
		return $this->belongsToMany('User');
	}

}
