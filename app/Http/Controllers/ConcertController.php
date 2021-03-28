<?php

namespace App\Http\Controllers;

use App\Concert;
use Illuminate\Http\Request;

class ConcertController extends Controller
{
    public function index()
    {
        $concerts = Concert::latest()->take(6)->get();
        //dd($concerts);
        return view('concerts.index')->with('concerts', $concerts);
    }
    
    public function show($slug)
    {
        $concert = Concert::where('slug', $slug)->firstOrFail();        //Si mauvais sleug, renvoi 404
        
        return view('concerts.show')->with('concert', $concert);
    }
}
