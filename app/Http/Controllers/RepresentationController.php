<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        $date = Carbon::parse($representation->when)->format('d/m/Y');
        $heure = Carbon::parse($representation->when)->format('G:i');
        
        return view('representation.show',[
            'representation' => $representation,
            'date' => $date,
            'heure' => $heure,
        ]);
    }
    
}
