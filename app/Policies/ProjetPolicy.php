<?php

namespace App\Policies;

use App\Models\User;

class ProjetPolicy
{
    public function view(User $user, Projet $projet)
    {
        return $user->isAdmin() || $projet->user_id === $user->id;
    }

    public function update(User $user, Projet $projet)
    {
        return $user->isAdmin() || $projet->user_id === $user->id;
    }

    public function createTache(User $user, Projet $projet)
    {
        return $user->isAdmin() || $projet->user_id === $user->id;
    }
}

