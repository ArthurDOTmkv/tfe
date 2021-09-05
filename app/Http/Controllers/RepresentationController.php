<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Representation;
use App\Zone;
use App\Place;
use Carbon\Carbon;

class RepresentationController extends Controller
{
    public function index()
    {
        
        $representation = Representation::all();

        return view('representation.index',[
            'representation' => $representation,
            'resource' => 'représentations',
        ]);
      
    }
     public function show($id)
    {
        $representation = Representation::find($id);
        $date = Carbon::parse($representation->moment)->format('d/m/Y');
        $heure = Carbon::parse($representation->moment)->format('G:i');
        
        $zones = Zone::all();
        
        //todo: changer requete
        $taken = Place::where('rangee',3)->orWhere('rangee',6)->pluck('id')->toArray();
        
        return view('representations.show',[
            'representation' => $representation,
            'date' => $date,
            'heure' => $heure,
            'zones' => $zones,
            'taken' => $taken,
        ]);
    }
    
}
