@extends('layouts.main')

@section('content')
<!--<div class="col-md-12">
    <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
      <div class="col p-4 d-flex flex-column position-static">
        <strong class="d-inline-block mb-2 text-danger">
            <div class="badge rounded-pill bg-danger">{{$places}}</div>
            @foreach($concert->categories as $categorie)
                {{$categorie->nom}} {{$loop->last ? '' : ' '}}
            @endforeach
        </strong>
        <h3 class="mb-0">{{$concert->titre}}</h3>
        <div class="mb-1 text-muted">{{$concert->created_at->format('d/m/Y')}}</div>
        <div class="mb-1 text-muted"><b>Prix</b> : {{$concert->getPrix()}}</div>
        -->
        <!-- Interpréter l'HTML --><!--
        <p class="mb-auto">{!! $concert->description !!}</p>
        @if($places === 'Disponible')
            <form action='{{route('cart.store')}}' method='POST'>
                @csrf
                <input type='hidden' name='concert_id' value='{{$concert->id}}'>
                <button class='btn btn-light'>Ajouter au panier</button>
            </form>
        @endif
      </div>
      <div class="col-auto d-none d-lg-block">
          <img src="{{asset('storage/' . $concert->image)}}" alt="" />
      </div>
    </div>
</div> -->
        
<h2>{{$concert->titre}}</h2>   
 <div class="col-md-12">
    <div class="row g-0">
        @foreach($representations as $representation)                  
            <div class="col-12 p-4 border rounded overflow-hidden mb-4 shadow-sm h-md-250">
                  <a action='{{route('representation.show')}}'>
                      <button class='btn btn-light'>Voir detail</button>
                  </form>
            </div>
        @endforeach
    </div>
</div>    
    
@endsection