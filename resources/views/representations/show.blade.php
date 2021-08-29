@extends('layouts.main')

@section('content')
    @foreach($concerts as $concert)
        <div class="col-md-6">
          <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
            <div class="col p-4 d-flex flex-column position-static">
              <strong class="d-inline-block mb-2 text-primary">
                    @foreach($concert->categories as $categorie)
                        {{$categorie->nom}}
                    @endforeach
              </strong>
              <h5 class="mb-0">{{$concert->titre}}</h5>
              <div class="mb-1 text-muted">{{$concert->created_at->format('d/m/Y')}}</div>
              <div class="mb-1 text-muted"><b>Prix</b> : {{$concert->getPrix()}}</div>
              <p class="card-img mb-auto">{{$concert->soustitre}}</p>
              <a href="{{route('concerts.show', $concert->slug)}}" class="stretched-link btn btn-light">Continuer vers le concert</a>
            </div>
            <div class="col-auto d-none d-lg-block">
                <img src="{{asset('storage/' . $concert->image)}}" alt="" />
            </div>
          </div>
        </div>
   @endforeach
   <!-- Générer les liens de pagination en concervant les slugs
        sans la fonction appends(), les catégories ne sont pas 
        reprises dans l'url
   -->
   {{$concerts->appends(request()->input())->links()}}
@endsection