@extends('layouts.app')

@section('title', 'Liste des Produits')

@section('content')
<div class="text-center mb-4">
    <h1 class="text-primary">{{ $nomSite }}</h1>
    <p class="text-muted">Découvrez nos produits de qualité</p>
</div>

<div class="row">
@foreach($produits as $produit)
    <div class="col-md-4">
        <div class="card mb-4 shadow-sm border-primary">
            <div class="card-body">
                <h5 class="card-title text-success">{{ $produit['nom'] }}</h5>
                <p class="card-text">{{ $produit['description'] }}</p>
                <p class="text-danger"><strong>Prix : {{ $produit['prix'] }} €</strong></p>
                <a href="/produit/{{ $produit['id'] }}" class="btn btn-primary">Voir détails</a>
            </div>
        </div>
    </div>
@endforeach
</div>
@endsection
