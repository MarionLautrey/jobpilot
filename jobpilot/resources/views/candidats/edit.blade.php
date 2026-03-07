@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>Modifier le candidat</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('candidats.update', $candidat) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nom" class="form-label">Nom du candidat</label>
            <input type="text" name="nom" id="nom" class="form-control" value="{{ old('nom', $candidat->nom) }}" required>
        </div>

        <div class="mb-3">
            <label for="prenom" class="form-label">Prenom du candidat</label>
            <input type="text" name="prenom" id="prenom" class="form-control" value="{{ old('prenom', $candidat->prenom) }}" required>
        </div>

        <div class="mb-3">
            <label for="nom" class="form-label">Adresse</label>
            <input type="text" name="adresse" id="adresse" class="form-control" value="{{ old('adresse', $candidat->adresse) }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="text" name="email" id="email" class="form-control" value="{{ old('email', $candidat->email) }}" required>
        </div>

        <div class="mb-3">
            <label for="telephone" class="form-label">Telephone</label>
            <input type="text" name="telephone" id="telephone" class="form-control" value="{{ old('telephone', $candidat->telephone) }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <input type="text" name="description" id="description" class="form-control" value="{{ old('description', $candidat->description) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Enregistrer</button>
        <a href="{{ route('candidats.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
@endsection
