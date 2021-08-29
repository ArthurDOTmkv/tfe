<?php

use Illuminate\Database\Seeder;
use App\Place;
use App\Zone;

class PlacesTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Création des places
        /*
         * Premier for gère les rangères
         * Deuxième for gère les colonnes
         */
        for ($x = 0; $x<15; $x++) {
            for ($y = 0; $y<20; $y++){
                DB::table('places')->insert([
                    'rangee' => $x+1,
                    'colonne' => $y+1,
                    'zone_id' => $this->getZoneByRangee($x+1)       //Rangées commencent à 1
                ]);
            }
        }
    }
    
    public function getZoneByRangee($x)
    {
        foreach(Zone::all() as $zone)
        {
            //$this->info($zone->id);
            if($x >= $zone->rangee_min && $x <= $zone->rangee_max)
            {
                return $zone->id;
            }
        }
    }
}
