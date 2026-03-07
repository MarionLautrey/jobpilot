
@extends('layouts.app')

@section('content')
<h1>Ajouter une entreprise</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('entreprises.store') }}" method="POST">
    @csrf
    <input type="text" name="nom" placeholder="Nom de l'entreprise">
    <input type="text" name="adresse" placeholder="Adresse">
    <button type="submit">Créer</button>
</form>
@endsection
