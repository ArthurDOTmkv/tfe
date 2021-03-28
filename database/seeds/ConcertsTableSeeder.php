<?php

use App\Concert;
use Faker\Factory;
use Illuminate\Database\Seeder;

class ConcertsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        
        for($i=0; $i<20; $i++)
        {
            Concert::create([
               'titre' => $faker->sentence(5),
               'slug' => $faker->slug,
               'sous-titre' => $faker->sentence(12),
               'description' => $faker->text,
               'prix' => $faker->numberBetween(30, 120) * 100,          //Il est de bonne pratique de stocker le prix en centimes dans la DB
               'image' => 'https://via.placeholder.com/200x250'
            ]);
        }
    }
}
