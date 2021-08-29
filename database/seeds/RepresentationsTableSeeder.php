<?php

use Illuminate\Database\Seeder;
use App\Concert;

class RepresentationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Création des données
        $representations = [
            [
                'concert_slug'=>'illum-minus-non-voluptatem-expedita-maiores-doloribus-facilis',
                'moment'=>'2021-10-12 13:00',
            ],
            [
                'concert_slug'=>'illum-minus-non-voluptatem-expedita-maiores-doloribus-facilis',
                'moment'=>'2021-10-12 20:30',
            ],
            [
                'concert_slug'=>'tempora-nesciunt-rerum-illo-enim',
                'moment'=>'2021-10-02 20:30',
            ],
            [
                'concert_slug'=>'et-et-eos-esse-velit-molestiae-cum-quibusdam',
                'moment'=>'2021-10-16 20:00',
            ],
            [
                'concert_slug'=>'neque-omnis-quasi-quaerat-vero-ut',
                'moment'=>'2021-09-12 14:30',
            ],
            [
                'concert_slug'=>'quia-dolores-totam-ipsum-nam-distinctio',
                'moment'=>'2021-09-12 21:30',
            ],
            [
                'concert_slug'=>'at-nihil-et-ut-est-maxime',
                'moment'=>'2021-09-27 22:00',
            ],
            [
                'concert_slug'=>'repellat-et-tenetur-animi-assumenda-eum-quam-ut-alias',
                'moment'=>'2021-12-16 15:30',
            ],
            [
                'concert_slug'=>'ratione-omnis-exercitationem-sunt-et',
                'moment'=>'2021-11-04 22:00',
            ],
            [
                'concert_slug'=>'corrupti-quia-enim-optio-sit-aut-ut',
                'moment'=>'2021-11-06 17:30',
            ],
        ];
        
        //Insértion des données dans la table
        foreach ($representations as $representation) {
            $concert = Concert::firstWhere('slug',$representation['concert_slug']);
            
            DB::table('representations')->insert([
                'concert_id' => $concert->id,
                'moment' => $representation['moment'],
            ]);
        }
    }
}
