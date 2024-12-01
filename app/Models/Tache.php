<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tache extends Model
{
    protected $fillable = ['titre', 'description', 'statut', 'priorite', 'projet_id', 'assignee_id'];

    public function projet()
    {
        return $this->belongsTo(Projet::class);
    }

    public function assignee()
    {
        return $this->belongsTo(User::class, 'assignee_id');
    }
}