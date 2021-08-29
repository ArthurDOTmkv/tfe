<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Representation extends Model
{
    public function concerts()
    {
        return $this->belongsTo('App\Concert');
    }
    
    public function places()
    {
        return $this->belongsToMany('App\Places');
    }
}
