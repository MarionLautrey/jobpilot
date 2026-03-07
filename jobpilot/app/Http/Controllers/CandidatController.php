<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Candidat;

class CandidatController extends Controller
{
    // Liste des candidats
    public function index()
    {
        $candidats = Candidat::with('offres')
            ->latest()
            ->get();

        return view('candidats.index', compact('candidats'));
    }

    // Formulaire de création
    public function create()
    {
        return view('candidats.create');
    }

    // Création d'un candidat
    public function store(Request $request)
    {
        $data = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'adresse' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telephone' => 'required|string|max:20',
            'description' => 'required|string',
        ]);

        Candidat::create($data);

        return redirect()
            ->route('candidats.index')
            ->with('success', 'Candidat ajouté avec succès.');
    }

    // Affichage d'un candidat
    public function show(Candidat $candidat)
    {
        return view('candidats.show', compact('candidat'));
    }

    // Formulaire d'édition
    public function edit(Candidat $candidat)
    {
        return view('candidats.edit', compact('candidat'));
    }

    // Mise à jour d'un candidat
    public function update(Request $request, Candidat $candidat)
    {
        $data = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'adresse' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telephone' => 'required|string|max:20',
            'description' => 'required|string',
        ]);

        $candidat->update($data);

        return redirect()
            ->route('candidats.index')
            ->with('success', 'Candidat modifié avec succès.');
    }

    // Suppression d'un candidat
    public function destroy(Candidat $candidat)
    {
        $candidat->delete();

        return redirect()
            ->route('candidats.index')
            ->with('success', 'Candidat supprimé avec succès.');
    }
}
