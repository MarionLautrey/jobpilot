<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entreprise;

class EntrepriseController extends Controller
{
    // Liste des entreprises
    public function index()
    {
        $entreprises = Entreprise::with('offres')
            ->latest()
            ->get();

        return view('entreprises.index', compact('entreprises'));
    }

    // Formulaire de création
    public function create()
    {
        return view('entreprises.create');
    }

    // Enregistrement d'une entreprise
    public function store(Request $request)
    {
        $data = $request->validate([
            'nom' => 'required|string|max:255',
            'adresse' => 'required|string|max:255',
        ]);

        Entreprise::create($data);

        return redirect()
            ->route('entreprises.index')
            ->with('success', 'Entreprise créée avec succès.');
    }

    // Affichage d'une entreprise
    public function show(Entreprise $entreprise)
    {
        return view('entreprises.show', compact('entreprise'));
    }

    // Formulaire d'édition
    public function edit(Entreprise $entreprise)
    {
        return view('entreprises.edit', compact('entreprise'));
    }

    // Mise à jour d'une entreprise
    public function update(Request $request, Entreprise $entreprise)
    {
        $data = $request->validate([
            'nom' => 'required|string|max:255',
            'adresse' => 'required|string|max:255',
        ]);

        $entreprise->update($data);

        return redirect()
            ->route('entreprises.index')
            ->with('success', 'Entreprise modifiée avec succès.');
    }

    // Suppression
    public function destroy(Entreprise $entreprise)
    {
        $entreprise->delete();

        return redirect()
            ->route('entreprises.index')
            ->with('success', 'Entreprise supprimée avec succès.');
    }
}
