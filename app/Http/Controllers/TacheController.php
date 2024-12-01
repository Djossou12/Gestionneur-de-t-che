<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TacheController extends Controller
{
    public function store(Request $request, Projet $projet)
    {
        $this->authorize('createTache', $projet);

        $validated = $request->validate([
            'titre' => 'required|max:255',
            'description' => 'nullable',
            'statut' => 'in:non_commence,en_cours,termine',
            'priorite' => 'in:basse,moyenne,haute',
            'assignee_id' => 'nullable|exists:users,id'
        ]);

        $tache = $projet->taches()->create($validated);

        // Notification lors de l'assignation
        if ($request->has('assignee_id')) {
            $assignee = User::find($request->assignee_id);
            $assignee->notify(new TacheAssigneeNotification($tache));
        }

        return back()->with('success', 'Tâche créée');
    }

    public function update(Request $request, Tache $tache)
    {
        $this->authorize('update', $tache);

        $validated = $request->validate([
            'statut' => 'in:non_commence,en_cours,termine',
            'priorite' => 'in:basse,moyenne,haute',
            'assignee_id' => 'nullable|exists:users,id'
        ]);

        $tache->update($validated);

        return back()->with('success', 'Tâche mise à jour');
    }
}
