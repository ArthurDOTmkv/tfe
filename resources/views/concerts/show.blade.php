@extends('layouts.main')

@section('content')
<div class="col-md-12">
    <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
      <div class="col p-4 d-flex flex-column position-static">
        <strong class="d-inline-block mb-2 text-primary">World</strong>
        <h3 class="mb-0">{{$concert->titre}}</h3>
        <div class="mb-1 text-muted">{{$concert->created_at->format('d/m/Y')}}</div>
        <div class="mb-1 text-muted"><b>Prix</b> : {{$concert->getPrix()}}</div>
        <p class="mb-auto">{{$concert->description}}</p>
        <form action='#' method='POST'>
            <button class='btn btn-light'>Ajouter au panier</button>
        </form>
      </div>
      <div class="col-auto d-none d-lg-block">
          <img src="{{$concert->image}}" alt="" />
      </div>
    </div>
</div>
@endsection