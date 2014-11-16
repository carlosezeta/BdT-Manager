<?php

class Propuesta extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'tallerista_id' => 'required',
		'titulo' => 'required',
		'descripcion' => 'required',
		'duracion' => 'required',
		'min_asistentes' => 'required',
		'max_asistentes' => 'required',
		'espacio' => 'required',
		'material_alumnos' => 'required',
		'material_bdt' => 'required',
		'oyentes' => 'required',
		'img' => 'required'
	);
}
