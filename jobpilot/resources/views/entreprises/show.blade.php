@extends('layouts.app')

@section('content')
    <h1>Détail de l'entreprise</h1>
    <p>Nom : {{ $entreprise['nom'] }}</p>
    <p>Adresse : {{ $entreprise['adresse'] }}</p>
    <a href="{{ route('entreprises.index') }}">Retour à la liste</a>
@endsection