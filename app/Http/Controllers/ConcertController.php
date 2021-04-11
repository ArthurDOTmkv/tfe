<?php

namespace App\Http\Controllers;

use App\Concert;
use Illuminate\Http\Request;

class ConcertController extends Controller
{
    public function index()
    {
        /*
         * Afficher les concerts par catégorie
         */
        if(request()->categorie){
            $concerts = Concert::with('categories')->whereHas('categories', function($query){
                $query->where('slug', request()->categorie);
            })->paginate(4);
        } else {
            $concerts = Concert::with('categories')->paginate(6);
        }
        //dd($concerts);
        return view('concerts.index')->with('concerts', $concerts);
    }
    
    public function show($slug)
    {
        $concert = Concert::where('slug', $slug)->firstOrFail();        //Si mauvais sleug, renvoi 404
        
        return view('concerts.show')->with('concert', $concert);
    }
}
