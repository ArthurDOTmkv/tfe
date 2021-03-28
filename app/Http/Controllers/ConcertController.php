<?php

namespace App\Http\Controllers;

use App\Concert;
use Illuminate\Http\Request;

class ConcertController extends Controller
{
    public function index()
    {
        $concerts = Concert::latest()->take(8)->get();
        //dd($concerts);
        return view('concerts.index')->with('concerts', $concerts);
    }
}
