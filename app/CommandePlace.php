<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommandePlace extends Model
{
    public function places()
    {
        return $this->belongsTo('App\Place');
    }
    
    public function commande()
    {
        $this->belongsToMany('App\Commande');
    }
}
