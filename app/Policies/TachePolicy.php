<?php

namespace App\Policies;

use App\Models\User;

class TachePolicy
{
    public function update(User $user, Tache $tache)
    {
        return $user->isAdmin() 
            || $tache->projet->user_id === $user->id 
            || $tache->assignee_id === $user->id;
    }
}

