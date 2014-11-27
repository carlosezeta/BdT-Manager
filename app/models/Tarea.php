<?php

class Tarea extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'titulo'	=> 'required'
	);

	public function autor()
	{
		return $this->belongsTo('User', 'autor_id');
	}

	public function responsable()
	{
		return $this->belongsTo('User', 'responsable_id');
	}
}
