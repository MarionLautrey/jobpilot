
@extends('layouts.app')

@section('content')
<h1>Ajouter un candidat</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('candidats.store') }}" method="POST">
    @csrf
    <input type="text" name="nom" placeholder="Nom du candidat">
    <input type="text" name="prenom" placeholder="Prenom du candidat">
    <input type="text" name="adresse" placeholder="Adresse">
    <input type="text" name="email" placeholder="Email">
    <input type="text" name="telephone" placeholder="Telephone">
    <label for="description">Description :</label>
    <textarea name="description">{{ old('description') }}</textarea>
    <button type="submit">Créer</button>
</form>
@endsection
