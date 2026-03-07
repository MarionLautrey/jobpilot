@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>Modifier l'entreprise</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('entreprises.update', $entreprise) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nom" class="form-label">Nom d'entreprise</label>
            <input type="text" name="nom" id="nom" class="form-control" value="{{ old('nom', $entreprise->nom) }}" required>
        </div>

        <div class="mb-3">
            <label for="nom" class="form-label">Adresse</label>
            <input type="text" name="adresse" id="adresse" class="form-control" value="{{ old('adresse', $entreprise->adresse) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Enregistrer</button>
        <a href="{{ route('entreprises.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
@endsection
