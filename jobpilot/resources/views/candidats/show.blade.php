@extends('layouts.app')

@section('content')
    <h1>Détails du candidat</h1>

    <p><strong>Nom :</strong> {{ $candidat->nom }}</p>
    <p><strong>Email :</strong> {{ $candidat->email }}</p>
    <p><strong>Offre postulée :</strong> {{ $candidat->offres->first()->job ?? 'Aucune offre' }}</p>
    <p><strong>Description :</strong> {{ $candidat->description }}</p>


    <a href="{{ route('candidats.index') }}"> Retour à la liste</a>
@endsection
