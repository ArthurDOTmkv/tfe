@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <!-- Afficher toutes les commandes de l'utilistaeur connecté-->
                    @foreach(Auth()->user()->commandes as $commande)
                    <div class="card">
                        <div class="card-header">
                            Commande du {{Carbon\Carbon::parse($commande->paymentCreatedAt)->format('d/m/Y')}} <strong>({{getPrix($commande->montant)}})</strong>
                        </div>
                        <div class="card-body">
                            
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
