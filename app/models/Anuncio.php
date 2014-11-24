<?php

use Carbon\Carbon;

class Anuncio extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'user_id' => 'required',
		'titulo' => 'required',
		'categoria_id' => 'required',
		'descripcion' => 'required',
		'tipo' => 'required'
	);

	public function scopeLastXDays($query, $nb)
	{
	    return $query->where('created_at', '>=', new DateTime('-'.$nb.' days')); 
	}

	public function getCreatedAtAttribute($attr) {        
        return Carbon::parse($attr)->format('d/m/Y');
    }

    public function getUpdatedAtAttribute($attr) {        
        return Carbon::parse($attr)->format('d/m/Y');
    }

	public function categoria()
	{
	    return $this->belongsTo('Categoria', 'categoria_id');
	}

	public function user()
	{
	    return $this->belongsTo('User', 'user_id');
	}



}
