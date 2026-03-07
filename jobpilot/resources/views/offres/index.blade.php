@extends('layouts.app')

@section('content')
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<a href="{{ route('offres.create') }}"class="ajouter">Ajouter une offre</a>


<div class="liste-offres" style="display: flex; flex-wrap: wrap; gap: 20px;">   
    @foreach($offres as $offre)
        <div class="offre" style="flex: 0 0 calc(33.333% - 20px); box-sizing: border-box; border: 1px solid #ccc; padding: 15px;">   
            <div class="job">{{ $offre['job'] }}</div>
            <p>Entreprise : {{ $offre->entreprise?->nom ?? 'Non défini' }}</p>
            <p>{{ $offre->type }} </p>
            <p>{{ $offre->entreprise?->adresse ?? 'Non défini' }}</p>
            <p>{{ $offre->candidat?->nom ?? 'Non défini' }}</p>
            <p>{{ $offre->date }}</p>

            <!-- Boutons -->
             
            <a href="{{ route('offres.show', $offre) }}" class="btn btn-info" title="Voir">
                <i class="fa-solid fa-eye"></i>
            </a>  

            <a href="{{ route('offres.edit', $offre) }}" class="btn btn-warning" title="Modifier">
                <i class="fa-solid fa-pen-to-square"></i>
            </a>

            <form action="{{ route('offres.destroy', $offre) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" title="Supprimer" onclick="return confirm('Confirmer la suppression ?')">
                    <i class="fa-solid fa-trash"></i>
                </button>
            </form>
        </div>
    @endforeach
</div>
@endsection
