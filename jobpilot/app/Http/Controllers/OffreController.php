<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Offre;
use App\Models\Entreprise;
use Illuminate\Support\Facades\Log;

class OffreController extends Controller
{
    public function index()
{
    $offres = Offre::with(['entreprise', 'candidat'])
        ->latest()
        ->get();

    return view('offres.index', compact('offres'));
}

    // Formulaire de création
    public function create()
    {
        $entreprises = Entreprise::all();
        return view('offres.create', compact('entreprises'));
    }

    // Création (store) + log
    public function store(Request $request)
    {
        $data = $request->validate([
            'job' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'entreprise_id' => 'required|exists:entreprises,id',
            'date' => 'required|date',
        ]);

        $data['candidat_id'] = auth()->id();

        $offre = Offre::create($data);

        return redirect()->route('offres.index')->with('success', 'Offre créée');
    }

    // Affichage d'une offre
    public function show(Offre $offre)
    {
        abort_unless($offre->candidat_id === auth()->id(), 403);

        return view('offres.show', compact('offre'));
    }

    // Formulaire d'édition
    public function edit(Offre $offre)
    {
        abort_unless($offre->candidat_id === auth()->id(), 403);

        return view('offres.edit', compact('offre'));
    }

    // Mise à jour (update) + log avant/après
    public function update(Request $request, Offre $offre)
    {
        $data = $request->validate([
            'job' => 'required|string|max:255',
            'type' => 'required|string|max:255',
        ]);
  
        return redirect()->route('offres.index')->with('success', 'Offre mise à jour');
    }

    // Suppression (delete) + log
    public function destroy(Request $request, Offre $offre)
    {
        return redirect()->route('offres.index')->with('success', 'Offre supprimée');
    }
}
