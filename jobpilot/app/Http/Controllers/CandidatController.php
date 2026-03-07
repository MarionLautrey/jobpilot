<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Candidat;

class CandidatController extends Controller
{

    public function index()
    {
        $candidats = Candidat::with('offres')->latest()->get();
        return view('candidats.index', compact('candidats'));
    }

    public function create()
    {
        return view('candidats.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'prenom'=> 'required',
            'adresse' => 'required',
            'email' => 'required',
            'telephone' => 'required',
            'description' => 'required',
        ]);

        Candidat::create($request->all());

        return redirect()->route('candidats.index')
                        ->with('success', 'candidat ajouté avec succès.');
    }

    public function edit(Candidat $candidat)
    {
        return view('candidats.edit', compact('candidat'));
    }

    public function update(Request $request, Candidat $candidat)
    {
        $request->validate([
            'nom' => 'required',
            'prenom'=> 'required',
            'adresse' => 'required',
            'email' => 'required',
            'telephone' => 'required',
            'description' => 'required',
        ]);

        $candidat->update($request->all());

        return redirect()->route('candidats.index')
                        ->with('success', 'candidat modifié avec succès.');
    }

    public function destroy(Candidat $candidat)
    {
        $candidat->delete();

        return redirect()->route('candidats.index')
                        ->with('success', 'candidat est supprimé avec succès.');
    }

    public function show(Candidat $candidat)
    {
        return view('candidats.show', compact('candidat'));
    }
}
