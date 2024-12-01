@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <h1 class="text-2xl font-semibold mb-6">Tableau de Bord</h1>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="bg-white p-6 rounded-lg shadow">
                <h2 class="text-xl font-bold mb-4">Projets</h2>
                <p>Total: {{ $statistiques['total_projets'] }}</p>
                <p>En cours: {{ $statistiques['projets_en_cours'] }}</p>
            </div>

            <div class="bg-white p-6 rounded-lg shadow">
                <h2 class="text-xl font-bold mb-4">Tâches</h2>
                <p>Total: {{ $statistiques['taches_total'] }}</p>
                <p>En cours: {{ $statistiques['taches_en_cours'] }}</p>
                <p>Terminées: {{ $statistiques['taches_terminees'] }}</p>
            </div>
        </div>
    </div>
</div>
@endsection