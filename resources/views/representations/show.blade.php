@extends('layouts.main')
@php
use App\Place;
@endphp
@section('content')
    <h2 class="col-12">Concert du {{explode(' ', $representation->moment)[0]}} à {{explode(' ', $representation->moment)[1]}}</h2>
    <h4 class=""col-12>Choisir la place</h4>
    
    @foreach($zones as $zone)
        <div class="border rounded p-3 mb-2"><b>Zone {{$zone->nom}}</b></div>
        @for($i = $zone->rangee_min; $i <= $zone->rangee_max; $i++)
            <div class="row no-gutters">
                @php
                    $colonnes = Place::where('rangee', $i)->orderBy('colonne', 'asc')->get();
                @endphp
                @foreach($colonnes as $colonne)
                    <div class="col border text-center">
                        <div class="">
                            <label class="d-block">({{$i}}, {{$colonne->colonne}})</label>
                            <input type="checkbox" class="" name="{{$colonne->id}}">
                            
                        </div>
                    </div>
                @endforeach
            </div>
        @endfor
    @endforeach
@endsection