<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        
        $statistiques = [
            'total_projets' => $user->projets->count(),
            'projets_en_cours' => $user->projets()->where('statut', 'en_cours')->count(),
            'taches_total' => $user->tachesAssignees->count(),
            'taches_en_cours' => $user->tachesAssignees()->where('statut', 'en_cours')->count(),
            'taches_terminees' => $user->tachesAssignees()->where('statut', 'termine')->count()
        ];

        return view('dashboard', compact('statistiques'));
    }
}