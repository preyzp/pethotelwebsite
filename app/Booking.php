<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Alfa6661\AutoNumber\AutoNumberTrait;

class Booking extends Model
{

    protected $guarded = [];

    public function member(){
    	return $this->belongsTo('\App\Member')->withDefault();
    }
    
    public function kandang(){
    	return $this->belongsTo('\App\Kandang')->withDefault();
    }
}
