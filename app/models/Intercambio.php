<?php

use Carbon\Carbon;

class Intercambio extends Eloquent {
	protected $guarded = array();

	public static $rules = array();

	public function getCreatedAtAttribute($attr) {        
        return Carbon::parse($attr)->format('d/m/Y');
    }

    public function getUpdatedAtAttribute($attr) {        
        return Carbon::parse($attr)->format('d/m/Y');
    }

	public function pagador()
	{
	    return $this->belongsTo('User', 'pagador_id');
	}

	public function cobrador()
	{
	    return $this->belongsTo('User', 'cobrador_id');
	}

	public function categoria()
	{
	    return $this->belongsTo('Categoria', 'categoria_id');
	}
}
