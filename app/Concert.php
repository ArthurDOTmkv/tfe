<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Concert extends Model
{
    public function getPrix()
    {
        $prix = $this->prix / 100;
        
        return number_format($prix, 2, ',', ' ') . " €";
    }
}
