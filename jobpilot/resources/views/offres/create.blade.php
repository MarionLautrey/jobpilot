
@extends('layouts.app')

@section('content')
<h1>Ajouter une offre</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('offres.store') }}" method="POST">
    @csrf
    <input type="text" name="job" placeholder="Nom de l'offre">
    <input type="text" name="entreprise" placeholder="entreprise">
    <input type="text" name="adresse" placeholder="Adresse">
    <input type="date" name="date" placeholder="Date">
    <input type="text" name="type de contrat" placeholder="">
    <button type="submit">Créer</button>
</form>
@endsection
