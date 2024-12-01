<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    protected $fillable = ['name', 'email', 'password', 'role'];

    public function projets()
    {
        return $this->hasMany(Projet::class);
    }

    public function tachesAssignees()
    {
        return $this->hasMany(Tache::class, 'assignee_id');
    }

    public function isAdmin()
    {
        return $this->role === 'admin';
    }
}