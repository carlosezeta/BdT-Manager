<?php

class Categoria extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'nombre' => 'required'
	);

	/**
     * Defines a one-to-many relationship.
     *
     * @see http://laravel.com/docs/eloquent#one-to-many
     */
    public function anuncio()
    {
        return $this->hasMany('Anuncio', 'categoria_id');
    }
}
