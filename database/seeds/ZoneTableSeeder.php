<?php

use Illuminate\Database\Seeder;
use App\Zone;

class ZoneTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Création des différentes zones
        
        $alphabet = range('A', 'Z');        //Pour la création de zones futures
        $i=0;
        
        Zone::create([
            'nom' => $alphabet[$i++],
            'rangee_min' => 1,
            'rangee_max' => 3,
            'pourcentage' => 1.4
        ]);
        
        Zone::create([
            'nom' => $alphabet[$i++],
            'rangee_min' => 4,
            'rangee_max' => 7,
            'pourcentage' => 1.2
        ]);
        
        Zone::create([
            'nom' => $alphabet[$i++],
            'rangee_min' => 8,
            'rangee_max' => 10,
            'pourcentage' => 1,
        ]);
        Zone::create([
            'nom' => $alphabet[$i++],
            'rangee_min' => 11,
            'rangee_max' => 13,
            'pourcentage' => 0.9
        ]);
        
        Zone::create([
            'nom' => $alphabet[$i++],
            'rangee_min' => 14,
            'rangee_max' => 16,
            'pourcentage' => 0.8
        ]);
    }
}
