@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Mes Projets</h1>
        <a href="{{ route('projets.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">
            Nouveau Projet
        </a>
    </div>

    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-4">
        @forelse($projets as $projet)
            <div class="bg-white shadow rounded-lg p-6">
                <h2 class="text-xl font-semibold mb-2">{{ $projet->titre }}</h2>
                <p class="text-gray-600 mb-4">{{ Str::limit($projet->description, 100) }}</p>
                <div class="flex justify-between items-center">
                    <span class="badge {{ $projet->statut == 'termine' ? 'bg-green-200' : 'bg-yellow-200' }}">
                        {{ $projet->statut }}
                    </span>
                    <a href="{{ route('projets.show', $projet) }}" class="text-blue-500">
                        Voir Détails
                    </a>
                </div>
            </div>
        @empty
            <p class="col-span-full text-center text-gray-500">
                Aucun projet trouvé. Commencez par créer un projet !
            </p>
        @endforelse
    </div>
</div>
@endsection