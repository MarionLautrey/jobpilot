@extends('layouts.app')

@section('content')
    <h1>Liste des entreprises</h1>
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<a href="{{ route('entreprises.create') }}"class="ajouter">Ajouter une entreprise</a>


    <div class="liste-entreprises" style="display: flex; flex-wrap: wrap; gap: 20px;">

    @foreach($entreprises as $entreprise)
<div class="entreprise" style="flex: 0 0 calc(33.333% - 20px); box-sizing: border-box; border: 1px solid #ccc; padding: 15px;">   
    <div class="nom"><strong>{{ $entreprise['nom'] }}</strong></div>
            {{ $entreprise['adresse'] }}<br>
            {{-- <x-badge>Vrai/Faux</x-badge> --}}
    <!-- Boutons -->
    <a href="{{ route('entreprises.show', $entreprise) }}" class="btn btn-info" title="Voir">
                    <i class="fa-solid fa-eye"></i>
                </a>  

                <a href="{{ route('entreprises.edit', $entreprise) }}" class="btn btn-warning" title="Modifier">
                    <i class="fa-solid fa-pen-to-square"></i>
                </a>
                <form action="{{ route('entreprises.destroy', $entreprise) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" title="Supprimer" onclick="return confirm('Confirmer la suppression ?')">
                    <i class="fa-solid fa-trash"></i>
                </button>
</div>
    @endforeach
@endsection