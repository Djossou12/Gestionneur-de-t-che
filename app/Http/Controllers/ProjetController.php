<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjetController extends Controller
{
    public function index()
    {
        $projets = auth()->user()->isAdmin() 
            ? Projet::all() 
            : auth()->user()->projets;
        return view('projets.index', compact('projets'));
    }

    public function create()
    {
        return view('projets.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'titre' => 'required|max:255',
            'description' => 'nullable',
            'date_limite' => 'required|date',
        ]);

        $projet = auth()->user()->projets()->create($validated);

        return redirect()->route('projets.show', $projet)->with('success', 'Projet créé');
    }

    public function show(Projet $projet)
    {
        $this->authorize('view', $projet);
        $taches = $projet->taches;
        return view('projets.show', compact('projet', 'taches'));
    }

    public function update(Request $request, Projet $projet)
    {
        $this->authorize('update', $projet);
        
        $validated = $request->validate([
            'statut' => 'in:en_cours,termine'
        ]);

        $projet->update($validated);

        return back()->with('success', 'Statut du projet mis à jour');
    }
}