<?php

namespace App;
 
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

class Pethotel extends Model implements AuthenticatableContract
{
	use Authenticatable;
	protected $guard = 'adminph';
    protected $guarded = [];

    
    public function kandang(){
    	return $this->hasMany('App\Kandang')->withDefault();
    }
}