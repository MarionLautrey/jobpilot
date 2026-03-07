<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entreprise;

class EntrepriseController extends Controller
{

    public function index()
    {
        $entreprises = Entreprise::with('offres')->latest()->get();
        return view('entreprises.index', compact('entreprises'));
    }

    public function create()
    {
        return view('entreprises.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'adresse' => 'required',
        ]);

        Entreprise::create($request->all());

        return redirect()->route('entreprises.index')
                        ->with('success', 'entreprise ajouté avec succès.');
    }

    public function edit(Entreprise $entreprise)
    {
        return view('entreprises.edit', compact('entreprise'));
    }

    public function update(Request $request, Entreprise $entreprise)
    {
        $request->validate([
            'nom' => 'required',
            'adresse' => 'required',
        ]);

        $entreprise->update($request->all());

        return redirect()->route('entreprises.index')
                        ->with('success', 'entreprise modifié avec succès.');
    }

    public function destroy(Entreprise $entreprise)
    {
        $entreprise->delete();

        return redirect()->route('entreprises.index')
                        ->with('success', 'entreprise est supprimé avec succès.');
    }

    public function show($id)
{
    $entreprise = Entreprise::findOrFail($id);
    return view('entreprises.show', compact('entreprise'));
}
}
