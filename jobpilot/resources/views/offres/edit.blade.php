@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>Modifier l'offre</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('offres.update', $offre) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nom" class="form-label">Job</label>
            <input type="text" name="job" id="job" class="form-control" value="{{ old('job', $offre->job) }}" required>
        </div>

        <div class="mb-3">
            <label for="type" class="form-label">Type de contrat</label>
            <input type="text" name="type" id="type" class="form-control" value="{{ old('type', $offre->type) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Enregistrer</button>
        <a href="{{ route('offres.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
@endsection
