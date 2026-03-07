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

    <!-- ENTREPRISE ID -->
    <label>Entreprise :</label>
    <select name="entreprise_id" required>
        @foreach($entreprises as $entreprise)
            <option value="{{ $entreprise->id }}">
                {{ $entreprise->nom }}
            </option>
        @endforeach
    </select>

    <input type="date" name="date">

    <!-- TYPE DE CONTRAT -->
    <label>Type de contrat :</label>
    <select name="type" required>
        <option value="CDI">CDI</option>
        <option value="CDD">CDD</option>
        <option value="Alternance">Alternance</option>
        <option value="Stage">Stage</option>
    </select>

    <button type="submit">Créer</button>
</form>
@endsection
