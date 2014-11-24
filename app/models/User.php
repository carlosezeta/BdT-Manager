<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Carbon\Carbon;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

	public static $rules = array(
		'username' => 'required|unique:users'
	);


	public function getId()
	{
	  return $this->id;
	}

	public function intercambiosCobrados()
	{
		return $this->hasMany('Intercambio', 'cobrador_id');
	}



	public static function findByUsernameOrFail(
        $username,
        $columns = array('*')
    ) {
        if ( ! is_null($user = static::whereUsername($username)->first($columns))) {
            return $user;
        }

        throw new ModelNotFoundException;
    }

	public function getCreatedAtAttribute($attr) {        
        return Carbon::parse($attr)->format('d/m/Y');
    }

    public function getUpdatedAtAttribute($attr) {        
        return Carbon::parse($attr)->format('d/m/Y');
    }

    public function valoracionesTotales()
    {
    	return $this->intercambiosCobrados->where('valoracion', '<>', null)->count();
    }

}
