<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         // Créer un administrateur
         User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'), // Remplacez 'password' par un mot de passe sécurisé si nécessaire
            'role' => 'admin', // Assurez-vous que le champ 'role' existe dans la table users
        ]);

        // Créer quelques utilisateurs standard
        User::factory(5)->create();
    }
}
