<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Offre;

class DashboardController extends Controller
{
    public function index()
    {
        // Statistiques sur les offres
        $total = Offre::count();
        $cdi = Offre::where('type', 'CDI')->count();
        $cdd = Offre::where('type', 'CDD')->count();
        $stage = Offre::where('type', 'Stage')->count();
        $alternance = Offre::where('type', 'Alternance')->count();

        // Envoie à la vue dashboard
        return view('dashboard', compact('total', 'cdi', 'cdd', 'stage', 'alternance'));
    }
}
