<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Offre;

class OffreController extends Controller
{

    public function index()
    {
        $offres = Offre::with(['entreprise', 'candidat'])->get();        
        return view('offres.index', compact('offres'));
    }

    public function create()
    {
        return view('offres.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'job' => 'required',
            'type' => 'required',
            'entreprise' => 'required',
            'adresse' => 'required',
            'date'=> 'required',
        ]);

        Offre::create($request->all());

        return redirect()->route('offres.index')
                        ->with('success', 'Offre ajouté avec succès.');
    }

    public function edit(Offre $offre)
    {
        return view('offres.edit', compact('offre'));
    }

    public function update(Request $request, Offre $offre)
    {
        $request->validate([
            'job' => 'required',
            'type' => 'required',

        ]);

        $offre->update($request->all());

        return redirect()->route('offres.index')
                        ->with('success', 'Offre modifié avec succès.');
    }

    public function destroy(Offre $offre)
    {
        $offre->delete();

        return redirect()->route('offres.index')
                        ->with('success', 'Offre est supprimé avec succès.');
    }

    public function show($id)
{
    $offre = Offre::findOrFail($id);
    return view('offres.show', compact('offre'));
}
}
