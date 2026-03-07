@extends('layouts.app')

@section('content')
    <h1>Détail de l'offre</h1>
<p>Nom : {{ $offre->candidat->nom}}</p>
<p>Offre : {{ $offre->job }}</p>
<p>Type de contrat : {{ $offre->type }}</p>

<a href="{{ route('offres.index') }}">Retour à la liste</a>
@endsection
