<?php

namespace App;

use Illuminate\Database\Eloquent\Model;



class Kandang extends Model
{
    protected $guarded = [];
    // public function type(){
    // 	return $this->belongsTo('\App\Type');
    // }
    public  $timestamps = false;
    public function pethotel(){
    	return $this->belongsTo('App\Pethotel')->withDefault();
    }

    public function type(){
    	return $this->belongsTo('App\Type')->withDefault();
    }

    public function booking(){
        return $this->hasMany('App\Booking')->withDefault();
    }

}
