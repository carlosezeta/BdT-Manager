<?php

use Carbon\Carbon;

class Propuesta extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'tallerista_id' => 'required',
		'titulo' => 'required',
		'descripcion' => 'required',
		'duracion' => 'required',
		'espacio' => 'required',
		'material_alumnos' => 'required',
		'material_bdt' => 'required',
		'oyentes' => 'required',
		'img' => 'required'
	);

	public function getCreatedAtAttribute($attr) {        
        return Carbon::parse($attr)->format('d/m/Y');
    }

    public function getUpdatedAtAttribute($attr) {        
        return Carbon::parse($attr)->format('d/m/Y');
    }

	public function tallerista(){
		return $this->belongsTo('User', 'tallerista_id');
	}
}
