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
            })->orderBy('created_at', 'DESC')->paginate(4);
        } else {
            $concerts = Concert::with('categories')->orderBy('created_at', 'DESC')->paginate(6);
        }
        //dd($concerts);
        return view('concerts.index')->with('concerts', $concerts);
    }
    
    public function show($slug)
    {
        $concert = Concert::where('slug', $slug)->firstOrFail();        //Si mauvais sleug, renvoi 404
        
        return view('concerts.show')->with('concert', $concert);
    }
    
    public function search()
    {
        request()->validate([
            'search' => 'required|min:2'
        ]);
        $search = request()->input('search');
        
        //Où le nom/description contient ce qu'on a entré en input
        $concert = Concert::where('titre', 'like', "%$search%")
                ->orWhere('description', 'like', "%$search%")
                ->paginate(6);
        
        return view('concerts.search')->with('concerts', $concert);
    }
}
