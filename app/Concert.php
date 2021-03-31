<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Concert extends Model
{
    public function getPrix()
    {
        $prix = $this->prix / 100;
        
        /*
         * Prix - Décimales - Séparateur - Espace entre les milliers
         */
        return number_format($prix, 2, ',', ' ') . " €";
    }
}
