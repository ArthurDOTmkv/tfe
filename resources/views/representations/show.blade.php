@extends('layouts.main')
@php
use App\Place;
@endphp
@section('content')
    <script>
        //If check already checked them uncheck it
        function toggleCheck(id){
            var check = document.getElementById('check_'+id);
            var place = document.getElementById('place_'+id);
            console.log(place);
            check.checked = !check.checked;
            if(check.checked){
                place.style.backgroundColor = "#058957";
            }else{
                place.style.backgroundColor = "#e2e2e2";
            }
        }
    </script>
    <div class="col-12">
        <h2 class="col-12">Concert du {{explode(' ', $representation->moment)[0]}} à {{substr(explode(' ', $representation->moment)[1],0,5)}}</h2>
        <h4 class="col-12 mb-4">Choisir la place</h4>

        @foreach($zones as $zone)
            <div class="border rounded p-3 text-white" style="background: #212529;"><b>ZONE {{$zone->nom}}</b></div>
            @for($i = $zone->rangee_min; $i <= $zone->rangee_max; $i++)
                <div class="row my-3 g-0">
                    @php
                        $colonnes = Place::where('rangee', $i)->orderBy('colonne', 'asc')->get();
                    @endphp
                    @foreach($colonnes as $colonne)
                        @if(in_array($colonne->id, $taken))
                            <div style="background-color: red;border:1px solid red;" class="col text-center m-1" id="place_{{$colonne->id}}" title="({{$i}},{{$colonne->colonne}})">
                                <div style="min-height: 40px;">
                                </div>
                            </div>
                        @else
                            <div style="background-color: #e2e2e2;border:1px solid #e2e2e2;" class="col text-center m-1" id="place_{{$colonne->id}}" title="({{$i}},{{$colonne->colonne}})" onclick="toggleCheck({{$colonne->id}})">
                                <div style="min-height: 40px;">
                                    <!--<label class="d-block">({{$i}}, {{$colonne->colonne}})</label>-->
                                    <input type="checkbox" class="d-none" id="check_{{$colonne->id}}" name="{{$colonne->id}}">
                                </div>
                            </div>
                        @endif                        
                    @endforeach
                </div>
            @endfor
        @endforeach
    </div>
@endsection
