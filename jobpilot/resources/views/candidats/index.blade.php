@extends('layouts.app')

@section('content')
    <h1>Liste des candidats</h1>
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<a href="{{ route('candidats.create') }}"class="ajouter">Ajouter un candidat </a>


    <div class="liste-candidats" style="display: flex; flex-wrap: wrap; gap: 20px;">

    @foreach($candidats as $candidat)
    <div class="candidat" style="flex: 0 0 calc(33.333% - 20px); box-sizing: border-box; border: 1px solid #ccc; padding: 15px;">
        <div class="nom"><strong>{{ $candidat->nom }}</strong></div>
            <p>Email : {{ $candidat->email }}</p>
            <p>Postuler : {{ $candidat->offres->first()->job ?? 'Aucune offre' }}</p>
            <p> {{ $candidat->description }}</p>
            {{-- <x-badge>Vrai/Faux</x-badge> --}}
                    <!-- Boutons -->
                    <a href="{{ route('candidats.show', $candidat) }}" class="btn btn-info" title="Voir">
                <i class="fa-solid fa-eye"></i>
            </a>  

            <a href="{{ route('candidats.edit', $candidat) }}" class="btn btn-warning" title="Modifier">
                <i class="fa-solid fa-pen-to-square"></i>
            </a>

            <form action="{{ route('candidats.destroy', $candidat) }}" method="POST" style="display:inline;">
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




