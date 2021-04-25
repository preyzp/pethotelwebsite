<?php
 
namespace App;
 
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

class Member extends Model implements AuthenticatableContract
{
    use Authenticatable;
    protected $guard = 'member';
    protected $guarded = [];

    public function bookings(){
    	return $this->hasMany('App\Booking')->withDefault();
    }
}


