@extends('layouts.app')

@section('title', 'Détails du Produit')

@section('content')
<div class="text-center">
    <h1 class="text-primary">{{ $produit['nom'] }}</h1>
    <p class="text-muted">{{ $produit['description'] }}</p>
    <p class="text-danger"><strong>Prix : {{ $produit['prix'] }} €</strong></p>
    <a href="/" class="btn btn-secondary">Retour à la liste</a>
</div>
@endsection
