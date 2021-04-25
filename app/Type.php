<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $guarded = [];

    public function kandang(){
    	return $this->hasMany('App\Kandang');
    }


}
